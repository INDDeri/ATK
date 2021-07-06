<?php

namespace App\Models;

use CodeIgniter\Model;

class DistribusiModel extends Model
{
    protected $table = 'tbl_distribusi';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_permintaan', 'tgl_distribusi', 'id_user', 'id_dist' . 'jumlah'];
}
