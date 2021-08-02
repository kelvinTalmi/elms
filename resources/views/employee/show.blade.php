@extends('layout')

@section('content')
 
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                              Employee
                               <a class='float-end' href="{{url('employee')}}">View All</a>
                            </div>
                            <div class="card-body">


                               <div style="margin:auto;float:none" class="col col-md-5">
                                <dic class="card">
                                    <div class="card-header"><center><b><E>Employee Detail</E></b></center></div>
                                    <div class="card-body">

                                        <img class="card-img-top" src="{{ asset('public/images/' . $data->photo) }}"   >
                                      
<div style='margin-top: 10px'><b>Full Name: </b>{{$data->full_name}} </div>

                                       <div style='margin-top: 10px'><b>Department: </b>{{$data->department->title}}  </div>

                                        <div style='margin-top: 10px'><b>Position: </b>{{$data->position}}  </div>


                                        <div style='margin-top: 10px'><b>Email: </b>{{$data->email}}  </div>

                                        <div style='margin-top: 10px'><b>Phone Number: </b>{{$data->phone_number}}  </div>

                                        <div style='margin-top: 10px'><b>ID NO: </b>{{$data->idNo}}  </div>



                                        





                                            


                                    </div>



                                </dic>
                                   



                               </div>

                                   



                                
                            </div>
                        </div>



                       
@endsection