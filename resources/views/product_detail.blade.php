@extends('app')

@section('body')
    <div class="d-flex justify-content-center my-5 py-5">

        <div class="card mb-3 my-5 " style="width: 700px;">
            <div class="row g-0">
                <div class="col-md-4 p-3 my-auto">
                    <img src="{{ Storage::url($product->photo) }}" class="img-fluid rounded" alt="{{ $product->name }}">
                </div>
                <div class="col-md-6">
                    <form action="/purchase/{{ $product->id }}" method="post">
                        @csrf
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    Detail
                                </div>
                                <div class="col-md-8">
                                    {{ $product->detail }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Price
                                </div>
                                <div class="col-md-8">
                                    IDR {{ $product->price }}

                                </div>
                            </div>
                            @auth
                            @if (Auth::user()->role == 'Customer')

                                <div class="row">
                                    <div class="col-md-4">
                                        Qty
                                    </div>
                                    <div class="col-md-8">

                                        <input type="number" name="quantity" id="quantity">
                                    </div>
                                </div>
                                <button type="submit" style="border: 1px solid gray">Purchase</button>
                                @endif
                                @endif
                                {{-- <p class="card-text">This is a wider card with supporting text below as a natural
                            lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
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
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    @endsection
