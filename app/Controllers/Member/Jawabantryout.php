<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;

class Jawabantryout extends BaseController
{

    public function __construct()
    {

        $this->jawabantryoutModel = new \App\Models\JawabantryoutModel();

    }

    /*    
    public function session($id)
    {
        $soal_tryout_id = id_decode($id);
        session()->set('soal_tryout_id',$soal_tryout_id);
        return redirect()->to('/Member/Soaltryout/');
    }
    */

    public function filter()
    {

        $this->index();

    }

    /*
    public function index()
    {

        // ** if you want to build query manually, refer to CI4 query builder **
        // $this->jawabantryoutModel->select('*, sp_jawaban_soal_tryout.id ', FALSE );

        $table_filters = (object) ["soal_tryout_id" => null];

        foreach ($table_filters as $field => &$value) {
            $value = refine_var($this->request->getGet($field));
        };

        if ($table_filters->soal_tryout_id) {
            $this->jawabantryoutModel->where('soal_tryout_id', $table_filters->soal_tryout_id);
        };

        $this->jawabantryoutModel->orderBy('sp_jawaban_soal_tryout.id desc');
        $rows = $this->jawabantryoutModel->paginate(10);

        $data = [
            'rows' => $rows,
            'pager' => $this->jawabantryoutModel->pager,
            'breadcrumb' => [
                'title' => 'List of Jawaban Tryout',
            ],
            'per_page' => 1000,
            'table_filter' => $table_filters,
        ];

        $filter_label = ["soal_tryout_id" => "Soal Tryout Id"];
        $filter_info = [];

        $table_filters_txt = (object) [];

        foreach ($filter_label as $fld => $label) {
            if (!$table_filters->$fld) {
                continue;
            }

            $filter_info[$fld] = '<span class="badge badge-primary">' . $label . ' = ' . (isset($table_filters_txt->$fld) ? $table_filters_txt->$fld : $table_filters->$fld) . '</span>';

        }

        $data['filter_info'] = implode("\n", $filter_info);

        echo view('Member/Jawabantryout/Index', $data);

    }

    public function show($id = null)
    {

        try {

            $jawabantryout = $this->jawabantryoutModel->find($id);

            $data = [
                'jawabantryout' => $jawabantryout,
                'breadcrumb' => [
                    'title' => 'View Jawaban Tryout',
                ],
            ];

            echo view('Member/Jawabantryout/Show', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function edit($id = null)
    {

        try {

            $jawabantryout = null;

            if (!$id && old('id')) {

                $jawabantryout = $this->jawabantryoutModel->getOld();

            } else {

                $jawabantryout = $this->jawabantryoutModel->find($id);

            }

            $data = [
                'jawabantryout' => $jawabantryout,
                'breadcrumb' => [
                    'title' => 'Edit Jawaban Tryout',
                ],
            ];

            if (!$this->validate([])) {
                $data['validation'] = $this->validator;
            };

            echo view('Member/Jawabantryout/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    function new () {

        try {

            $jawabantryout = new \App\Entities\Jawabantryout();

            $data = [
                'jawabantryout' => $jawabantryout,
                'breadcrumb' => [
                    'title' => 'New Jawaban Tryout',
                ],
            ];

            echo view('Member/Jawabantryout/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }
    */

