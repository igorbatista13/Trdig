<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anexo_sigcon extends Model
{
    use HasFactory;
    protected $fillable = [
        'n_processo_id',
        'anexo1','anexo2','anexo3','anexo4','anexo5','anexo6','anexo7','anexo8'
    ];
    public $timestamps = true;

    protected $table = 'anexo_sigcon';
  //  protected $primaryKey = 'id'; // Defina o nome da chave primária, caso não siga o padrão 'id'

    public function n_processo()
    {
        return $this->belongsTo(N_Processo::class, 'n_processo_id');
    }
}
