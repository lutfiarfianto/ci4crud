<?php namespace Myclass\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use HJSON\HJSONParser;

class Xapp extends BaseCommand
{
    protected $group = 'Generators';
    protected $name = 'xapp';
    protected $description = "Generate CRUD from config.";

    protected $usage = "xapp";
    protected $arguments = [
    ];

    protected $dot_config = null;

    public function __construct()
    {
        $this->db = db_connect();
        $this->hjson = new HJSONParser();
        $this->parser = \Config\Services::parser();

    }

    public function getConfig()
    {
        if (file_exists($this->file_path)) {
            $config_string = file_get_contents($this->file_path);
            $config = $this->hjson->parse($config_string);
        }

        return $config;
    }


    public function run(array $params = [])
    {

        $file = cli::prompt("Enter Config File");
        $file_path = __DIR__ . '/../../data/' . $file . '.hjson';

        $this->file_path = $file_path;

        if (file_exists($file_path)) {
            $config_string = file_get_contents($file_path);
            $config = $this->hjson->parse($config_string);
            $this->config = $config;
            $this->dot_config = Dot($config);

            $class_name = $config->app->class_name;
            $subdir = $config->app->subdir;

            $tpl = [
              'controller' => [
                'path'    => 'Controllers/' . $subdir . '/' . $class_name . '.php',
                'content' => $this->renderController(),
              ],
              'model' => [
                'path'    => 'Models/' . $class_name . 'Model.php',
                'content' => $this->renderModel(),

              ],
              'entity' => [
                'path'    => 'Entities/' . $class_name . '.php',
                'content' => $this->renderEntity(),
              ],
              'view_index' => [
                'path'    => 'Views/' . $subdir . '/' . $class_name . '/index.php',
                'content' => $this->renderViewIndex(),
              ],
              'view_index_filter' => [
                'path'    => 'Views/' . $subdir . '/' . $class_name . '/index_filter.php',
                'content' => $this->renderViewIndexFilter(),
              ],
              'view_edit' => [
                'path'    => 'Views/' . $subdir . '/' . $class_name . '/edit.php',
                'content' => $this->renderViewEdit(),
              ],
              'view_show' => [
                'path'    => 'Views/' . $subdir . '/' . $class_name . '/show.php',
                'content' => $this->renderViewShow(),
              ],
              'route' => [
                'path' => 'Config/Routes/Web/' . $subdir . '_' . $class_name . '.php',
                'content' => $this->renderRoute(),
              ],
            ];

            // exit;

            foreach ($tpl as $key => $file) {

                if ($config->app->render->$key) {
                
                    $this->makePath($file['path']);
                    file_put_contents(APPPATH . '/' . $file['path'], $file['content']);
                    cli::write('Success generate: '.cli::color($file['path'], 'yellow'), 'blue');
                
                } 

            }

            cli::write();
            cli::write('Generate success!','light_green');

        } else {

            cli::write();
            cli::write('File: ' . cli::color($file, 'red') . ' not exists ');
            cli::write();

        }

    }

    /* renderer */
    public function renderViewIndex()
    {

        $config = $this->getConfig();

        $table_config = $this->extractTable('table', $config);

        $table_fields = [];

        $stub_td = $this->stubPath('Tables/td');
        $stub_th = $this->stubPath('Tables/th');

        foreach ($table_config as $fld => $fld_meta) {

            $data = [
                'field'   => $fld,
                'caption' => $fld_meta->caption,
            ];

            $table_fields['td'][$fld] = $this->renderStub($stub_td, $data);
            $table_fields['th'][$fld] = $this->renderStub($stub_th, $data);

        }

        $table_column_td = $this->tableGroupSorted($table_fields['td']);
        $table_column_th = $this->tableGroupSorted($table_fields['th']);

        $data_table = [
            'head_content'    => implode("\n", $table_column_th ),
            'row_content'     => implode("\n", $table_column_td ),
            'thead_css_class' => $config->app->table->css->thead,
        ];

        $stub = $this->stubPath('Tables/table');

        $data = [

            'title'         => $config->app->title,
            'table_content' => $this->renderStub($stub, $data_table),
            'subdir'        => $config->app->subdir,
            'class_name'    => $config->app->class_name,

        ];

        $stub = $this->stubPath('Pages/page_index');

        $page = $this->renderStub($stub, $data);

        // cli::write($page, 'light_red');
        // exit;

        return $page;

    }

