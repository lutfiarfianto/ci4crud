<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel as usersModel;
use Myth\Auth\Authorization\GroupModel;

class Diskusi extends BaseController
{

    public function __construct()
    {

        $this->diskusiModel = new \App\Models\DiskusiModel();

    }

    public function index()
    {

        // ** if you want to build query manually, refer to CI4 query builder **
        // $this->diskusi->select('SELECT id as key', FALSE );

        $this->diskusiModel->orderBy('id desc');
        $rows = $this->diskusiModel->paginate(10);

        $data = [
            'rows' => $rows,
            'pager' => $this->diskusiModel->pager,
            'breadcrumb' => [
                'title' => 'List of Diskusi',
            ],
            'per_page' => 10,

        ];

        echo view('Admin/Diskusi/Index', $data);

    }

    public function show($id = null)
    {

        try {

            $diskusi = $this->diskusiModel->find($id);

            $data = [
                'diskusi' => $diskusi,
                'breadcrumb' => [
                    'title' => 'View Diskusi',
                ],
            ];

            echo view('Admin/Diskusi/Show', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function edit($id = null){

        try {

            $diskusi = null;

            if (!$id && old('id')) {

                $diskusi = $this->diskusiModel->getOld();

            } else {

                $diskusi = $this->diskusiModel->find($id);

            }

            $data = [
                'diskusi' => $diskusi,
                'breadcrumb' => [
                    'title' => 'Edit Diskusi',
                ],
            ];

            		// multi option for user_id
		$usersModel = new usersModel();
		$usersModel->orderBy('email asc');
		$rows = $usersModel->findAll();

		$options_user_id = [];
		foreach($rows as $k=>$row){
			$options_user_id[$row->id] = $row->email;
		}

		$data['options_user_id'] = $options_user_id;



		// multi option for publishing
		$options_publishing = ["0"=>"Draft","2"=>"Arsip","1"=>"Publikasikan"];
		$data['options_publishing'] = $options_publishing;




            if (!$this->validate([])) {
                $data['validation'] = $this->validator;
            };

            echo view('Admin/Diskusi/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    function new () {

        try {

            $diskusi = new \App\Entities\Diskusi();

            $data = [
                'diskusi' => $diskusi,
                'breadcrumb' => [
                    'title' => 'New Diskusi',
                ],
            ];

            		// multi option for user_id
		$usersModel = new usersModel();
		$usersModel->orderBy('email asc');
		$rows = $usersModel->findAll();

		$options_user_id = [];
		foreach($rows as $k=>$row){
			$options_user_id[$row->id] = $row->email;
		}

		$data['options_user_id'] = $options_user_id;



		// multi option for publishing
		$options_publishing = ["0"=>"Draft","2"=>"Arsip","1"=>"Publikasikan"];
		$data['options_publishing'] = $options_publishing;



            echo view('Admin/Diskusi/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function store()
    {

        $request = service('request');

        // setting rules
        $rules = ["judul_diskusi"=>"required"];

        if (!$this->validate($rules)) {

            return redirect()->to('edit/')->withInput()->with('errors', service('validation')->getErrors());

        }

        // post request
        $post_data = $request->getPost();

        $diskusi_store = new \App\Entities\Diskusi($post_data);

        if (!$this->diskusiModel->save($diskusi_store)) {

            return redirect()->back()->withInput()->with('errors', $this->diskusiModel->errors());
        }

        return redirect()->route('Admin/Diskusi')->with('message', 'success');

    }

    public function delete()
    {

        $request = service('request');

        // post request
        $post_data = $request->getPost('id');

        $this->diskusiModel->delete($post_data);

        return redirect()->route('Admin/Diskusi')->with('message', 'success');

    }

}

/* End of file Diskusi.php */
/* Location: ./app/Controllers/Admin/Diskusi.php */

