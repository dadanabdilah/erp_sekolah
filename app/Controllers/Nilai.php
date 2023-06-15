<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Nilai extends BaseController
{
    public function index()
    {
        $data = [
            'Nilai' => $this->Nilai->select('nilai.*, nilai.id AS id_nilai, siswa.*, mapel.*, kelas.*')->join('siswa', 'siswa.nis = nilai.nis')->join('mapel', 'mapel.id = nilai.id_mapel')->join('kelas', 'kelas.id = siswa.id_kelas')->findAll(),
            'Mapel' => $this->Mapel->findAll(),
            'Siswa' => $this->Siswa->findAll()
        ];
        return view("nilai/index", $data);
    }
    
    public function insert(){
        if(!$this->validate([
            'nis' => 'required',
            'id_mapel' => 'required',
            'nilai' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'nis' => $this->request->getPost('nis'),
            'id_mapel' => $this->request->getPost('id_mapel'),
            'nilai' => $this->request->getPost('nilai'),
        ];


        $result = $this->Nilai->save($request);

        if($result){
            session()->setFlashdata('message', 'Tambah Data Nilai Siswa Berhasil');
        }else{
            session()->setFlashdata('error', 'Tambah Data Nilai Siswa Tidak Berhasil');
        }

        return redirect()->to('nilai');
    }

    public function update(){
        if(!$this->validate([
            'nis' => 'required',
            'id_mapel' => 'required',
            'nilai' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'id' => $this->request->getPost('id'),
            'nis' => $this->request->getPost('nis'),
            'id_mapel' => $this->request->getPost('id_mapel'),
            'nilai' => $this->request->getPost('nilai'),
        ];

        $result = $this->Nilai->save($request);

        if($result){
            session()->setFlashdata('message', 'Edit Data Nilai Siswa Berhasil');
        }else{
            session()->setFlashdata('error', 'Edit Data Nilai Siswa Tidak Berhasil');
        }

        return redirect()->to('nilai');
    }

    public function delete($id = null){
        $result = $this->Nilai->where('id', $id)->delete();

        if($result){
            session()->setFlashdata('message', 'Hapus Data Nilai Siswa Berhasil');
        }else{
            session()->setFlashdata('error', 'Hapus Data Nilai Siswa Tidak Berhasil');
        }

        return redirect()->to('nilai');
    }
}
