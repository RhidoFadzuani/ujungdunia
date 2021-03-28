<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masyarakat;
use App\Pengaduan;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakat = masyarakat::all();

        return view('admin.masyarakat.masyarakat', ['masyarakat' => $masyarakat]);
    }

    public function show($nik)
    {
        $masyarakat = masyarakat::where('nik', $nik)->first();

        return view('admin.masyarakat.show', ['masyarakat' => $masyarakat]);
    }

    public function destroy(Masyarakat $masyarakat)
    {
        $pengaduan = pengaduan::where('nik', $masyarakat->nik)->first();

        if (!$pengaduan) {
            $masyarakat->delete();

            return redirect()->route('masyarakat.index');
        } else {
            return redirect()->back()->with(['notif' => 'Can\'t delete. Masyarakat has a relationship!']);
        }
    }

    public function profil(){
        
    }
}
