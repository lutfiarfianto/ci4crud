<?php 

namespace App\Admin\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Jawabantryout extends BaseController
{

	public function __construct()
	{

		$this->jawabantryoutModel = new \App\Models\JawabantryoutModel();

	}



    public function index()
    {
        // code start here
		$data = [
			'rows'  => $this->jawabantryoutModel->paginate(10),
			'pager' => $this->jawabantryoutModel->pager,
	
		];

		echo view('Admin/Jawabantryout/index',$data);

    }


	public function find($id=null)
	{

		try {

			$jawabantryout = $this->jawabantryoutModel->find($id);

			$data = [
				'jawabantryout' => $jawabantryout,
			];

			echo view('Admin/Jawabantryout/find',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	

	}


	public function update($id=null)
	{

		try {

			$jawabantryout = $this->jawabantryoutModel->find($id);

			$data = [
				'jawabantryout' => $jawabantryout,
			];

			echo view('Admin/Jawabantryout/update',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	
	}


	public function create()
	{

		try {

			$jawabantryout = new \App\Entities\Jawabantryout();

			$data = [
				'jawabantryout' => $jawabantryout,
			];
		
			echo view('Admin/Jawabantryout/update',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}

	}


	public function store()
	{

		$request = service('request');


		// setting rules
		$rules = [
			
		];

		if (! $this->validate($rules))
		{
			return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
		}
		

		// post request
		$post_data = $request->getPost();

		$jawabantryout_store = new \App\Entities\Jawabantryout();

		if (! $this->jawabantryoutModel->save($jawabantryout_store))
		{
			return redirect()->back()->withInput()->with('errors', $this->jawabantryoutModel->errors());
		}

		
		return redirect()->route('Admin_jawabantryout_index')->with('message','success');

	}


	public function delete()
	{

		$request = service('request');

		// post request
		$post_data = $request->getPost('id');

		$this->jawabantryoutModel->delete($post_data);

		return redirect()->route('Admin_jawabantryout_index')->with('message','success');

	}



}

/* End of file Jawabantryout.php */
/* Location: ./app/Controllers/Admin/Jawabantryout.php */
