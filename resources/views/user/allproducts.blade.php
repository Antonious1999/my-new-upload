@extends('layouts.app')
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
{{-- {{ request()->session()->get('cart') }} --}}
{{-- {{session('cart')}} --}}
<div class="container">
    <h1> All products page</h1>
    <div class="row">
     
    @foreach ($products as $product)
    
    <div class="card" style="width: 300px; display:flex">
        <img class="card-img-top" src="{{asset('upload_product/'.$product->picture)}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$product->name}}</h5>
          <p class="card-text" style="font-size: x-large">Price: {{$product->price}} $ </p>
          <p class="card-text" style="font-size: x-large">{{$product->description}}  </p>
          <a href="{{route('addtochart',$product->id)}}" class="btn btn-danger">Add to chart</a>
        </div>
      </div>
    @endforeach
   
    </div>   
</div>
@endsection