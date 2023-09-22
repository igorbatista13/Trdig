<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfil';
    protected $fillable = [
        'user_id', 'Sobre_mim', 'Orgao', 'Cargo', 'Endereco',
        'Cidade', 'Estado', 'CEP', 'Telefone', 'Facebook',
        'Instagram', 'Linkedin', 'Site', 'image', 'Tipo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
