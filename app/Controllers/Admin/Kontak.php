<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Kontak extends BaseController
{

    public function __construct()
    {

        $this->kontakModel = new \App\Models\KontakModel();

    }

    public function index()
    {

        $this->kontakModel->orderBy('id desc');
        $rows = $this->kontakModel->paginate(2);

        $data = [
            'rows' => $rows,
            'pager' => $this->kontakModel->pager,
            'breadcrumb' => [
                'title' => 'Data Kontak',
            ],

        ];

        echo view('Admin/Kontak/Index', $data);

    }

    public function show($id = null)
    {

        try {

            $kontak = $this->kontakModel->find($id);

            $data = [
                'kontak' => $kontak,
                'breadcrumb' => [
                    'title' => 'Lihat Kontak',
                ],
            ];

            echo view('Admin/Kontak/Show', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function edit($id = null)
    {

        try {

            if (!$id && old('id')) {

                $kontak = $this->kontakModel->getOld();

            } else {

                $kontak = $this->kontakModel->find($id);

            }

            $data = [
                'kontak' => $kontak,
                'breadcrumb' => [
                    'title' => 'Edit Kontak',
                ],
            ];

            if (!$this->validate([])) {
                $data['validation'] = $this->validator;
            };

            echo view('Admin/Kontak/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    function new () {

        try {

            $kontak = new \App\Entities\Kontak();

            $data = [
                'kontak' => $kontak,
                'breadcrumb' => [
                    'title' => 'Tambah Kontak',
                ],
            ];

            echo view('Admin/Kontak/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function store()
    {

        $request = service('request');

        helper(['form', 'url']);

        // setting rules
        $rules = [
            'nama_kontak' => 'required',
            'email' => 'required',
        ];

        if (!$this->validate($rules)) {

            return redirect()->to('edit/')->withInput()->with('errors', service('validation')->getErrors());

        }

        // post request
        $post_data = $request->getPost();

        $kontak_store = new \App\Entities\Kontak($post_data);

        d($kontak_store);

        if (!$this->kontakModel->save($kontak_store)) {

            return redirect()->back()->withInput()->with('errors', $this->kontakModel->errors());
        }

        $db = \Config\Database::connect();
        d($db->getLastQuery());

        echo 'success';

//        return redirect()->route('Admin/Kontak')->with('message', 'success');

    }

    public function delete()
    {

        $request = service('request');

        // post request
        $post_data = $request->getPost('id');

        $this->kontakModel->delete($post_data);

        return redirect()->route('Admin_kontak_index')->with('message', 'success');

    }

}

/* End of file Kontak.php */
/* Location: ./app/Controllers/Admin/Kontak.php */
