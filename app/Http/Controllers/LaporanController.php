<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaduan;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('Admin.Laporan.laporan');
    }

    public function getLaporan(Request $request)
    {
        $from = $request->from . ' ' . '00:00:00';
        $to = $request->to . ' ' . '23:59:59';

        $pengaduan = pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();

        return view('Admin.laporan.laporan', ['pengaduan' => $pengaduan, 'from' => $from, 'to' => $to]);
    }

    public function cetakLaporan($from, $to)
    {
        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();

        // return view('admin.laporan.cetak',['pengaduan' => $pengaduan]);
        $pdf = PDF::loadView('admin.laporan.cetak', ['pengaduan' => $pengaduan]);
        return $pdf->download('laporan-pengaduan.pdf');
    }
}
