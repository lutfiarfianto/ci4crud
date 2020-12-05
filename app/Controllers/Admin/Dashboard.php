<?php 

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        // code start here
        $data = [
            'breadcrumb' => [
                'title' => 'Dashboard',
            ]

        ];

        echo view('/Admin/Dashboard/index',$data);
        
    }

}

/* End of file Dashboard.php */
/* Location: ./app/Controllers/Admin/Dashboard.php */

