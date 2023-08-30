<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;
    protected $table = 'cidade';
    protected $fillable = ['Nome', 'estado_id'      
     ];

     public function Obras_equipamento()
     {
         return $this->hasMany(Obras_equipamento::class, 'Cidade_id');
     }
 
}
