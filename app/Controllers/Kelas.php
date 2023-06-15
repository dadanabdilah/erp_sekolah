<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kelas extends BaseController
{
    public function index()
    {
        $data = [
            'Kelas' => $this->Kelas->findAll()
        ];
        return view("kelas/index", $data);
    }
    
    public function insert(){
        if(!$this->validate([
            'kelas' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'kelas' => $this->request->getPost('kelas'),
        ];


        $result = $this->Kelas->save($request);

        if($result){
            session()->setFlashdata('message', 'Tambah Data Kelas Berhasil');
        }else{
            session()->setFlashdata('error', 'Tambah Data Kelas Tidak Berhasil');
        }

        return redirect()->to('kelas');
    }

    public function update(){
        if(!$this->validate([
            'kelas' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'id' => $this->request->getPost('id'),
            'kelas' => $this->request->getPost('kelas'),
        ];

        $result = $this->Kelas->save($request);

        if($result){
            session()->setFlashdata('message', 'Edit Data Kelas Berhasil');
        }else{
            session()->setFlashdata('error', 'Edit Data Kelas Tidak Berhasil');
        }

        return redirect()->to('kelas');
    }

    public function delete($id = null){
        $result = $this->Kelas->where('id', $id)->delete();

        if($result){
            session()->setFlashdata('message', 'Hapus Data Kelas Berhasil');
        }else{
            session()->setFlashdata('error', 'Hapus Data Kelas Tidak Berhasil');
        }

        return redirect()->to('kelas');
    }
}
