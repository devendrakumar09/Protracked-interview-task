@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card bg-white">
                <div class="card-header d-flex justify-content-between ">
                    <h4 class="fw-bolder">companies</h4>
                    <a href="{{ route('company.create') }}" class="btn btn-outline-primary">Add Compnay</a>
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
                            <th scope="col">Logo</th>
                            <th scope="col">Title</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>                            
                            <th scope="col">Employess</th>                            
                            <th scope="col">created_at</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        
                        @if (isset($data) && $data->count() > 0)
                            <tbody>
                                <?php $number = 0; ?>
                                @foreach ($data as $cmp)
                                    <tr>
                                       
                                        <td><img src="{{Storage::disk('local')->url($cmp->logo)}}" alt="{{$cmp->logo}}" width="60" class="img-thumbnail" ></td>
                                        <td><a href="{{$cmp->website}}">{{ ucfirst($cmp->name)}}</a></td>
                                        
                                        <td>{{ $cmp->email}}</td>  
                                        <td>{{ $cmp->phone}}</td>  
                                        <td>{{ $cmp->getEmployee->count()}}</td>                                      
                                        <td>{{$cmp->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{ route('company.edit',$cmp->id)}}" class="btn btn-sm btn-info">Edit</a>
                                            <form action="{{route('company.destroy',$cmp->id)}}" method="post" id="delete{{$cmp->id}}" style="display:none">
                                                @csrf
                                                @method('DELETE') 
                                            </form>                                        
                                            <a class="btn btn-danger btn-sm" onclick="if (confirm('Are you sure !!!')) {event.preventDefault();document.getElementById('delete{{$cmp->id}}').submit();}else{event.preventDefault();}">DELETE</a>  
                                        </td>
                                    </tr>    
                                @endforeach                                
                                <tr class="mt-4" style="margin-top: 50px;">
                                    <td colspan="7" align="right">{{$data->links()}}</td>
                                </tr>
                            </tbody>    
                            
                        @else
                            <tr >
                                <td ><p>No Data Found</p></td>
                            </tr>
                            
                        @endif
                        
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
