<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $primaryKey   = 'id';
    protected $table        = 'produtos';
    protected $fillable     = [
        'nome',
        'quantidade',
        'valor',
        'descricao'
    ];
}