    public function renderViewIndexFilter()
    {
        $config = $this->getConfig();

        $table_meta  = $this->extractTable('table', $config);
        $form_metas  = $this->extractTable('form', $config);
        $filter_attr = $this->extractTable('form_attr', $config);

        $filter_form = [];

        foreach ($form_metas as $fld => $form_meta) {
            if($fld=='id') continue;
            if($table_meta->$fld->show && $table_meta->$fld->filter ){
                
                $data = [];
                
                $filter_attr->$fld->value = '$table_filter->'.$fld;
                if(in_array($form_meta->stub,['dropdown'])){
                    $filter_attr->$fld->options = '$options_'.$fld;
                    $filter_attr->$fld->selected = $filter_attr->$fld->value;
                    unset($filter_attr->$fld->value);
                }
                $data['fld']= $fld;
                unset($filter_attr->$fld->required);
                
                $stub = $this->stubPath('Forms/form_' . $form_meta->stub);
                $data['form_input'] = $this->renderFormType($stub, $filter_attr->$fld, $data);
                
                $data['label']      = $table_meta->$fld->caption;

                $stub = $this->stubPath('Layouts/filter_group');

                $filter_form[$fld] = $this->renderStub($stub, $data);

            }

        }

        $data = [
            'filter_form' => implode("\n", $filter_form),
            'subdir'      => $config->app->subdir,
            'class_name'  => $config->app->class_name,
        ];

        $stub = $this->stubPath('Pages/page_index_filter');

        $page = $this->renderStub($stub, $data);

        // cli::write($page, 'light_blue');

        return $page;

    }

    public function renderViewEdit()
    {

        $config = $this->getConfig();

        $form_config = $this->extractTable('form', $config);
        $form_attr   = $this->extractTable('form_attr', $config);

        $form_inputs = (object) [];
        $model = strtolower($config->app->class_name);

        

        foreach ($form_config as $fld => $form_meta) {
            $form_attr->$fld->value = '$'.$model.'->'.$fld;
            if(in_array($form_meta->stub,['dropdown'])){
                $form_attr->$fld->options = '$options_'.$fld;
                $form_attr->$fld->selected = $form_attr->$fld->value;
            }
            $data['fld']   = $fld;
            $data['model'] = $model;

            $stub              = $this->stubPath('Forms/form_' . $form_meta->stub);
            $form_inputs->$fld = $this->renderFormType($stub, $form_attr->$fld, $data);
        }

        $form_layout = $config->app->form->layout;

        $form_groups = [];

        $_multipart = '';

        foreach ($form_config as $fld => $form_meta) {

            if ($form_meta->stub != 'hidden') {

                $data = [

                    'label'         => $form_meta->label,
                    'form_input'    => $form_inputs->$fld,
                    'required_mark' => (isset($form_attr->$fld->required)) ? "*" : "",

                ];

                $stub = $this->stubPath('Layouts/form_group_' . $form_layout);

                if($form_meta->stub=='upload'){
                    $_multipart = '_multipart';
                }

            } else {

                $data['form_input'] = $form_inputs->$fld
                ;

                $stub = $this->stubPath('Layouts/form_group_hidden');

            }

            $form_groups[$fld] = $this->renderStub($stub, $data);

        }


        $form_group_id = $form_groups['id'];

        unset($form_groups['id']);

        $form_content = implode("\n", $this->formGroupSorted($form_groups));

        $data = [

            'form_content'  => $form_content,
            'subdir'        => $config->app->subdir,
            'title'         => $config->app->title,
            'class_name'    => $config->app->class_name,
            'model'         => strtolower($config->app->class_name),
            'form_field_id' => $form_group_id,
            'multipart'     => $_multipart,

        ];

        $stub = $this->stubPath('Pages/page_edit');

        $page = $this->renderStub($stub, $data);

        // cli::write($page, 'light_blue');
        // exit;

        return $page;

    }

    public function renderViewShow()
    {
        $config = $this->config;

        $form_config = $this->extractTable('form', $config);
        $form_attr   = $this->extractTable('form_attr', $config);

        $form_shows = (object) [];

        $model = strtolower($config->app->class_name);

        foreach ($form_config as $fld => $form_meta) {
            $stub             = $this->stubPath('Forms/form_' . $form_meta->stub);
            $form_shows->$fld = '<?= $' . $model . '->' . $fld . ' ?>';
        }

        $show_layout = $config->app->form->layout;

        $show_groups = [];

        $stub = $this->stubPath('Layouts/show_group_' . $show_layout);

        foreach ($form_config as $fld => $form_meta) {

            if ($form_meta->stub != 'hidden') {

                $data = [

                    'label'     => $form_meta->label,
                    'form_show' => $form_shows->$fld,

                ];

                $form_groups[$fld] = $this->renderStub($stub, $data);

            }

        }

        $show_content = implode("\n", $this->formGroupSorted($form_groups));

        $data = [

            'show_content' => $show_content,
            'subdir'       => $config->app->subdir,
            'title'        => $config->app->title,
            'class_name'   => $config->app->class_name,
            'model'        => strtolower($config->app->class_name),

        ];

        $stub = $this->stubPath('Pages/page_show');

        $page = $this->renderStub($stub, $data);

        // cli::write($page, 'light_blue');

        return $page;

    }

