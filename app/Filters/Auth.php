<?php
namespace App\Filters;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $requestInterface,$arguments=null)
    {
        if(!session()->get("isLoggedIn")){
            return redirect()->to('/');
        }
    }
    public function after(RequestInterface $requestInterface,ResponseInterface $responseInterface,$arguments=null)
    {

    }
}