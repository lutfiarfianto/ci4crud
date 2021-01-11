<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Tryout extends BaseController
{

    public function __construct()
    {

        $this->tryoutModel = new \App\Models\TryoutModel();

        session()->remove('judul_tryout_id');

    }

    public function index()
    {

        // ** if you want to build query manually, refer to CI4 query builder **
        // $this->tryout->select('SELECT id as key', FALSE );

        $this->tryoutModel->orderBy('id desc');
        $rows = $this->tryoutModel->paginate(10);

        $data = [
            'rows' => $rows,
            'pager' => $this->tryoutModel->pager,
            'breadcrumb' => [
                'title' => 'List of Tryout',
            ],
            'per_page' => 10,

        ];

        echo view('Admin/Tryout/Index', $data);

    }

    public function show($id = null)
    {

        try {

            $tryout = $this->tryoutModel
                ->select('*, nama_mata_kuliah as mata_kuliah_id, sp_judul_tryout.id')
                ->join('sp_mata_kuliah', 'sp_mata_kuliah.id=sp_judul_tryout.mata_kuliah_id', 'left')
                ->find($id);

            $data = [
                'tryout' => $tryout,
                'breadcrumb' => [
                    'title' => 'View Tryout',
                ],
            ];

            echo view('Admin/Tryout/Show', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function edit($id = null)
    {

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
                'addon_css' => $this->apply_asset(['magnific-popup'],'css'),
                'addon_js'  => $this->apply_asset(['magnific-popup'],'js'),
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

            // multi option for status_tryout
            $options_status_tryout = ["0" => "Draft", "2" => "Arsip", "1" => "Publikasi"];
            $data['options_status_tryout'] = $options_status_tryout;

            // multi option for tipe_tryout
            $options_tipe_tryout = ["ganda" => "Pilihan Ganda", "esai" => "Esay"];
            $data['options_tipe_tryout'] = $options_tipe_tryout;

            if (!$this->validate([])) {
                $data['validation'] = $this->validator;
            };

            echo view('Admin/Tryout/Edit', $data);

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

            $options_mata_kuliah_id = [];
            foreach ($rows as $k => $row) {
                $options_mata_kuliah_id[$row->id] = $row->nama_mata_kuliah;
            }

            $data['options_mata_kuliah_id'] = $options_mata_kuliah_id;

            // multi option for status_tryout
            $options_status_tryout = ["0" => "Draft", "2" => "Arsip", "1" => "Publikasi"];
            $data['options_status_tryout'] = $options_status_tryout;

            // multi option for tipe_tryout
            $options_tipe_tryout = ["ganda" => "Pilihan Ganda", "esai" => "Esay"];
            $data['options_tipe_tryout'] = $options_tipe_tryout;

            echo view('Admin/Tryout/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function store()
    {

        $request = service('request');

        // setting rules
        $rules = ["judul_tryout" => "required"];

        if (!$this->validate($rules)) {

            return redirect()->to('edit/')->withInput()->with('errors', service('validation')->getErrors());

        }

        // post request
        $post_data = $request->getPost();

        /* upload handler */
        $files = $request->getFiles();

        foreach ($files as $file_field => $file) {

            if (!preg_match('/(image)/i', $file->getClientMimeType())) {
                continue;
            }

            if (!preg_match('/(jpg|jpeg|png)/i', $file->getClientExtension())) {
                continue;
            }

            $date_bridge = id_encode(date('Ym'));

            if ($file->isValid() && !$file->hasMoved()) {
                $new_name = $file->getRandomName();
                mk_path(WRITEPATH . 'uploads', $date_bridge);
                $file->move(WRITEPATH . 'uploads/' . $date_bridge, $new_name);
            }

            $post_data[$file_field] = $date_bridge . '/' . $new_name;

        }

        $tryout_store = new \App\Entities\Tryout($post_data);

        if (!$this->tryoutModel->save($tryout_store)) {

            return redirect()->back()->withInput()->with('errors', $this->tryoutModel->errors());
        }

        return redirect()->route('Admin/Tryout')->with('message', 'success');

    }

    public function delete()
    {

        $request = service('request');

        // post request
        $post_data = $request->getPost('id');

        $this->tryoutModel->delete($post_data);

        return redirect()->route('Admin/Tryout')->with('message', 'success');

    }

}

/* End of file Tryout.php */
/* Location: ./app/Controllers/Admin/Tryout.php */
