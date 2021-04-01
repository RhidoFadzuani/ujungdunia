<?php

namespace App\Http\Controllers;

use App\Masyarakat;
use App\Pengaduan;
use App\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
   

    public function editprofil(){
        return view('user.editprofil');
    }

    public function updateProfile(Request $request, $nik)
    {
        $data = $request->all();

        $masyarakat = Masyarakat::find($nik);

        $masyarakat->update([
            'nama' => $data['nama'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
        ]);

        return redirect()->route('user.profil');
    }
    public function profil($siapa = '')
    {
        // Membuat variable $terverifikasi isinya menghitung pengaduan status pending
        $terverifikasi = Pengaduan::where([['nik', Auth::guard('user')->user()->nik], ['status', '!=', '0']])->get()->count();
        // Membuat variable $terverifikasi isinya menghitung pengaduan status proses
        $proses = Pengaduan::where([['nik', Auth::guard('user')->user()->nik], ['status', 'proses']])->get()->count();
        // Membuat variable $terverifikasi isinya menghitung pengaduan status selesai
        $selesai = Pengaduan::where([['nik', Auth::guard('user')->user()->nik], ['status', 'selesai']])->get()->count();

        // Masukkan 3 variable diatas ke dalam variable array $hitung
        $hitung = [$terverifikasi, $proses, $selesai];

                // Pengecekan jika ada parameter $siapa yang dikirimkan di url
        if ($siapa == 'me') {
            // Jika $siapa isinya 'me'
            $pengaduan = Pengaduan::where('nik', Auth::guard('user')->user()->nik)->orderBy('tgl_pengaduan', 'desc')->get();

            // Arahkan ke file user/laporan.blade.php sebari kirim data pengaduan, hitung, siapa
            return view('user.', ['pengaduan' => $pengaduan, 'hitung' => $hitung, 'siapa' => $siapa]);
        } else {
            // Jika $siapa kosong
            $pengaduan = Pengaduan::where('nik', Auth::guard('user')->user()->nik)->orderBy('tgl_pengaduan', 'desc')->get();

            // Arahkan ke file user/laporan.blade.php sebari kirim data pengaduan, hitung, siapa
            return view('user.profil', ['pengaduan' => $pengaduan, 'hitung' => $hitung, 'siapa' => $siapa]);
        }
    }
}
