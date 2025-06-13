<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\informasi;
use App\Models\kategoriinformasi;
use App\Models\siswa;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{

    public function index()
    {
        $informasiTerkini = Informasi::with('operator')
            ->latest()
            ->take(3)
            ->get();

        return view('Panel.dashboard', [
            'totalSiswa' => siswa::count(),
            'totalGuru' => guru::count(),
            'totalInformasi' => informasi::count(),
            'totalKategori' => kategoriinformasi::count(),
            'informasiTerkini' => $informasiTerkini,
        ]);
    }
}
