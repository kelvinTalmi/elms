@extends('layout')

@section('content')
 
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Create Department
                               <a class='float-end' href="{{url('depart')}}">View All</a>
                            </div>
                            <div class="card-body">


                                <table class="table table-bordered">
                                	<tr>

                                		<th>Title</th>

                                		<td> {{$data->title}}</td>



                                    </tr>
                                </table>

                                   



                                
                            </div>
                        </div>



@endsection