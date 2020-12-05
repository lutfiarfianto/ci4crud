<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LembartryoutsessionFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (!in_array(strtolower($request->uri->getSegment(3)), ['session'])) {
            
            if (session()->get('siswa_id') == null) {
                return redirect()->to('/Admin/Siswa');
            }

            if (session()->get('lembar_tryout_id') == null) {
                return redirect()->to('/Admin/Lembartryout');
            }

        }

    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}

/* End of file LembartryoutsessionFilter.php */
/* Location: ./app/Filters/LembartryoutsessionFilter.php */
