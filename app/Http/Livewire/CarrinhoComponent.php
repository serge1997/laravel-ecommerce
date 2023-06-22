<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CarrinhoComponent extends Component
{

    public $qtdy;
    public $valor = 200;
    public $name = "Serge Gogo";
    
    public function render()
    {

        //$this->valor = $this->valor * $this->qtdy;

        return view('livewire.carrinho-component');
    }
}
