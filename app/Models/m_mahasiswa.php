<?php

namespace App\Models;

use CodeIgniter\Model;

class m_mahasiswa extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'username';
    protected $useTimestamps = true;
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getTagihan()
    {
        $query =  $this->db->table('user')
            ->join('user', 'user.id=tagihan.fk_nimnik')
            ->get();
        return $query->getResultArray();
    }

    public function getMahasiswa()
    {
        $query =  $this->db->table('user')
            ->get();
        return $query->getResultArray();
    }
    public function tambah_taagihan($id, $data)
    {
        $query =  $this->db->table('tagihan')

            ->insert($data);

        if ($query) {

            return true;
        } else {
            return false;
        }
    }
    public function hapus_tagihan($id, $data)
    {
        $query =  $this->db->table('tagihan')
            ->Where(['id_tagihan' => $id])
            ->delete($data);

        if ($query) {

            return true;
        } else {
            return false;
        }
    }
    public function bayar_tagihan($id, $data)
    {
        $query =  $this->db->table('tagihan')
            ->Where(['id_tagihan' => $id])
            ->update($data);

        if ($query) {

            return true;
        } else {
            return false;
        }
    }
}
