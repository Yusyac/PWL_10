<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Mahasiswa;

class MataKuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliah'; //mendefinisikan model terkait dengan tabel matakuliah

    protected $fillable = [
        'nama_matkul',
        'sks',
        'jam',
        'semseter'
    ];

    public function mahasiswa(){
        return $this->belongsToMany(Mahasiswa::class, 'mahasiswa_matakuliah', 'mahasiswa_id', 'matakuliah_id')->withPivot('nilai');
    }
}
