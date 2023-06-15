<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Mapel extends BaseController
{
    public function index()
    {
        $data = [
            'Mapel' => $this->Mapel->findAll()
        ];
        return view("mapel/index", $data);
    }
    
    public function insert(){
        if(!$this->validate([
            'mapel' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'mapel' => $this->request->getPost('mapel'),
        ];


        $result = $this->Mapel->save($request);

        if($result){
            session()->setFlashdata('message', 'Tambah Data Mapel Berhasil');
        }else{
            session()->setFlashdata('error', 'Tambah Data Mapel Tidak Berhasil');
        }

        return redirect()->to('mapel');
    }

    public function update(){
        if(!$this->validate([
            'mapel' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'id' => $this->request->getPost('id'),
            'mapel' => $this->request->getPost('mapel'),
        ];

        $result = $this->Mapel->save($request);

        if($result){
            session()->setFlashdata('message', 'Edit Data Mapel Berhasil');
        }else{
            session()->setFlashdata('error', 'Edit Data Mapel Tidak Berhasil');
        }

        return redirect()->to('mapel');
    }

    public function delete($id = null){
        $result = $this->Mapel->where('id', $id)->delete();

        if($result){
            session()->setFlashdata('message', 'Hapus Data Mapel Berhasil');
        }else{
            session()->setFlashdata('error', 'Hapus Data Mapel Tidak Berhasil');
        }

        return redirect()->to('mapel');
    }
}
