@extends('layout')

@section('content')
 
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Create Department
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

                                <form method='post' action="{{url('depart')}}">
@csrf
                                    <label>Title</label>
                                    <input type='text' name='title' class='form-control'> <br>

                                    <input class='btn btn-primary' type='submit' value='submit'>

                                    <br>



                                </form>
                            </div>
                        </div>



                       
@endsection