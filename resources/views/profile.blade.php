@extends('app')

@section('body')
    <div class="d-flex justify-content-center my-5">

        <div class="card" style="width: 50%">
            <div class="card-header text-center my-auto"><h2>Profile</h2></div>
        <div class="card-body">
            <div class="">
               
    
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" disabled=true name="name" class="form-control" placeholder="Name"
                        value={{$user->name}}
                        >
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" disabled=true name="email" class="form-control" placeholder="Email"
                        value={{$user->email}}
    
                        >
                    </div>
    
                       
                    <label for="">Gender</label>
                    <div class="form-group">
                        <input class="form-control" disabled=true type="text" name="dob" id="gender"
                        value={{$user->gender}}>
                    </div>
    
                    <div class="form-group">
                        <label for="">Date of Birth</label>
                        <input class="form-control" disabled=true type="date" name="dob" id="dob"
                        value={{$user->dob}}
                        >
                    </div>
    
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" disabled=true name="country" class="form-control" placeholder="Country" 
                        value={{$user->country}}>
                    </div>
    
                    
    
    
                </form>
            </div>
    
        </div>
        </div>
    </div>
@endsection