<?php

namespace App\Controllers;
use App\Models\ToiletModel;

class Toilet extends BaseController
{
    public function tambah()
    {
        return view('toilet/tambah');
    }

    public function simpan()
    {
        $lantai = $this->request->getPost('lantai');
        $namaToilet = $this->request->getPost('nama_toilet');

        if ($lantai && $namaToilet) {
            $model = new ToiletModel();
            $model->insert([
                'lantai' => $lantai,
                'nama_toilet' => $namaToilet
            ]);
            return redirect()->to('/dashboard')->with('success', 'Toilet berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Semua kolom wajib diisi.');
        }
    }
}
