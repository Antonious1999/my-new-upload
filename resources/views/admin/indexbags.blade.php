@extends('layouts.app')
@section('content')
<div class="container">
    <h1>All bags </h1>
    <a href="{{route('adminBag.create')}}" class="btn btn-success"> add bags</a>
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
            @foreach ($bags as $bag)
            <tr>
              
                <td>{{$bag->name}}</td>
                <td>
                    <img  src="{{asset('upload_bag/'.$bag->picture)}}" style="width: 100px;heigh:100px">
                </td>
                <td> {{$bag->price}} </td>
                <td> {{$bag->description}} </td>
                <td>
                    <form method="post" action="{{route('adminBag.destroy' ,$bag->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="delete">
                      </form>
                </td>
               
              </tr>

                
            @endforeach
         
        </tbody>
      </table>
</div>
@endsection