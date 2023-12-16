<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'idkategori';
    protected $fillable = [
        'kategori',
    ];
    public $timestamps = false;
    public function berita()
    {
        return $this->hasMany(Berita::class, 'idkategori');
    }
}
