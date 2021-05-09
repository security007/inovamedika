<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function  __construct()
	{
		$this->session = session();
	}
    public function before(RequestInterface $request, $arguments = null)
    {
        // verified role
        if ($this->session->session_level != "Pegawai"){
            echo "Anda tidak berhak mengakses halaman ini";
            die();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}