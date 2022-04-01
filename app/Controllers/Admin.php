<?php

namespace App\Controllers;

use App\Models\Jenis;
use App\Models\Tagihan;

class Admin extends BaseController
{
    private $jenisModel;
    public $tampil_jenis;
    private $tagihanModel;
    public $tagihan;

    public function __construct()
    {
        $this->jenisModel = new Jenis();
        $this->tagihanModel = new Tagihan();
    }

    public function dataPembayaran_admin()
    {
        return view('Admin/data_pembayaran');
    }

    // public function jenisPembayaran()
    // {
    //     $jenisModel = new Jenis();
    //     $data['tampil_jenis'] = $jenisModel->getJenis();
    //     // var_dump($data['tampil_jenis']);
    //     return view('Admin/jenis_pembayaran', $data);
    // }

    // public function tambah_jenis()
    // {
    //     return view('Admin/tambah_jenis');
    // }

    // public function insert_jenis()
    // {
    //     $jenis_pembayaran = $this->request->getPost('nama_jenis');

    //     $data = ([
    //         "nama_jenis" => $jenis_pembayaran
    //     ]);

    //     $tambah = $this->jenisModel->insert($data);

    //     //jika berhasil data diinput
    //     if ($tambah) {
    //         return redirect()->to(base_url("/jenisPembayaran"));
    //     } else {
    //         return redirect()->to(base_url("/"));
    //     }
    // }

    // public function tampil_jenis()
    // {
    //     $tampil_jenis = new Jenis();
    //     $data = [
    //         'tampil_jenis' => $tampil_jenis->m_tampil_jenis->getResults()
    //     ];
    // }

    // public function edit_jenis($id_jenis)
    // {
    //     $model = new Jenis();
    //     $data['jenis'] = $model->getJenis($id_jenis)->getRowArray();
    //     echo view('Admin/edit_jenis', $data);
    // }

    // public function update_jenis($data, $id_jenis)
    // {
    //     $jenis_pembayaran = $this->request->getPost('nama_jenis');
    //     $id_jenis = $this->request->getPost('id_jenis');
    //     $data = ([
    //         "id_jenis" => $id_jenis,
    //         "nama_jenis" => $jenis_pembayaran
    //     ]);

    //     $Jenis = new Jenis();

    //     $update = $Jenis->updateJenis($data, $id_jenis);

    //     //jika berhasil data diinput
    //     if ($update) {
    //         return redirect()->to(base_url("/jenisPembayaran"));
    //     } else {
    //         echo "gagal";
    //     }
    // }

    // public function delete_jenis($id_jenis)
    // {
    //     $model = new Jenis();
    //     $hapus = $model->deleteJenis($id_jenis);
    //     if ($hapus) {
    //         session()->setFlashdata('warning', 'Deleted Category successfully');
    //         return redirect()->to(base_url('/jenisPembayaran'));
    //     }
    // }

    public function tampil_tagihan()
    {
        $tagihanModel = new Tagihan();
        $data['tagihan'] = $tagihanModel->getTagihan();
        // var_dump($data['tampil_tagihan']);
        $data = [
            'tagihan' => $this->tagihanModel->getTagihan()
        ];
        return view('Admin/tagihan', $data);
    }

    public function tambah_tagihan()
    {
        return view('Admin/tambah_tagihan');
    }

    public function insert_tagihan()
    {

        $nim = $this->request->getPost('nimnip');
        var_dump($nim);
        $nama = $this->request->getPost('username');
        var_dump($nama);
        $jenis = $this->request->getPost('nama_jenis');
        $jumlah = $this->request->getPost('jumlah');
        $semester = $this->request->getPost('semester');
        $status = $this->request->getPost('status');

        $data = ([
            "nimnip" => $nim,
            "username" => $nama,
            "nama_jenis" => $jenis,
            "jumlah" => $jumlah,
            "semester" => $semester,
            "status" => $status
        ]);

        $tambah = $this->tagihanModel->insert($data);

        //jika berhasil data diinput
        if ($tambah) {
            return redirect()->to(base_url("/tampilTagihan"));
        } else {
            echo "gagal";
        }
    }

    public function delete_tagihan($id_tagihan)
    {
        $model = new Tagihan();
        $hapus = $model->deleteTagihan($id_tagihan);
        if ($hapus) {
            session()->setFlashdata('warning', 'Deleted Category successfully');
            return redirect()->to(base_url('/tampilTagihan'));
        }
    }
}
