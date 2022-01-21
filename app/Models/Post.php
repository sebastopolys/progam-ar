<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory,Notifiable;


    protected $fillable = [
        'type',
        'titulo',
        'slug',
        'descripcion',     
        'contenido',
        'auth_id',
        'img_route',
        'tags',
        'estado'
      
    ];
 

    

}