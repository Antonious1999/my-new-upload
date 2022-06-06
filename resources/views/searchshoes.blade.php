@extends('layouts.app')
@section('content')
{{-- {{$Products}} --}}
<div class="container">
    <h1> Searched products</h1>
    <div class="row">
        @foreach ( $Products as $product )
        <div class="card" style="width: 18rem; display:flex">
            <img class="card-img-top" src="{{asset('upload_shoes/'.$product->picture)}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{$product->name}} </h5>
              <p class="card-text"></p>
              <a href="{{url('/')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
        @endforeach
       
          
    </div>
</div>
@endsection