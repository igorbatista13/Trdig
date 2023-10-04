<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc_prefeitura extends Model
{
 // use HasFactory;
 protected $table = 'doc_prefeitura';
    
 protected $fillable = ['n_processo_id',
   'Oficios_proposta','Oficios_proposta_sit','Oficios_proposta_obs',
   'Oficio_emenda', 'Oficio_emenda_sit','Oficio_emenda_obs',
   'Delcaracao_contrapartida', 'Delcaracao_contrapartida_sit','Delcaracao_contrapartida_obs',
   'Comprovante_abertura_conta', 'Comprovante_abertura_conta_sit','Comprovante_abertura_conta_obs',
   'Comprovante_qualif_tecnica', 'Comprovante_qualif_tecnica_sit','Comprovante_qualif_tecnica_obs',
   'Diploma_nomeacao', 'Diploma_nomeacao_sit','Diploma_nomeacao_obs',
   'Ata_eleicao', 'Ata_eleicao_sit','Ata_eleicao_obs',
   'Doc_posse', 'Doc_posse_sit','Doc_posse_obs',

     
 ];

 
 public function n_processo()
 {
     return $this->belongsTo(N_Processo::class, 'n_processo_id');
 }

}
