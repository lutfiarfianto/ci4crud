<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;

class Hasiltryout extends BaseController
{

    public function __construct()
    {

        $this->hasiltryoutModel = new \App\Models\HasiltryoutModel();

    }

    /*
    public function session($id)
    {
        $parent_id = id_decode($id);
        session()->set('parent_id',$parent_id);
        return redirect()->to('/path/to/parent');
    }
    */

    public function filter(){

        $this->index();

    }

    public function index()
    {

        session()->destroy(['tryout_id','lembar_id']);


        $siswa_id = 3;

        // ** if you want to build query manually, refer to CI4 query builder **
        $this->hasiltryoutModel->select('*, sp_lembar_tryout.id ', FALSE );

        $table_filters = (object) ["judul_tryout"=>null];

        foreach($table_filters as $field =>& $value){
            $value = refine_var($this->request->getGet($field));
        };

        if($table_filters->judul_tryout){
            $this->hasiltryoutModel->like('judul_tryout',$table_filters->judul_tryout);
        };

        $this->hasiltryoutModel->join('sp_judul_tryout','sp_judul_tryout.id=sp_lembar_tryout.judul_tryout_id','left');

        $this->hasiltryoutModel->where('siswa_id', $siswa_id);
        $this->hasiltryoutModel->where("skor_tryout!='' ");


        $this->hasiltryoutModel->orderBy('sp_lembar_tryout.id desc');
        $rows = $this->hasiltryoutModel->paginate(10);

        $data = [
            'rows'       => $rows,
            'pager'      => $this->hasiltryoutModel->pager,
            'breadcrumb' => [
                'title' => 'List of Hasil Tryout',
            ],
            'per_page'    => 10,
            'table_filter' => $table_filters,
        ];

        


        $filter_label = ["judul_tryout"=>"Judul Tryout"];
        $filter_info = [];

        $table_filters_txt = (object) [];

        

        
        foreach ($filter_label as $fld => $label) 
        {
            if (!$table_filters->$fld) 
                continue;
            
            $filter_info[$fld] = '<span class="badge badge-primary">' . $label . ' = ' . (isset($table_filters_txt->$fld)?$table_filters_txt->$fld:$table_filters->$fld) . '</span>';
            
        }
        

        $data['filter_info'] = implode("\n", $filter_info );


        echo view('Member/Hasiltryout/Index', $data);

    }

    public function skor($id)
    {
        $hasiltryout = $this->hasiltryoutModel->find($id);

        $lembar_id = $id;
        $siswa_id  = $hasiltryout->siswa_id;
        $tryout_id = $hasiltryout->judul_tryout_id;

        $data = [
            'lembar_id' => $lembar_id,
            'siswa_id'  => $siswa_id,
            'tryout_id' => $tryout_id,
        ];

        session()->set($data);

        return redirect()->to('/Member/Jawabantryout/skor');

    }


}

/* End of file Hasiltryout.php */
/* Location: ./app/Controllers/Member/Hasiltryout.php */

