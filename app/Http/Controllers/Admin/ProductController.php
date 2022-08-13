<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Color;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    public function index(){
        $products=Product::all();
        return view('admin.products.index',compact('products'));
    }
    public function create(){
        $categories=Category::all();
        $colors=Color::where('status','0')->get();
        $brands=Brand::all();
        return view('admin.products.create',compact('categories','brands','colors'));
    }
    public function store(ProductFormRequest $request){
$validateddata=$request->validated();
$category=Category::findOrFail($validateddata['category_id']);
$product=$category->products()->create([
'category_id'=>$validateddata['category_id'],
'name'=>$validateddata['name'],
'slug'=>Str::slug($validateddata['slug']),
'brand'=>$validateddata['brand'],
'small_description'=>$validateddata['small_description'],
'description'=>$validateddata['description'],
'original_price'=>$validateddata['original_price'],
'selling_price'=>$validateddata['selling_price'],
'quantity'=>$validateddata['quantity'],
'trending'=>$request->trending==true?'1':'0',
'status'=>$request->status==true?'1':'0',
'meta_title'=>$validateddata['meta_title'],
'meta_keyword'=>$validateddata['meta_keyword'],
'meta_description'=>$validateddata['meta_description'],
]);
// $pro=new ProductImage;
if($request->hasFile('image')){
    $uploadPath='uploads/products/';
    $i=1;
    foreach($request->file('image') as $imageFile){
        $extension=$imageFile->getClientOriginalExtension();
        $filename=time().$i++.'.'.$extension;
        $imageFile->move($uploadPath,$filename);
        $finalImagePathName=$uploadPath.$filename;
        $product->productImages()->create([
            'product_id'=>$product->id,
            'image'=>$finalImagePathName,
            ]);
// $pro->product_id=$product->id;
// $pro->image=$finalImagePathName;
// $pro->save();
    }
   
}
return redirect('/admin/products')->with('message','product added sussfully');
    }
    public function edit(int $product_id){
$product=Product::findOrFail($product_id);
$categories=Category::all();
$brands=Brand::all();
return view('admin.products.edit',compact('categories','product','brands'));
    }
    public function update(ProductFormRequest $request,int $product_id){
        $validateddata=$request->validated();
        $product=Category::findOrFail($validateddata['category_id'])->products()->where('id',$product_id)->first();
if($product){
$product->update([
    'category_id'=>$validateddata['category_id'],
'name'=>$validateddata['name'],
'slug'=>Str::slug($validateddata['slug']),
'brand'=>$validateddata['brand'],
'small_description'=>$validateddata['small_description'],
'description'=>$validateddata['description'],
'original_price'=>$validateddata['original_price'],
'selling_price'=>$validateddata['selling_price'],
'quantity'=>$validateddata['quantity'],
'trending'=>$request->trending==true?'1':'0',
'status'=>$request->status==true?'1':'0',
'meta_title'=>$validateddata['meta_title'],
'meta_keyword'=>$validateddata['meta_keyword'],
'meta_description'=>$validateddata['meta_description'],
]);
if($request->hasFile('image')){
    $uploadPath='uploads/products/';
    $i=1;
    foreach($request->file('image') as $imageFile){
        $extension=$imageFile->getClientOriginalExtension();
        $filename=time().$i++.'.'.$extension;
        $imageFile->move($uploadPath,$filename);
        $finalImagePathName=$uploadPath.$filename;
        $product->productImages()->create([
            'product_id'=>$product->id,
            'image'=>$finalImagePathName,
            ]);
// $pro->product_id=$product->id;
// $pro->image=$finalImagePathName;
// $pro->save();
    }
   
}
return redirect('/admin/products')->with('message','product updated sussfully');
}else{
    return redirect('admin/products')->with('message','no such product found');
}
    }
    public function destroyImage(int $product_image_id){
$productImage=ProductImage::findOrFail($product_image_id);
if(File::exists($productImage->image)){
    File::delete($productImage->image);
}
$productImage->delete();
return redirect()->back()->with('message','product image deleted ');
    }
    public function destroy(int $product_id){
        $product=Product::findOrFail($product_id);
        if($product->productImages()){
            foreach($product->productImages as $image){
if(File::exists($image->image)){
    File::delete($image->image);
}
            }
        }
        $product->delete();
        return redirect()->back()->with('message','product deleted with its images ');
    }
}
