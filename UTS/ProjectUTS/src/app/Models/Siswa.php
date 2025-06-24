<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi
    protected $fillable = [
        'nisn',
        'nama',
        'kelas',
        'jurusan',
        'alamat',
        'no_hp',
        'status',
    ];

    // Relasi ke tabel nilai (One to Many)
    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }

    // Relasi ke tabel absensi (One to Many)
    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
