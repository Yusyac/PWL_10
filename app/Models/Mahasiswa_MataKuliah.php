<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;

class Mahasiswa_MataKuliah extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa_matakuliah'; //mendefinisikan model terkait dengan tabel matakuliah

    protected $fillable = [
        'mahasiswa_id',
        'matakuliah_id',
        'nilai'
    ];

}
