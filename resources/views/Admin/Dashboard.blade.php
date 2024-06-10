@extends('Admin.Layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-6">							
                <div class="small-box card">
                    <div class="inner">
                        <h3>
                            @php
                                // Import the DB facade
                                use Illuminate\Support\Facades\DB;

                                // Count all records in the table
                                $count = DB::table('donors')->count();
                            @endphp
                            {{$count}}
                        </h3>
                        <p>Total Pet Donors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('admin.donors')}}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-6">							
                <div class="small-box card">
                    <div class="inner">
                        <h3>
                            @php

                            // Count all records in the table
                            $count = DB::table('pets')->count();
                        @endphp
                        {{$count}}
                        </h3>
                        <p>Total Pets</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('admin.pets')}}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <div class="col-lg-4 col-6">							
                <div class="small-box card">
                    <div class="inner">
                        <h3>
                            @php

                            // Count all records in the table
                            $count = DB::table('reports')->count();
                        @endphp
                        {{$count}}
                        </h3>
                        <p>Total Reports</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('admin.reports')}}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <div class="col-lg-4 col-6">							
                <div class="small-box card">
                    <div class="inner">
                        <h3>
                            @php

                            // Count all records in the table
                            $count = DB::table('adaptors')->count();
                        @endphp
                        {{$count}}
                        </h3>
                        <p>Total Pet Adoptors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('admin.reports')}}" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>					
    <!-- /.card -->
</section>
<!-- /.content -->

@endsection