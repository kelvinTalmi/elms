@extends('layout')

@section('content')
 
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Update Department
                               <a class='float-end' href="{{url('depart')}}">View All</a>
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

                                <form method='post' action="{{url('depart/'.$data->id)}}">
                                	@method('put')
@csrf
                                    <label>Title</label>
                                    <input value="{{$data->title}}" type='text' name='title' class='form-control'> <br>

                                    <input class='btn btn-primary' type='submit' value='update'>

                                    <br>



                                </form>
                            </div>
                        </div>



                      
@endsection