@extends('Admin.Layouts.app')

@section('content')


<!-- Content Wrapper. Contains page content -->
				<!-- Content Header (Page header) -->
				@if(session('success'))
				<div id="alert" class="alert alert-success mb-4 mr-4 rounded-lg shadow-md position-relative">
					<button id="close-alert" class="close" data-dismiss="alert">&times;</button>
					<p id="msg">{{ session('success') }}</p>
				</div>
				@elseif (session('error'))
				<div id="alert" class="alert alert-danger mb-4 mr-4 rounded-lg shadow-md position-relative">
					<button id="close-alert" class="close" data-dismiss="alert">&times;</button>
					<p id="msg">{{ session('error') }}</p>
				</div>
				
				@endif
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>All Adopters Pets Updates</h1>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="card">
							<div class="card-header">
								<div class="card-tools">
								</div>
							</div>
							<div class="card-body table-responsive p-0">								
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											<th width="60">ID</th>
                                            <th>Adopter Name</th>
                                            <th>Adopter Email</th>
                                            <th>Donor Name</th>
                                            <th>Donor Email</th>
											<th>Pet Name</th>
											<th>Pet Image</th>
                                            <th>Vaccination Certificate</th>
                                            <th>Feelings</th>
                                            <th>Time</th>
										</tr>
									</thead>
									<tbody>
										@php
											$i=1
										@endphp
									@foreach ($people as $d)
										<tr>
											<td>
												{{$i}}
											</td>
											<td>{{$d->a_fname}}</td>
											<td>{{$d->a_email}}</td>
											<td>
                                                {{$d->d_fname}}
                                            </td>
											<td>{{$d->d_email}}</td>
                                            <td>{{$d->pet_name}}</td>
                                            <td>
												<img src="/storage/{{$d->pethealth_image}}" class='img-circle elevation-2' width="40" height="40" alt="">
											</td>
                                            <td>
                                                <a href="/storage/{{$d->pethealth_cer}}">Vaccination Certificate</a>
                                            </td>
                                            <td>
                                                {{$d->Content}}
                                            </td>
                                            <td>
                                                {{$d->c_at}}
                                            </td>
										</tr>
										@php
											$i++
										@endphp
									@endforeach

									</tbody>
								</table>										
							</div>
							<div class="card-footer clearfix">
								{{$people->links('vendor.pagination.bootstrap-5')}}
							</div>
						</div>
					</div>
					<!-- /.card -->
				</section>
@endsection