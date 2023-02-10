@extends('app')

@section('body')
<div class="d-flex justify-content-center my-5">

    <div class="card" style="width: 50%">
        <div class="card-header text-center my-auto"><h2>Register</h2></div>
    <div class="card-body">
        <div class="">
           

            <form action="/register" method="post">
                @csrf
                <div class="form-group mb-2">
                    <label class="form-label" >Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name"
                    value="{{old('name')}}"
                    >
                </div>
                <div class="form-group mb-2">
                    <label class="form-label" >Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email"
                    
                    value="{{old('email')}}"

                    >
                </div>

                <div class="form-group mb-2">
                    <label class="form-label" >Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" >
                </div>
                <div class="form-group mb-2">
                    <label class="form-label" >Confirm Password</label>
                    <input type="password" name="con-pass" class="form-control" placeholder="Confirm Password" >
                </div>

                <label for="" class="form-label" >Gender</label>
                <div class="form-group mb-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender-male" value="male">
                    <label class="form-check-label" for="genderMale">male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender-female" value="female">
                    <label class="form-check-label" for="genderFemale">female</label>
                  </div>
                </div>

                <div class="form-group mb-2">
                    <label class="form-label" for="">Date of Birth</label>
                    <input class="form-control" type="date" name="dob" id="dob"
                    value="{{old('dob')}}"
                    >
                </div>

                <div class="form-group mb-2">
                    <label class="form-label" >Country</label>
                    <select class="form-select form-control" name="country" aria-label="Choose a Country">
                        <option selected>Choose a Country</option>

                        @php
                         $countries = App\Models\Country::all()
                    @endphp
                    @foreach ($countries as $country)
                    <option value="{{$country->name}}">{{$country->name}}</option>

                    @endforeach
                    
                      </select>
                      
                </div>

                @if ($errors->any())
                        <div class="alert alert-danger form-outline mb-4" role="alert">
                            {{$errors->first()}}
                        </div>
                @endif

                <button type="submit" class="btn btn-primary btn-block">Register</button>

            </form>
        </div>

    </div>
    </div>
</div>
@endsection