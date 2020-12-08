<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;

class Tryout extends BaseController
{

    public function __construct()
    {

        $this->tryoutModel = new \App\Models\TryoutModel();

    }


    public function filter(){

        $this->index();

    }

    public function index()
    {

        // ** if you want to build query manually, refer to CI4 query builder **
        // $this->tryoutModel->select('*, sp_judul_tryout.id ', FALSE );

        $table_filters = (object) ["judul_tryout"=>null,"mata_kuliah_id"=>null];

        foreach($table_filters as $field =>& $value){
            $value = refine_var($this->request->getGet($field));
        };

                if($table_filters->judul_tryout){
            $this->tryoutModel->where('judul_tryout',$table_filters->judul_tryout);
        };

        if($table_filters->mata_kuliah_id){
            $this->tryoutModel->where('mata_kuliah_id',$table_filters->mata_kuliah_id);
        };


        $this->tryoutModel->orderBy('sp_judul_tryout.id desc');
        $rows = $this->tryoutModel->paginate(10);

        $data = [
            'rows'       => $rows,
            'pager'      => $this->tryoutModel->pager,
            'breadcrumb' => [
                'title' => 'List of Tryout',
            ],
            'per_page'    => 10,
            'table_filter' => $table_filters,
        ];

        		// multi option for mata_kuliah_id
		$matakuliahModel = new \App\Models\matakuliahModel();
		$matakuliahModel->orderBy('nama_mata_kuliah asc');
		$rows = $matakuliahModel->findAll();

		$options_mata_kuliah_id = [
			'' => '- Select One -',
		];
		foreach($rows as $k=>$row){
			$options_mata_kuliah_id[$row->id] = $row->nama_mata_kuliah;
		}

		$data['options_mata_kuliah_id'] = $options_mata_kuliah_id;



		// multi option for status_tryout
		$options_status_tryout = ["draft"=>"Draft","publikasi"=>"Publikasi","arsip"=>"Arsip"];
		$data['options_status_tryout'] = $options_status_tryout;



		// multi option for tipe_tryout
		$options_tipe_tryout = ["*"=>"Select Tipe Tryout","ganda"=>"Pilihan Ganda","esai"=>"Esai"];
		$data['options_tipe_tryout'] = $options_tipe_tryout;




        $filter_label = ["judul_tryout"=>"Judul Tryout","mata_kuliah_id"=>"Mata Kuliah Id"];
        $filter_info = [];

        $table_filters_txt = (object) [];

              // render db-txt from table filter mata_kuliah_id
      if($table_filters->mata_kuliah_id){
        $matakuliah = $matakuliahModel->find( $table_filters->mata_kuliah_id );
        if(isset($matakuliah->nama_mata_kuliah))
            $table_filters_txt->id = $matakuliah->nama_mata_kuliah;
      }


        
        foreach ($filter_label as $fld => $label) 
        {
            if (!$table_filters->$fld) 
                continue;
            
            $filter_info[$fld] = '<span class="badge badge-primary">' . $label . ' = ' . (isset($table_filters_txt->$fld)?$table_filters_txt->$fld:$table_filters->$fld) . '</span>';
            
        }
        

        $data['filter_info'] = implode("\n", $filter_info );


        echo view('Member/Tryout/Index', $data);

    }

    public function show($id = null)
    {

        try {

            $tryout = $this->tryoutModel->find($id);

            $data = [
                'tryout' => $tryout,
                'breadcrumb' => [
                    'title' => 'View Tryout',
                ],
            ];

            echo view('Member/Tryout/Show', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function edit($id = null){

        try {

            $tryout = null;

            if (!$id && old('id')) {

                $tryout = $this->tryoutModel->getOld();

            } else {

                $tryout = $this->tryoutModel->find($id);

            }

            $data = [
                'tryout' => $tryout,
                'breadcrumb' => [
                    'title' => 'Edit Tryout',
                ],
            ];

            		// multi option for mata_kuliah_id
		$matakuliahModel = new \App\Models\matakuliahModel();
		$matakuliahModel->orderBy('nama_mata_kuliah asc');
		$rows = $matakuliahModel->findAll();

		$options_mata_kuliah_id = [
			'' => '- Select One -',
		];
		foreach($rows as $k=>$row){
			$options_mata_kuliah_id[$row->id] = $row->nama_mata_kuliah;
		}

		$data['options_mata_kuliah_id'] = $options_mata_kuliah_id;



		// multi option for status_tryout
		$options_status_tryout = ["draft"=>"Draft","publikasi"=>"Publikasi","arsip"=>"Arsip"];
		$data['options_status_tryout'] = $options_status_tryout;



		// multi option for tipe_tryout
		$options_tipe_tryout = ["*"=>"Select Tipe Tryout","ganda"=>"Pilihan Ganda","esai"=>"Esai"];
		$data['options_tipe_tryout'] = $options_tipe_tryout;




            if (!$this->validate([])) {
                $data['validation'] = $this->validator;
            };

            echo view('Member/Tryout/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    function new () {

        try {

            $tryout = new \App\Entities\Tryout();

            $data = [
                'tryout' => $tryout,
                'breadcrumb' => [
                    'title' => 'New Tryout',
                ],
            ];

            		// multi option for mata_kuliah_id
		$matakuliahModel = new \App\Models\matakuliahModel();
		$matakuliahModel->orderBy('nama_mata_kuliah asc');
		$rows = $matakuliahModel->findAll();

		$options_mata_kuliah_id = [
			'' => '- Select One -',
		];
		foreach($rows as $k=>$row){
			$options_mata_kuliah_id[$row->id] = $row->nama_mata_kuliah;
		}

		$data['options_mata_kuliah_id'] = $options_mata_kuliah_id;



		// multi option for status_tryout
		$options_status_tryout = ["draft"=>"Draft","publikasi"=>"Publikasi","arsip"=>"Arsip"];
		$data['options_status_tryout'] = $options_status_tryout;



		// multi option for tipe_tryout
		$options_tipe_tryout = ["*"=>"Select Tipe Tryout","ganda"=>"Pilihan Ganda","esai"=>"Esai"];
		$data['options_tipe_tryout'] = $options_tipe_tryout;



            echo view('Member/Tryout/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function store()
    {

        $request = service('request');

        // setting rules
        $rules = ["judul_tryout"=>"required"];

        if (!$this->validate($rules)) {

            return redirect()->to('edit/')->withInput()->with('errors', service('validation')->getErrors());

        }

        // post request
        $post_data = $request->getPost();

        

        $tryout_store = new \App\Entities\Tryout($post_data);

        if (!$this->tryoutModel->save($tryout_store)) {

            return redirect()->back()->withInput()->with('errors', $this->tryoutModel->errors());
        }

        return redirect()->to('/Member/Tryout')->with('message', 'success');

    }

    public function delete()
    {

        $request = service('request');

        // post request
        $post_data = $request->getPost('id');

        $this->tryoutModel->delete($post_data);

        return redirect()->to('/Member/Tryout')->with('message', 'success');

    }

}

/* End of file Tryout.php */
/* Location: ./app/Controllers/Member/Tryout.php */

