@extends('layouts.app')
@section('content')

<div class="container">
    <h1> All bags page</h1>
    <div class="row">
     
    @foreach ($bags as $bag)
    
    <div class="card" style="width: 300px; display:flex">
        <img class="card-img-top" src="{{asset('upload_bag/'.$bag->picture)}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$bag->name}}</h5>
          <p class="card-text" style="font-size: x-large">Price: {{$bag->price}} $ </p>
          <p class="card-text" style="font-size: x-large">{{$bag->description}}  </p>
          <a href="#" class="btn btn-danger">Buy now</a>
        </div>
      </div>
    @endforeach
   
    </div>   
</div>
@endsection