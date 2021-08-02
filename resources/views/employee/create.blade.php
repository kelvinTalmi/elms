@extends('layout')
@section('title','Add Employee')
@section('content')
 
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Create Employee
                               <a class='float-end' href="{{url('employee')}}">View All</a>
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

                                <form method='post' enctype="multipart/form-data" action="{{url('employee')}}">
@csrf

<label>Department</label>
<select name="depart" class="form-control">
    <option value="">--Select Department</option>
    @foreach($departments as $depart)
   
<option value="{{$depart->id}}">{{$depart->title}}</option>
    @endforeach

</select>

@if ($errors->has('depart'))
        <div class="text-error">
            {{ $errors->first('depart') }}
        </div>
        @endif


<br>

<label>Position</label>
                                    <input value="{{old('position')}}" type='text' name='position' class='form-control'> 

@if ($errors->has('position'))
        <div class="text-error">
            {{ $errors->first('position') }}
        </div>
        @endif

        <br>

 <label>Full name</label>
                                    <input type='text' value="{{old('full_name')}}" name='full_name' class='form-control'> 

@if ($errors->has('full_name'))
        <div class="text-error">
            {{ $errors->first('full_name') }}
        </div>
        @endif

<br>
                                  

<label>ID No</label>
                                    <input type='number' value="{{old('idNo')}}" name='idNo' class='form-control'> 

@if ($errors->has('idNo'))
        <div class="text-error">
            {{ $errors->first('idNo') }}
        </div>
        @endif
                                    <br>

 <label>Phone no</label>
                                    <input type='number' value="{{old('phone_number')}}" name='phone_number' class='form-control'> 

@if ($errors->has('phone_number'))
        <div class="text-error">
            {{ $errors->first('phone_number') }}
        </div>
        @endif
                                    <br>


<label>Email</label>
                                    <input type='email' value="{{old('email')}}" name='email' class='form-control'> 

@if ($errors->has('email'))
        <div class="text-error">
            {{ $errors->first('email') }}
        </div>
        @endif
                                    <br>





 <label>Photo</label>
                                    <input type='file' value="{{old('photo')}}" name='photo' class='form-control'> 
@if ($errors->has('photo'))
        <div class="text-error">
            {{ $errors->first('photo') }}
        </div>
        @endif

                                    <br>


 


                                    <input class='btn btn-primary' type='submit' value='submit'>

                                    <br>



                                </form>
                            </div>
                        </div>



@endsection