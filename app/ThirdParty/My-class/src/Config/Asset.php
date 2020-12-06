<?php namespace Myclass\Config;

use CodeIgniter\Config\BaseConfig;

class Asset extends BaseConfig
{
    public $css = [

    	'magnific-popup' => 'assets/libs/magnific-popup/dist/magnific-popup.css',

    ];


    public $js = [

    	'magnific-popup' => [
    		'assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js',
    		'assets/libs/magnific-popup/meg.init.js',
    	],

    ];

}


/* End of file Asset.php */
/* Location: ./app/ThirdParty/My-class/src/Config/Asset.php */
