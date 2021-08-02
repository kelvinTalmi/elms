@extends('layout')

@section('content')
 
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Add Holiday
                               <a class='float-end' href="{{url('holiday')}}">View All</a>
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

                                <form method='post' action="{{url('holiday')}}">
@csrf
                                    <label>Holiday Name</label>
                                    <input type='text' name='holiday_name' class='form-control' required> <br>


<label>Start Date</label>
                                    <input type='date' name='start_date' class='form-control' required> <br>


                                    <label>End date</label>
                                    <input type='date' name='end_date' class='form-control' required> <br>


                                    <input class='btn btn-primary' type='submit' value='submit'>

                                    <br>



                                </form>
                            </div>
                        </div>



                     
@endsection