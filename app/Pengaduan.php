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
        'tanggapan'
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
        return $this->hasOne('App\Kecamatan', 'id', 'kecamatan');
    
    }

    public function des()
    {
        return $this->hasOne('App\Desa', 'id_desa', 'desa');
    
    }

    public function tanggapan()
    {   
        return $this->hasOne('App\Tanggapan', 'id_pengaduan', 'id_pengaduan', 'nama_petugas');
    
    }
    public function petugas()
    {   
        return $this->hasOne('App\Petugas', 'id_petugas', 'nama_petugas');
    
    }
}

