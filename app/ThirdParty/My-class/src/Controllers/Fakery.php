<?php

namespace Myclass\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;


use Faker\Generator;
use CodeIgniter\CLI\CLI;


/**
* Fakery
*/
class Fakery extends BaseController
{
	
	function __construct()
	{
		
	}


	public function run()
	{
		
		CLI::write('Start faker','yellow');

		$model = new \App\Models\TestimoniModel();

		CLI::write($model->table,'light_green');

		$fields = [
			'testimoni' => 'sentence',
		];

		$model->insertFaker($fields,10);

	}


}