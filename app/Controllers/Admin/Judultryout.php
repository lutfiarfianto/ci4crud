<?php 

namespace App\Admin\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Judultryout extends BaseController
{

	public function __construct()
	{

		$this->judultryoutModel = new \App\Models\JudultryoutModel();

	}



    public function index()
    {
        // code start here
		$data = [
			'rows'  => $this->judultryoutModel->paginate(10),
			'pager' => $this->judultryoutModel->pager,
	
		];

		echo view('Admin/Judultryout/index',$data);

    }


	public function find($id=null)
	{

		try {

			$judultryout = $this->judultryoutModel->find($id);

			$data = [
				'judultryout' => $judultryout,
			];

			echo view('Admin/Judultryout/find',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	

	}


	public function update($id=null)
	{

		try {

			$judultryout = $this->judultryoutModel->find($id);

			$data = [
				'judultryout' => $judultryout,
			];

			echo view('Admin/Judultryout/update',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	
	}


	public function create()
	{

		try {

			$judultryout = new \App\Entities\Judultryout();

			$data = [
				'judultryout' => $judultryout,
			];
		
			echo view('Admin/Judultryout/update',$data);

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

		$judultryout_store = new \App\Entities\Judultryout();

		if (! $this->judultryoutModel->save($judultryout_store))
		{
			return redirect()->back()->withInput()->with('errors', $this->judultryoutModel->errors());
		}

		
		return redirect()->route('Admin_judultryout_index')->with('message','success');

	}


	public function delete()
	{

		$request = service('request');

		// post request
		$post_data = $request->getPost('id');

		$this->judultryoutModel->delete($post_data);

		return redirect()->route('Admin_judultryout_index')->with('message','success');

	}



}

/* End of file Judultryout.php */
/* Location: ./app/Controllers/Admin/Judultryout.php */
