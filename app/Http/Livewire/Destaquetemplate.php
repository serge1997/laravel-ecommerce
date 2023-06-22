<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produto;
use Livewire\WithPagination;

class Destaquetemplate extends Component
{
    use WithPagination;

    public function render()
    {
        

        return view('livewire.destaquetemplate', [
            'destaques' => Produto::WHERE("destaque", true)->limit(2)->get(),
        ]);
    } 
    
}