    public function store()
    {

        $request = service('request');

        // setting rules
        $rules = [
            // "siswa_id"         => "required",
            "judul_tryout_id"  => "required",
            "lembar_tryout_id" => "required",
        ];
        

        if (!$this->validate($rules)) {

            return redirect()->to('/Member/Soaltryout/')->withInput()->with('errors', service('validation')->getErrors());

        }

        $soaltryoutModel = new \App\Models\SoaltryoutModel();

        $jawaban_soal_id = $this->request->getPost('jawaban_soal_id');

        $insert_data = [];
        $lembar_id   = $this->request->getPost('lembar_tryout_id');
        $total_skor  = 0;

        foreach ($jawaban_soal_id as $soal_id => $jawaban) {

            $soaltryout = $soaltryoutModel->find($soal_id);

            $skor = 0;
            if($jawaban == $soaltryout->jawaban_soal_ganda){
                $skor = 1;
            }

            $total_skor += $skor;

            $siswa_id = 3;

            $insert_data[] = [
                'siswa_id'         => $siswa_id,
                'judul_tryout_id'  => session()->get('tryout_id'),
                'lembar_tryout_id' => $lembar_id,
                'soal_tryout_id'   => $soal_id,
                'jawaban_pilihan'  => $jawaban,
                'skor_pilihan'     => $skor,
            ];

        }

        // insert to db
        foreach($insert_data as $k => $data){

            $test = $this->jawabantryoutModel->where([
                'siswa_id'         => $siswa_id,
                'judul_tryout_id'  => session()->get('tryout_id'),
                'lembar_tryout_id' => $lembar_id,
                'soal_tryout_id'   => $soal_id,
            ])->get();

            if(!$test->getResult()){
                $this->jawabantryoutModel->insert($data);
            }

        }

        $lembartryoutModel = new \App\Models\LembartryoutModel();
        $lembartryoutModel->where('id',$lembar_id);

        if($total_skor>0){

            $data = [
                'skor_tryout' => $total_skor,
            ];

            $lembartryoutModel->set($data);
            $lembartryoutModel->update();
    
        }

        return redirect()->to('/Member/Jawabantryout/skor')->with('message', 'success');

    }

    public function skor()
    {
        
        $lembar_id = session()->get('lembar_id');
        $tryout_id = session()->get('tryout_id');
        $siswa_id  = 3;

        $table_filters = (object) ["soal" => null];

        foreach ($table_filters as $field => &$value) {
            $value = refine_var($this->request->getGet($field));
        };
        
        $this->jawabantryoutModel->select('*,sp_jawaban_soal_tryout.id');
        $this->jawabantryoutModel->join('sp_soal_tryout','sp_soal_tryout.id=sp_jawaban_soal_tryout.soal_tryout_id','left');

        if ($table_filters->soal) {
            $this->jawabantryoutModel->like('sp_soal_tryout.soal', $table_filters->soal);
        };

        $this->jawabantryoutModel->where([
            'sp_soal_tryout.judul_tryout_id'          => $tryout_id,
            'sp_jawaban_soal_tryout.lembar_tryout_id' => $lembar_id,
            'siswa_id'                                => $siswa_id,
        ]);

        $this->jawabantryoutModel->orderBy('sp_jawaban_soal_tryout.id desc');
        $rows = $this->jawabantryoutModel->findAll();

        $tryoutModel = new \App\Models\TryoutModel();

        $tryout = $tryoutModel->find( $tryout_id );

        $diskusiModel = new \App\Models\DiskusiModel();

        $diskusi = $diskusiModel
            ->select('*,sp_diskusi.id')
            ->where('tipe_diskusi','tryout')
            ->where('post_id',$tryout_id)
            ->join('users','users.id=sp_diskusi.user_id')
            ->orderBy('sp_diskusi.id','desc')
            ->findAll();

        $data = [
            'rows' => $rows,
            'pager' => $this->jawabantryoutModel->pager,
            'breadcrumb' => [
                'title' => 'List of Jawaban Tryout',
            ],
            'table_filter' => $table_filters,
            'tryout' => $tryout,
            'diskusi' => $diskusi,
            'per_page' => 1000,
        ];

        $filter_label = ["soal" => "Soal"];
        $filter_info = [];

        $table_filters_txt = (object) [];

        foreach ($filter_label as $fld => $label) {
            // d($label);
            if (!$table_filters->$fld) {
                continue;
            }

            $filter_info[$fld] = '<span class="badge badge-primary">' . $label . ' = ' . (isset($table_filters_txt->$fld) ? $table_filters_txt->$fld : $table_filters->$fld) . '</span>';

        }

        $data['filter_info'] = implode("\n", $filter_info);

        echo view('Member/Jawabantryout/Skor', $data);



    }





}

/* End of file Jawabantryout.php */
/* Location: ./app/Controllers/Member/Jawabantryout.php */
