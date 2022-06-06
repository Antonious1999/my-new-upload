@extends('layouts.app')
@section('content')
<div class="container">
    <h1>All shoes </h1>
    <a href="{{route('adminShoes.create')}}" class="btn btn-success"> add Shoes</a>

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
            @foreach ($shoes as $shoe)
            <tr>
              
                <td>{{$shoe->name}}</td>
                <td>
                    <img  src="{{asset('upload_shoes/'.$shoe->picture)}}" style="width: 100px;heigh:100px">
                </td>
                <td> {{$shoe->price}} </td>
                <td> {{$shoe->description}} </td>
                <td>
                    <form method="post" action="{{route('adminShoes.destroy' ,$shoe->id)}}">
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