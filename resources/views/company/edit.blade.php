@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header d-flex justify-content-between ">
                    <h4 class="fw-bolder"><a href="{{ route('company.index')}}">companies </a></h4>
                    <a href="{{ route('company.create') }}" class="btn btn-outline-primary">Add Compnay</a>
                </div>
                <form action="{{ route('company.update',$data->id)}}" method="post" enctype="multipart/form-data" class="p-5">
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
                      <label for="name" class="form-label">Title</label>
                      <input type="text" class="form-control" id="name" placeholder="Compnay Title" name="title" value="{{ $data->name}}">                      
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Compnay Email" name="email" value="{{ $data->email}}">                       
                      </div>

                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile No</label>
                        <input type="text" class="form-control" id="mobile" placeholder="Mobile No" name="mobile" value="{{ $data->phone}}">                      
                    </div>

                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="url" class="form-control" id="website" placeholder="Compnay website" name="website" value="{{ $data->website}}">                      
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Logo</label>
                        <input type="file" class="form-control" id="image" name="image">                      
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
