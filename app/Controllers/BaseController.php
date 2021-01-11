<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
        $this->parser = \Config\Services::parser();

		// $this->loadHelpers('auth');
		helper(['auth','uri','form','url','filesystem','myview','myhashids','text']);

	}

	public function apply_asset(Array $asset_aliases, $type='css')
	{

		$str_stub = [
			'css' => '<link href="{file}" rel="stylesheet">',
			'js'  => '<script src="{file}"></script>',
		];

		$collection = [];

		foreach ($asset_aliases as $key => $alias) {

			$_alias = config('Asset')->$type[$alias];

			if(is_array($_alias)){
				foreach ($_alias as $j => $file) {

					$data['file'] = base_url($file);

					$collection[] = $this->parser
						->setData($data)
						->renderString($str_stub[$type]);
				}
			}

			if(is_string($_alias)){
				$data['file'] = base_url($_alias);

				$collection[] = $this->parser
					->setData($data)
					->renderString($str_stub[$type]);

			}
			
		}

		$tcollection = implode("\n\t",$collection);

		return $tcollection;

	}

}
