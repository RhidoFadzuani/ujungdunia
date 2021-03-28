<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Authenticatable
{
    protected $table = 'masyarakat';
    protected $primaryKey = 'nik';
    protected $fillable = ['nik', 'nama', 'username', 'password', 'telp'];

    
}