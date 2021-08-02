@extends('layout')

@section('content')

<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               All Holidays
                               <a class='float-end' href="{{url('holiday/create')}}">Add +</a>
                            </div>
                            <div class="card-body">
                                @if(Session::has('msg'))
<p class='text-success'>{{session('msg')}}</p>
@endif
                                <table id="datatablesSimple" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Holiday Name</th>
                                            <th>Start Date</th>
                                           <th>End date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Holiday Name</th>
                                            <th>Start Date</th>
                                           <th>End date</th>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    @if($data)
                                    @foreach($data as $index => $d)
                                        <tr>
                                            <td>{{ $index +1 }}</td>
                                            <td>{{$d->holiday_name}}</td>
                                            <td>{{$d->start_date}}</td>
                                            <td>{{$d->end_date}}</td>

                                            <td>

                                                


<a href="{{url('holiday/'.$d->id.'/edit')}}" class="btn btn-info btn-sm">Update</a>


<a onclick="return confirm('Are you sure to delete this')"  href="{{url('holiday/'.$d->id.'/delete')}}" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                           
                                      </tr>
                                      @endforeach
                                      @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>



                        
@endsection