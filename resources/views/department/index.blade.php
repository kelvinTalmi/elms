@extends('layout')

@section('content')

<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               All Departments
                               <a class='float-end' href="{{url('depart/create')}}">Add +</a>
                            </div>
                            <div class="card-body">
                                @if(Session::has('msg'))
<p class='text-success'>{{session('msg')}}</p>
@endif
                                <table id="datatablesSimple" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Created At</th>
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Created At</th>
                                           <th>Action</th>
                                            

                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    @if($data)
                                    @foreach($data as $index => $d)
                                        <tr>
                                            <td>{{ $index +1 }}</td>
                                            <td>{{$d->title}}</td>
                                            <td>{{$d->created_at}}</td>

                                            <td>

                                                


<a href="{{url('depart/'.$d->id.'/edit')}}" class="btn btn-info btn-sm">Update</a>


<a onclick="return confirm('Are you sure to delete this')"  href="{{url('depart/'.$d->id.'/delete')}}" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                           
                                      </tr>
                                      @endforeach
                                      @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>



                        
@endsection