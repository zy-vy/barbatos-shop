@extends('app')

@section('body')

<div class="d-flex justify-content-center my-5">

<div class="card" style="">
    <div class="card-header text-center my-auto"><h2>Login</h2></div>
    <div class="card-body">
        <div class="container"><br>
            <div class="">
                
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
                <form action="{{ route('login_method') }}" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <label class="form-label" >Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email"
                        value={{Cookie::get('user_cookie')? Cookie::get('user_cookie'): ""}}
    
                        >
                    </div>
    
                    <div class="form-group mb-2">
                        <label class="form-label" >Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" >
                    </div>
    
                    <div class="form-outline pl-4 mb-4">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember" checked={{Cookie::get('user_cookie')!==null}}>
                        <label class="form-check-label" >remember me</label>
                    </div>
    
                    
    
                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
    
                    <p class="text-center">Don't have an account? <a href="/register">Register Here</a></p>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
    
@endsection
