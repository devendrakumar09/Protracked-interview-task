@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header d-flex justify-content-between ">
                    <h4 class="fw-bolder"><a href="{{ route('employee.index')}}">Employess </a></h4>
                    <a href="{{ route('employee.create') }}" class="btn btn-outline-primary">Add Employee</a>
                </div>
                <form action="{{ route('employee.update',$data->id)}}" method="post" enctype="multipart/form-data" class="p-5">
                    @csrf       
                    
                    @method('PUT')
    
                    <!--ERROR -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <h6 class="fw-bolder">Errors</h6>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    @if(session()->has('message'))
                        <div class="alert alert-success mb-2">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="company" class="form-label">Company</label>
                        <select name="company" id="company" class="form-control">
                            <option value="">Select</option>
                            @if (isset($cmp) && $cmp->count() > 0)
                                @foreach ($cmp as $item)
                                    <option value="{{$item->id}}" @if($item->id == $data->company) {{'selected'}}@endif >{{ ucfirst($item->name) }} </option>
                                @endforeach
                            @endif
                        </select>            
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" placeholder="Compnay Title" name="first_name" value="{{$data->first_name}}">
                        </div>

                        <div class="col-sm-6">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" placeholder="Compnay Title" name="last_name" value="{{$data->last_name}}">
                        </div>

                    </div>                    

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Compnay Email" name="email" value="{{$data->email}}">                       
                      </div>

                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile No</label>
                        <input type="text" class="form-control" id="mobile" placeholder="Mobile No" name="mobile" value="{{$data->phone}}">                      
                    </div>                 

                    <div class="mb-3 text-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
