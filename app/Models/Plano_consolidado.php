<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plano_consolidado extends Model
{
    protected $table = 'plano_consolidado';
    
    protected $fillable = ['n_processo_id','metas_id',
     'Natureza', 'OutrosNatureza', 'Discriminacao','Discriminacao_outros',
     'Complemento', 'Valor_concedente', 'Valor_proponente_financeira',
     'Valor_proponente_nao_financeira', 'plano_consolidado_sit','plano_consolidado_obs'

        
    ];
    public function n_processo()
    {
        return $this->belongsTo(N_Processo::class, 'n_processo_id');
    }

    public function Metas() {
        return $this->belongsTo(Metas::class);
      }
    public function Plano_detalhado() {
        return $this->hasOne(Plano_detalhado::class, 'Natureza_id');
      }
    
}

