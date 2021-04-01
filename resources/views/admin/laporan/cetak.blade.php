<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Laporan Pengaduan</title>
    <style>
        body{
            background-color: #fff;
        }

        .text-center{
            font-size: 40px;
            align-content: center;
            text-align: center;
            font-family: 'Open Sans bold', sans-serif;
        }
        p{
            margin-top: 2px;
            margin-bottom: 2px:
        }

       </style>
</head>
<body>
    <div class="text-center">
        <p>Laporan Warga Subang</p>
        <p>LAWAS</p>
    </div>
    <div class="container">
        <div class="table-responsive">
        <table class="table table-bordered">
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
                        <p>Pending</p>
                        @elseif($v->status == 'proses')
                        <p>Proses</p>
                        @else
                        <p>Selesai</p>
                        @endif
                    </td>
                    <td>{{ $v->tanggapan->tanggapan ?? ''}}</td>
                    <td>{{ $v->tanggapan->tugas->nama_petugas ?? ''}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>