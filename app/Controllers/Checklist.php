<?php

namespace App\Controllers;

use App\Models\ChecklistModel;
use App\Models\ChecklistItemModel;
use App\Models\ChecklistDetailModel;
use App\Models\ToiletModel;

class Checklist extends BaseController
{
    
    public function mulai($id)
    {
        $toiletModel = new ToiletModel();
        $itemModel = new ChecklistItemModel();
    
        $toilet = $toiletModel->find($id);
        if (!$toilet) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Toilet tidak ditemukan.');
        }
    
        $items = $itemModel->findAll();
    
        return view('checklist/form', [
            'toilet' => $toilet,
            'checklist_items' => array_column($items, 'item') // hasilkan array ['Bersihkan toilet', ...]
        ]);
    }
    

    public function simpan($id)
    {
        $checklistModel = new ChecklistModel();
        $detailModel = new ChecklistDetailModel();

        $selectedItems = $this->request->getPost('checklist') ?? [];

        // Simpan checklist utama
        $checklistId = $checklistModel->insert([
            'toilet_id' => $id,
            'user_id' => 1, // sementara user_id = 1 (admin)
            'tanggal' => date('Y-m-d'),
            'status' => count($selectedItems) === 5 ? 'Sudah Dibersihkan' : 'Belum Dibersihkan'
        ]);

        // Simpan detail checklist
        $allItems = (new ChecklistItemModel())->findAll();
        foreach ($allItems as $item) {
            $checked = in_array($item['id'], $selectedItems) ? 1 : 0;
            $detailModel->insert([
                'checklist_id' => $checklistId,
                'item_id' => $item['id'],
                'checked' => $checked
            ]);
        }

        return redirect()->to('/dashboard')->with('success', 'Checklist berhasil disimpan.');
    }
}