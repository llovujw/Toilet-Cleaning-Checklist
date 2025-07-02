<?php

namespace App\Controllers;

use App\Models\ChecklistModel;
use App\Models\ToiletModel;
use CodeIgniter\Controller;

class Riwayat extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();

        // Ambil checklist terbaru per toilet
        $query = $db->query("
            SELECT 
                t.lantai,
                t.nama_toilet,
                MAX(c.tanggal) AS tanggal_terakhir
            FROM toilets t
            LEFT JOIN checklists c ON t.id = c.toilet_id AND c.status = 'Sudah Dibersihkan'
            GROUP BY t.id
            ORDER BY tanggal_terakhir DESC
        ");

        $riwayat = $query->getResultArray();

        return view('riwayat/index', ['riwayat' => $riwayat]);
    }
}