<?php 

namespace App\Admin\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Usergroup extends BaseController
{

	public function __construct()
	{

		$this->usergroupModel = new \App\Models\UsergroupModel();

	}



    public function index()
    {
        // code start here
		$data = [
			'rows'  => $this->usergroupModel->paginate(10),
			'pager' => $this->usergroupModel->pager,
	
		];

		echo view('Admin/Usergroup/index',$data);

    }


	public function find($id=null)
	{

		try {

			$usergroup = $this->usergroupModel->find($id);

			$data = [
				'usergroup' => $usergroup,
			];

			echo view('Admin/Usergroup/find',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	

	}


	public function update($id=null)
	{

		try {

			$usergroup = $this->usergroupModel->find($id);

			$data = [
				'usergroup' => $usergroup,
			];

			echo view('Admin/Usergroup/update',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	
	}


	public function create()
	{

		try {

			$usergroup = new \App\Entities\Usergroup();

			$data = [
				'usergroup' => $usergroup,
			];
		
			echo view('Admin/Usergroup/update',$data);

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

		$usergroup_store = new \App\Entities\Usergroup();

		if (! $this->usergroupModel->save($usergroup_store))
		{
			return redirect()->back()->withInput()->with('errors', $this->usergroupModel->errors());
		}

		
		return redirect()->route('Admin_usergroup_index')->with('message','success');

	}


	public function delete()
	{

		$request = service('request');

		// post request
		$post_data = $request->getPost('id');

		$this->usergroupModel->delete($post_data);

		return redirect()->route('Admin_usergroup_index')->with('message','success');

	}



}

/* End of file Usergroup.php */
/* Location: ./app/Controllers/Admin/Usergroup.php */
