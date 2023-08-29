<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orgaos extends Model

{
    use HasFactory;
    protected $table = 'orgaos';
    protected $fillable = [
        'Nome', 'Sigla','image','Endereco','Cep','Mapa_Google',
        'Email','Horario_funcionamento','Site','Outras_info','cidade_id'
     ];

     public function n_processo()
    {
        return $this->belongsTo(N_Processo::class, 'n_processo_id');
    }
    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'id');
    }
      
    }
