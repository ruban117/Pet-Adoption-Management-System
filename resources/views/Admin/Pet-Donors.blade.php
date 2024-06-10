@extends('Admin.Layouts.app')

@section('content')


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

<!-- Content Wrapper. Contains page content -->
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Pet Donors</h1>
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
                                            <th>Image</th>
											<th>Name</th>
											<th>Email</th>
											<th>Phone</th>
											<th>State</th>
											<th width="100">Status</th>
											<th width="100">Unblock</th>
										</tr>
									</thead>
									<tbody>
										@php
											$i=1
										@endphp
									@foreach ($donors as $d)
										<tr>
											<td>
												{{$i}}
											</td>
                                            <td>
												<img src="/storage/{{$d->image}}" class='img-circle elevation-2' width="40" height="40" alt="">
											</td>
											<td>{{$d->full_name}}</td>
											<td>{{$d->email}}</td>
											<td>{{$d->mobile_no}}</td>
											<td>{{$d->state}}</td>
											<td>
												@if ($d->is_block == 1)
													<svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
														<path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
													</svg>

												@elseif ($d->is_block == 0)
													<svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
														<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
													</svg>
												@endif
											</td>
											<td>
												<form action="{{route('admin.donor.unblock')}}" method="POST">
													@csrf
													<input type="hidden" name="full_name" id="" value="{{$d->full_name}}">
													<input type="hidden" name="email" id="" value="{{$d->email}}">
													<button class="btn btn-primary" type="submit">Unblock</button>
												</form>
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
								{{$donors->links()}}
							</div>
						</div>
					</div>
					<!-- /.card -->
				</section>
@endsection