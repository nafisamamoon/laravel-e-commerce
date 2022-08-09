@extends('layouts.admin')
@section('content')
<div class="row">
            <div class="col-md-12">
<div class="card">
    <div class="card-header">
        <h3>Edit Category
            <a href="{{url('admin/category')}}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
        </h3>
    </div>
    <div class="card-body">
<form action="{{url('admin/category')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <div class="col-md-6 mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{$category->name}}" class="form-control" />
    </div>
    <div class="col-md-6 mb-3">
        <label>Slug</label>
        <input type="text" name="slug" value="{{$category->slug}}" class="form-control" />
    </div>
    <div class="col-md-12 mb-3">
        <label>Description</label>
       <textarea name="description" class="form-control" rows="3">{{$category-description}}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label>image</label>
        <input type="file" name="image" class="form-control" />
        <img src="{{asset('/uploads/category'.$category->image)}}" width="60px" height="60px"/>
    </div>
    <div class="col-md-6 mb-3">
        <label>status</label><br/>
        <input type="checkbox" name="status" />
    </div>
    <div class="col-md-12">
       <h4>SEO Tags</h4>
    </div>
    <div class="col-md-6 mb-3">
        <label>Meta Title</label>
        <input type="text" name="meta_title" class="form-control" />
    </div>
    <div class="col-md-6 mb-3">
        <label>Meta Keyword</label>
        <input type="text" name="meta_keyword" class="form-control" />
    </div>
    <div class="col-md-6 mb-3">
        <label>Meta Description</label>
        <input type="text" name="meta_description" class="form-control" />
    </div>
    <div class="col-md-6 mb-3">
      <button type="submit" class="btn btn-pprimary float-end">Save</button>
    </div>
    </div>
   
</form>
    </div>
</div>
</div>
</div>
@endsection