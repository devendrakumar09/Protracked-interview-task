@extends('layouts.app')

@section('content')
    <body>
        
        <!-- FOR DEMO PURPOSE -->
        <section class="py-5 bg-light">
            <div class="container py-5">
                <div class="row py-lg-5">
                    <div class="col-lg-6">
                        <h1 class="fw-bold">Protracked  Interview Task</h1>
                        <p class="fst-italic text-muted">PROTRACKED is a software and digital services company stationed in India, developing world class products, and supporting happy customers.<a class="text-primary" href="https://protracked.in/" target="_blank">take A Tour</a></p>

                        @if(session()->has('message'))
                                <div class="alert alert-danger mb-2 mb-4">
                                    {{ session()->get('message') }}
                                </div>
                        @endif

                        <a href="{{ route('company.index') }}" class="btn btn-outline-dark">Companies</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{ route('employee.index') }}" class="btn btn-outline-dark">Employees</a>
                    </div>
                </div>
            </div>
        </section>


        <section class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card border-0">
                            <div class="card-body p-0">

                                <!-- AUTO COMPLETE DROPDOWN -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
