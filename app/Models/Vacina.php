<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_vacina',
        'data_aplicacao'
    ];

    public $timestamps = false;

    public function lote()
    {
        return $this->belongsTo(Lote::class, 'lote_id');
    }
}
