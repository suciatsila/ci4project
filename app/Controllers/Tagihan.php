<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_mahasiswa;

class Tagihan extends BaseController
{
    protected $modelMahasiswa;
    public function __construct()
    {
        $this->M_mahasiswa = new M_mahasiswa();
    }


    public function index()
    {

        $data['getMahasiswa'] = $this->M_mahasiswa->getMahasiswa();
        $data['userData'] = $this->session->get();


        $this->public($data, 'tambahTagihan.php');
    }
    public function tambah($id_mahasiswa)
    {
        $userData = $this->session->get();
        $data = [

            'id_mahasiswa' => $id_mahasiswa,
            'jumlah_tagihan' => $this->request->getVar('jumlah'),
            'keterangan' => $this->request->getVar('keterangan'),
            'created_by' => $userData['no_id'],


        ];

        $insert = $this->M_mahasiswa->tambahTagihan($id_mahasiswa, $data);
        if ($insert) {
            $result['succes'] = true;
            echo json_encode($result);
        } else {
            $result['succes'] = false;
            echo json_encode($result);
        }
    }
    public function hapus($id_tagihan)
    {

        $data = [
            'id' => $id_tagihan,
        ];

        $delete = $this->M_mahasiswa->hapusTagihan($id_tagihan, $data);
        if ($delete) {
            $result['succes'] = true;
            echo json_encode($result);
        } else {
            $result['succes'] = false;
            echo json_encode($result);
        }
    }
    public function bayar($id_tagihan)
    {

        $data = [
            'id' => $id_tagihan,
            'status_tagihan' => '0'
        ];

        $update = $this->M_mahasiswa->bayarTagihan($id_tagihan, $data);
        if ($update) {
            $result['succes'] = true;
            echo json_encode($result);
        } else {
            $result['succes'] = false;
            echo json_encode($result);
        }
    }
}
