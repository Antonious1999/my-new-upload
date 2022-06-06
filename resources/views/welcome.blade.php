@extends('layouts.app')
@section('content')
    <div class="container">
        <video width="100%" height="800px" controls autoplay muted>
            <source src="{{ URL::asset('/video/vid.mp4') }}" type="video/mp4">
            {{-- <source src="{{URL::asset('movie.ogg')}}" type="video/ogg"> --}}

        </video>
        @Auth
            <h2 class="text-center" style="font-size:xx-large">
                   <a href="{{ route('showDress') }}"
                    class="btn btn-info">Dress</a>
                    <a href="{{ route('showShoes') }}"
                      class="btn btn-info">Shoes</a>
                      <a href="{{ route('showBags') }}"
                      class="btn btn-info">Bags</a>
                    </h2>
            <div class="row">
              {{-- dress --}}
                @if (session('showdress'))
                <div class="card" style="width: 300px; display:flex">
                  <img class="card-img-top" src="{{asset('upload_product/1653848627.jpeg')}}" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Dress</h5>
                    <a href="{{route('userspage')}}" class="btn btn-primary">Details</a>
                  </div>
                </div>
                <div class="card" style="width: 300px; display:flex">
                  <img class="card-img-top" src="{{asset('upload_product/1654358978.jpeg')}}" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Dress</h5>
                    <a href="{{route('userspage')}}" class="btn btn-primary">Details</a>
                  </div>
                </div>
                <div class="card" style="width: 300px; display:flex">
                  <img class="card-img-top" src="{{asset('upload_product/1654360388.jpeg')}}" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Dress</h5>
                    <a href="{{route('userspage')}}" class="btn btn-primary">Details</a>
                  </div>
                </div>
                @endif
            </div>
            {{-- shoes --}}
            <div class="row">
              @if (session('showshoes'))
              <div class="card" style="width: 300px; display:flex">
                <img class="card-img-top" src="{{asset('upload_shoes/1654363786.jpeg')}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">shoes</h5>
                  <a href="{{route('shoespage')}}" class="btn btn-primary">Details</a>
                </div>
              </div>
              <div class="card" style="width: 300px; display:flex">
                <img class="card-img-top" src="{{asset('upload_shoes/1654364552.jpeg')}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">shoes</h5>
                  <a href="{{route('shoespage')}}" class="btn btn-primary">Details</a>
                </div>
              </div>
              <div class="card" style="width: 300px; display:flex">
                <img class="card-img-top" src="{{asset('upload_shoes/1654364593.jpeg')}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">shoes</h5>
                  <a href="{{route('shoespage')}}" class="btn btn-primary">Details</a>
                </div>
              </div>
              @endif
          </div>
          {{-- bags --}}
          <div class="row">
            @if (session('showbags'))
            <div class="card" style="width: 300px; display:flex">
              <img class="card-img-top" src="{{asset('upload_bag/1654368230.jpeg')}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">bag</h5>
                <a href="{{route('showBag')}}" class="btn btn-primary">Details</a>
              </div>
            </div>
            <div class="card" style="width: 300px; display:flex">
              <img class="card-img-top" src="{{asset('upload_bag/1654368259.jpeg')}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">bag</h5>
                <a href="{{route('showBag')}}" class="btn btn-primary">Details</a>
              </div>
            </div>
            <div class="card" style="width: 300px; display:flex">
              <img class="card-img-top" src="{{asset('upload_bag/1654368288.jpeg')}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">bag</h5>
                <a href="{{route('showBag')}}" class="btn btn-primary">Details</a>
              </div>
            </div>
            @endif
        </div>

        </div>
    @else
        <p class="text-center"> <a class="btn btn-success" href="{{ route('login') }}">Please login to show products </a>
        </p>
    @endAuth
    </div>
@endsection
