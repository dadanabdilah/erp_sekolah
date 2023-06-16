<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Siswa extends BaseController
{
    public function index()
    {
        $data = [
            'Siswa' => $this->Siswa->join('kelas', 'kelas.id = siswa.id_kelas')->findAll(),
            'Kelas' => $this->Kelas->findAll()
        ];
        return view("siswa/index", $data);
    }
    
    public function insert(){
        if(!$this->validate([
            'nis' => 'required',
            'nama_siswa' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'nama_orang_tua' => 'required',
            'pekerjaan_orang_tua' => 'required',
            'id_kelas' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'nis' => $this->request->getPost('nis'),
            'id_kelas' => $this->request->getPost('id_kelas'),
            'nama_siswa' => $this->request->getPost('nama_siswa'),
            'jk' => $this->request->getPost('jk'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'nama_orang_tua' => $this->request->getPost('nama_orang_tua'),
            'pekerjaan_orang_tua' => $this->request->getPost('pekerjaan_orang_tua'),
        ];


        $result = $this->Siswa->insert($request);
        dd($result);
        if($result){
            session()->setFlashdata('message', 'Tambah Data Siswa Berhasil');
        }else{
            session()->setFlashdata('error', 'Tambah Data Siswa Tidak Berhasil');
        }

        return redirect()->to('siswa');
    }

    public function update(){
        if(!$this->validate([
            'nis' => 'required',
            'nama_siswa' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'nama_orang_tua' => 'required',
            'pekerjaan_orang_tua' => 'required',
            'id_kelas' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'nis' => $this->request->getPost('nis'),
            'id_kelas' => $this->request->getPost('id_kelas'),
            'nama_siswa' => $this->request->getPost('nama_siswa'),
            'jk' => $this->request->getPost('jk'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'nama_orang_tua' => $this->request->getPost('nama_orang_tua'),
            'pekerjaan_orang_tua' => $this->request->getPost('pekerjaan_orang_tua'),
        ];

        $result = $this->Siswa->save($request);

        if($result){
            session()->setFlashdata('message', 'Edit Data Siswa Berhasil');
        }else{
            session()->setFlashdata('error', 'Edit Data Siswa Tidak Berhasil');
        }

        return redirect()->to('siswa');
    }

    public function delete($id = null){
        $result = $this->Siswa->where('id', $id)->delete();

        if($result){
            session()->setFlashdata('message', 'Hapus Data Siswa Berhasil');
        }else{
            session()->setFlashdata('error', 'Hapus Data Siswa Tidak Berhasil');
        }

        return redirect()->to('siswa');
    }
}
