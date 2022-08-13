<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Http\Requests\ColorFormRequest;
use Validator;
class ColorController extends Controller
{
    public function index(){
        $colors=Color::all();
        return view('admin.colors.index',compact('colors'));
    }
    public function create(){
        return view('admin.colors.create');
    }
    public function store(ColorFormRequest $request){
$validateddata=$request->validated();
$validateddata['status']=$request->status==true?'1':'0';
Color::create($validateddata);
return redirect('admin/colors')->with('message','color added sussfully');
    }
    public function edit(Color $color){
        return view('admin.colors.edit',compact('color'));
    }
    public function update(ColorFormRequest $request,$color_id){
        $validateddata=$request->validated();
        $validateddata['status']=$request->status==true?'1':'0';
        Color::find($color_id)->update($validateddata);
        return redirect('admin/colors')->with('message','color updated sussfully');
    }
    public function destroy($color_id){
        $color=Color::find($color_id);
        $color->delete();
        return redirect('admin/colors')->with('message','color deleted sussfully');
    }
}
