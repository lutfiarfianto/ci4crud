<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Program extends BaseController
{

    public function __construct()
    {

        $this->programModel = new \App\Models\ProgramModel();

    }


    public function filter(){

        $this->index();

    }

    public function index()
    {

        // ** if you want to build query manually, refer to CI4 query builder **
        // $this->programModel->select('*, sp_program.id ', FALSE );

        $table_filters = (object) ["nama_program"=>null];

        foreach($table_filters as $field =>& $value){
            $value = refine_var($this->request->getGet($field));
        };

                if($table_filters->nama_program){
            $this->programModel->where('nama_program',$table_filters->nama_program);
        };


        $this->programModel->orderBy('sp_program.id desc');
        $rows = $this->programModel->paginate(10);

        $filter_label = ["nama_program"=>"Nama Program"];
        $filter_info = [];

        
        foreach ($filter_label as $fld => $label) 
        {
            if (!$table_filters->$fld) 
                continue;
            
            $filter_info[$fld] = '<span class="badge badge-primary">' . $label . ' = ' . $table_filters->$fld . '</span>';
            
        }
        
        
        $data = [
            'rows'       => $rows,
            'pager'      => $this->programModel->pager,
            'breadcrumb' => [
                'title' => 'List of Program',
            ],
            'per_page'    => 10,
            'filter_info' => implode("\n", $filter_info ),
            'table_filter' => $table_filters,
        ];

        

        echo view('Admin/Program/Index', $data);

    }

    public function show($id = null)
    {

        try {

            $program = $this->programModel->find($id);

            $data = [
                'program' => $program,
                'breadcrumb' => [
                    'title' => 'View Program',
                ],
            ];

            echo view('Admin/Program/Show', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function edit($id = null){

        try {

            $program = null;

            if (!$id && old('id')) {

                $program = $this->programModel->getOld();

            } else {

                $program = $this->programModel->find($id);

            }

            $data = [
                'program' => $program,
                'breadcrumb' => [
                    'title' => 'Edit Program',
                ],
            ];

            


            if (!$this->validate([])) {
                $data['validation'] = $this->validator;
            };

            echo view('Admin/Program/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    function new () {

        try {

            $program = new \App\Entities\Program();

            $data = [
                'program' => $program,
                'breadcrumb' => [
                    'title' => 'New Program',
                ],
            ];

            

            echo view('Admin/Program/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function store()
    {

        $request = service('request');

        // setting rules
        $rules = ["nama_program"=>"required"];

        if (!$this->validate($rules)) {

            return redirect()->to('edit/')->withInput()->with('errors', service('validation')->getErrors());

        }

        // post request
        $post_data = $request->getPost();

        $program_store = new \App\Entities\Program($post_data);

        if (!$this->programModel->save($program_store)) {

            return redirect()->back()->withInput()->with('errors', $this->programModel->errors());
        }

        return redirect()->to('/Admin/Program')->with('message', 'success');

    }

    public function delete()
    {

        $request = service('request');

        // post request
        $post_data = $request->getPost('id');

        $this->programModel->delete($post_data);

        return redirect()->to('/Admin/Program')->with('message', 'success');

    }

}

/* End of file Program.php */
/* Location: ./app/Controllers/Admin/Program.php */

