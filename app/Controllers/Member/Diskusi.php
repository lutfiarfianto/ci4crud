<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;

class Diskusi extends BaseController
{

    public function __construct()
    {

        $this->diskusiModel = new \App\Models\DiskusiModel();

    }

    /*
    public function session($id)
    {
    $parent_id = id_decode($id);
    session()->set('parent_id',$parent_id);
    return redirect()->to('/path/to/parent');
    }
     */

    public function filter()
    {

        $this->index();

    }

    public function index()
    {

        // ** if you want to build query manually, refer to CI4 query builder **
        // $this->diskusiModel->select('*, sp_diskusi.id ', FALSE );

        $table_filters = (object) ["id" => null, "judul_diskusi" => null, "parent_id" => null, "tipe_diskusi" => null, "comment" => null, "gambar_soal" => null, "rating_soal" => null, "user_id" => null, "publishing" => null];

        foreach ($table_filters as $field => &$value) {
            $value = refine_var($this->request->getGet($field));
        };

        if ($table_filters->id) {
            $this->diskusiModel->where('id', $table_filters->id);
        };

        if ($table_filters->judul_diskusi) {
            $this->diskusiModel->where('judul_diskusi', $table_filters->judul_diskusi);
        };

        if ($table_filters->parent_id) {
            $this->diskusiModel->where('parent_id', $table_filters->parent_id);
        };

        if ($table_filters->tipe_diskusi) {
            $this->diskusiModel->where('tipe_diskusi', $table_filters->tipe_diskusi);
        };

        if ($table_filters->comment) {
            $this->diskusiModel->where('comment', $table_filters->comment);
        };

        if ($table_filters->gambar_soal) {
            $this->diskusiModel->where('gambar_soal', $table_filters->gambar_soal);
        };

        if ($table_filters->rating_soal) {
            $this->diskusiModel->where('rating_soal', $table_filters->rating_soal);
        };

        if ($table_filters->user_id) {
            $this->diskusiModel->where('user_id', $table_filters->user_id);
        };

        if ($table_filters->publishing) {
            $this->diskusiModel->where('publishing', $table_filters->publishing);
        };

        $this->diskusiModel->orderBy('sp_diskusi.id desc');
        $rows = $this->diskusiModel->paginate(10);

        $data = [
            'rows' => $rows,
            'pager' => $this->diskusiModel->pager,
            'breadcrumb' => [
                'title' => 'List of Diskusi',
            ],
            'per_page' => 10,
            'table_filter' => $table_filters,
        ];

        $filter_label = ["id" => "Id", "judul_diskusi" => "Judul Diskusi", "parent_id" => "Parent Id", "tipe_diskusi" => "Tipe Diskusi", "comment" => "Comment", "gambar_soal" => "Gambar Soal", "rating_soal" => "Rating Soal", "user_id" => "User Id", "publishing" => "Publishing"];
        $filter_info = [];

        $table_filters_txt = (object) [];

        foreach ($filter_label as $fld => $label) {
            if (!$table_filters->$fld) {
                continue;
            }

            $filter_info[$fld] = '<span class="badge badge-primary">' . $label . ' = ' . (isset($table_filters_txt->$fld) ? $table_filters_txt->$fld : $table_filters->$fld) . '</span>';

        }

        $data['filter_info'] = implode("\n", $filter_info);

        echo view('Member/Diskusi/Index', $data);

    }

    public function show($id = null)
    {

        try {

            $diskusi = $this->diskusiModel->find($id);

            $data = [
                'diskusi' => $diskusi,
                'breadcrumb' => [
                    'title' => 'View Diskusi',
                ],
            ];

            echo view('Member/Diskusi/Show', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function edit($id = null)
    {

        try {

            $diskusi = null;

            if (!$id && old('id')) {

                $diskusi = $this->diskusiModel->getOld();

            } else {

                $diskusi = $this->diskusiModel->find($id);

            }

            $data = [
                'diskusi' => $diskusi,
                'breadcrumb' => [
                    'title' => 'Edit Diskusi',
                ],
                'addon_css' => $this->apply_asset(['magnific-popup'], 'css'),
                'addon_js' => $this->apply_asset(['magnific-popup'], 'js'),
            ];

            if (!$this->validate([])) {
                $data['validation'] = $this->validator;
            };

            echo view('Member/Diskusi/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    function new () {

        try {

            $diskusi = new \App\Entities\Diskusi();

            $data = [
                'diskusi' => $diskusi,
                'breadcrumb' => [
                    'title' => 'New Diskusi',
                ],
            ];

            echo view('Member/Diskusi/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function store()
    {

        $request = service('request');

        // setting rules
        $rules = ["judul_diskusi" => "required"];

        if (!$this->validate($rules)) {

            return redirect()->to('edit/')->withInput()->with('errors', service('validation')->getErrors());

        }

        // post request
        $post_data = $request->getPost();

        $diskusi_store = new \App\Entities\Diskusi($post_data);

        if (!$this->diskusiModel->save($diskusi_store)) {

            return redirect()->back()->withInput()->with('errors', $this->diskusiModel->errors());
        }

        return redirect()->to('/Member/Diskusi')->with('message', 'success');

    }

    public function delete()
    {

        $request = service('request');

        // post request
        $post_data = $request->getPost('id');

        $this->diskusiModel->delete($post_data);

        return redirect()->to('/Member/Diskusi')->with('message', 'success');

    }

}

/* End of file Diskusi.php */
/* Location: ./app/Controllers/Member/Diskusi.php */
