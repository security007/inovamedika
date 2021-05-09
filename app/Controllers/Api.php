<?php

namespace App\Controllers;
use App\Models\WilayahModel;
use App\Models\LoginModel;
use App\Models\ObatModel;
use App\Models\TindakanModel;
use App\Models\PasienModel;
use App\Models\DiagnosaModel;

class Api extends BaseController
{
	public function  __construct()
	{
		$this->wilayah = new WilayahModel();
		$this->user = new LoginModel();
		$this->obat = new ObatModel();
		$this->pasien = new PasienModel();
		$this->tindakan = new TindakanModel();
		$this->diagnosa = new DiagnosaModel();
        $this->session = session();
	}

    public function index()
    { 
        echo "403 Forbidden";
    }

    // edit wilayah
    public function editWilayah()
    { 
        
        if ($_SERVER['REQUEST_METHOD'] == "GET")
        {
            return redirect()->to('/dashboard');
        }else{
        $data = [
            'id' => $this->request->getVar('id'),
            'nama_wilayah' => $this->request->getVar('wilayah')
        ];
        
        if ($this->wilayah->save($data))
        {
            session()->setFlashdata('oke', "Data berhasil diedit");
            return redirect()->to('/dashboard/wilayah/edit/'.$this->request->getVar('id'));
        }
    }
    }
     
    // delete wilayah
    public function deleteWilayah($id)
    { 
        
        $data = [
            'id' => $id
        ];
        
        if ($this->wilayah->where($data)->delete())
        {
            session()->setFlashdata('oke', "Data berhasil dihapus");
            return redirect()->to('/dashboard/wilayah');
        }
    }

