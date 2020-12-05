<?php 

namespace App\Admin\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Pengajar extends BaseController
{

	public function __construct()
	{

		$this->pengajarModel = new \App\Models\PengajarModel();

	}



    public function index()
    {
        // code start here
		$data = [
			'rows'  => $this->pengajarModel->paginate(10),
			'pager' => $this->pengajarModel->pager,
	
		];

		echo view('Admin/Pengajar/index',$data);

    }


	public function find($id=null)
	{

		try {

			$pengajar = $this->pengajarModel->find($id);

			$data = [
				'pengajar' => $pengajar,
			];

			echo view('Admin/Pengajar/find',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	

	}


	public function update($id=null)
	{

		try {

			$pengajar = $this->pengajarModel->find($id);

			$data = [
				'pengajar' => $pengajar,
			];

			echo view('Admin/Pengajar/update',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	
	}


	public function create()
	{

		try {

			$pengajar = new \App\Entities\Pengajar();

			$data = [
				'pengajar' => $pengajar,
			];
		
			echo view('Admin/Pengajar/update',$data);

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

		$pengajar_store = new \App\Entities\Pengajar();

		if (! $this->pengajarModel->save($pengajar_store))
		{
			return redirect()->back()->withInput()->with('errors', $this->pengajarModel->errors());
		}

		
		return redirect()->route('Admin_pengajar_index')->with('message','success');

	}


	public function delete()
	{

		$request = service('request');

		// post request
		$post_data = $request->getPost('id');

		$this->pengajarModel->delete($post_data);

		return redirect()->route('Admin_pengajar_index')->with('message','success');

	}



}

/* End of file Pengajar.php */
/* Location: ./app/Controllers/Admin/Pengajar.php */
