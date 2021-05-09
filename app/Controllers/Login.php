<?php

namespace App\Controllers;
use App\Models\LoginModel;

class Login extends BaseController
{
	public function  __construct()
	{
		$this->login = new LoginModel();
        $this->db = \Config\Database::connect();
        $this->session = session();
	}
	public function index()
	{
        // jangan login dua kali
        if ($this->session->session_level){
            return redirect()->to('/dashboard');
        }
		return view('login');
	}
	public function login()
	{
		if (!$this->validate([
            'Myemail' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email Harus diisi',
                    'valid_email' => 'Format Email Harus Valid'
                ]
            ],
            'Mypassword' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
			$data = [
				'email' => $this->request->getVar('Myemail'),
				'password' => hash('sha256',$this->request->getVar('Mypassword'))
			];
            $email = $this->request->getVar('Myemail');
            $password = hash("sha256",$this->request->getVar('Mypassword'));
            // get data from database
			$result = $this->db->table('auth')->where($data);
            $cek = $result->get()->getResultArray();
            global $mail;
            global $sesLevel;
            // cek if user exist
            if ($result->countAllResults() == 0)
            {
                session()->setFlashdata('error', "Email/Password salah");
                return redirect()->back()->withInput();
            }
               // retreive data from database and pass it to the session for level auth
            foreach ($cek as $login){ 
                $mail = $login['email'];
                $sesLevel = $login['level'];
            }
            $sessionData = [
                    'email' => $mail,
                    'session_level' => $sesLevel
                ];
            $this->session->set($sessionData);
            return redirect()->to('/dashboard');
            
            
            
        }
	}
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }
}