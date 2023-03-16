<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensPedido extends Model
{
    use HasFactory;

    protected $table = 'itenspedidos';
    protected $fillable = [
        'pedido_id',
        'produto_id',
        'emissao',
        'quantidate',
        'valorUnitario'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
