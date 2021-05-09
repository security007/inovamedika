<?php

namespace App\Controllers;
use App\Models\LoginModel;
use App\Models\WilayahModel;
use App\Models\ObatModel;
use App\Models\TindakanModel;
use App\Models\PasienModel;

class Dashboard extends BaseController
{
	public function  __construct()
	{
		$this->wilayah = new WilayahModel();
		$this->user = new LoginModel();
		$this->obat = new ObatModel();
		$this->tindakan = new TindakanModel();
		$this->pasien = new PasienModel();
        $this->session = session();
	}
	public function index()
	{
        // cek session
        if (!$this->session->session_level){
            session()->setFlashdata('error', "Login Dulu");
            return redirect()->to('/');
        }else{
            // cek level 
            if ($this->session->session_level == "Pegawai"){
                return view('/pegawai/dashboard');
            }else if ($this->session->session_level == "User"){
                return view('/user/dashboard');
            }else{
                session()->setFlashdata('error', "Role anda tidak cocok");
                return redirect()->to('/');
            }
            
        }
    }

    public function wilayah()
    {
        if (!$this->session->session_level){
            session()->setFlashdata('error', "Login Dulu");
            return redirect()->to('/');
        }else{
            $data = [
                'wilayah' => $this->wilayah->findAll()
            ];
            if ($this->session->session_level == 'Pegawai'){
                return view('/pegawai/wilayah',$data);
            }else{
                return view('/user/wilayah',$data);
            }
            
        }
    }

    public function addWilayah()
    {
        if (!$this->session->session_level){
            session()->setFlashdata('error', "Login Dulu");
            return redirect()->to('/');
        }else{
            $data = [
                'nama_wilayah' => $this->request->getVar('wilayah')
            ];
            if($this->wilayah->save($data))
            {
                session()->setFlashdata('oke', "Data berhasil ditambahkan");
                return redirect()->to('/dashboard/wilayah');
            }
        }
    }

    public function editWilayah($id)
    {  
        $dataFind = [
            'id'=>$id
        ];
        $data = [
            'id' => $id,
            'wilayah' => $this->wilayah->where($dataFind)->findAll()
        ];
        return view('/pegawai/editWilayah',$data);
        
    }

    public function user()
    { 
        if (!$this->session->session_level){
            session()->setFlashdata('error', "Login Dulu");
            return redirect()->to('/');
        }else{
            $data = [
                'user' => $this->user->findAll(),
                'wilayah' => $this->wilayah->findAll()
            ];
            if ($this->session->session_level == 'Pegawai'){
                return view('/pegawai/user',$data);
            }else{
                return view('/user/user',$data);
            }
        }
    }

    public function editUser($id)
    { 
        $dataFind = [
            'id'=>$id
        ];
        $data = [
            'id' => $id,
            'user' => $this->user->where($dataFind)->findAll(),
            'wilayah' => $this->wilayah->findAll()
        ];
        return view('/pegawai/editUser',$data);
    }

  
    public function obat()
    {
        if (!$this->session->session_level){
            session()->setFlashdata('error', "Login Dulu");
            return redirect()->to('/');
        }else{
            $data = [
                'obat' => $this->obat->findAll()
            ];
            if ($this->session->session_level == 'Pegawai'){
                return view('/pegawai/obat',$data);
            }else{
                return view('/user/obat',$data);
            }
        }
    }

    public function editObat($id)
    {
        $dataFind = [
            'id'=>$id
        ];
        $data = [
            'id' => $id,
            'obat' => $this->obat->where($dataFind)->findAll()
        ];
        return view('/pegawai/editObat',$data);
    }

    public function tindakan()
    { 
        if (!$this->session->session_level){
            session()->setFlashdata('error', "Login Dulu");
            return redirect()->to('/');
        }else{
            $data = [
                'tindakan' => $this->tindakan->findAll()
            ];
            if ($this->session->session_level == 'Pegawai'){
                return view('/pegawai/tindakan',$data);
            }else{
                return view('/user/tindakan',$data);
            }
        }
    }

    public function editTindakan($id)
    {
        $dataFind = [
            'id'=>$id
        ];
        $data = [
            'id' => $id,
            'tindakan' => $this->tindakan->where($dataFind)->findAll()
        ];
        if ($this->session->session_level == 'Pegawai'){
            return view('/pegawai/editTindakan',$data);
        }else{
            return view('/user/editTindakan',$data);
        }
    }

    public function pasien()
    {
        $data = [
            'wilayah' => $this->wilayah->findAll(),
            'pasien' => $this->pasien->findAll()
        ];
        if ($this->session->session_level == 'Pegawai'){
            return view('/pegawai/pasien',$data);
        }else{
            return view('/user/pasien',$data);
        }
    }

    public function editPasien($id)
    {
        $dataFind = [
            'id'=>$id
        ];
        $data = [
            'id' => $id,
            'pasien' => $this->pasien->where($dataFind)->findAll(),
            'wilayah' => $this->wilayah->findAll()
        ];
        if ($this->session->session_level == 'Pegawai'){
            return view('/pegawai/editPasien',$data);
        }else{
            return view('/user/editPasien',$data);
        }
    }

    public function tindakanPasien()
    { 
        
        $data = [
            'pasien' => $this->pasien->findAll(),
            'dokter' => $this->user->findAll()
        ];
        if ($this->session->session_level == 'Pegawai'){
            return view('/pegawai/tindakanPasien',$data);
        }else{
            return view('/user/tindakanPasien',$data);
        }
    }

    public function pembayaran()
    { 
        
        $data = [
            'pasien' => $this->pasien->findAll()
        ];
        if ($this->session->session_level == 'Pegawai'){
            return view('/pegawai/pembayaranPasien',$data);
        }else{
            return view('/user/pembayaranPasien',$data);
        }
    }

}