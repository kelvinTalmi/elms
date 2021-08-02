@extends('layout')

@section('content')
 <div style="margin:auto;float:none" class="col col-md-5">
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Approve/Decline
                             
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

                                <form method='post' action="{{url('admin/'.$data->id)}}">
                                	@method('put')
@csrf



              <div style='margin-top: 10px'><b>Employee Name: </b>{{$data->employee->full_name}} </div>   

              <div style='margin-top: 10px'><b>Department: </b>{{$data->department->title}} </div> 

              <div style='margin-top: 10px'><b>Leave Type: </b>{{$data->leavetype->leave_name}}</div> 

               <div style='margin-top: 10px'><b>Start Date: </b>{{$data->start_date}}  </div> 

                <div style='margin-top: 10px'><b>End Date: </b>{{$data->end_date}}  </div> 

                 <div style='margin-top: 10px'><b>No of days: </b>{{$data->no_of_days}}  </div> 

                 <div style='margin-top: 10px'><b>Reason: </b>{{$data->reason}}  </div> 



                   <div style='margin-top: 10px'>
                    <b>Comment: </b>

                    <textarea name="comment" class="form-control" required></textarea>
<br>

                   </div>  <center> <button name="approve" class="btn btn-success">Approve</button>
                   <button name="decline" class="btn btn-danger">Decline</button>  </center>


                                </form>
                            </div>
                        </div>



                       
@endsection