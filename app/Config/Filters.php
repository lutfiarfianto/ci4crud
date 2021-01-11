<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,

		// myth-auth aliases
    'login'      => \Myth\Auth\Filters\LoginFilter::class,
    'role'       => \Myth\Auth\Filters\RoleFilter::class,
    'permission' => \Myth\Auth\Filters\PermissionFilter::class,

		// sp aliases
		'tryoutAdmin'       => \App\Filters\TryoutsessionFilter::class,
		'siswaAdmin'        => \App\Filters\SiswasessionFilter::class,
		'lembartryoutAdmin' => \App\Filters\LembartryoutsessionFilter::class,

		'tryoutMember'      => \App\Filters\TryoutmembersessionFilter::class,
		'hasilTryoutMember' => \App\Filters\HasiltryoutmembersessionFilter::class,



	];

	// Always applied before every request
	public $globals = [
		'before' => [
			//'honeypot'
			'csrf',
			// 'login',
		],
		'after'  => [
			'toolbar',
			//'honeypot'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [
    'login'             => ['before' => ['account/*']],
    'tryoutAdmin'       => ['before' => ['Admin/Soaltryout/*','Admin/Soaltryout']],
    'siswaAdmin'        => ['before' => ['Admin/Lembartryout/*','Admin/Lembartryout']],
    'lembartryoutAdmin' => ['before' => ['Admin/Jawabansoaltryout/*','Admin/Jawabansoaltryout']],
    'tryoutMember'      => ['before' => ['Member/Soaltryout/*','Member/Soaltryout']],
    'hasilTryoutMember' => ['before' => ['Member/Jawabantryout/*','Member/Jawabantryout']],
	];
}
