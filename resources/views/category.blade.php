@extends('app')

@section('body')
<form class="d-flex my-3 mx-5" action="/search" method="GET">
                @csrf
                <input type="search" class="form-control me-2" name="search" id="Search" placeholder="Search" style="">
                <button type="submit" class="btn btn-outline-success">Search</button>
            </form>
        <div class="card mx-5 my-3">
            
            <div class="card-header">
                {{ $category->name  }}
            </div>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-4 g-0">
                    

                    @foreach ($products as $product)
                        <div class="col my-2">
                        <div class="card h-100 mx-2 my-2" style="min-width: 16rem;max-width:16rem; height: 20rem">
                            <img height="250px" src="{{Storage::url($product->photo)}}" class="card-img-top" alt="{{$product->name}}">
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
                <div class="d-flex justify-content-center" >{{ $products->onEachSide(5)->links() }}</div>

            </div>
        </div>
@endsection
