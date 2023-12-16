<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $primaryKey = 'idberita';

    protected $fillable = ['idkategori', 'judul', 'deskripsi', 'tanggal', 'foto'];
    public $timestamps = false;
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'idkategori');
    }
}
