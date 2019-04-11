@extends('layouts.app')

@section('content')
@if(Auth::id())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    User {{Auth::user()->name}}
                </div>
                <div class="card-body">
                    <form method="post" action="{{URL::to('/changedatasubmit')}}">
                        <div class="form-group">
                          <label for="inputName">Name</label>
                          <input name="name" type="text" value="{{Auth::user()->name}}" class="form-control" id="inputName" aria-describedby="nameHelp" placeholder="Enter you name">
                          <small id="nameHelp" class="form-text text-muted">This name you use just for yourself</small>
                        </div>
                        
                        <div class="form-group">
                          <label for="telefonNumber">Telefon Number</label>
                          <input name="phone_number" type="text" value="{{Auth::user()->phone_number}}" class="form-control" id="telefonNumber" placeholder="Phone Number">
                        </div>

                        <div class="form-group">
                          <label for="bornsDate">Borns Date</label>
                          <input name="bornsdate" type="date" value="{{Auth::user()->bornsdate}}" class="form-control" id="bornsDate" placeholder="Phone Number">
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input name="email" type="email" class="form-control" value="{{Auth::user()->email}}" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        
                        
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input name="password" type="password" value="" class="form-control" id="password" placeholder="Enter new password">
                        </div>
                        <div class="form-group">
                          <label for="confirmpassword">Confirm password</label>
                          <input name="confirmpassword" type="password" value="" class="form-control"  id="confirmpassword" placeholder="Confirm your password">
                        </div>
                        
                        
                        
                        <input name="token" value="{{csrf_token()}}" type="hidden">
                        <input name="user_id" value="{{Auth::id()}}" type="hidden">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enter in system</div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
