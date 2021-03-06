<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    protected $authModel;
    public function __construct()
    {
        // load model auth
        $this->authModel = new \App\Models\AuthModel();
    }
    public function index()
    {
        $data['judul'] = 'Register Admin Employe';
        //tampilkan laman register
        return view('register', $data);
    }
    public function register()
    {
        //untuk validasi
        $validasi = $this->validate([
            'username' => [
                //jika username sudah ada di table dan harus diisi
                'rules' => 'required|is_unique[admins.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah digunakan'
                ]
            ],
            'password_new' => [
                //password harus diisi dan minimal 4 karakter
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 4 karakter'
                ]
            ],
            'password' => [
                //password keduanya harus sama
                'rules' => 'matches[password_new]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sama'
                ]
            ]
        ]);
        //jika data tidak sesuai kembali dan munculkan pesan error di form register.
        if (!$validasi) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        //Jika data sesuai lakukan penyimpanan data
        $data = [
            'username' => $this->request->getPost('username'),
            //enkripsi password dengan MD5
            'password' => md5($this->request->getPost('password'))
        ];
        //memasukan data dalam database
        $this->authModel->insert($data);
        //jika berhasil arahkan ke tampilan login
        return redirect()->to('/login');
    }
    public function login()
    {
        $data['judul'] = 'Login Admin Employe';
        //tampilkan laman login
        return view('login', $data);
    }
    public function cek_login()
    {
        //ambil data dari form
        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password'));
        //cari data dari tabel admin sesuai username
        $dataUser = $this->authModel->where('username', $username)->first();
        // jika ada
        if ($dataUser) {
            //jika password sesuai
            if ($password == $dataUser['password']) {
                //masukan session untuk username dan status login
                session()->set([
                    'username' => $username,
                    'logged_in' => true
                ]);
                //masukan ke laman crud admin
                return redirect()->to('/admin');
            } else {
                //kembali ke login dan berikan pesan error
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else { //jika salah
            //kembali ke login dan berikan pesan error
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }
    public function logout()
    {
        //hapus session
        session()->destroy();
        return redirect()->to('/login');
    }
}
