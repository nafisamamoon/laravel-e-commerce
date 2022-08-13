@extends('layouts.admin')
@section('content')
<div class="row">
            <div class="col-md-12">
                @if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
                @endif
<div class="card">
    <div class="card-header">
        <h3>Add Color
            <a href="{{url('admin/colors')}}" class="btn btn-danger btn-sm text-white float-end">Back</a>
        </h3>
    </div>
    <div class="card-body">
<form action="{{url('admin/colors/create')}}" method="POST">
    @csrf
<div class="mb-3">
    <ladel>
        Color Name
    </ladel>
    <input type="text" name="name" class="form-control">
</div>
<div class="mb-3">
    <ladel>
        Color Code
    </ladel>
    <input type="text" name="code" class="form-control">
</div>
<div class="mb-3">
    <ladel>
       Status
    </ladel><br/>
    <input type="checkbox" name="status">
</div>
<div class="mb-3">
 <button type="submit" class="btn btn-primary">Save color</button>
</div>
</form>
</div>
</div>
</div>
</div>@endsection