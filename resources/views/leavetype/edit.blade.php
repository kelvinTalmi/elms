@extends('layout')

@section('content')
 <div style="margin:auto;float:none" class="col col-md-5">
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Edit Leave Type
                               <a class='float-end' href="{{url('leavetype')}}">View All</a>
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

                                <form method='post' action="{{url('leavetype/'.$data->id)}}">
                                	@method('put')
@csrf
                                    <label>Leave Name</label>
                                    <input value="{{$data->leave_name}}" type='text' name='name' class='form-control'> <br>

                                    <label>Duration</label>
                                    <input value="{{$data->duration}}" type='number' name='duration' class='form-control'> <br>

                                    <input class='btn btn-primary' type='submit' value='Edit'>

                                    <br>



                                </form>
                            </div>
                        </div>



                      
@endsection