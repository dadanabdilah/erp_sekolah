<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TahunAkademik extends BaseController
{
    public function index()
    {
        $data = [
            'TahunAkademik' => $this->TahunAkademik->findAll()
        ];
        return view("tahun-akademik/index", $data);
    }
    
    public function insert(){
        if(!$this->validate([
            'tahun' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'tahun' => $this->request->getPost('tahun'),
        ];


        $result = $this->TahunAkademik->save($request);

        if($result){
            session()->setFlashdata('message', 'Tambah Tahun Akademik Berhasil');
        }else{
            session()->setFlashdata('error', 'Tambah Tahun Akademik Tidak Berhasil');
        }

        return redirect()->to('tahunakademik');
    }

    public function update(){
        if(!$this->validate([
            'tahun' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'id' => $this->request->getPost('id'),
            'tahun' => $this->request->getPost('tahun'),
        ];

        $result = $this->TahunAkademik->save($request);

        if($result){
            session()->setFlashdata('message', 'Edit Tahun Akademik Berhasil');
        }else{
            session()->setFlashdata('error', 'Edit Tahun Akademik Tidak Berhasil');
        }

        return redirect()->to('tahunakademik');
    }

    public function delete($id = null){
        $result = $this->TahunAkademik->where('id', $id)->delete();

        if($result){
            session()->setFlashdata('message', 'Hapus Tahun Akademik Berhasil');
        }else{
            session()->setFlashdata('error', 'Hapus Tahun Akademik Tidak Berhasil');
        }

        return redirect()->to('tahunakademik');
    }
}
