<?php 

namespace App\Pengajar\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Diskusi extends BaseController
{

	public function __construct()
	{

		$this->diskusiModel = new \App\Models\DiskusiModel();

	}



    public function index()
    {
        // code start here
		$data = [
			'rows'  => $this->diskusiModel->paginate(10),
			'pager' => $this->diskusiModel->pager,
	
		];

		echo view('Pengajar/Diskusi/index',$data);

    }


	public function find($id=null)
	{

		try {

			$diskusi = $this->diskusiModel->find($id);

			$data = [
				'diskusi' => $diskusi,
			];

			echo view('Pengajar/Diskusi/find',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	

	}


	public function update($id=null)
	{

		try {

			$diskusi = $this->diskusiModel->find($id);

			$data = [
				'diskusi' => $diskusi,
			];

			echo view('Pengajar/Diskusi/update',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	
	}


	public function create()
	{

		try {

			$diskusi = new \App\Entities\Diskusi();

			$data = [
				'diskusi' => $diskusi,
			];
		
			echo view('Pengajar/Diskusi/update',$data);

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

		$diskusi_store = new \App\Entities\Diskusi();

		if (! $this->diskusiModel->save($diskusi_store))
		{
			return redirect()->back()->withInput()->with('errors', $this->diskusiModel->errors());
		}

		
		return redirect()->route('Pengajar_diskusi_index')->with('message','success');

	}


	public function delete()
	{

		$request = service('request');

		// post request
		$post_data = $request->getPost('id');

		$this->diskusiModel->delete($post_data);

		return redirect()->route('Pengajar_diskusi_index')->with('message','success');

	}



}

/* End of file Diskusi.php */
/* Location: ./app/Controllers/Pengajar/Diskusi.php */