    public function addUser()
    { 
        
        if ($_SERVER['REQUEST_METHOD'] == "GET")
        {
            return redirect()->to('/dashboard');
        }else{
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email|is_unique[auth.email]',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'valid_email' => 'Format Email Harus Valid',
                        'is_unique' => 'Email sudah tedaftar, mohon gunakan email lain'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                    ],
                'level' => [
                    'rules' => 'required|in_list[Pegawai,User]',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'valid_email' => 'Format Email Harus Valid'
                    ]
                ]
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }else{ 
            $data = [
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'wilayah' => $this->request->getVar('wilayah'),
                'password' => hash('sha256',$this->request->getVar('password')),
                'level' => $this->request->getVar('level')
            ];
            if($this->user->save($data))
            {
                session()->setFlashdata('oke', "Data berhasil ditambahkan");
                return redirect()->to('/dashboard/user');
            }
        }
    }
    }

    // Edit user 
    public function editUser()
    { 
        
        if ($_SERVER['REQUEST_METHOD'] == "GET")
        {
            return redirect()->to('/dashboard');
        }else{ 
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'valid_email' => 'Format Email Harus Valid'
                    ]
                ],
                'newpassword' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                    ],
                'level' => [
                    'rules' => 'required|in_list[Pegawai,User]',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'valid_email' => 'Format Email Harus Valid'
                    ]
                ]
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }else{ 
            $data = [
                'id' => $this->request->getVar('id'),
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'wilayah' => $this->request->getVar('wilayah'),
                'password' => hash('sha256',$this->request->getVar('newpassword')),
                'level' => $this->request->getVar('level')
            ];
            if($this->user->save($data))
            {
                session()->setFlashdata('oke', "Data berhasil diedit");
                return redirect()->to('/dashboard/user/edit/'.$this->request->getVar('id'));
            }
        }
    }
    } 
    // delete user 
    public function deleteUser($id)
    { 
        
        $data = [
            'id' => $id
        ];
        
        if ($this->user->where($data)->delete())
        {
            session()->setFlashdata('oke', "Data berhasil dihapus");
            return redirect()->to('/dashboard/user');
        }
    }

    // add obat
    public function addObat()
    { 
        if ($_SERVER['REQUEST_METHOD'] == "GET")
        {
            return redirect()->to('/dashboard');
        }else{
            if (!$this->validate([
                'namaObat' => [
                    'rules' => 'required|is_unique[obat.nama_obat]',
                    'errors' => [
                        'required' => '{field} Harus diisi',                       
                        'is_unique' => 'Nama obat sudah ada sebelumnya'
                    ]
                ],
                'jenisObat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'valid_email' => 'Format Email Harus Valid'
                    ]
                ],
                'kegunaanObat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                    ]
               
                
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }else{ 
                $data = [
                    'nama_obat' => $this->request->getVar('namaObat'),
                    'jenis_obat' => $this->request->getVar('jenisObat'),
                    'kegunaan' => $this->request->getVar('kegunaanObat')
                ];
                if($this->obat->save($data))
                { 
                    session()->setFlashdata('oke', "Data berhasil ditambahkan");
                    return redirect()->to('/dashboard/obat');
                }
            }
        }
    }

    // edit obat
    public function editObat()
    { 
        
        if ($_SERVER['REQUEST_METHOD'] == "GET")
        {
            return redirect()->to('/dashboard');
        }else{ 
            if (!$this->validate([
                'namaObat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'jenisObat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'valid_email' => 'Format Email Harus Valid'
                    ]
                ],
                'kegunaanObat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                    ]
               
                
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }else{ 
            $data = [
                'id' => $this->request->getVar('id'),
                'nama_obat' => $this->request->getVar('namaObat'),
                'jenis_obat' => $this->request->getVar('jenisObat'),
                'kegunaan' => $this->request->getVar('kegunaanObat')
            ];
            if($this->obat->save($data))
            {
                session()->setFlashdata('oke', "Data berhasil diedit");
                return redirect()->to('/dashboard/obat/edit/'.$this->request->getVar('id'));
            }
        }
    }
    } 

    // delete obat 
    public function deleteObat($id)
    { 
        
        $data = [
            'id' => $id
        ];
        
        if ($this->obat->where($data)->delete())
        {
            session()->setFlashdata('oke', "Data berhasil dihapus");
            return redirect()->to('/dashboard/obat');
        }
    }

    // add tindakan
    public function addTindakan()
    { 
        if ($_SERVER['REQUEST_METHOD'] == "GET")
        {
            return redirect()->to('/dashboard');
        }else{
            if (!$this->validate([
                'diagnosa' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'penanganan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ]
                    
               
                
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }else{ 
                $data = [
                    'diagnosa' => $this->request->getVar('diagnosa'),
                    'penanganan' => $this->request->getVar('penanganan')
                ];
                if($this->tindakan->save($data))
                { 
                    session()->setFlashdata('oke', "Data berhasil ditambahkan");
                    return redirect()->to('/dashboard/tindakan');
                }
            }
        }
    }

    // edit tindakan 
    public function editTindakan()
    { 
        if ($_SERVER['REQUEST_METHOD'] == "GET")
        {
            return redirect()->to('/dashboard');
        }else{
            if (!$this->validate([
                'diagnosa' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'penanganan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ]
                    
               
                
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }else{ 
                $data = [
                    'id' => $this->request->getVar('id'),
                    'diagnosa' => $this->request->getVar('diagnosa'),
                    'penanganan' => $this->request->getVar('penanganan')
                ];
                if($this->tindakan->save($data))
                { 
                    session()->setFlashdata('oke', "Data berhasil diedit");
                    return redirect()->to('/dashboard/tindakan/edit/'. $this->request->getVar('id'));
                }
            }
        }
    }

    // delete tindakan 
    public function deleteTindakan($id)
    { 
        
        $data = [
            'id' => $id
        ];
        
        if ($this->tindakan->where($data)->delete())
        {
            session()->setFlashdata('oke', "Data berhasil dihapus");
            return redirect()->to('/dashboard/tindakan');
        }
    }

    // add pasien 
    public function addPasien()
    { 
        if ($_SERVER['REQUEST_METHOD'] == "GET")
        {
            
            return redirect()->to('/dashboard');
        }else{
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'umur' => [
                    'rules' => 'required|integer',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'integer' => '{field} Harus berupa angka'
                    ]
                ],
                'wilayah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'diagnosa' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'tanggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ]
                    
               
                
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }else{ 
                global $diagnosa;
                global $penanganan;
                $getDiagnosa = $this->diagnosa->getTindakan($this->request->getVar('diagnosa'));
                if ($getDiagnosa['total'] != 0)
                {
                    foreach ($getDiagnosa['get'] as $diag){ 
                        $diagnosa = $diag['diagnosa'];
                        $penanganan = $diag['penanganan'];
                    }
                }else{
                    $diagnosa = $this->request->getVar('diagnosa');
                    $penanganan = '';
                }
               $data = [
                    'nama_pasien' => $this->request->getVar('nama'),
                    'umur' => $this->request->getVar('umur'),
                    'wilayah' => $this->request->getVar('wilayah'),
                    'diagnosa' => $diagnosa,
                    'tindakan' => $penanganan,
                    'pembayaran' => 'Pending',
                    'tanggal_daftar' => $this->request->getVar('tanggal'),
                ];
                if($this->pasien->save($data))
                { 
                    session()->setFlashdata('oke', "Data berhasil ditambahkan");
                    return redirect()->to('/dashboard/daftarPasien'. $this->request->getVar('id'));
                }
            }
        }
    }

    // edit pasien 
    public function editPasien()
    { 
        if ($_SERVER['REQUEST_METHOD'] == "GET")
        {
            return redirect()->to('/dashboard');
        }else{
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'umur' => [
                    'rules' => 'required|integer',
                    'errors' => [
                        'required' => '{field} Harus diisi',
                        'integer' => '{field} Harus berupa angka'
                    ]
                ],
                'wilayah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ],
                'diagnosa' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus diisi'
                    ]
                ]
                    
               
                
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }else{ 
                $data = [
                    'id' => $this->request->getVar('id'),
                    'nama_pasien' => $this->request->getVar('nama'),
                    'umur' => $this->request->getVar('umur'),
                    'wilayah' => $this->request->getVar('wilayah'),
                    'diagnosa' => $this->request->getVar('diagnosa')
                ];
                if($this->pasien->save($data))
                { 
                    session()->setFlashdata('oke', "Data berhasil diedit");
                    return redirect()->to('/dashboard/pasien/edit/'. $this->request->getVar('id'));
                }
            }
        }
    }

    // delete pasien 
    public function deletePasien($id)
    { 
        
        $data = [
            'id' => $id
        ];
        
        if ($this->pasien->where($data)->delete())
        {
            session()->setFlashdata('oke', "Data berhasil dihapus");
            return redirect()->to('/dashboard/pasien');
        }
    }

    // update pasien 
    public function updatePasien($id)
    { 
        $data = [
            'id' => $id,
            'nama_dokter' => $this->request->getVar('dokter'),
            'obat' => $this->request->getVar('obat'),
            'tindakan' => $this->request->getVar('tindakan'),
        ];
        if($this->pasien->save($data))
        { 
            session()->setFlashdata('oke', "Data berhasil diedit");
            return redirect()->to('/dashboard/tindakanPasien'. $this->request->getVar('id'));
        }
    }

    // pembayaran pasien 
    public function pembayaran($id)
    { 
        if (!$this->validate([
            'konfirmasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harap konfirmasi pembayaran pasien terlebih dahulu'
                ]
            ]
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }else{ 
        $data = [
            'id' => $id,
            'pembayaran' => $this->request->getVar('konfirmasi')
        ];
        if($this->pasien->save($data))
        { 
            session()->setFlashdata('oke', "Status pembayaran telah diganti");
            return redirect()->to('/dashboard/pembayaran');
        }
    }
    }

    // grafik get pasien
    public function getPasien()
    { 
        $db = \Config\Database::connect();
        $result = $db->query('SELECT count(nama_pasien) as total ,tanggal_daftar FROM pasien GROUP BY tanggal_daftar')->getResult();
        return $this->response->setJSON($result);
    }

    // grafik get diagnosa
    public function getDiagnosa()
    { 
        $db = \Config\Database::connect();
        $result = $db->query('SELECT count(diagnosa) as total ,diagnosa FROM pasien GROUP BY diagnosa')->getResult();
        return $this->response->setJSON($result);
    }

    // grafik get pembayaran
    public function getpembayaran()
    { 
        $db = \Config\Database::connect();
        $result = $db->query('SELECT count(pembayaran) as total ,pembayaran FROM pasien GROUP BY pembayaran')->getResult();
        return $this->response->setJSON($result);
    }
        
}