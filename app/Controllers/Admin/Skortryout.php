<?php 

namespace App\Admin\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Skortryout extends BaseController
{

	public function __construct()
	{

		$this->skortryoutModel = new \App\Models\SkortryoutModel();

	}



    public function index()
    {
        // code start here
		$data = [
			'rows'  => $this->skortryoutModel->paginate(10),
			'pager' => $this->skortryoutModel->pager,
	
		];

		echo view('Admin/Skortryout/index',$data);

    }


	public function find($id=null)
	{

		try {

			$skortryout = $this->skortryoutModel->find($id);

			$data = [
				'skortryout' => $skortryout,
			];

			echo view('Admin/Skortryout/find',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	

	}


	public function update($id=null)
	{

		try {

			$skortryout = $this->skortryoutModel->find($id);

			$data = [
				'skortryout' => $skortryout,
			];

			echo view('Admin/Skortryout/update',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	
	}


	public function create()
	{

		try {

			$skortryout = new \App\Entities\Skortryout();

			$data = [
				'skortryout' => $skortryout,
			];
		
			echo view('Admin/Skortryout/update',$data);

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

		$skortryout_store = new \App\Entities\Skortryout();

		if (! $this->skortryoutModel->save($skortryout_store))
		{
			return redirect()->back()->withInput()->with('errors', $this->skortryoutModel->errors());
		}

		
		return redirect()->route('Admin_skortryout_index')->with('message','success');

	}


	public function delete()
	{

		$request = service('request');

		// post request
		$post_data = $request->getPost('id');

		$this->skortryoutModel->delete($post_data);

		return redirect()->route('Admin_skortryout_index')->with('message','success');

	}



}

/* End of file Skortryout.php */
/* Location: ./app/Controllers/Admin/Skortryout.php */
