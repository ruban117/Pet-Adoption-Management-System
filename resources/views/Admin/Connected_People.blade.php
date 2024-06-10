@extends('Admin.Layouts.app')

@section('content')


<!-- Content Wrapper. Contains page content -->
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>All Pets</h1>
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
                                            <th>Requested Pet Image</th>
                                            <th>Requester Name</th>
											<th>Requested To</th>
											<th>Requested Pet Name</th>
                                            <th>Requested Pet Type</th>
                                            <th>Requested Pet Breed</th>
											<th>Status</th>
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
                                            <td>
												<img src="/storage/{{$d->pet_image}}" class='img-circle elevation-2' width="40" height="40" alt="">
											</td>
											<td>{{$d->a_fname}}</td>
											<td>{{$d->d_fname}}</td>
											<td>
                                                {{$d->pet_name}}
                                            </td>
											<td>{{$d->pet_type}}</td>
                                            <td>{{$d->pet_breed}}</td>
                                            <td>@if ($d->r_status == 0)
												Pending

											@elseif ($d->r_status == 1)
												Accepted
                                            @elseif ($d->r_status == 2)
                                                Rejected
											@endif</td>
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