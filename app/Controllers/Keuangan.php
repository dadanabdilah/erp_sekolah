<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Keuangan extends BaseController
{
    public function index()
    {
        $data = [
            'Kategori' => $this->Kategori->findAll(),
            'Keuangan' => $this->Keuangan->select('keuangan.*, keuangan.id AS id_keuangan, kategori.*')->join('kategori', 'kategori.id = keuangan.id_kategori')->findAll()
        ];
        return view("keuangan/index", $data);
    }
    
    public function insert(){
        if(!$this->validate([
            'jenis' => 'required',
            'id_kategori' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'jenis' => $this->request->getPost('jenis'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'nominal' => $this->request->getPost('nominal'),
            'keterangan' => $this->request->getPost('keterangan'),
            'tanggal' => $this->request->getPost('tanggal'),
        ];


        $result = $this->Keuangan->save($request);

        if($result){
            session()->setFlashdata('message', 'Tambah Catatan Keuangan Berhasil');
        }else{
            session()->setFlashdata('error', 'Tambah Catatan Keuangan Tidak Berhasil');
        }

        return redirect()->to('keuangan');
    }

    public function update(){
        if(!$this->validate([
            'jenis' => 'required',
            'id_kategori' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'id' => $this->request->getPost('id'),
            'jenis' => $this->request->getPost('jenis'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'nominal' => $this->request->getPost('nominal'),
            'keterangan' => $this->request->getPost('keterangan'),
            'tanggal' => $this->request->getPost('tanggal'),
        ];

        $result = $this->Keuangan->save($request);

        if($result){
            session()->setFlashdata('message', 'Edit Catatan Keuangan Berhasil');
        }else{
            session()->setFlashdata('error', 'Edit Catatan Keuangan Tidak Berhasil');
        }

        return redirect()->to('keuangan');
    }

    public function delete($id = null){
        $result = $this->Keuangan->where('id', $id)->delete();

        if($result){
            session()->setFlashdata('message', 'Hapus Catatan Keuangan Berhasil');
        }else{
            session()->setFlashdata('error', 'Hapus Catatan Keuangan Tidak Berhasil');
        }

        return redirect()->to('keuangan');
    }
}
