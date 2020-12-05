<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Jawabansoaltryout extends BaseController
{

    public function __construct()
    {

        $this->jawabansoaltryoutModel = new \App\Models\JawabansoaltryoutModel();

    }

    public function session($id)
    {
        $lembar_tryout_id = id_decode($id);
        session()->set('lembar_tryout_id',$lembar_tryout_id);
        return redirect()->to('/Admin/Jawabansoaltryout');
    }


    public function filter()
    {

        $this->index();

    }

    public function index()
    {

        // ** if you want to build query manually, refer to CI4 query builder **
        $this->jawabansoaltryoutModel->select('*, sp_jawaban_soal_tryout.id ', FALSE );

        $table_filters = (object) [
            "soal_tryout" => null,
        ];

        foreach ($table_filters as $field => &$value) {
            $value = refine_var($this->request->getGet($field));
        };

        if ($table_filters->soal_tryout) {
            $this->jawabansoaltryoutModel->where("soal like '%{$table_filters->soal_tryout_id}%'");
        };

        $this->jawabansoaltryoutModel->join('sp_soal_tryout','sp_soal_tryout.id=sp_jawaban_soal_tryout.soal_tryout_id','left');
        $this->jawabansoaltryoutModel->orderBy('sp_jawaban_soal_tryout.id desc');

        $rows = $this->jawabansoaltryoutModel->paginate(10);

        $filter_label = ["soal_tryout" => "Soal Tryout"];
        $filter_info = [];

        foreach ($filter_label as $fld => $label) {
            if (!$table_filters->$fld) {
                continue;
            }

            $filter_info[$fld] = '<span class="badge badge-primary">' . $label . ' = ' . $table_filters->$fld . '</span>';

        }

        $lembartryoutModel = new \App\Models\LembartryoutModel();
        $lembartryout = $lembartryoutModel->find(session()->get('lembar_tryout_id'));

        $tryoutModel = new \App\Models\TryoutModel();
        $tryout = $tryoutModel->find($lembartryout->judul_tryout_id);

        $matakuliahModel = new \App\Models\MatakuliahModel();
        $matakuliah = $matakuliahModel->find( $tryout->mata_kuliah_id );

        $siswaModel = new \App\Models\SiswaModel();
        $siswa = $siswaModel->find( session()->get('siswa_id') );

        $data = [

            'rows' => $rows,
            'pager' => $this->jawabansoaltryoutModel->pager,
            'breadcrumb' => [
                'title' => 'List of Jawaban Soal Tryout',
            ],
            'per_page'     => 500,
            'filter_info'  => implode("\n", $filter_info),
            'table_filter' => $table_filters,

            'lembartryout' => $lembartryout,
            'tryout'       => $tryout,
            'matakuliah'   => $matakuliah,
            'mahasiswa'    => $siswa,

        ];

        echo view('Admin/Jawabansoaltryout/Index', $data);

    }

    public function show($id = null)
    {

        try {

            $jawabansoaltryout = $this->jawabansoaltryoutModel->find($id);

            $data = [
                'jawabansoaltryout' => $jawabansoaltryout,
                'breadcrumb' => [
                    'title' => 'View Jawaban Soal Tryout',
                ],
            ];

            echo view('Admin/Jawabansoaltryout/Show', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function edit($id = null)
    {

        try {

            $jawabansoaltryout = null;

            if (!$id && old('id')) {

                $jawabansoaltryout = $this->jawabansoaltryoutModel->getOld();

            } else {

                $jawabansoaltryout = $this->jawabansoaltryoutModel->find($id);

            }

            $data = [
                'jawabansoaltryout' => $jawabansoaltryout,
                'breadcrumb' => [
                    'title' => 'Edit Jawaban Soal Tryout',
                ],
            ];

            if (!$this->validate([])) {
                $data['validation'] = $this->validator;
            };

            echo view('Admin/Jawabansoaltryout/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    function new () {

        try {

            $jawabansoaltryout = new \App\Entities\Jawabansoaltryout();

            $data = [
                'jawabansoaltryout' => $jawabansoaltryout,
                'breadcrumb' => [
                    'title' => 'New Jawaban Soal Tryout',
                ],
            ];

            echo view('Admin/Jawabansoaltryout/Edit', $data);

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

        $jawabansoaltryout_store = new \App\Entities\Jawabansoaltryout($post_data);

        if (!$this->jawabansoaltryoutModel->save($jawabansoaltryout_store)) {

            return redirect()->back()->withInput()->with('errors', $this->jawabansoaltryoutModel->errors());
        }

        return redirect()->to('Admin/Jawabansoaltryout')->with('message', 'success');

    }

    public function delete()
    {

        $request = service('request');

        // post request
        $post_data = $request->getPost('id');

        $this->jawabansoaltryoutModel->delete($post_data);

        return redirect()->to('Admin/Jawabansoaltryout')->with('message', 'success');

    }

}

/* End of file Jawabansoaltryout.php */
/* Location: ./app/Controllers/Admin/Jawabansoaltryout.php */
