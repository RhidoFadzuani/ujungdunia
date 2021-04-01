@extends('layouts.admin')

@section('title', 'Halaman Laporan')

@section('header', 'Laporan Pengaduan')

@section('css')
<style>
    .card-body { 
        display: flex;
    }
    .cari { 
        display: flex;
    }
    .cari button { 
        height: 38px;
    }
    .tgl_awal{
        margin-right: 10px;
    }
    .tgl_akhir{
        margin-right: 10px;
    }

    .btn-danger{
        height: 38px;
        margin-left: 6px;
    }
    
</style>
@endsection

@section('content')



              <form action="{{ route('getLaporan') }}" method="POST">
            @csrf
            <div class="cari">
            <div class="form-group tgl_awal">
                    <input type="text" name="from" class="form-control" placeholder="Tanggal Awal"
                        onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                </div>

                <div class="form-group tgl_akhir">
                    <input type="text" name="to" class="form-control" placeholder="Tanggal Akhir"
                        onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                </div>
                <button type="submit" class="btn btn-primary" >Cari Laporan</button>
                @if ($pengaduan ?? '')
                            <a href="{{ route('laporan.cetakLaporan', ['from' => $from, 'to' => $to]) }}" class="btn btn-danger">EXPORT PDF</a>
                @endif
            </div>
            </form>
    


<div class="card">
    <div class="card-header">
        Data Berdasarkan Tanggal
    </div>
    <div class="card-body">
        @if ($pengaduan ?? '')
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pengaduan</th>
                    <th>tanggal kejadian</th>
                    <th>judul laporan</th>
                    <th>Isi Laporan</th>
                    <th>Status</th>
                    <th>tanggapan</th>
                    <th>nama petugas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengaduan as $k => $v)
                <tr>
                    <td>{{ $k += 1 }}</td>
                    <td>{{ $v->tgl_pengaduan }}</td>
                    <td>{{ $v->tgl_kejadian->format('d-M-Y') }}</td>
                    <td>{{ $v->judul_laporan }}</td>
                    <td>{{ $v->isi_laporan }}</td>
                    <td>
                        @if ($v->status == '0')
                        <a href="" class="badge badge-danger">Pending</a>
                        @elseif($v->status == 'proses')
                        <a href="" class="badge badge-warning text-white">Proses</a>
                        @else
                        <a href="" class="badge badge-success">Selesai</a>
                        @endif
                    </td>
                    <td>{{ $v->tanggapan->tanggapan ?? ''}}</td>
                    <td>{{ $v->tanggapan->tugas->nama_petugas ?? ''}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="text-center">
            Tidak ada data
        </div>
        @endif


    </div>
</div>
@endsection