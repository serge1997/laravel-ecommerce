<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Produto extends Model
{
    use HasFactory;

    protected $table = "produtos";
    protected $fillable = [
        'nome',
        'valor',
        'valorpromo',
        'descricao',
        'destaque',
        'foto',
        'categoria_id'
    ];

    public $timestamps = true;

    public function Rcategoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
