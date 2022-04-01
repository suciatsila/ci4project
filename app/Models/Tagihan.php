<?php

namespace App\Models;

use CodeIgniter\Model;

class Tagihan extends Model
{
    protected $table      = 'tagihan';
    protected $primaryKey = 'id_tagihan';
    protected $returnType     = 'object';

    protected $allowedFields = [
        'fk_nimnik',
        'jenis',
        'jumlah',
        'semester',
        'status'
    ];

    public function getTagihan()
    {
        return $this->db->table('tagihan')
            ->join('user', 'user.id=tagihan.fk_nimnik')
            ->get()->getResultArray();
    }

    public function getTagihanid($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_tagihan' => $id]);
        }
    }
}
