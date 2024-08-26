<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    // Defina a tabela associada ao modelo, se não seguir a convenção padrão
    protected $table = 'participantes';

    // Adicione os campos que são permitidos para mass assignment
    protected $fillable = [
        'nome',
        'email',
    ];
}
