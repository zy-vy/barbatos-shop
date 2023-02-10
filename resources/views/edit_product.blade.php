@extends('app')

@section('body')

<div class="d-flex justify-content-center my-5">

    <div class="card" style="width: 50%">
        <div class="card-header my-auto"><h5>Edit Product</h5></div>
    <div class="card-body">
        <div class="">
           

            <form enctype="multipart/form-data" action="/edit_product/{{$product->id}}" method="post">
                @csrf
                <div class="form-group mb-2">
                    <label class="form-label" >Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name"
                    value="{{$product->name}}"
                    >
                </div>

                <div class="form-group mb-2">
                    <label class="form-label" >Category</label>
                    <select class="form-select form-control" name="category" aria-label="">
                        <option selected>Choose a Category</option>
                        @php
                         $categories = App\Models\Category::all()
                    @endphp
                    @foreach ($categories as $category)
                        @if ($category->id == $product->category->id)
                    <option selected value="{{$category->id}}">{{$category->name}}</option>

                        @else
                    <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @endforeach
                    
                      </select>
                      
                </div>

                <div class="form-group mb-2">
                    <label class="form-label" >Detail</label>
                    <textarea class="form-control" name="detail" id="detail" rows="3"
                    
                    
                    >{{$product->detail}}</textarea>


                </div>

                
                <div class="form-group mb-2">
                    <label class="form-label" >Price</label>
                    <input type="number" name="price" class="form-control" placeholder="Price"
                    value="{{$product->price}}"

                    >
                </div>
                

                <div class="form-group mb-2">
                    <label class="form-label" >Photo</label>
                    <input class="form-control" name="photo" type="file" id="formFile">

                </div>

                

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

                <button type="submit" class="btn btn-primary btn-block">Save</button>

            </form>
        </div>

    </div>
    </div>
</div>
    
@endsection