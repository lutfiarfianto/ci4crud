<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Siswa extends BaseController
{

    public function __construct()
    {

        $this->siswaModel = new \App\Models\SiswaModel();

        session()->remove('siswa_id');

    }


    public function filter(){

        $this->index();

    }

    public function index()
    {

        // ** if you want to build query manually, refer to CI4 query builder **
        // $this->siswa->select('SELECT id as key', FALSE );

        $table_filters = (object) ["nama_siswa"=>null,"kota_siswa"=>null,"fakultas_siswa"=>null,"angkatan_siswa"=>null];

        foreach($table_filters as $field =>& $value){
            $value = refine_var($this->request->getGet($field));
        };

                if($table_filters->nama_siswa){
            $this->siswaModel->where('nama_siswa',$table_filters->nama_siswa);
        };

        if($table_filters->kota_siswa){
            $this->siswaModel->where('kota_siswa',$table_filters->kota_siswa);
        };

        if($table_filters->fakultas_siswa){
            $this->siswaModel->where('fakultas_siswa',$table_filters->fakultas_siswa);
        };

        if($table_filters->angkatan_siswa){
            $this->siswaModel->where('angkatan_siswa',$table_filters->angkatan_siswa);
        };


        $this->siswaModel->orderBy('id desc');
        $rows = $this->siswaModel->paginate(10);

        $filter_label = ["nama_siswa"=>"Nama Siswa","kota_siswa"=>"Kota Siswa","fakultas_siswa"=>"Fakultas Siswa","angkatan_siswa"=>"Angkatan Siswa"];
        $filter_info = [];

        
        foreach ($filter_label as $fld => $label) 
        {
            if (!$table_filters->$fld) 
                continue;
            
            $filter_info[$fld] = '<span class="badge badge-primary">' . $label . ' = ' . $table_filters->$fld . '</span>';
            
        }
        
        
        $data = [
            'rows'       => $rows,
            'pager'      => $this->siswaModel->pager,
            'breadcrumb' => [
                'title' => 'List of Siswa',
            ],
            'per_page'    => 10,
            'filter_info' => implode("\n", $filter_info ),
            'table_filter' => $table_filters,
        ];

        		// multi option for kota_siswa
		$options_kota_siswa = ["*"=>"Select Kota Siswa","bdg"=>"Bandung","lb"=>"Luar Bandung"];
		$data['options_kota_siswa'] = $options_kota_siswa;



        echo view('Admin/Siswa/Index', $data);

    }

    public function show($id = null)
    {

        try {

            $siswa = $this->siswaModel->find($id);

            $data = [
                'siswa' => $siswa,
                'breadcrumb' => [
                    'title' => 'View Siswa',
                ],
            ];

            echo view('Admin/Siswa/Show', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function edit($id = null){

        try {

            $siswa = null;

            if (!$id && old('id')) {

                $siswa = $this->siswaModel->getOld();

            } else {

                $siswa = $this->siswaModel->find($id);

            }

            $data = [
                'siswa' => $siswa,
                'breadcrumb' => [
                    'title' => 'Edit Siswa',
                ],
            ];

            		// multi option for kota_siswa
		$options_kota_siswa = ["*"=>"Select Kota Siswa","bdg"=>"Bandung","lb"=>"Luar Bandung"];
		$data['options_kota_siswa'] = $options_kota_siswa;




            if (!$this->validate([])) {
                $data['validation'] = $this->validator;
            };

            echo view('Admin/Siswa/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    function new () {

        try {

            $siswa = new \App\Entities\Siswa();

            $data = [
                'siswa' => $siswa,
                'breadcrumb' => [
                    'title' => 'New Siswa',
                ],
            ];

            		// multi option for kota_siswa
		$options_kota_siswa = ["*"=>"Select Kota Siswa","bdg"=>"Bandung","lb"=>"Luar Bandung"];
		$data['options_kota_siswa'] = $options_kota_siswa;



            echo view('Admin/Siswa/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function store()
    {

        $request = service('request');

        // setting rules
        $rules = ["nama_siswa"=>"required"];

        if (!$this->validate($rules)) {

            return redirect()->to('edit/')->withInput()->with('errors', service('validation')->getErrors());

        }

        // post request
        $post_data = $request->getPost();

        $siswa_store = new \App\Entities\Siswa($post_data);

        if (!$this->siswaModel->save($siswa_store)) {

            return redirect()->back()->withInput()->with('errors', $this->siswaModel->errors());
        }

        return redirect()->to('Admin/Siswa')->with('message', 'success');

    }

    public function delete()
    {

        $request = service('request');

        // post request
        $post_data = $request->getPost('id');

        $this->siswaModel->delete($post_data);

        return redirect()->to('Admin/Siswa')->with('message', 'success');

    }

}

/* End of file Siswa.php */
/* Location: ./app/Controllers/Admin/Siswa.php */

