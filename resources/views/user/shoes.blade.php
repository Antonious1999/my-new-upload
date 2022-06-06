@extends('layouts.app')
@section('content')

<div class="container">
    <h1> All shoes page</h1>
    <div class="row">
     
    @foreach ($shoes as $shoe)
    
    <div class="card" style="width: 300px; display:flex">
        <img class="card-img-top" src="{{asset('upload_shoes/'.$shoe->picture)}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$shoe->name}}</h5>
          <p class="card-text" style="font-size: x-large">Price: {{$shoe->price}} $ </p>
          <p class="card-text" style="font-size: x-large">{{$shoe->description}}  </p>
          <a href="#" class="btn btn-danger">Buy now</a>
        </div>
      </div>
    @endforeach
   
    </div>   
</div>
@endsection