<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\jurusan;

class JurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Jurusan::create(['nama' => "Teknik Pemesinan"]);
       Jurusan::create(['nama' => "Teknik Kendaraan Ringan"]);
       Jurusan::create(['nama' => "Teknik Listrik"]);
       Jurusan::create(['nama' => "Rekayasa Perangkat Lunak"]);
    }
}
