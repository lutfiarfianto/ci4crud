<?php 

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class HasiltryoutmembersessionFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if ( !in_array(  strtolower( $request->uri->getSegment(3)) , ['session'])) {

          if (session()->get('lembar_id') == null) {

              return redirect()->to('/Member/Hasiltryout');

          }

      }

    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}

/* End of file HasiltryoutmembersessionFilter.php */
/* Location: ./app/Filters/HasiltryoutmembersessionFilter.php */
