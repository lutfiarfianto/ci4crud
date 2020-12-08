<?php namespace Myclass\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Xtable extends BaseCommand
{
    protected $group       = 'Generators';
    protected $name        = 'xtable';
    protected $description = "Read table property to make config file.";

    protected $usage     = "xtable";
    protected $arguments = [
    ];

    public function __construct()
    {
        helper(['inflector']);
    }


    public function run(array $params = [])
    {
        $db = db_connect();

        cli::write('Create app config from table property');
        cli::write('-------------------------------------');
        cli::write('Enter: '.cli::color('Page Title, Class Name, Table Name and Sub Directory','light_blue'));
        cli::write();

        $title      = cli::prompt("Type page title");
        $class_name = cli::prompt("Type class name");
        $table      = cli::prompt("Type table name");
        $subdir     = cli::prompt("Type subdir path");

        if ($db->tableExists($table)) {
            $fields = $db->getFieldData($table);
            $fields = $this->cleanDatetime($fields);

            $table_label = $this->makeLabel($table);

            $data = [];
            $data['app'] = [
                'class_name' => $class_name,
                'table_name' => $table,
                'title'      => $title,
                'subdir'     => $subdir,
                'form' => [
                    'layout' => 'horizontal',
                    'title'  => [
                        'new'  => 'New ' . $title,
                        'edit' => 'Edit ' . $title,
                        'show' => 'View ' . $title,
                    ],
                ],
                'table' => [
                    'paging' => 10,
                    'title'  => 'List of ' . $title,
                    'css' => [
                        'table' => '',
                        'thead' => 'thead-dark',
                    ],
                ],
                'server_side_validation' => [
                    isset($fields[1])?$fields[1]->name:'field' => 'required',
                ],
                'upload' => [
                    'mime_type'  => '^image',
                    'file_ext'   => '(jpg|jpeg|png)',
                    'media_path' => 'uploads',
                ],
                'render' => [
                    'controller'        => true,
                    'model'             => true,
                    'entity'            => true,
                    'view_index'        => true,
                    'view_index_filter' => true,
                    'view_edit'         => true,
                    'view_show'         => true,
                    'route'             => true,
                ],

            ];

            foreach ($fields as $key => $field) {
                $data['table'][$field->name] = [
                    'name' => $field->name,
                    'type' => $field->type,
                    'pk'   => $field->primary_key ? true : false,
                    'table' => [
                        'caption'  => $this->makeLabel($field->name),
                        'show'     => 1,
                        'ordering' => $key,
                        'filter'   => 1,
                    ],
                    'form' => [
                        'label'    => $this->makeLabel($field->name),
                        'show'     => true,
                        'ordering' => $key,
                        'stub'     => $field->primary_key ? "hidden" : "input",
                    ],
                    'form_attr' => [
                        'name'        => $field->name,
                        'class'       => 'form-control',
                        'type'        => $field->primary_key ? "hidden" : "text",
                        'placeholder' => $this->makeLabel($field->name),
                        'required'    => true,
                    ],
                    'data_source' => [
                        'type' => '',
                        'array' => [
                            '*' => 'Select '.$this->makeLabel($field->name),
                        ],
                        'db' => [
                            'ref_model'    => '',
                            'key_fields'   => '',
                            'value_fields' => '',
                            'default'      => '- Select One -',
                        ],
                    ],
                ];
            }

            // $stringifier = new HJSONStringifier();
            $text = json_encode($data, JSON_PRETTY_PRINT);

            file_put_contents(__DIR__ . '/../../data/' . $table . '_' . $subdir . '.hjson', $text);
            cli::write('');
            cli::write('Config data from table: ' . cli::color($table, 'green') . ' created');
            cli::write();
            cli::write('You can now edit the config file by below command, happy editing...');
            cli::write();
            cli::write('code ./app/ThirdParty/My-class/data/'.$table.'_'.$subdir.'.hjson','yellow');
            cli::write();
            cli::write('Short Docs to edit json in :');
            cli::write();
            cli::write('code ./app/ThirdParty/My-class/src/docs.md','light_green');
            cli::write();

        } else {

            cli::write();
            cli::write("Table: " . cli::color($table, 'red') . " not exists.", "yellow");
        
          }

    }

    protected function makeLabel($field_name)
    {
        return humanize( $field_name );
    }

    public function cleanDatetime($fields)
    {
        $except = ['created_at', 'updated_at', 'deleted_at', 'last_user_id'];
        array_walk($except, function ($v, $k) use (&$fields) {
            foreach ($fields as $key => $fld) {
                if ($fld->name == $v) {
                    unset($fields[$key]);
                }

            }
        });
        return $fields;
    }

}
