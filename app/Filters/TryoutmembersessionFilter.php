<?php 

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class TryoutmembersessionFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if ( !in_array(  strtolower( $request->uri->getSegment(3)) , ['session'])) {

          if (session()->get('tryout_id') == null) {

              return redirect()->to('/Member/Tryout');

          }

      }

    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}

/* End of file TryoutmembersessioniFilter.php */
/* Location: ./app/Filters/TryoutmembersessioniFilter.php */
