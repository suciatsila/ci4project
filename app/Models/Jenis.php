<?php

namespace App\Models;

use CodeIgniter\Model;

class Jenis extends Model
{
    protected $table      = 'jenis_pembayaran';
    protected $primaryKey = 'id';
    protected $returnType     = 'object';

    protected $allowedFields = [
        'nama_jenis',
    ];

    public function getJenis($id_jenis = false)
    {
        if ($id_jenis === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_jenis' => $id_jenis]);
        }
    }

    public function updateJenis($data, $id_jenis)
    {
        return $this->db->table('jenis_pembayaran')->update($data, ['id_jenis' => $id_jenis]);
    }

    public function deleteJenis($id_jenis)
    {
        return $this->db->table($this->table)->delete(['id_jenis' => $id_jenis]);
    }
}
