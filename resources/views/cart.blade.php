@extends('app')

@section('body')
    <div class="container my-5">

        <div class="row ">
            <div class="col">
                <div class="container" style="width: 700px">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if ($errors->any())
                        <div class="alert alert-danger form-outline mb-4" role="alert">
                            {{$errors->first()}}
                        </div>
                @endif
                    @php 
                        $total =0;
                    @endphp
                    @foreach ($carts as $cart)

                    @php 
                    $product = $cart->product;
                    $price = $product->price*$cart->quantity; $total+= $price;
                    @endphp
                    {{-- <a href="/edit-product/{{$product->id}}" class="" style="text-decoration:none;color: black;"> --}}
                        <div class="card mb-3" style="width: 700px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{Storage::url($product->photo)}}" class="img-fluid rounded-start" alt="{{$product->name}}">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$product->name}}</h5>
                                        {{-- <p class="card-text">This is a wider card with supporting text below as a natural
                                            lead-in to additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                Quantity
                                            </div>
                                            <div class="col-md-8">
                                                {{$cart->quantity}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                Total Price: 
                                            </div>
                                            <div class="col-md-8">
                                                IDR     {{$price}}
                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class='col my-3'>
                                        <a href="/delete_cart/{{$cart->id}}">
                                            <button type="button" class="btn btn-outline-dark">Delete</button>

                                        </a>
                                </div>
                            </div>
                        </div>
                    {{-- </a> --}}
                    @endforeach
                    
                </div>
            </div>
        </div>


    </div>
    <nav class="navbar fixed-bottom bg-light">
        <div class="container-fluid justify-content-center">
            <p class="">Total Price: IDR {{$total}}</p>
            <a href="/checkout">            <button type="button" class="btn btn-outline-info mx-5">Purchase</button>
            </a>
        </div>
      </nav>
@endsection
