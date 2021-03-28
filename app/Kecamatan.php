<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $primaryKey = 'kode';

    public function desa()
    {   
        return $this->hasOne('App\Desa', 'Kode', 'Desa');
    
    }
}
