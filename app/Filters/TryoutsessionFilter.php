<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class TryoutsessionFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here

        if ( !in_array(  strtolower( $request->uri->getSegment(3)) , ['session'])) {

            if (session()->get('judul_tryout_id') == null) {

                return redirect()->to('/Admin/Tryout');

            }

        }

    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}

/* End of file TryoutsessionFilter.php */
/* Location: ./app/Filters/TryoutsessionFilter.php */
