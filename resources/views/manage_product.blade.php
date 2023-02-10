@extends('app')

@section('body')
    <div class="container my-5">

        <div class="row ">
            <div class="col">
                <div class="container" style="width: 750px">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger form-outline mb-4" role="alert">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <form class="d-flex mb-3 m-1" action="/manage/search" method="GET">
                        @csrf
                        <input type="search" class="form-control me-1" name="search" id="Search" placeholder="Search" style="">
                        <button type="submit" class="btn btn-outline-success me-5">Search</button>
                        <a href="/add_product"><button type="button" class="btn btn-success ms-5">Add Product</button>
                        </a>
                    </form>
                    

                    @foreach ($products as $product)
                        {{-- <a href="/edit-product/{{$product->id}}" class="" style="text-decoration:none;color: black;"> --}}
                        <div class="card mb-3" style="width: 750px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ Storage::url($product->photo) }}" class="img-fluid rounded-start"
                                        alt="{{ $product->name }}">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        {{-- <p class="card-text">This is a wider card with supporting text below as a natural
                                            lead-in to additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                                    </div>
                                </div>
                                <div class="col my-3">

                                    <a href="/edit_product/{{ $product->id }}">
                                        <button type="button" class="btn btn-outline-dark">Edit</button>

                                    </a>

                                </div>
                                <div class='col my-3'>
                                    <a href="/delete/{{ $product->id }}">
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
@endsection
