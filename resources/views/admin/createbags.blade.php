@extends('layouts.app')
@section('content')
<div class="container">
    <h1>create Bag </h1>
    @if (session('addshoes'))
    <div class="alert alert-success">
        {{ session('addshoes') }}
    </div>
@endif
    <form method="POST" action="{{route('adminBag.store')}}"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" >
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Upload product</label>
          <input type="file" class="form-control" id="exampleInputPassword1" name="photo">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">price</label>
          <input type="number" class="form-control" id="exampleInputPassword1" name="price" style="width: 20%">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Description</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="description">
        </div>

        <button type="submit" class="btn btn-success" style="margin-top: 10px">Upload</button>
      </form>
      <a href="{{route('adminBag.index')}}" class="btn btn-dark" style="margin-top: 10px"> back </a> 
</div>
@endsection