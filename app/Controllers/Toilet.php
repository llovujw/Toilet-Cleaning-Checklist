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

    public function listByLantai($lantai)
    {
        $model = new ToiletModel();
        $toilets = $model->where('lantai', $lantai)->findAll();

        return view('toilet/list', [
            'toilets' => $toilets,
            'lantai' => $lantai
        ]);
    }

    public function hapusLantai($lantai)
    {
        $model = new ToiletModel();
        $model->where('lantai', $lantai)->delete();

        return redirect()->to('/dashboard')->with('success', 'Semua toilet di lantai ' . $lantai . ' berhasil dihapus.');
    }

    public function edit($id)
    {
        $model = new ToiletModel();
        $toilet = $model->find($id);

        if (!$toilet) {
            return redirect()->to('/dashboard')->with('error', 'Toilet tidak ditemukan.');
        }

        return view('toilet/edit_form', ['toilet' => $toilet]);
    }

    public function update($id)
    {
        $model = new ToiletModel();

        $data = [
            'lantai' => $this->request->getPost('lantai'),
            'nama_toilet' => $this->request->getPost('nama_toilet')
        ];

        $model->update($id, $data);

        return redirect()->to('/dashboard')->with('success', 'Toilet berhasil diperbarui.');
    }

    public function delete($id)
    {
        $checklistModel = new \App\Models\ChecklistModel();
        $checklistDetailModel = new \App\Models\ChecklistDetailModel();
    
        $checklists = $checklistModel->where('toilet_id', $id)->findAll();
    
        foreach ($checklists as $checklist) {
            $checklistDetailModel->where('checklist_id', $checklist['id'])->delete();
  
            $checklistModel->delete($checklist['id']);
        }

        $model = new ToiletModel();
        $model->delete($id);
    
        return redirect()->to('/dashboard')->with('success', 'Toilet dan semua data terkait berhasil dihapus.');
    }      
}