<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Testimoni extends BaseController
{

    public function __construct()
    {

        $this->testimoniModel = new \App\Models\TestimoniModel();

    }

    public function filter()
    {

        $this->index();

    }

    public function index()
    {

        // ** if you want to build query manually, refer to CI4 query builder **
        $this->testimoniModel->select('*, sp_testimoni.id ', FALSE );

        $table_filters = (object) ["id" => null, "user_id" => null, "testimoni" => null];

        foreach ($table_filters as $field => &$value) {
            $value = refine_var($this->request->getGet($field));
        };

        if ($table_filters->user_id) {
            $this->testimoniModel->where('user_id', $table_filters->user_id);
        };

        if ($table_filters->testimoni) {
            $this->testimoniModel->where('testimoni', $table_filters->testimoni);
        };

        $this->testimoniModel->join('users','users.id=sp_testimoni.user_id','left');
        $this->testimoniModel->orderBy('sp_testimoni.id desc');
        $rows = $this->testimoniModel->paginate(10);

        $data = [
            'rows' => $rows,
            'pager' => $this->testimoniModel->pager,
            'breadcrumb' => [
                'title' => 'List of Testimoni',
            ],
            'per_page' => 10,
            'table_filter' => $table_filters,
        ];

        // multi option for user_id
        $userModel = new \App\Models\userModel();
        $userModel->orderBy('email asc');
        $rows = $userModel->findAll();

        $options_user_id = [];
        foreach ($rows as $k => $row) {
            $options_user_id[$row->id] = $row->email;
        }

        $data['options_user_id'] = $options_user_id;

        // multi option for post_status
        $options_post_status = ["draft" => "Draft", "publikasi" => "Publikasi", "arsip" => "Arsip"];
        $data['options_post_status'] = $options_post_status;


        $filter_label = ["id" => "Id", "user_id" => "User", "testimoni" => "Testimoni"];
        $filter_info = [];
        $table_filters_txt = (object) [];

        $user = $userModel->find( $table_filters->user_id );
        if(isset($user->email))
            $table_filters_txt->user_id = $user->email;

        foreach ($filter_label as $fld => $label) {
            if (!$table_filters->$fld) {
                continue;
            }

            $filter_info[$fld] = '<span class="badge badge-primary">' . $label . ' = ' . (isset($table_filters_txt->$fld)?$table_filters_txt->$fld:$table_filters->$fld) . '</span>';

        }

        $data['filter_info'] = implode("\n", $filter_info);


        echo view('Admin/Testimoni/Index', $data);

    }

    public function show($id = null)
    {

        try {

            $this->testimoniModel->join('users','users.id=sp_testimoni.user_id','left');
            $testimoni = $this->testimoniModel->find($id);

            $data = [
                'testimoni' => $testimoni,
                'breadcrumb' => [
                    'title' => 'View Testimoni',
                ],
            ];

            echo view('Admin/Testimoni/Show', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function edit($id = null)
    {

        try {

            $testimoni = null;

            if (!$id && old('id')) {

                $testimoni = $this->testimoniModel->getOld();

            } else {

                $testimoni = $this->testimoniModel->find($id);

            }

            $data = [
                'testimoni' => $testimoni,
                'breadcrumb' => [
                    'title' => 'Edit Testimoni',
                ],
            ];

            // multi option for user_id
            $userModel = new \App\Models\userModel();
            $userModel->orderBy('email asc');
            $rows = $userModel->findAll();

            $options_user_id = [];
            foreach ($rows as $k => $row) {
                $options_user_id[$row->id] = $row->email;
            }

            $data['options_user_id'] = $options_user_id;

            // multi option for post_status
            $options_post_status = ["draft" => "Draft", "publikasi" => "Publikasi", "arsip" => "Arsip"];
            $data['options_post_status'] = $options_post_status;

            if (!$this->validate([])) {
                $data['validation'] = $this->validator;
            };

            echo view('Admin/Testimoni/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    function new () {

        try {

            $testimoni = new \App\Entities\Testimoni();

            $data = [
                'testimoni' => $testimoni,
                'breadcrumb' => [
                    'title' => 'New Testimoni',
                ],
            ];

            // multi option for user_id
            $userModel = new \App\Models\userModel();
            $userModel->orderBy('email asc');
            $rows = $userModel->findAll();

            $options_user_id = [];
            foreach ($rows as $k => $row) {
                $options_user_id[$row->id] = $row->email;
            }

            $data['options_user_id'] = $options_user_id;

            // multi option for post_status
            $options_post_status = ["draft" => "Draft", "publikasi" => "Publikasi", "arsip" => "Arsip"];
            $data['options_post_status'] = $options_post_status;

            echo view('Admin/Testimoni/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function store()
    {

        $request = service('request');

        // setting rules
        $rules = ["testimoni" => "required"];

        if (!$this->validate($rules)) {

            return redirect()->to('edit/')->withInput()->with('errors', service('validation')->getErrors());

        }

        // post request
        $post_data = $request->getPost();

        $testimoni_store = new \App\Entities\Testimoni($post_data);

        if (!$this->testimoniModel->save($testimoni_store)) {

            return redirect()->back()->withInput()->with('errors', $this->testimoniModel->errors());
        }

        return redirect()->to('/Admin/Testimoni')->with('message', 'success');

    }

    public function delete()
    {

        $request = service('request');

        // post request
        $post_data = $request->getPost('id');

        $this->testimoniModel->delete($post_data);

        return redirect()->to('/Admin/Testimoni')->with('message', 'success');

    }

}

/* End of file Testimoni.php */
/* Location: ./app/Controllers/Admin/Testimoni.php */
