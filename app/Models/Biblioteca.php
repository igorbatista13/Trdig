<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    use HasFactory;
    protected $table = 'biblioteca';
    protected $fillable = ['Nome', 'Descricao','Status','Anexo','Link', 'Tipo', 
     ];}
