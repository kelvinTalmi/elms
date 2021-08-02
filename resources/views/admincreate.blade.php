@extends('layout')

@section('content')
 
 <div style="margin:auto;float:none" class="col col-md-5">
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Add Admin
                              
                            </div>
                            <div class="card-body">
@if(Session::has('msg'))
<p class='text-success'>{{session('msg')}}</p>
@endif

@if($errors->any())
@foreach($errors->all() as $error)
<p class='text-danger'>{{$error}}</p>
@endforeach
@endif

                                <form method='post' action="{{url('addadmin')}}">
@csrf

<label>Name</label>
                                    <input type='text' name='name' class='form-control' required> <br>
                                    <label>Email</label>
                                    <input required type='text' name='email' class='form-control'> <br>

                                    <label>Password</label>
                                    <input required type='password' name='password' class='form-control'> <br>

                                    <label>Confirm Password</label>
                                    <input required type='password' name='password_confirmation' class='form-control'> <br>

                                    <input class='btn btn-primary' type='submit' value='submit'>

                                    <br>



                                </form>
                            </div>
                        </div>
                    </div>



                     
@endsection