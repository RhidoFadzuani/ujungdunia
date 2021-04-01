<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $primaryKey = 'id';

    public function desa()
    {   
        return $this->hasMany(Desa::class, 'id_kecamatan');
    }
}
