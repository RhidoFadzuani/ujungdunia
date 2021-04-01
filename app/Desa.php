<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'desa';
    protected $primaryKey = 'kode';
    

    public function desa()
    {   
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }
}
