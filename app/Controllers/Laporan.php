<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Laporan extends BaseController
{
    public function siswa()
    {
        $data = [
            'Siswa' => $this->Siswa->join('kelas', 'kelas.id = siswa.id_kelas')->join('tahun_akademik', 'tahun_akademik.id = siswa.id_thn_akademik')->findAll(),
            'Kelas' => $this->Kelas->findAll(),
            'TahunAkademik' => $this->TahunAkademik->findAll(),
        ];
        return view("laporan/siswa", $data);
    }

    public function nilai()
    {
        $data = [
            'Siswa' => $this->Siswa->findAll(),
            'Kelas' => $this->Kelas->findAll(),
            'TahunAkademik' => $this->TahunAkademik->findAll(),
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
        if($action == "siswa"){
            if($_POST){
                if($this->request->getPost('id_kelas') == "Semua" AND $this->request->getPost('id_thn_akademik') == "Semua"){
                    $Siswa = $this->Siswa->join('kelas', 'kelas.id = siswa.id_kelas')
                                        ->join('tahun_akademik', 'tahun_akademik.id = siswa.id_thn_akademik')
                                        ->findAll();

                } else if ($this->request->getPost('id_kelas') != "Semua" AND $this->request->getPost('id_thn_akademik') != "Semua"){
                    $Siswa = $this->Siswa->join('kelas', 'kelas.id = siswa.id_kelas')
                                        ->join('tahun_akademik', 'tahun_akademik.id = siswa.id_thn_akademik')
                                        ->where('kelas.id', $this->request->getPost('id_kelas'))
                                        ->where('tahun_akademik.id', $this->request->getPost('id_thn_akademik'))
                                        ->findAll();

                } else if ($this->request->getPost('id_kelas') == "Semua" AND $this->request->getPost('id_thn_akademik') != "Semua"){
                    $Siswa = $this->Siswa->join('kelas', 'kelas.id = siswa.id_kelas')
                                            ->join('tahun_akademik', 'tahun_akademik.id = siswa.id_thn_akademik')
                                            ->where('kelas.id', $this->request->getPost('id_kelas'))
                                            ->findAll();

                } else {
                    session()->setFlashdata('error', 'Data tidak ditemukan cek filter anda!');
                    return redirect()->to('laporan/siswa');
                }

                $data = [
                    'Siswa' => $Siswa,
                ];
                // return view('laporan/siswa_pdf', $data);
                $dompdf = new \Dompdf\Dompdf(); 
                $dompdf->loadHtml(view('laporan/siswa_pdf', $data));
                $dompdf->setPaper('A4', 'potrait');
                $dompdf->render();
                $dompdf->stream("Laporan Data Siswa.pdf");
            } else {
                session()->setFlashdata('error', 'Data tidak ditemukan cek filter anda!');
                return redirect()->to('laporan/siswa');
            }
        } else if($action == "nilai"){
            if($_POST){
                if($this->request->getPost('nis') == "Semua" AND $this->request->getPost('id_kelas') == "Semua"){
                    $Nilai = $this->Nilai->select('nilai.*, nilai.id AS id_nilai, siswa.*, mapel.*, kelas.*')->join('siswa', 'siswa.nis = nilai.nis')->join('mapel', 'mapel.id = nilai.id_mapel')->join('kelas', 'kelas.id = siswa.id_kelas')->findAll();
                } else if ($this->request->getPost('nis') != "Semua" AND $this->request->getPost('id_kelas') != "Semua"){
                    $Nilai = $this->Nilai->select('nilai.*, nilai.id AS id_nilai, siswa.*, mapel.*, kelas.*')
                                        ->select('tahun_akademik.tahun')
                                        ->join('siswa', 'siswa.nis = nilai.nis')
                                        ->join('mapel', 'mapel.id = nilai.id_mapel')
                                        ->join('kelas', 'kelas.id = siswa.id_kelas')
                                        ->join('tahun_akademik', 'tahun_akademik.id = siswa.id_thn_akademik')
                                        ->where('siswa.nis', $this->request->getPost('nis'))
                                        ->where('tahun_akademik.id', $this->request->getPost('id_thn_akademik'))
                                        ->where('kelas.id', $this->request->getPost('id_kelas'))
                                        ->findAll();
                } else if ($this->request->getPost('nis') == "Semua" AND $this->request->getPost('id_kelas') != "Semua"){
                    $Nilai = $this->Nilai->select('nilai.*, nilai.id AS id_nilai, siswa.*, mapel.*, kelas.*')
                                        ->select('tahun_akademik.tahun')
                                        ->join('siswa', 'siswa.nis = nilai.nis')
                                        ->join('mapel', 'mapel.id = nilai.id_mapel')
                                        ->join('kelas', 'kelas.id = siswa.id_kelas')
                                        ->join('tahun_akademik', 'tahun_akademik.id = siswa.id_thn_akademik')
                                        ->where('kelas.id', $this->request->getPost('id_kelas'))
                                        ->where('tahun_akademik.id', $this->request->getPost('id_thn_akademik'))
                                        ->findAll();
                } else {
                    session()->setFlashdata('error', 'Data tidak ditemukan cek filter anda!');
                    return redirect()->to('laporan/nilai');
                }

                $data = [
                    'Nilai' => $Nilai,
                ];
                // return view('laporan/nilai_pdf', $data);
                $dompdf = new \Dompdf\Dompdf(); 
                $dompdf->loadHtml(view('laporan/nilai_pdf', $data));
                $dompdf->setPaper('A4', 'potrait');
                $dompdf->render();
                $dompdf->stream("Laporan Nilai.pdf");
            } else {
                session()->setFlashdata('error', 'Data tidak ditemukan cek filter anda!');
                return redirect()->to('laporan/nilai');
            }
        } else if($action == "keuangan"){
            if($_POST){
                if($this->request->getPost('jenis') != "Semua"){
                    $Keuangan = $this->Keuangan->select('keuangan.*, keuangan.id AS id_keuangan, kategori.*')
                                    ->join('kategori', 'kategori.id = keuangan.id_kategori')
                                    ->where('tanggal BETWEEN "'.$this->request->getPost('tanggal_awal').'" AND "'.$this->request->getPost('tanggal_akhir').'" ')
                                    ->where('jenis', $this->request->getPost('jenis'))
                                    ->findAll();
                } else if ($this->request->getPost('jenis') == "Semua"){
                    $Keuangan = $this->Keuangan->select('keuangan.*, keuangan.id AS id_keuangan, kategori.*')
                                    ->join('kategori', 'kategori.id = keuangan.id_kategori')
                                    ->where('tanggal BETWEEN "'.$this->request->getPost('tanggal_awal').'" AND "'.$this->request->getPost('tanggal_akhir').'" ')
                                    ->findAll();
                }

                $data = [
                            'Keuangan' => $Keuangan,
                            'tanggal_awal' => $this->request->getPost('tanggal_awal'),
                            'tanggal_akhir' => $this->request->getPost('tanggal_akhir'),
                        ];
                // return view('laporan/keuangan_pdf', $data);
                $dompdf = new \Dompdf\Dompdf(); 
                $dompdf->loadHtml(view('laporan/keuangan_pdf', $data));
                $dompdf->setPaper('A4', 'potrait');
                $dompdf->render();
                $dompdf->stream("Laporan Keuangan Periode " . $this->request->getPost('tanggal_awal') . "-" . $this->request->getPost('tanggal_akhir') . ".pdf");
            } else {
                session()->setFlashdata('error', 'Data tidak ditemukan cek filter anda!');
                return redirect()->to('laporan/nilai');
            }
        }
    }
}
