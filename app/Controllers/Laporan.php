<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Laporan extends BaseController
{
    public function nilai()
    {
        $data = [
            'Nilai' => $this->Nilai->select('nilai.*, nilai.id AS id_nilai, siswa.*, mapel.*, kelas.*')->join('siswa', 'siswa.nis = nilai.nis')->join('mapel', 'mapel.id = nilai.id_mapel')->join('kelas', 'kelas.id = siswa.id_kelas')->findAll(),
        ];
        return view("laporan/nilai", $data);
    }

    public function keuangan()
    {
        $data = [
            'Keuangan' => $this->Keuangan->select('keuangan.*, keuangan.id AS id_keuangan, kategori.*')->join('kategori', 'kategori.id = keuangan.id_kategori')->findAll()
        ];
        return view("laporan/keuangan", $data);
    }

    public function export($action = ""){
        if($action == "nilai"){
            $Nilai = $this->Nilai->select('nilai.*, nilai.id AS id_nilai, siswa.*, mapel.*, kelas.*')->join('siswa', 'siswa.nis = nilai.nis')->join('mapel', 'mapel.id = nilai.id_mapel')->join('kelas', 'kelas.id = siswa.id_kelas')->findAll();
        } else if($action == "keuangan"){
            $Keuangan = $this->Keuangan->select('keuangan.*, keuangan.id AS id_keuangan, kategori.*')->join('kategori', 'kategori.id = keuangan.id_kategori')->findAll();
        }
    }
}
