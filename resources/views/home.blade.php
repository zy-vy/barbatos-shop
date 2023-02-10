@extends('app')

@section('body')

    <form class="d-flex my-3 mx-5" action="/search" method="GET">
        @csrf
        <input type="search" class="form-control me-2" name="search" id="Search" placeholder="Search" style="">
        <button type="submit" class="btn btn-outline-success">Search</button>
    </form>
    @foreach ($categories as $category)
        @if ($category->products->isEmpty())
            @continue
        @endif
        <div class="card mx-5 my-3">

            <div class="card-header">
                {{ $category->name }}
                <a class="mx-2" href="/category/{{ $category->name }}">view all</a>
            </div>
            <div class="card-body">
                <div class="d-flex flex-row flex-nowrap overflow-auto">
                    @foreach ($category->products as $product)
                        <div class="card h-100 mx-2 my-2" style="min-width: 18rem; min-height: 20rem">
                            <img height="250px" src="{{ Storage::url($product->photo) }}"  class="card-img-top"
                                alt="{{ $product->name }}"
                                >
                            <div class="card-body">
                                {{-- <p class="card-text">{{ $product->name }}</p>
                                <h5 class="card-title">{{ 'IDR '.$product->price}}</h5> --}}
                                <a href="/product/{{ $product->id }}" class="stretched-link"></a>

                            </div>

                            <div class="card-footer">

                                <p>{{ $product->name }}</p>
                                <h6>{{ 'IDR ' . $product->price }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        </div>
    @endforeach
@endsection
