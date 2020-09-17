<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $products = [];
    public $query = '';

    public function render()
    {
        if($this->query){
            $this->products = Product::where('keywords', 'like', "%$this->query%")->with('images.image')->limit(6)->get();
        }
        return view('livewire.search');
    }

    public function clear(){
        $this->query = '';
        $this->products = [];
    }

}
