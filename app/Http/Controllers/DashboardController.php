<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index(){
        $jurusan = Jurusan::all();
        $siswa = Siswa::all();
        $tpm = Siswa::where('jurusan_id', 1)->count();
        $tkr = Siswa::where('jurusan_id', 2)->count();
        $listrik = Siswa::where('jurusan_id', 3)->count();
        $rpl = Siswa::where('jurusan_id', 4)->count();
        return view('dashboard.index', compact('jurusan', 'siswa', 'tpm', 'tkr', 'rpl', 'listrik'));
    }
}
