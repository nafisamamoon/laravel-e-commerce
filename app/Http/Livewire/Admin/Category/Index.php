<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
class Index extends Component
{
    public function render()
    {
        $categories=Category::all();

        return view('livewire.admin.category.index',['categories'=>$categories]);
    }
}
