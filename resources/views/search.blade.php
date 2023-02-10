@extends('app')

@section('body')
<div class="p-5" style="width:100%">
<div class="row row-cols-1 row-cols-md-4 g-0">
    @foreach ($products as $product)
    <div class="col my-2">
        <div class="card h-100 mx-2 my-2" style="min-width: 16rem;max-width:16rem; height: 20rem">
            <img src="{{Storage::url($product->photo)}}" class="card-img-top" alt="{{$product->name}}">
            <div class="card-body">
                {{-- <p class="card-text">{{ $product->name }}</p>
                <h5 class="card-title">{{ 'IDR '.$product->price}}</h5> --}}
                <a href="/product/{{$product->id}}" class="stretched-link"></a>

            </div> 

            <div class="card-footer">
                
                <p >{{ $product->name }}</p>
                    <h6>{{ 'IDR '.$product->price}}</h6>
              </div>
        </div>
    </div>
    @endforeach

</div>
<div class="m-3 d-flex justify-content-center">
    {{$products->withQueryString()->links()}}
</div>
</div>
@endsection
