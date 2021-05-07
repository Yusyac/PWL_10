<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail; 
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable; 
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    public $timestamps = 'false';
    protected $primaryKey = 'Nim';

    /** * The attributes that are mass assignable.
    * 
    * @var array 
    */ 
    protected $fillable = [ 'Nim', 'Nama','Tanggal_Lahir', 'Kelas', 'Jurusan','Email', 'No_Handphone', ];

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'Kelas_ID', 'id');
    }

    public function matakuliah()
    {
        return $this->belongsToMany(MataKuliah::class, 'mahasiswa_matakuliah', 'Mahasiswa_Nim', 'MataKuliah_id')->withPivot('Nilai');
    }
}
