<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // DB
        $jumlahMahasiswa = DB::select('SELECT p.nama, count(*) as jumlah
        from laravel.mahasiswas m
        join laravel.prodis p
        on m.prodi_id =p.id
        group by p.nama_prodi');
        return view('dashboard.index', compact('jumlahMahasiswa'));
    }
}
