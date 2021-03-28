<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use App\Tanggapan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PengaduanController extends Controller
{
    

    public function storePengaduan(Request $request)
    {
        // // Pengecekan jika tidak ada masyarakat yang sedang login
        if (!Auth::guard('user')->user()) {
            return redirect()->back()->with(['pesan' => 'Login dibutuhkan!'])->withInput();
        }

        // Masukkan semua data yg dikirim ke variable $data 
        $data = $request->all();

        // Buat variable $validate kemudian isinya Validator::make(datanya, [nama_field => peraturannya])
        $validate = Validator::make($data, [
            'judul_laporan' => ['required'],
            'isi_laporan' => ['required'],
            'tgl_kejadian' => ['required'],
            'kecamatan' => ['required'],
            'desa' => ['required'],
           
            
        ]);

        // Pengecekan jika validate fails atau gagal
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        // // Pengecekan jika ada file foto yang dikirim
        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('public');
        }

        // Set timezone waktu ke Asia/Bangkok
        date_default_timezone_set('Asia/Bangkok');

        // Membuat variable $pengaduan isinya Memasukkan data kedalam table Pengaduan
        $pengaduan = pengaduan::create([
            'tgl_pengaduan' => date('Y-m-d h:i:s'),
            'tgl_kejadian' => $data['tgl_kejadian'],
            'nik' => Auth::guard('user')->user()->nik,
            'judul_laporan' => $data['judul_laporan'],
            'isi_laporan' => $data['isi_laporan'],
            'kecamatan' => $data['kecamatan'],
            'desa' => $data['desa'],
            'foto' => $data['foto'] ?? '',
            'status' => '0',
        ]);

        // Pengecekan variable $pengaduan
        if ($pengaduan) {
            // Jika mengirim pengaduan berhasil
            return redirect()->route('home1')->with(['pengaduan' => 'Berhasil terkirim!', 'type' => 'success']);
        } else {
            // Jika mengirim pengaduan gagal
            return redirect()->back()->with(['pengaduan' => 'Gagal terkirim!', 'type' => 'danger']);
        }
    }
    public function index()
    {
        $pengaduan = pengaduan::orderBy('tgl_pengaduan', 'desc')->get();

        return view('admin.pengaduan.index', ['pengaduan' => $pengaduan]);
    }

    public function show($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->first();

        $tanggapan = Tanggapan::where('id_pengaduan', $id_pengaduan)->first();

        


        return view('admin.pengaduan.tanggapan', ['pengaduan' => $pengaduan, 'tanggapan' => $tanggapan]);
    }

}
