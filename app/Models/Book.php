<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'categoria',
        'autor',
        'sipnosis',
        'precio',
        'portada',
        'editorial',
        'estado',
        'status'
    ];
}
