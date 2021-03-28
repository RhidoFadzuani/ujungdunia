<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';

    protected $primaryKey ='id_pengaduan';

    protected $fillable = [
        'judul_laporan',
        'tgl_pengaduan',
        'tgl_kejadian',
        'nik',
        'isi_laporan',
        'kecamatan',
        'desa',
        'foto',
        'status',
    ];

    protected $dates = [
        'tgl_pengaduan',
        'tgl_kejadian',
    ];

    public function user()
    {
        return $this->hasOne('App\Masyarakat', 'nik', 'nik');
    
    }
   
    public function kec()
    {
        return $this->hasOne('App\Kecamatan', 'kode', 'kecamatan');
    
    }

    public function des()
    {
        return $this->hasOne('App\Desa', 'kode_desa', 'desa');
    
    }

    public function tanggapan()
    {   
        return $this->hasOne('App\Tanggapan', 'id_petugas', 'id_petugas');
    
    }
}