    public function renderController()
    {
        $config = $this->getConfig();

        $data_source  = $this->extractTable('data_source', $config);

        // data reference
        $edit_data_refs = [];

        foreach($data_source as $fld => $src_meta){

            if($src_meta->type){

                $stub = $this->stubPath('Crud/controller_edit_'.$src_meta->type);
                $data = [
                    'fld'           => $fld,
                    'array'         => $this->arrayStringify( $src_meta->array ),
                    'ref_model'     => $src_meta->db->ref_model,
                    'key_fields'    => $src_meta->db->key_fields,
                    'value_fields'  => $src_meta->db->value_fields,
                    'default_value' => isset($src_meta->db->default_value)?$src_meta->db->default_value:'- Select One -',
                ];

                $edit_data_refs[] = $this->renderStub($stub, $data);
            }
        }

        $edit_data_ref = implode("\n\n", $edit_data_refs);


        // filter model
        $table_metas      = $this->extractTable('table');
        $filter_models    = [];
        $field_filter     = [];
        $filter_label     = [];
        $filter_infos     = [];
        $filter_info_txts = [];

        $stub_filter_model    = $this->stubPath('Crud/controller_filter_model');
        $stub_filter_info     = $this->stubPath('Crud/controller_filter_info');
        $stub_filter_info_txt = $this->stubPath('Crud/controller_filter_info_txt');

        foreach ($table_metas as $fld => $table_meta) {
            if($table_meta->show && $table_meta->filter){

                $data = [
                    'model' => strtolower($config->app->class_name),
                    'fld'   => $fld,
                    'label' => $table_meta->caption,
                ];

                $filter_models[] =$this->renderStub($stub_filter_model,$data);

                $field_filter[$fld] = null;

                $filter_label[$fld] = $table_meta->caption;

                // translate id to value
                if($data_source->$fld->type=='db'){

                    $data = [
                        'fld'          => $fld,
                        'ref_model'    => $data_source->$fld->db->ref_model,
                        'key_fields'   => $data_source->$fld->db->key_fields,
                        'value_fields' => $data_source->$fld->db->value_fields,
                        'default_value' => isset($src_meta->db->default_value)?$src_meta->db->default_value:'- Select One -',
                    ];

                    $filter_info_txts[] = $this->renderStub( $stub_filter_info_txt , $data );

                }

            }

        }

        // upload handler
        $_has_upload = false;

        $form_metas = $this->extractTable('form');

        foreach ($form_metas as $fld => $form_meta) {
            if($form_meta->stub=='upload' && !$_has_upload)
                $_has_upload = true;
                
        }

        $upload_handler  = null;

        if($_has_upload){

            $upload_stub = $this->stubPath('crud/controller_store_files');

            $data = [
                'mime_type'  => $config->app->upload->mime_type,
                'file_ext'   => $config->app->upload->file_ext,
                'media_path' => $config->app->upload->media_path,
            ];
            
            $upload_handler = $this->renderStub($upload_stub,$data);

        }

        $data = [

            'class_name'       => $config->app->class_name,
            'table_name'       => $config->app->table_name,
            'subdir'           => $config->app->subdir,
            'model'            => strtolower($config->app->class_name),
            'paginate'         => $config->app->table->paging,
            'table_title'      => $config->app->table->title,
            'form_edit_title'  => $config->app->form->title->edit,
            'form_show_title'  => $config->app->form->title->show,
            'form_new_title'   => $config->app->form->title->new,
            'validation_rules' => $this->arrayStringify($config->app->server_side_validation),
            'edit_data_ref'    => $edit_data_ref,
            'filter_model'     => implode("\n", $filter_models),
            'field_filter'     => $this->arrayStringify($field_filter),
            'filter_label'     => $this->arrayStringify($filter_label),
            'table_filter_txt' => implode("\n\n",$filter_info_txts),
            'upload_handler'   => $upload_handler,

        ];


        $stub = $this->stubPath('Crud/controller');

        $page = $this->renderStub($stub, $data);

        // cli::write($page,'light_yellow');
        // exit;

        return $page;

    }

