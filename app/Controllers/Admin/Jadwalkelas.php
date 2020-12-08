<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Jadwalkelas extends BaseController
{

    public function __construct()
    {

        $this->jadwalkelasModel = new \App\Models\JadwalkelasModel();

    }

    public function filter()
    {

        $this->index();

    }

    public function index()
    {

        // ** if you want to build query manually, refer to CI4 query builder **
        // $this->jadwalkelasModel->select('*, sp_jadwal_kelas.id ', FALSE );

        $table_filters = (object) ["nama_jadwal" => null, "tanggal_jam" => null, "mata_kuliah_id" => null];

        foreach ($table_filters as $field => &$value) {
            $value = refine_var($this->request->getGet($field));
        };

        if ($table_filters->nama_jadwal) {
            $this->jadwalkelasModel->where('nama_jadwal', $table_filters->nama_jadwal);
        };

        if ($table_filters->tanggal_jam) {
            $this->jadwalkelasModel->where('tanggal_jam', $table_filters->tanggal_jam);
        };

        if ($table_filters->mata_kuliah_id) {
            $this->jadwalkelasModel->where('mata_kuliah_id', $table_filters->mata_kuliah_id);
        };

        $this->jadwalkelasModel->orderBy('sp_jadwal_kelas.id desc');
        $rows = $this->jadwalkelasModel->paginate(10);

        $data = [
            'rows' => $rows,
            'pager' => $this->jadwalkelasModel->pager,
            'breadcrumb' => [
                'title' => 'List of Jadwal Kelas',
            ],
            'per_page' => 10,
            'table_filter' => $table_filters,
        ];

        // multi option for mata_kuliah_id
        $matakuliahModel = new \App\Models\matakuliahModel();
        $matakuliahModel->orderBy('nama_mata_kuliah asc');
        $rows = $matakuliahModel->findAll();

        $options_mata_kuliah_id = [
            ''=>'Pilih Mata Kuliah',
        ];
        foreach ($rows as $k => $row) {
            $options_mata_kuliah_id[$row->id] = $row->nama_mata_kuliah;
        }

        $data['options_mata_kuliah_id'] = $options_mata_kuliah_id;

        $filter_label = ["nama_jadwal" => "Nama Jadwal", "tanggal_jam" => "Tanggal Jam", "mata_kuliah_id" => "Mata Kuliah"];
        $filter_info = [];

        $table_filters_txt = (object) [];

        // render db-txt from table filter mata_kuliah_id
        if ($table_filters->mata_kuliah_id) {
            $matakuliah = $matakuliahModel->find($table_filters->mata_kuliah_id);
            if (isset($matakuliah->nama_mata_kuliah)) {
                $table_filters_txt->id = $matakuliah->nama_mata_kuliah;
            }

        }

        foreach ($filter_label as $fld => $label) {
            if (!$table_filters->$fld) {
                continue;
            }

            $filter_info[$fld] = '<span class="badge badge-primary">' . $label . ' = ' . (isset($table_filters_txt->$fld) ? $table_filters_txt->$fld : $table_filters->$fld) . '</span>';

        }

        $data['filter_info'] = implode("\n", $filter_info);

        echo view('admin/Jadwalkelas/Index', $data);

    }

    public function show($id = null)
    {

        try {

            $jadwalkelas = $this->jadwalkelasModel->find($id);

            $data = [
                'jadwalkelas' => $jadwalkelas,
                'breadcrumb' => [
                    'title' => 'View Jadwal Kelas',
                ],
            ];

            echo view('admin/Jadwalkelas/Show', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function edit($id = null)
    {

        try {

            $jadwalkelas = null;

            if (!$id && old('id')) {

                $jadwalkelas = $this->jadwalkelasModel->getOld();

            } else {

                $jadwalkelas = $this->jadwalkelasModel->find($id);

            }

            $data = [
                'jadwalkelas' => $jadwalkelas,
                'breadcrumb' => [
                    'title' => 'Edit Jadwal Kelas',
                ],
            ];

            // multi option for mata_kuliah_id
            $matakuliahModel = new \App\Models\matakuliahModel();
            $matakuliahModel->orderBy('nama_mata_kuliah asc');
            $rows = $matakuliahModel->findAll();

            $options_mata_kuliah_id = [
                ''=>'Pilih Mata Kuliah',
            ];
            foreach ($rows as $k => $row) {
                $options_mata_kuliah_id[$row->id] = $row->nama_mata_kuliah;
            }

            $data['options_mata_kuliah_id'] = $options_mata_kuliah_id;

            if (!$this->validate([])) {
                $data['validation'] = $this->validator;
            };

            echo view('admin/Jadwalkelas/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    function new () {

        try {

            $jadwalkelas = new \App\Entities\Jadwalkelas();

            $data = [
                'jadwalkelas' => $jadwalkelas,
                'breadcrumb' => [
                    'title' => 'New Jadwal Kelas',
                ],
            ];

            // multi option for mata_kuliah_id
            $matakuliahModel = new \App\Models\matakuliahModel();
            $matakuliahModel->orderBy('nama_mata_kuliah asc');
            $rows = $matakuliahModel->findAll();

            $options_mata_kuliah_id = [
                ''=>'Pilih Mata Kuliah',
            ];
            foreach ($rows as $k => $row) {
                $options_mata_kuliah_id[$row->id] = $row->nama_mata_kuliah;
            }

            $data['options_mata_kuliah_id'] = $options_mata_kuliah_id;

            echo view('admin/Jadwalkelas/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function store()
    {

        $request = service('request');

        // setting rules
        $rules = ["nama_jadwal" => "required"];

        if (!$this->validate($rules)) {

            return redirect()->to('edit/')->withInput()->with('errors', service('validation')->getErrors());

        }

        // post request
        $post_data = $request->getPost();

        $jadwalkelas_store = new \App\Entities\Jadwalkelas($post_data);

        if (!$this->jadwalkelasModel->save($jadwalkelas_store)) {

            return redirect()->back()->withInput()->with('errors', $this->jadwalkelasModel->errors());
        }

        return redirect()->to('/admin/Jadwalkelas')->with('message', 'success');

    }

    public function delete()
    {

        $request = service('request');

        // post request
        $post_data = $request->getPost('id');

        $this->jadwalkelasModel->delete($post_data);

        return redirect()->to('/admin/Jadwalkelas')->with('message', 'success');

    }

}

/* End of file Jadwalkelas.php */
/* Location: ./app/Controllers/admin/Jadwalkelas.php */
