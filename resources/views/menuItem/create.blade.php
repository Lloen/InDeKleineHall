@extends('layouts.app')

@section('content')
<h2 class="text-center">Add Product</a></h2>
<br>

<form action="" method="POST" name="add_product">
    @csrf
    <div class="form-group">
        <strong>Title</strong>
        <input type="text" name="title" class="form-control" placeholder="Enter Title">
        <span class="text-danger">{{ $errors->first('title') }}</span>
    </div>
    <div class="form-group">
        <strong>Title</strong>
        <input type="text" name="title" class="form-control" placeholder="Enter Title">
        <span class="text-danger">{{ $errors->first('title') }}</span>
    </div>
    <div class="form-group">
        <strong>Title</strong>
        <input type="text" name="title" class="form-control" placeholder="Enter Title">
        <span class="text-danger">{{ $errors->first('title') }}</span>
    </div>
    <div class="form-group">
        <strong>Title</strong>
        <input type="text" name="title" class="form-control" placeholder="Enter Title">
        <span class="text-danger">{{ $errors->first('title') }}</span>
    </div>
    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Verzenden" />
</form>
@endsection