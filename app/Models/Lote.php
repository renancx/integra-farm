<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    protected $fillable = [
        'tamanho_lote',
        'chegada_lote',
        'saida_lote',
        'observacao_lote',
    ];

    public function vacinas()
    {
        return $this->hasMany(Vacina::class, 'lote_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
