<?php

namespace App\Member\Controllers;

use App\Controllers\BaseController;

class Tryout extends BaseController
{

    public function __construct()
    {

        $this->tryoutModel = new \App\Models\TryoutModel();
        $this->soaltryoutModel = new \App\Models\SoaltryoutModel();

    }

    public function index()
    {
        // code start here
        $data = [
            'rows' => $this->tryoutModel->paginate(10),
            'pager' => $this->tryoutModel->pager,

        ];

        echo view('Member/Tryout/index', $data);

    }


    public function exam($tryoutId)
    {
      
      try {
          $tryoutId = (int) $tryoutId;
        
          $tryout = $this->tryoutModel->find($tryoutId);

          $soals = $this->soaltryoutModel->where(['tryoutid' => $tryoutId])
              ->findAll();

          $data = [
            'tryout' => $tryout,
            'soals'  => $soals,
          ];

          
          echo view('Member/Tryout/Exam_'.$tryout->type_tryout, $data);

      }
      catch(\Exception $e){
        die($e->getMessage());
      }
      



    }

    public function find($id = null)
    {

        try {

            $tryout = $this->tryoutModel->find($id);

            $data = [
                'tryout' => $tryout,
            ];

            echo view('Member/Tryout/find', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function update($id = null)
    {

        try {

            $tryout = $this->tryoutModel->find($id);

            $data = [
                'tryout' => $tryout,
            ];

            echo view('Member/Tryout/update', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function create()
    {

        try {

            $tryout = new \App\Entities\Tryout();

            $data = [
                'tryout' => $tryout,
            ];

            echo view('Member/Tryout/update', $data);

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    public function store()
    {

        $request = service('request');

        // setting rules
        $rules = [

        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
        }

        // post request
        $post_data = $request->getPost();

        $tryout_store = new \App\Entities\Tryout();

        if (!$this->tryoutModel->save($tryout_store)) {
            return redirect()->back()->withInput()->with('errors', $this->tryoutModel->errors());
        }

        return redirect()->route('Member_tryout_index')->with('message', 'success');

    }

    public function delete()
    {

        $request = service('request');

        // post request
        $post_data = $request->getPost('id');

        $this->tryoutModel->delete($post_data);

        return redirect()->route('Member_tryout_index')->with('message', 'success');

    }

}

/* End of file Tryout.php */
/* Location: ./app/Controllers/Member/Tryout.php */
