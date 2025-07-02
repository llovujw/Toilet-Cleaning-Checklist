<?php

namespace App\Controllers;

use App\Models\ToiletModel;
use App\Models\ChecklistModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        
        $toiletModel = new ToiletModel();
        $checklistModel = new ChecklistModel();

        $lantaiToilets = $toiletModel->select('lantai, COUNT(*) as jumlah')
            ->groupBy('lantai')
            ->orderBy('lantai', 'ASC')
            ->findAll();

        $tanggal = date('Y-m-d');
        $sudah = $checklistModel->where('tanggal', $tanggal)
                                ->where('status', 'Sudah Dibersihkan')
                                ->countAllResults();

        $belum = $checklistModel->where('tanggal', $tanggal)
                                ->where('status', 'Belum Dibersihkan')
                                ->countAllResults();

        $totalHariIni = $sudah + $belum;

        return view('dashboard/index', [
            'lantaiToilets' => $lantaiToilets,
            'sudah'         => $sudah,
            'belum'         => $belum,
            'total'         => $totalHariIni
        ]);
    }
}