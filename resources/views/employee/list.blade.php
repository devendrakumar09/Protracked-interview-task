@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card bg-white">
                <div class="card-header d-flex justify-content-between ">
                    <h4 class="fw-bolder">Employee</h4>
                    <a href="{{ route('employee.create') }}" class="btn btn-outline-primary">Add Employee</a>
                </div>
                <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert alert-success mb-2 ">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Compnay</th>                            
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">created_at</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>                        
                        @if (isset($data) && $data->count() > 0)
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        
                                        <td>{{ ucfirst($item->getCmpnay->name)}}</a></td>
                                        <td>{{ ucfirst($item->first_name)}} {{ucfirst($item->last_name)}}</td>   
                                        <td>{{ $item->email}}</td> 
                                        <td>{{ $item->phone}}</td>                                        
                                        <td>{{$item->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{ route('employee.edit',$item->id)}}" class="btn btn-sm btn-info">Edit</a>
                                            <form action="{{route('employee.destroy',$item->id)}}" method="post" id="delete{{$item->id}}" style="display:none">
                                                @csrf
                                                @method('DELETE') 
                                            </form>                                        
                                            <a class="btn btn-danger btn-sm" onclick="if (confirm('Are you sure !!!')) {event.preventDefault();document.getElementById('delete{{$item->id}}').submit();}else{event.preventDefault();}">DELETE</a>  
                                        </td>
                                    </tr>    
                                @endforeach                                                               
                            </tbody>    
                            <tr class="mt-4" style="margin-top: 50px;">
                                <td colspan="6" align="right">{{$data->links()}}</td>
                            </tr>
                        @else
                            <tr>
                                <td><p>No Data Found</p></td>
                            </tr>
                            
                        @endif
                        
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
