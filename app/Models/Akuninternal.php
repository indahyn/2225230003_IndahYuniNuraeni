<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akuninternal extends Model
{
    use HasFactory;
    protected $table = 'akuninternal';
    protected $primaryKey = 'idakuninternal';
    protected $fillable = ['nama', 'email', 'password', 'level'];
    public $timestamps = false;
}
