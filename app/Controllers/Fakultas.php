<?php

namespace App\Controllers;
use App\Models\ModelFakultas;

class Fakultas extends BaseController
{   
    public function __construct()
    {
        helper('form');
        $this->ModelFakultas = new ModelFakultas();
    }


    public function index()
    {
        $data = [
            'title'     => 'Fakultas',
            'fakultas'  => $this->ModelFakultas->allData(),
            'isi'       => 'admin/fakultas/v_fakultas'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'fakultas' => $this->request->getPost('fakultas'),
        ];
        $this->ModelFakultas->add($data);
        session()->getFlashdata('success', 'Data berhasil di tambahkan');
        return redirect()->to(base_url('Fakultas'));
    }

    public function edit($id_fakultas)
    {
        $data = [
            'id_fakultas' => $id_fakultas,
            'fakultas' => $this->request->getPost('fakultas'),
        ];
        $this->ModelFakultas->edit($data);
        session()->getFlashdata('warning', 'Data berhasil di update');
        return redirect()->to(base_url('Fakultas'));
    }
    
    public function delete($id_fakultas)
    {
        $data = [
            'id_fakultas' => $id_fakultas,
        ];
        $this->ModelFakultas->delete_data($data);
        session()->getFlashdata('danger', 'Data berhasil di delete');
        return redirect()->to(base_url('Fakultas'));
    }


    
}
