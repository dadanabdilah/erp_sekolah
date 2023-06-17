<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'Siswa'      => $this->Siswa->countAllResults(),
            'Pengguna'   => $this->Pengguna->countAllResults(),
            'UangMasuk'  => $this->Keuangan->select('SUM(nominal) AS nominal')->where('jenis', 'Uang Masuk')->first()->nominal,
            'UangKeluar' => $this->Keuangan->select('SUM(nominal) AS nominal')->where('jenis', 'Uang Keluar')->first()->nominal,
            'Kelas'      => $this->Kelas->countAllResults()
        ];
        return view('dashboard/index', $data);
    }
}
