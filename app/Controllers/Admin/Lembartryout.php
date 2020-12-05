<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Lembartryout extends BaseController
{

    public function __construct()
    {

        $this->lembartryoutModel = new \App\Models\LembartryoutModel();

        session()->remove('lembar_tryout_id');


    }

    public function session($id)
    {
        $siswa_id = id_decode($id);
        session()->set('siswa_id', $siswa_id);
        return redirect()->to('/Admin/Lembartryout');
    }

    public function filter()
    {

        $this->index();

    }

    public function index()
    {

        // ** if you want to build query manually, refer to CI4 query builder **
        $this->lembartryoutModel->select('*, sp_lembar_tryout.id ', FALSE );

        $table_filters = (object) ["semester" => null];

        foreach ($table_filters as $field => &$value) {
            $value = refine_var($this->request->getGet($field));
        };

        if ($table_filters->semester) {
            $this->lembartryoutModel->where('semester', $table_filters->semester);
        };

        $this->lembartryoutModel->join('sp_judul_tryout','sp_judul_tryout.id=sp_lembar_tryout.id','left');
        $this->lembartryoutModel->orderBy('sp_lembar_tryout.id desc');

        $rows = $this->lembartryoutModel->paginate(10);

        $filter_label = ["semester" => "Semester"];
        $filter_info = [];

        foreach ($filter_label as $fld => $label) {
            if (!$table_filters->$fld) {
                continue;
            }

            $filter_info[$fld] = '<span class="badge badge-primary">' . $label . ' = ' . $table_filters->$fld . '</span>';

        }

        $siswaModel = new \App\Models\SiswaModel();
        $siswa = $siswaModel->find( session()->get('siswa_id'));

        $data = [
            'rows' => $rows,
            'pager' => $this->lembartryoutModel->pager,
            'breadcrumb' => [
                'title' => 'List of Lembar Tryout',
            ],
            'per_page' => 10,
            'filter_info' => implode("\n", $filter_info),
            'table_filter' => $table_filters,
            'siswa' => $siswa,
        ];

        echo view('Admin/Lembartryout/Index', $data);

    }

    public function show($id = null)
    {

        try {

            $lembartryout = $this->lembartryoutModel->find($id);

            $data = [
                'lembartryout' => $lembartryout,
                'breadcrumb' => [
                    'title' => 'View Lembar Tryout',
                ],
            ];

            echo view('Admin/Lembartryout/Show', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function edit($id = null)
    {

        try {

            $lembartryout = null;

            if (!$id && old('id')) {

                $lembartryout = $this->lembartryoutModel->getOld();

            } else {

                $lembartryout = $this->lembartryoutModel->find($id);

            }

            $data = [
                'lembartryout' => $lembartryout,
                'breadcrumb' => [
                    'title' => 'Edit Lembar Tryout',
                ],
            ];

            if (!$this->validate([])) {
                $data['validation'] = $this->validator;
            };

            echo view('Admin/Lembartryout/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    function new () {

        try {

            $lembartryout = new \App\Entities\Lembartryout();

            $data = [
                'lembartryout' => $lembartryout,
                'breadcrumb' => [
                    'title' => 'New Lembar Tryout',
                ],
            ];

            echo view('Admin/Lembartryout/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function store()
    {

        $request = service('request');

        // setting rules
        $rules = ["siswa_id" => "required"];

        if (!$this->validate($rules)) {

            return redirect()->to('edit/')->withInput()->with('errors', service('validation')->getErrors());

        }

        // post request
        $post_data = $request->getPost();

        $lembartryout_store = new \App\Entities\Lembartryout($post_data);

        if (!$this->lembartryoutModel->save($lembartryout_store)) {

            return redirect()->back()->withInput()->with('errors', $this->lembartryoutModel->errors());
        }

        return redirect()->to('Admin/Lembartryout')->with('message', 'success');

    }

    public function delete()
    {

        $request = service('request');

        // post request
        $post_data = $request->getPost('id');

        $this->lembartryoutModel->delete($post_data);

        return redirect()->to('Admin/Lembartryout')->with('message', 'success');

    }

}

/* End of file Lembartryout.php */
/* Location: ./app/Controllers/Admin/Lembartryout.php */
