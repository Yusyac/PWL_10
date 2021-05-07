<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliah';

    protected $fillable = [
        'id',
        'Nama_Matkul',
        'SKS',
        'Jam',
        'Semester'
    ];
    
    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class, 'mahasiswa_matakuliah', 'Matakuliah_Id', 'Mahasiswa_Nim')->withPivot('Nilai');
    }
}
