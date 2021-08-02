@extends('layout')

@section('content')
<div style="margin-top:20px" class="container">
 
        <div  style="margin:auto;float:none" class="col-md-5">
            <div class="card">
                <div class="card-header text-center"><h4>Change Password</h4> </div>
                @if(session()->has('error'))
                    <span class="alert alert-danger">
                        <strong>{{ session()->get('error') }}</strong>
                    </span>
                @endif
                @if(session()->has('success'))
                    <span class="alert alert-success">
                        <strong>{{ session()->get('success') }}</strong>
                    </span>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('change.password') }}" >
                        @csrf
                        
                            <label for="password" >Current Password</label>
                           
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" autocomplete="current_password">
                                @error('current_password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            
                       

                       <br>
                            <label for="password" >New Password</label>
                            
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password">
                                @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            
<br>
                        
                            <label for="password" >Confirm Password</label>
                        
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="password_confirmation">
                                @error('password_confirmation')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                           <BR>

                                <button type="submit" class="btn btn-primary">
                                    Change Password
                                </button>
                            
                    </form>
               
            </div>
        </div>
    </div>
</div>
@endsection