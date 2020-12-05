<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Soaltryout extends BaseController
{

    public function __construct()
    {

        $this->soaltryoutModel = new \App\Models\SoaltryoutModel();

        $this->session = session();

    }

    public function session($id)
    {
        $judul_tryout_id = id_decode($id);
        $this->session->set('judul_tryout_id', $judul_tryout_id);
        return redirect()->to('/Admin/Soaltryout');
    }

    public function tryoutModel()
    {

        $tryoutModel = new \App\Models\TryoutModel();
        $tryout = $tryoutModel->find(session()->get('judul_tryout_id'));

        $matakuliahModel = new \App\Models\MatakuliahModel();
        $matakuliah = $matakuliahModel->find($tryout->mata_kuliah_id);

        $tryout->matakuliah = $matakuliah;

        $tryout->tipetryout = $tryout->tipe_tryout_array[$tryout->tipe_tryout];

        return $tryout;

    }

    public function index()
    {

        // ** if you want to build query manually, refer to CI4 query builder **
        // $this->soaltryout->select('SELECT id as key', FALSE );

        $this->soaltryoutModel
            ->where(['judul_tryout_id'=>session()->get('judul_tryout_id')])
            ->orderBy('id desc');

        $rows = $this->soaltryoutModel->paginate(10);

        $data = [
            'rows' => $rows,
            'pager' => $this->soaltryoutModel->pager,
            'breadcrumb' => [
                'title' => 'List of Soal Tryout',
            ],
            'per_page' => 10,

        ];

        $data['tryout'] = $this->tryoutModel();

        echo view('Admin/Soaltryout/Index', $data);

    }

    public function show($id = null)
    {

        try {

            $soaltryout = $this->soaltryoutModel->find($id);

            $data = [
                'soaltryout' => $soaltryout,
                'breadcrumb' => [
                    'title' => 'View Soal Tryout',
                ],
            ];

            $data['tryout'] = $this->tryoutModel();

            echo view('Admin/Soaltryout/Show', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function edit($id = null)
    {

        try {

            $soaltryout = null;

            if (!$id && old('id')) {

                $soaltryout = $this->soaltryoutModel->getOld();

            } else {

                $soaltryout = $this->soaltryoutModel->find($id);

            }


            $data = [
                'soaltryout' => $soaltryout,
                'breadcrumb' => [
                    'title' => 'Edit Soal Tryout',
                ],
            ];

            $data['tryout'] = $this->tryoutModel();

            dd($data);

            // multi option for jawaban_soal_ganda
            $options_jawaban_soal_ganda = ["-" => "Select Jawaban Soal Ganda", "a" => "Jawaban A", "b" => "Jawaban B", "c" => "Jawaban C", "d" => "Jawaban D"];
            $data['options_jawaban_soal_ganda'] = $options_jawaban_soal_ganda;

            if (!$this->validate([])) {
                $data['validation'] = $this->validator;
            };


            echo view('Admin/Soaltryout/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    function new () {

        try {

            $soaltryout = new \App\Entities\Soaltryout();

            $data = [
                'soaltryout' => $soaltryout,
                'breadcrumb' => [
                    'title' => 'New Soal Tryout',
                ],
            ];

            $data['tryout'] = $this->tryoutModel();

            // multi option for jawaban_soal_ganda
            $options_jawaban_soal_ganda = ["-" => "Select Jawaban Soal Ganda", "a" => "Jawaban A", "b" => "Jawaban B", "c" => "Jawaban C", "d" => "Jawaban D"];
            $data['options_jawaban_soal_ganda'] = $options_jawaban_soal_ganda;

            echo view('Admin/Soaltryout/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function store()
    {

        $request = service('request');

        // setting rules
        $rules = [
            "soal" => "required",
            "judul_tryout_id" => "required",
        ];

        if (!$this->validate($rules)) {

            return redirect()->to('edit/')->withInput()->with('errors', service('validation')->getErrors());

        }

        // post request
        $post_data = $request->getPost();

        $soaltryout_store = new \App\Entities\Soaltryout($post_data);

        if (!$this->soaltryoutModel->save($soaltryout_store)) {

            return redirect()->back()->withInput()->with('errors', $this->soaltryoutModel->errors());
        }

        return redirect()->route('Admin/Soaltryout')->with('message', 'success');

    }

    public function delete()
    {

        $request = service('request');

        // post request
        $post_data = $request->getPost('id');

        $this->soaltryoutModel->delete($post_data);

        return redirect()->route('Admin/Soaltryout')->with('message', 'success');

    }

}

/* End of file Soaltryout.php */
/* Location: ./app/Controllers/Admin/Soaltryout.php */
