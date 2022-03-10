<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class respuestas extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'rut';
    protected $fillable =['rut','nombre','gender','address','city'];

    protected $casts = [
        'rut' => 'string',
  ];
}
