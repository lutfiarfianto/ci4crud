<?php 

namespace App\Admin\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Users extends BaseController
{

	public function __construct()
	{

		$this->usersModel = new \App\Models\UsersModel();

	}



    public function index()
    {
        // code start here
		$data = [
			'rows'  => $this->usersModel->paginate(10),
			'pager' => $this->usersModel->pager,
	
		];

		echo view('Admin/Users/index',$data);

    }


	public function find($id=null)
	{

		try {

			$users = $this->usersModel->find($id);

			$data = [
				'users' => $users,
			];

			echo view('Admin/Users/find',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	

	}


	public function update($id=null)
	{

		try {

			$users = $this->usersModel->find($id);

			$data = [
				'users' => $users,
			];

			echo view('Admin/Users/update',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	
	}


	public function create()
	{

		try {

			$users = new \App\Entities\Users();

			$data = [
				'users' => $users,
			];
		
			echo view('Admin/Users/update',$data);

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

		$users_store = new \App\Entities\Users();

		if (! $this->usersModel->save($users_store))
		{
			return redirect()->back()->withInput()->with('errors', $this->usersModel->errors());
		}

		
		return redirect()->route('Admin_users_index')->with('message','success');

	}


	public function delete()
	{

		$request = service('request');

		// post request
		$post_data = $request->getPost('id');

		$this->usersModel->delete($post_data);

		return redirect()->route('Admin_users_index')->with('message','success');

	}



}

/* End of file Users.php */
/* Location: ./app/Controllers/Admin/Users.php */
