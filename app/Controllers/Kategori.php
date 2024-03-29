<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kategori extends BaseController
{
    public function index()
    {
        $data = [
            'Kategori' => $this->Kategori->findAll()
        ];
        return view("kategori/index", $data);
    }
    
    public function insert(){
        if(!$this->validate([
            'kategori' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'kategori' => $this->request->getPost('kategori'),
        ];


        $result = $this->Kategori->save($request);

        if($result){
            session()->setFlashdata('message', 'Tambah Data Kategori Berhasil');
        }else{
            session()->setFlashdata('error', 'Tambah Data Kategori Tidak Berhasil');
        }

        return redirect()->to('kategori');
    }

    public function update(){
        if(!$this->validate([
            'kategori' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'id' => $this->request->getPost('id'),
            'kategori' => $this->request->getPost('kategori'),
        ];

        $result = $this->Kategori->save($request);

        if($result){
            session()->setFlashdata('message', 'Edit Data Kategori Berhasil');
        }else{
            session()->setFlashdata('error', 'Edit Data Kategori Tidak Berhasil');
        }

        return redirect()->to('kategori');
    }

    public function delete($id = null){
        $result = $this->Kategori->where('id', $id)->delete();

        if($result){
            session()->setFlashdata('message', 'Hapus Data Kategori Berhasil');
        }else{
            session()->setFlashdata('error', 'Hapus Data Kategori Tidak Berhasil');
        }

        return redirect()->to('kategori');
    }
}
