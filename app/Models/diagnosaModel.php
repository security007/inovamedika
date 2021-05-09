<?php

namespace App\Models;

use CodeIgniter\Model;

class DiagnosaModel extends Model
{
public function __construct()
	{ 
		$this->db = \Config\Database::connect();
	}
    // join table pasien dan tindakan

	public function getTindakan($diagnosa)
	{ 
		$get = $this->db->table('tindakan')->where('diagnosa',$diagnosa)->get()->getResultArray();
		$total = $this->db->table('tindakan')->where('tindakan.diagnosa',$diagnosa)->countAllResults();
		$data = [
			'get' => $get,
			'total' => $total
		];
		return $data;
	}
}