<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;

class Profil extends BaseController
{

    public function __construct()
    {

        $this->profilModel = new \App\Models\ProfilModel();

    }

    /*
    public function session($id)
    {
        $parent_id = id_decode($id);
        session()->set('parent_id',$parent_id);
        return redirect()->to('/path/to/parent');
    }
    */

    public function filter(){

        $this->index();

    }

    public function index()
    {
        
    }

    public function show()
    {

        try {

            $siswa_id = 3;
            $id = $siswa_id;

            $profil = $this->profilModel->find($id);

            $data = [
                'profil' => $profil,
                'breadcrumb' => [
                    'title' => 'View Profil',
                ],
            ];

            echo view('Member/Profil/Show', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function edit(){

        try {

            $siswa_id = 3;
            $id = $siswa_id;


            $profil = null;

            if (!$id && old('id')) {

                $profil = $this->profilModel->getOld();

            } else {

                $profil = $this->profilModel->find($id);

            }

            $data = [
                'profil' => $profil,
                'breadcrumb' => [
                    'title' => 'Edit Profil',
                ],
                'addon_css' => $this->apply_asset(['magnific-popup'],'css'),
                'addon_js'  => $this->apply_asset(['magnific-popup'],'js'),
            ];

            


            if (!$this->validate([])) {
                $data['validation'] = $this->validator;
            };

            echo view('Member/Profil/Edit', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    function new () {
    }

    public function store()
    {

        $request = service('request');

        // setting rules
        $rules = ["nama_siswa"=>"required"];

        if (!$this->validate($rules)) {

            return redirect()->to('edit/')->withInput()->with('errors', service('validation')->getErrors());

        }

        // post request
        $post_data = $request->getPost();

        

        $profil_store = new \App\Entities\Profil($post_data);

        if (!$this->profilModel->save($profil_store)) {

            return redirect()->back()->withInput()->with('errors', $this->profilModel->errors());
        }

        return redirect()->to('/Member/Profil')->with('message', 'success');

    }

    public function delete()
    {

    }

}

/* End of file Profil.php */
/* Location: ./app/Controllers/Member/Profil.php */

