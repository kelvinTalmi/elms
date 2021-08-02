@extends('layout')

@section('content')
 <div style="margin:auto;float:none" class="col col-md-6">
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Update Employee
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

                             <form method="post" action="{{url('employee/'.$data->id)}}" enctype="multipart/form-data">
@method('put')
            @csrf

<label>Department</label>
<select name="depart" class="form-control">
    <option value="">-- Select Department --</option>
                            @foreach($departs as $depart)
                                <option @if($depart->id==$data->department_id) selected @endif value="{{$depart->id}}">{{$depart->title}}</option>
                            @endforeach

</select>

@if ($errors->has('depart'))
        <div class="text-error">
            {{ $errors->first('depart') }}
        </div>
        @endif


<br>

<label>Position</label>
                                    <input value="{{$data->position}}" type='text' name='position' class='form-control'> 

@if ($errors->has('position'))
        <div class="text-error">
            {{ $errors->first('position') }}
        </div>
        @endif

        <br>

 <label>Full name</label>
                                    <input type='text' value="{{$data->full_name}}" name='full_name' class='form-control'> 

@if ($errors->has('full_name'))
        <div class="text-error">
            {{ $errors->first('full_name') }}
        </div>
        @endif

<br>
                                  

<label>ID No</label>
                                    <input type='number' value="{{$data->idNo}}" name='idNo' class='form-control'> 

@if ($errors->has('idNo'))
        <div class="text-error">
            {{ $errors->first('idNo') }}
        </div>
        @endif
                                    <br>

 <label>Phone no</label>
                                    <input type='number' value="{{$data->phone_number}}" name='phone_number' class='form-control'> 

@if ($errors->has('phone_number'))
        <div class="text-error">
            {{ $errors->first('phone_number') }}
        </div>
        @endif
                                    <br>


<label>Email</label>
                                    <input type='email' value="{{$data->email}}" name='email' class='form-control'> 

@if ($errors->has('email'))
        <div class="text-error">
            {{ $errors->first('email') }}
        </div>
        @endif
                                    <br>





 <label>Photo</label><br><br>

<img style='width:30%' src="{{ asset('public/images/' . $data->photo) }}" ><br><br>






                                    <input type='file' value="{{old('photo')}}" name='photo' class='form-control'> 

                                    <input type="hidden" name="prev_photo" value="{{$data->photo}}" />
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
                    </div>



        @endsection