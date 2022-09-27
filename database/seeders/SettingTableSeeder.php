<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
            'nama_sekolah' => 'SMK Antartika 1 Sidoarjo',
            'alamat' => 'Jl. Siwalanpanji, Buduran',
            'telepon' => '031-8962851',
            'embed_lokasi' => 'lat-long',
            'jam_operasional' => '07.00 - 16.00'
        ]);
    }
}
