<?php

namespace App\Controllers;

use App\Models\Jenis;
use App\Models\User;

class Home extends BaseController
{
    private $userModel;
    private $jenisModel;
    public $tampil_jenis;
    private $session;
    public function __construct()
    {
        $this->userModel = new User();
        $this->jenisModel = new Jenis();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        return view('auth/login');
    }

    public function regis()
    {
        return view('auth/regis');
    }

    public function halaman_admin()
    {
        return view('Admin/halaman_admin');
    }

    public function dataPembayaran()
    {
        return view('Admin/data_pembayaran');
    }

    public function kelas()
    {
        return view('Admin/kelas');
    }

    public function insert_user()
    {
        $user = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('password');
        $akses = $this->request->getPost('akses');

        //enkripsi password
        $pass_ens = password_hash($pass, PASSWORD_DEFAULT);
        $data = ([
            "username" => $user,
            "email" => $email,
            "password" => $pass_ens,
            "akses" => $akses
        ]);

        $tambah = $this->userModel->insert($data);

        //jika berhasil data diinput
        if ($tambah) {
            return redirect()->to(base_url("/"));
        } else {
            return redirect()->to(base_url("/register"));
        }
    }

    public function auth()
    {
        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('password');

        $cek_data = $this->userModel->where('email', $email)->first();

        //jika data ditemukan atau bernilai true
        if ($cek_data) {
            //seleksi jenis akun atau jenis hak akses
            //jika akses =1 yaitu pemimpin
            if ($cek_data->akses == 1) {
                //menuju halaman pemimpin
                return view("Pemimpin/halaman_pemimpin");
                //jika akses =2 yaitu bendahara
            } elseif ($cek_data->akses == 2) {
                return view("Bendahara/halaman_bendahara");
            } elseif ($cek_data->akses == 3) {
                //jika akses =3 yaitu mahasiswa
                return view("Mahasiswa/halaman_mahasiswa");
            } else {
                return redirect()->to(base_url('halaman_admin'));
                // echo view("Admin/halaman_admin");
            }
        }
    }
}
