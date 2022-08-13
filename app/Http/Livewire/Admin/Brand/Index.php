<?php

namespace App\Http\Livewire\Admin\Brand;
use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
class Index extends Component
{
    public $name,$slug,$status,$brand_id;
    public function rules(){
        return [
            'name'=>'required|string',
            'slug'=>'required|string',
            'status'=>'nullable'
        ];
    }
    public function render()
    {
        $brands=Brand::all();
        return view('livewire.admin.brand.index',['brands'=>$brands])->extends('layouts.admin')->section('content');
    }
    public function editBrand(int $brand_id){
        $this->brand_id=$brand_id;
$brand=Brand::findOrFail($brand_id);
$this->name=$brand->name;
$this->slug=$brand->slug;
$this->status=$brand->status;
    }
    public function closeModal(){
        $this->resetInput();
    }
    public function openModal(){
        $this->resetInput();
    }
    public function storeBrand(){
$validatedData=$this->validate();
Brand::create([
    'name'=>$this->name,
    'slug'=>Str::slug($this->slug),
    'status'=>$this->status==true?'1':'0',
]);
session()->flash('message','brand added succeffully');
$this->dispatchBrowserEvent('close-modal');
$this->resetInput();
    }
    public function resetInput(){
$this->name=NULL;
$this->slug=NULL;
$this->status=NULL;
$this->brand_id=NULL;
    }
    public function updateBrand(){
        $validatedData=$this->validate();
Brand::findOrFail($this->brand_id)->update([
    'name'=>$this->name,
    'slug'=>Str::slug($this->slug),
    'status'=>$this->status==true?'1':'0',
]);
session()->flash('message','brand updated succeffully');
$this->dispatchBrowserEvent('close-modal');
$this->resetInput();
    }
    public function deleteBrand($brand_id){
        $this->brand_id=$brand_id;   
    }
    public function destroyBrand(){
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message','brand deleted succeffully');
$this->dispatchBrowserEvent('close-modal');
$this->resetInput();
    }
}
