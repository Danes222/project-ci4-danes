<?php

namespace App\Controllers;

use Config\View;

class Web extends BaseController
{
    public function nama()
    {
        echo "<h1>nama saya Danes</h1>";
    }

    public function biodata()
    {
        // memanggil file view dengan nama biodata.php
        $data = array(
            "nama" => "Danes Nizam V.",
            "alamat" => "Selopanggung",
            "jk" => "Laki-laki",
            "as" => "SMK TI Pelita Nusantara Kediri",
        );
        return View("biodata", $data);
    }
                        
    public function komentar($nama)
    {
        echo "<h1>ini Komentar " . $nama . " !</h1>";
    }

    public function hitung()
    {
        $data = array(
            "judul" => "Kalkulator Sederhana",
            "angka1" => 0,
            "angka2" => 0,
            "hasil" => 0,
        );
        return view("kalkulator", $data);
    }

    public function proses()
    {
        $data = array(
            "judul" => "Kalkulator Sederhana",
            "angka1" => $this->request->getPost('angka1'),
            "angka2" => $this->request->getPost('angka2'),
            "hasil" => $this->request->getPost('angka1')*$this->request->getPost('angka2'),
        );
        return view("kalkulator", $data);
        
    }


    // SEGITIGA
    public function hitungSegitiga()
    {
        $data = array(
            "judul" => "Kalkulator luas segitiga",
            "alas" => 0,
            "tinggi" => 0,
            "hasil" => 0,
        );
        return view("segitiga", $data);
    }

    public function prosesSegitiga()
    {
        $alas = $this->request->getPost('alas');
        $tinggi = $this->request->getPost('tinggi');

        $data = array(
            "judul" => "Kalkulator luas segitiga",
            "alas" => $alas,
            "tinggi" => $tinggi,
            "hasil" => (1/2)*$alas*$tinggi,
        );
        return view("segitiga", $data);
        
    }
    // END SEGITIGA
}
