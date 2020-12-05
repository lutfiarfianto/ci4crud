<?php 

namespace App\Member\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Matakuliah extends BaseController
{

	public function __construct()
	{

		$this->matakuliahModel = new \App\Models\MatakuliahModel();

	}



    public function index()
    {
        // code start here
		$data = [
			'rows'  => $this->matakuliahModel->paginate(10),
			'pager' => $this->matakuliahModel->pager,
	
		];

		echo view('Member/Matakuliah/index',$data);

    }


	public function find($id=null)
	{

		try {

			$matakuliah = $this->matakuliahModel->find($id);

			$data = [
				'matakuliah' => $matakuliah,
			];

			echo view('Member/Matakuliah/find',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	

	}


	public function update($id=null)
	{

		try {

			$matakuliah = $this->matakuliahModel->find($id);

			$data = [
				'matakuliah' => $matakuliah,
			];

			echo view('Member/Matakuliah/update',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	
	}


	public function create()
	{

		try {

			$matakuliah = new \App\Entities\Matakuliah();

			$data = [
				'matakuliah' => $matakuliah,
			];
		
			echo view('Member/Matakuliah/update',$data);

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

		$matakuliah_store = new \App\Entities\Matakuliah();

		if (! $this->matakuliahModel->save($matakuliah_store))
		{
			return redirect()->back()->withInput()->with('errors', $this->matakuliahModel->errors());
		}

		
		return redirect()->route('Member_matakuliah_index')->with('message','success');

	}


	public function delete()
	{

		$request = service('request');

		// post request
		$post_data = $request->getPost('id');

		$this->matakuliahModel->delete($post_data);

		return redirect()->route('Member_matakuliah_index')->with('message','success');

	}



}

/* End of file Matakuliah.php */
/* Location: ./app/Controllers/Member/Matakuliah.php */
