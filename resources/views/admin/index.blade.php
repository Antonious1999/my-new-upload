@extends('layouts.app')
@section('content')
<div class="container">
    <h1>index page </h1>
    <a href="{{route('admin.create')}}" class="btn btn-success"> add product</a>
    <table class="table">
        <thead>
          <tr>
           
            <th scope="col">Name</th>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Control</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
              
                <td>{{$product->name}}</td>
                <td>
                    <img  src="{{asset('upload_product/'.$product->picture)}}" style="width: 100px;heigh:100px">
                </td>
                <td> {{$product->price}} </td>
                <td> {{$product->description}} </td>
                <td>
                    <form method="post" action="{{route('admin.destroy' ,$product->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="delete">
                      </form>
                </td>
               
                {{-- <td>  <a href="{{route('admin.create')}}" class="btn btn-danger"> delete</a>  </td> --}}
              </tr>

                
            @endforeach
         
        </tbody>
      </table>
</div>
@endsection