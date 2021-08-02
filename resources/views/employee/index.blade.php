@extends('layout')

@section('content')

<div class="card mb-4 mt-5">

                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               All Employees
                               <a class='float-end' href="{{url('employee/create')}}">Add +</a>
                            </div>
                            <div class="card-body">
                                @if(Session::has('msg'))
<p class='text-success'>{{session('msg')}}</p>
@endif
                                <table id="datatablesSimple" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Department</th>
                                            <th>Position</th>

                                             <th>Full Name</th>
                                              <th>Email</th>
                                              <th>Phone Number</th>
                                              <th>Id No</th>
                                              <th>Created At</th>
                                           <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Department</th>
                                            <th>Position</th>

											 <th>Full Name</th>
											  <th>Email</th>
											  <th>Phone Number</th>
                                              <th>Id No</th>
                                              <th>Created At</th>
                                           <th>Action</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    @if($data)
                                    @foreach($data as $index => $d)
                                        <tr>
                                            <td>{{$index +1 }}</td>
                                            <td>{{$d->department->title }}</td>
                                            <td>{{$d->position }}</td>
                                            <td>{{$d->full_name }}</td>

<td>{{$d->email }}</td>
<td>{{$d->phone_number }}</td>
<td>{{$d->idNo }}</td>
<td>{{$d->created_at }}</td>
                                            <td>

                                                <a href="{{url('employee/'.$d->id)}}" class="btn btn-warning btn-sm">Show</a>


<a href="{{url('employee/'.$d->id.'/edit')}}" class="btn btn-info btn-sm">Update</a>


<a onclick="return confirm('Are you sure to delete this')"  href="{{url('employee/'.$d->id.'/delete')}}" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                           
                                      </tr>
                                      @endforeach
                                      @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>



                       
@endsection