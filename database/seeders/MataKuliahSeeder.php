<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matkul = [
            ['Nama_Matkul' => 'Pemograman Berbasis Objek',
             'SKS' => 3,
             'Jam' => 6,
             'Semester' => 4,],
             ['Nama_Matkul' => 'Pemograman Web Lanjut',
             'SKS' => 3,
             'Jam' => 6,
             'Semester' => 4,],
             ['Nama_Matkul' => 'Basis Data Lanjut',
             'SKS' => 3,
             'Jam' => 6,
             'Semester' => 4,],
             ['Nama_Matkul' => 'Praktikum Basis Data Lanjut',
             'SKS' => 3,
             'Jam' => 6,
             'Semester' => 4,],
        ];

        DB::table('matakuliah')->insert($matkul);
    }
}
