<?php

namespace App\Http\Controllers;
use App\Pengaduan;
use App\Masyarakat;
use App\Petugas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $petugas = petugas::all()->count();

        $masyarakat = masyarakat::all()->count();

        $proses = pengaduan::where('status', 'proses')->get()->count();

        $selesai = pengaduan::where('status', 'selesai')->get()->count();

        $pengaduan = pengaduan::all()->count();

        return view('Admin.Dashboard', ['petugas' => $petugas, 'masyarakat' => $masyarakat, 'proses' => $proses, 'selesai' => $selesai, 'pengaduan' => $pengaduan]);
    }

    public function LogoutAdmin()
    {
        Auth::guard('admin')->logout();
            return view('petugas.loginpetugas');
    }
}

