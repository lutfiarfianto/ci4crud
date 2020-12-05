<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Matakuliah extends BaseController
{

    public function __construct()
    {

        $this->matakuliahModel = new \App\Models\MatakuliahModel();

    }

    public function filter()
    {

        $this->index();

    }

    public function index()
    {

        // ** if you want to build query manually, refer to CI4 query builder **
        // $this->matakuliahModel->select('*, sp_mata_kuliah.id ', FALSE );

        $table_filters = (object) ["nama_mata_kuliah" => null];

        foreach ($table_filters as $field => &$value) {
            $value = refine_var($this->request->getGet($field));
        };

        if ($table_filters->nama_mata_kuliah) {
            $this->matakuliahModel->like('nama_mata_kuliah', $table_filters->nama_mata_kuliah);
        };

        $this->matakuliahModel->orderBy('sp_mata_kuliah.id desc');

        $rows = $this->matakuliahModel->paginate(10);

        $filter_label = ["nama_mata_kuliah" => "Nama Mata Kuliah"];
        $filter_info = [];

        foreach ($filter_label as $fld => $label) {
            if (!$table_filters->$fld) {
                continue;
            }

            $filter_info[$fld] = '<span class="badge badge-primary">' . $label . ' = ' . $table_filters->$fld . '</span>';

        }

        $data = [
            'rows' => $rows,
            'pager' => $this->matakuliahModel->pager,
            'breadcrumb' => [
                'title' => 'List of Mata Kuliah',
            ],
            'per_page' => 10,
            'filter_info' => implode("\n", $filter_info),
            'table_filter' => $table_filters,
        ];

        echo view('Admin/Matakuliah/Index', $data);

    }

    public function show($id = null)
    {

        try {

            $matakuliah = $this->matakuliahModel->find($id);

            $data = [
                'matakuliah' => $matakuliah,
                'breadcrumb' => [
                    'title' => 'View Mata Kuliah',
                ],
            ];

            echo view('Admin/Matakuliah/Show', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function edit($id = null)
    {

        try {

            $matakuliah = null;

            if (!$id && old('id')) {

                $matakuliah = $this->matakuliahModel->getOld();

            } else {

                $matakuliah = $this->matakuliahModel->find($id);

            }

            $data = [
                'matakuliah' => $matakuliah,
                'breadcrumb' => [
                    'title' => 'Edit Mata Kuliah',
                ],
            ];

            if (!$this->validate([])) {
                $data['validation'] = $this->validator;
            };

            echo view('Admin/Matakuliah/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    function new () {

        try {

            $matakuliah = new \App\Entities\Matakuliah();

            $data = [
                'matakuliah' => $matakuliah,
                'breadcrumb' => [
                    'title' => 'New Mata Kuliah',
                ],
            ];

            echo view('Admin/Matakuliah/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function store()
    {

        $request = service('request');

        // setting rules
        $rules = ["nama_mata_kuliah" => "required"];

        if (!$this->validate($rules)) {

            return redirect()->to('edit/')->withInput()->with('errors', service('validation')->getErrors());

        }

        // post request
        $post_data = $request->getPost();

        $matakuliah_store = new \App\Entities\Matakuliah($post_data);

        if (!$this->matakuliahModel->save($matakuliah_store)) {

            return redirect()->back()->withInput()->with('errors', $this->matakuliahModel->errors());
        }

        return redirect()->to('/Admin/Matakuliah')->with('message', 'success');

    }

    public function delete()
    {

        $request = service('request');

        // post request
        $post_data = $request->getPost('id');

        $this->matakuliahModel->delete($post_data);

        return redirect()->to('/Admin/Matakuliah')->with('message', 'success');

    }

}

/* End of file Matakuliah.php */
/* Location: ./app/Controllers/Admin/Matakuliah.php */
