<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Petugas::Create([
            'nama_petugas' => 'ali',
            'username' => 'ali',
            'password' => Hash::make('password'),
            'telp' => '081214289789',
            'level' => 'admin',

        ]);
    }
}
