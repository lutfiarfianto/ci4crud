<?php 

namespace App\Member\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Materi extends BaseController
{

	public function __construct()
	{

		$this->materiModel = new \App\Models\MateriModel();

	}



    public function index()
    {
        // code start here
		$data = [
			'rows'  => $this->materiModel->paginate(10),
			'pager' => $this->materiModel->pager,
	
		];

		echo view('Member/Materi/index',$data);

    }


	public function find($id=null)
	{

		try {

			$materi = $this->materiModel->find($id);

			$data = [
				'materi' => $materi,
			];

			echo view('Member/Materi/find',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	

	}


	public function update($id=null)
	{

		try {

			$materi = $this->materiModel->find($id);

			$data = [
				'materi' => $materi,
			];

			echo view('Member/Materi/update',$data);

		}
		catch(\Exception $e)
		{
			die($e->getMessage());
		}
	
	}


	public function create()
	{

		try {

			$materi = new \App\Entities\Materi();

			$data = [
				'materi' => $materi,
			];
		
			echo view('Member/Materi/update',$data);

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

		$materi_store = new \App\Entities\Materi();

		if (! $this->materiModel->save($materi_store))
		{
			return redirect()->back()->withInput()->with('errors', $this->materiModel->errors());
		}

		
		return redirect()->route('Member_materi_index')->with('message','success');

	}


	public function delete()
	{

		$request = service('request');

		// post request
		$post_data = $request->getPost('id');

		$this->materiModel->delete($post_data);

		return redirect()->route('Member_materi_index')->with('message','success');

	}



}

/* End of file Materi.php */
/* Location: ./app/Controllers/Member/Materi.php */
