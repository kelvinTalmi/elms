@extends('layout')

@section('content')
 <div style="margin:auto;float:none" class="col col-md-5">
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                              Leave Details
                               <a class='float-end' href="{{url('leavetype')}}">View All</a>
                            </div>


             

<div class="card-body">
              <div style='margin-top: 10px'><b>Employee Name: </b>{{$data->employee->full_name}} </div>   

              <div style='margin-top: 10px'><b>Department: </b>{{$data->department->title}} </div> 

              <div style='margin-top: 10px'><b>Leave Type: </b>{{$data->leavetype->leave_name}}</div> 

               <div style='margin-top: 10px'><b>Start Date: </b>{{$data->start_date}}  </div> 

                <div style='margin-top: 10px'><b>End Date: </b>{{$data->end_date}}  </div> 

                 <div style='margin-top: 10px'><b>No of days: </b>{{$data->no_of_days}}  </div> 

                 <div style='margin-top: 10px'><b>Reason: </b>{{$data->reason}}  </div> 
                 <div style='margin-top: 10px'><b>Status: </b>@if($data->status==0) <span class='text-info'>Pending Approval </span>
                                                 
                                                 @elseif($data->status==1) <span class='text-success'>Approved </span>

                                                 @else <span class='text-danger'>Declined</span>




                                            @endif  </div> 


                 <div style='margin-top: 10px'><b>Comment: </b>{{$data->comment}}  </div> 



                  
</div>
                                
                            </div>
                        </div>



                       
@endsection