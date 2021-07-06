<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterBarangModel extends Model
{
    protected $table = 'master_barang';
    protected $useTimestamps = true;
    protected $allowedFields = ['grup_id', 'nama_barang', 'stok_awal', 'kode_erp'];

    // public function getAlatTulis($slug = false)
    // {
    //     if ($slug == false) {
    //         return $this->findAll();
    //     }

    //     return $this->where(['slug' => $slug])->first();
    // }
}
