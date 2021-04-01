<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table ='tanggapan';
    protected $primaryKey ='id_tanggapan';
    protected $fillable = [
        'id_pengaduan',
        'tgl_tanggapan',
        'tanggapan',
        'id_petugas',
    ];

    protected $dates = [
        'tgl_pengaduan',
        'tgl_kejadian',
    ];


    public function tugas()
    {
        return $this->hasOne('App\petugas', 'id_petugas', 'id_petugas');
    }

    public function tanggapan()
    {
        return $this->hasOne('App\petugas', 'id_petugas', 'id_petugas');
    }
}