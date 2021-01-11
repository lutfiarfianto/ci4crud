<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;

class Soaltryout extends BaseController
{

    public function __construct()
    {

        $this->soaltryoutModel = new \App\Models\SoaltryoutModel();

    }

    public function session($id)
    {
        $tryout_id = id_decode($id);
        session()->set('tryout_id', $tryout_id);

        $data = [
            'judul_tryout_id' => $tryout_id,
            'siswa_id'        => 3,
        ];


        $lembar_tryout_id = $this->lembartryout_id($data);

        session()->set('lembar_id', $lembar_tryout_id);

        return redirect()->to('/Member/Soaltryout');
    }

    public function filter()
    {

        $this->index();

    }

    public function index()
    {

        // ** if you want to build query manually, refer to CI4 query builder **
        $this->soaltryoutModel->select('*, sp_soal_tryout.id ', FALSE );

        $table_filters = (object) ["soal" => null];

        $lembar_id = session()->get('lembar_id');

        foreach ($table_filters as $field => &$value) {
            $value = refine_var($this->request->getGet($field));
        };

        if ($table_filters->soal) {
            $this->soaltryoutModel->like('soal', $table_filters->soal);
        };

        $this->soaltryoutModel->where('judul_tryout_id',session()->get('tryout_id'));

        $this->soaltryoutModel->orderBy('sp_soal_tryout.id asc');
        $rows = $this->soaltryoutModel->paginate(10);

        $data = [
            'rows'       => $rows,
            'pager'      => $this->soaltryoutModel->pager,
            'breadcrumb' => [
                'title' => 'List of Soal Tryout',
            ],
            'per_page'        => 10,
            'table_filter'    => $table_filters,
            'lembar_id'       => $lembar_id,
            'tryout_id' => session()->get('tryout_id'),
        ];

        $filter_label = ["soal" => "Soal"];
        $filter_info = [];

        $table_filters_txt = (object) [];

        foreach ($filter_label as $fld => $label) {
            if (!$table_filters->$fld) {
                continue;
            }

            $filter_info[$fld] = '<span class="badge badge-primary">' . $label . ' = ' . (isset($table_filters_txt->$fld) ? $table_filters_txt->$fld : $table_filters->$fld) . '</span>';

        }

        $data['filter_info'] = implode("\n", $filter_info);

        echo view('Member/Soaltryout/Index', $data);

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

            echo view('Member/Soaltryout/Show', $data);

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

            if (!$this->validate([])) {
                $data['validation'] = $this->validator;
            };

            echo view('Member/Soaltryout/Edit', $data);

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

            echo view('Member/Soaltryout/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function store()
    {

        $request = service('request');

        // setting rules
        $rules = ["soal" => "required"];

        if (!$this->validate($rules)) {

            return redirect()->to('edit/')->withInput()->with('errors', service('validation')->getErrors());

        }

        // post request
        $post_data = $request->getPost();

        $soaltryout_store = new \App\Entities\Soaltryout($post_data);

        if (!$this->soaltryoutModel->save($soaltryout_store)) {

            return redirect()->back()->withInput()->with('errors', $this->soaltryoutModel->errors());
        }

        return redirect()->to('/Member/Soaltryout')->with('message', 'success');

    }

    public function delete()
    {

        $request = service('request');

        // post request
        $post_data = $request->getPost('id');

        $this->soaltryoutModel->delete($post_data);

        return redirect()->to('/Member/Soaltryout')->with('message', 'success');

    }

    public function lembartryout_id($data)
    {
        
        $lembartryoutModel = new \App\Models\LembartryoutModel();

        $lembartryout_store = new \App\Entities\Lembartryout($data);

        $lembartryoutModel->save($lembartryout_store);

        $id = $lembartryoutModel->insertID();

        return $id;

    }

}

/* End of file Soaltryout.php */
/* Location: ./app/Controllers/Member/Soaltryout.php */