    public function renderEntity()
    {
        $config = $this->config;

        $data_source  = $this->extractTable('data_source', $config);

        $fields_array_data = [];

        foreach($data_source as $fld => $src_meta){

            if($src_meta->type=='array'){

                $stub = $this->stubPath('Crud/entity_field_array');
                $data = [
                    'fld'          => $fld,
                    'array'        => $this->arrayStringify( $src_meta->array ),
                ];

                $fields_array_data[] = $this->renderStub($stub, $data);
            }
        }

        $fields_array = implode("\n\n\t", $fields_array_data);
    
    
        $data = [
            'class_name'   => $config->app->class_name,
            'fields_array' => $fields_array,
        ];

        $stub = $this->stubPath('Crud/entity');

        $page = $this->renderStub($stub, $data);

        // cli::write($page, 'light_green');

        return $page;

    }

    public function renderModel()
    {

        $config = $this->config;

        $table_name = $config->app->table_name;

        $_fields        = $this->db->getFieldNames($table_name);
        $fields         = $this->cleanDatetime($_fields);
        $allowed_fields = $this->arrayStringify($fields);

        $data = [
            'class_name'     => $config->app->class_name,
            'allowed_fields' => $allowed_fields,
            'table_name'     => $table_name,
        ];

        $stub = $this->stubPath('Crud/model');

        $page = $this->renderStub($stub, $data);

        // cli::write($page, 'light_purple');

        return $page;

    }

    public function renderRoute()
    {

        $config = $this->config;

        $table_name = $config->app->table_name;

        $data = [
            'class_name' => $config->app->class_name,
            'subdir'     => $config->app->subdir,
        ];

        $stub = $this->stubPath('Configs/route');

        $page = $this->renderStub($stub, $data);

        // cli::write($page, 'yellow');

        return $page;

    }

    /* helper */

    public function makePath($path)
    {
        $_path = explode('/', $path);
        $_path = array_splice($_path,0,-1);
        $_path_str = '';
        foreach ($_path as $key => $tpath) {
            $_path_str = $_path_str.'/'.$tpath;

            if(!file_exists(APPPATH . $_path_str )){
                mkdir( APPPATH . $_path_str );
            }
        }

    }


    public function tableGroupSorted($table_column)
    {

        $_ordering = $this->getFieldOrdering('table');

        $_sorted = [];
        foreach ($_ordering as $fld) {
            $_sorted[] = $table_column[$fld];
        }

        return $_sorted;
    }

    public function formGroupSorted($form_group)
    {

        $_ordering = $this->getFieldOrdering('form');

        $_sorted = [];
        foreach ($_ordering as $fld) {
            if(isset($form_group[$fld])){
                $_sorted[] = $form_group[$fld];
            }
        }

        return $_sorted;
    }

    public function stubPath($stub)
    {
        return __DIR__ . '/../Stubs/Xapp/' . $stub . '.stub';
    }

    public function getFieldOrdering($meta)
    {

        $config_metas = $this->extractTable($meta);
        unset($config_metas->id);

        $_config_order = [];

        foreach ($config_metas as $fld => $config_meta) {
            if ($config_meta->show) {
                $_config_order[$fld] = $config_meta->ordering;
            }
        }

        asort($_config_order);
        $_order = array_flip($_config_order);
        return $_order;

    }

    public function extractTable($var,$config=null)
    {

        $_data = $config?$config->table:$this->config->table;

        $_extracted = (object) [];

        foreach ($_data as $field => $tdata) {
            $_extracted->$field = $tdata->$var;
        }

        unset($_data);

        return $_extracted;

    }

    public function renderFormType($stub, $attr, $data=[])
    {

        $str_stub = file_get_contents($stub);

        $_data = [
            'attributes' => $this->arrayStringify($attr),
        ];

        $_data = array_merge_recursive($_data,$data);

        return html_entity_decode($this->parser->setData($_data)->renderString($str_stub));

    }

    public function arrayStringify($array)
    {
        $str = json_encode($array);

        $str = preg_replace(['/\{/', '/\}/', '/\:/'], ['[', ']', '=>'], $str);
        $str = preg_replace('/"(\$[\w\_\-\>]+)"/', '$1', $str);

        return ($str);
    }

    public function renderStub($file, $data)
    {

        $string = file_get_contents($file);

        $rendered = $this->parser->setData($data)->renderString($string);
        $rendered = htmlspecialchars_decode($rendered);
        $rendered = str_replace('&#039;', "'", $rendered);

        return $rendered;

    }

    public function cleanDatetime($fields)
    {
        $except = ['created_at', 'updated_at', 'deleted_at', 'last_user_id'];
        array_walk($except, function ($v, $k) use (&$fields) {
            foreach ($fields as $key => $fld) {
                if ($fld == $v) {
                    unset($fields[$key]);
                }

            }
        });
        return $fields;
    }

}
