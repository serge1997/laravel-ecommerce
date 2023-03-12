<?php

namespace App\Http\Livewire;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class Produtocomponent extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.produtocomponent',[
            'produtos' => Produto::paginate(4),
            //'show' => Produto::findOrfail($id)
        ]);
    }
}
