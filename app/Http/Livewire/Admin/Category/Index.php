<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\File;
class Index extends Component
{
    
    public $category_id;
    public function render()
    {
        $categories=Category::all();

        return view('livewire.admin.category.index',['categories'=>$categories]);
    }
    public function deleteCategory($category_id){
       
$this->category_id=$category_id;
    }
    public function destroyCategory(){
$category=Category::find($this->category_id);
$path='uploads/category/'.$category->image;
if(File::exists($path)){
    File::delete($path);
}
$category->delete();
session()->flash('message','Category Deleted');
$this->dispatchBrowserEvent('close-modal');
    }
}
