<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';
    protected $fillable = ['categoria', 'descricao','image'];
    public $timestamps = true;

    public function Rproduto()
    {
        return $this->hasMany(Produto::class);
    }
}
