<?php
namespace App\Filters;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class NoAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->has('isLoggedin'))
        {
            return redirect()->to('/admin/recent');
        }
    }
    public function after(RequestInterface $requestInterface,ResponseInterface $responseInterface,$arguments=null)
    {
        
    }
}