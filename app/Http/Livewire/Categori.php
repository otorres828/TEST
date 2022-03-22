<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Categori extends Component
{
    public $selectedClass=null;

    public function render()
    {
        
        $categories = Category::all();

        return view('livewire.categori',compact('categories'));
    }
}
