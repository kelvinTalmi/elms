@extends('layout')

@section('content')

<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Approved Leaves
                               <a class='float-end' href="{{url('leavetype/create')}}"></a>
                            </div>
                            <div class="card-body">
                                @if(Session::has('msg'))
<p class='text-success'>{{session('msg')}}</p>
@endif
                                <table id="datatablesSimple" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Employee Name</th>
                                            <th>Department</th>
                                            <th>Leave Type</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>No of Days</th>
                                            <th>Status</th>
                                            <th>Read More</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                         <tr>
                                            <th>#</th>
                                            <th>Employee Name</th>
                                            <th>Department</th>
                                            <th>Leave Type</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>No of Days</th>
                                            <th>Status</th>
                                            <th>Read More</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    @if($data)
                                    @foreach($data as $index => $d)
                                        <tr>
                                            <td>{{ $index +1 }}</td>
                                            <td>{{$d->employee->email}}</td>
                                            <td>{{$d->department->title}}</td>
                                            <td>{{$d->leavetype->leave_name}}</td>

                                            <td>{{$d->start_date}}</td>
                                            <td>{{$d->end_date}}</td>
                                            <td>{{$d->no_of_days}}</td>


                                            <td>@if($d->status==0) <span class='text-info'>Pending Approval </span>
                                                 
                                                 @elseif($d->status==1) <span class='text-success'>Approved </span>

                                                 @else <span class='text-danger'>Declined</span>




                                            @endif</td>

                                          <td>   <a href="{{url('approved/'.$d->id)}}" class="btn btn-warning btn-sm">Read More</a></td>
                                           
                                      </tr>
                                      @endforeach
                                      @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>



                       
@endsection