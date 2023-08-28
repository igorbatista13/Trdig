<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resp_instituicao extends Model
{
    protected $fillable = [ 
    'n_processo_id',
    'Nome_Resp_Instituicao', 'Nome_Resp_Instituicao_sit', 'Nome_Resp_Instituicao_obs',
    'Telefone_Resp_Instituicao',    'Telefone_Resp_Instituicao_sit',    'Telefone_Resp_Instituicao_obs',
    'Email_Resp_Instituicao',    'Email_Resp_Instituicao_sit',    'Email_Resp_Instituicao_obs',
    'Cargo_Resp_Instituicao',    'Cargo_Resp_Instituicao_sit',     'Cargo_Resp_Instituicao_obs',
    'Cidade_Resp_Instituicao',    'Cidade_Resp_Instituicao_sit',     'Cidade_Resp_Instituicao_obs',
    'Estado_Resp_Instituicao',    'Estado_Resp_Instituicao_sit',     'Estado_Resp_Instituicao_obs',
    'Cep_Resp_Instituicao',    'Cep_Resp_Instituicao_sit',     'Cep_Resp_Instituicao_obs',


    'End_Resp_Instituicao',    'End_Resp_Instituicao_sit',     'End_Resp_Instituicao_obs',
    'Anexo1_Resp_Instituicao',    'Anexo1_Resp_Instituicao_sit',    'Anexo1_Resp_Instituicao_obs',
    'Anexo2_Resp_Instituicao',    'Anexo2_Resp_Instituicao_sit',    'Anexo2_Cargo_Resp_Instituicao_obs',
];
 
    protected $table = 'resp_instituicao';

    public function n_processo()
    {
        return $this->belongsTo(N_Processo::class, 'n_processo_id');
    }

}
