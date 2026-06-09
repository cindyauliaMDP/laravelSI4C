<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $grafikmhs = DB::select("SELECT prodis.nama_prodi, 
                                COUNT(*) as jumlah_mhs 
                                FROM mahasiswas
                                JOIN prodis 
                                ON mahasiswas.prodi_id = prodis.id
                                GROUP BY prodis.nama_prodi");

        $angkatanData = DB::select("SELECT left(npm,2) as angkatan, COUNT(*) as total 
                                FROM mahasiswas
                                GROUP BY left(npm,2)");

        return view('dashboard-adminlte', ['grafikmhs' => $grafikmhs, 'angkatanData' => $angkatanData]);
    }
}