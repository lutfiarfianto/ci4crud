<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Materi extends BaseController
{

    public function __construct()
    {

        $this->materiModel = new \App\Models\MateriModel();

    }

    public function filter()
    {

        $this->index();

    }

    public function index()
    {

        // ** if you want to build query manually, refer to CI4 query builder **
        $this->materiModel->select('*, sp_materi.id ', FALSE );

        $table_filters = (object) ["judul_materi" => null, "mata_kuliah_id" => null, "semester" => null];

        foreach ($table_filters as $field => &$value) {
            $value = refine_var($this->request->getGet($field));
        };

        if ($table_filters->judul_materi) {
            $this->materiModel->like('judul_materi', $table_filters->judul_materi);
        };

        if ($table_filters->mata_kuliah_id) {
            $this->materiModel->where('mata_kuliah_id', $table_filters->mata_kuliah_id);
        };

        if ($table_filters->semester) {
            $this->materiModel->where('semester', $table_filters->semester);
        };

        $this->materiModel->join('sp_mata_kuliah','sp_mata_kuliah.id=sp_materi.mata_kuliah_id','left');
        $this->materiModel->orderBy('sp_materi.id desc');
        $rows = $this->materiModel->paginate(10);

        $filter_label = ["judul_materi" => "Judul Materi", "mata_kuliah_id" => "Mata Kuliah", "semester" => "Semester"];
        $filter_info = [];

        $matakuliahModel = new \App\Models\matakuliahModel();
        $matakuliah = $matakuliahModel->find( $table_filters->mata_kuliah_id );

        $table_filters_txt = $table_filters;
        $table_filters_txt->mata_kuliah_id = isset($matakuliah->nama_mata_kuliah)?$matakuliah->nama_mata_kuliah:'';

        foreach ($filter_label as $fld => $label) {
            if (!$table_filters->$fld) {
                continue;
            }

            $filter_info[$fld] = '<span class="badge badge-primary">' . $label . ' = ' . $table_filters_txt->$fld . '</span>';

        }

        $data = [
            'rows' => $rows,
            'pager' => $this->materiModel->pager,
            'breadcrumb' => [
                'title' => 'List of Materi',
            ],
            'per_page' => 10,
            'filter_info' => implode("\n", $filter_info),
            'table_filter' => $table_filters,
        ];

        // multi option for mata_kuliah_id
        $matakuliahModel->orderBy('nama_mata_kuliah asc');
        $rows = $matakuliahModel->findAll();

        $options_mata_kuliah_id = [
            '' => 'Pilih Mata Kuliah',
        ];
        foreach ($rows as $k => $row) {
            $options_mata_kuliah_id[$row->id] = $row->nama_mata_kuliah;
        }

        $data['options_mata_kuliah_id'] = $options_mata_kuliah_id;

        echo view('Admin/Materi/Index', $data);

    }

    public function show($id = null)
    {

        try {

            $materi = $this->materiModel->find($id);

            $data = [
                'materi' => $materi,
                'breadcrumb' => [
                    'title' => 'View Materi',
                ],
            ];

            echo view('Admin/Materi/Show', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function edit($id = null)
    {

        try {

            $materi = null;

            if (!$id && old('id')) {

                $materi = $this->materiModel->getOld();

            } else {

                $materi = $this->materiModel->find($id);

            }

            $data = [
                'materi' => $materi,
                'breadcrumb' => [
                    'title' => 'Edit Materi',
                ],
            ];

            // multi option for mata_kuliah_id
            $matakuliahModel = new \App\Models\matakuliahModel();
            $matakuliahModel->orderBy('nama_mata_kuliah asc');
            $rows = $matakuliahModel->findAll();

            $options_mata_kuliah_id = [];
            foreach ($rows as $k => $row) {
                $options_mata_kuliah_id[$row->id] = $row->nama_mata_kuliah;
            }

            $data['options_mata_kuliah_id'] = $options_mata_kuliah_id;

            if (!$this->validate([])) {
                $data['validation'] = $this->validator;
            };

            echo view('Admin/Materi/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    function new () {

        try {

            $materi = new \App\Entities\Materi();

            $data = [
                'materi' => $materi,
                'breadcrumb' => [
                    'title' => 'New Materi',
                ],
            ];

            // multi option for mata_kuliah_id
            $matakuliahModel = new \App\Models\matakuliahModel();
            $matakuliahModel->orderBy('nama_mata_kuliah asc');
            $rows = $matakuliahModel->findAll();

            $options_mata_kuliah_id = [];
            foreach ($rows as $k => $row) {
                $options_mata_kuliah_id[$row->id] = $row->nama_mata_kuliah;
            }

            $data['options_mata_kuliah_id'] = $options_mata_kuliah_id;

            echo view('Admin/Materi/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function store()
    {

        $request = service('request');

        // setting rules
        $rules = ["judul_materi" => "required"];

        if (!$this->validate($rules)) {

            return redirect()->to('edit/')->withInput()->with('errors', service('validation')->getErrors());

        }

        // post request
        $post_data = $request->getPost();

        $materi_store = new \App\Entities\Materi($post_data);

        if (!$this->materiModel->save($materi_store)) {

            return redirect()->back()->withInput()->with('errors', $this->materiModel->errors());
        }

        return redirect()->to('/Admin/Materi')->with('message', 'success');

    }

    public function delete()
    {

        $request = service('request');

        // post request
        $post_data = $request->getPost('id');

        $this->materiModel->delete($post_data);

        return redirect()->to('/Admin/Materi')->with('message', 'success');

    }

}

/* End of file Materi.php */
/* Location: ./app/Controllers/Admin/Materi.php */
