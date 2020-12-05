<?php 

namespace App\Admin\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Member extends BaseController
{

	public function __construct()
	{

		$this->memberModel = new \App\Models\MemberModel();

	}



    public function index()
    {
        // code start here
		$data = [
			'rows'  => $this->memberModel->paginate(10),
			'pager' => $this->memberModel->pager,
	
		];

		echo view('Admin/Member/index',$data);

    }


	public function find($id=null)
	{

		try {

			$member = $this->memberModel->find($id);

			$data = [
				'member' => $member,
			];

			echo view('Admin/Member/find',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	

	}


	public function update($id=null)
	{

		try {

			$member = $this->memberModel->find($id);

			$data = [
				'member' => $member,
			];

			echo view('Admin/Member/update',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	
	}


	public function create()
	{

		try {

			$member = new \App\Entities\Member();

			$data = [
				'member' => $member,
			];
		
			echo view('Admin/Member/update',$data);

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

		$member_store = new \App\Entities\Member();

		if (! $this->memberModel->save($member_store))
		{
			return redirect()->back()->withInput()->with('errors', $this->memberModel->errors());
		}

		
		return redirect()->route('Admin_member_index')->with('message','success');

	}


	public function delete()
	{

		$request = service('request');

		// post request
		$post_data = $request->getPost('id');

		$this->memberModel->delete($post_data);

		return redirect()->route('Admin_member_index')->with('message','success');

	}



}

/* End of file Member.php */
/* Location: ./app/Controllers/Admin/Member.php */
