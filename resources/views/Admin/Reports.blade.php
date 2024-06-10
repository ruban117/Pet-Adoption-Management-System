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
								<h1>All Reports</h1>
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
                                            <th>Reporter Name</th>
                                            <th>Reporter Email</th>
											<th>Reported Against Name</th>
											<th>Reported Against Email</th>
                                            <th>Report Content</th>
                                            <th>Sent Warning</th>
											<th>Block User</th>
										</tr>
									</thead>
									<tbody>
										@php
											$i=1
										@endphp
									@foreach ($reports as $d)
										<tr>
											<td>
												{{$i}}
											</td>
											<td>{{$d->reported_by}}</td>
											<td>{{$d->reporter_email}}</td>
											<td>
                                                {{$d->report_to}}
                                            </td>
											<td>{{$d->reportie_email}}</td>
                                            <td>{{$d->report_content}}</td>
                                            <td>
												<form action="{{route('admin.warning')}}" method="post">
													@csrf
													<input type="hidden" name="reportie_email" id="" value="{{$d->reportie_email}}">
													<input type="hidden" name="reportie_name" id="" value="{{$d->report_to}}">
													<button type="submit" class="btn btn-warning">Warning</button>
												</form>
                                            </td>
                                            <td>
                                                <form action="{{route('admin.block')}}" method="post">
													@csrf
													<input type="hidden" name="reporter_email" id="" value="{{$d->reporter_email}}">
													<input type="hidden" name="reporter_name" id="" value="{{$d->reported_by}}">
													<input type="hidden" name="reportie_email" id="" value="{{$d->reportie_email}}">
													<input type="hidden" name="reportie_name" id="" value="{{$d->report_to}}">
													<input type="hidden" name="reportie_user" id="" value="{{$d->reported_person}}">
													<button type="submit" class="btn btn-danger">Block</button>
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
								{{$reports->links('vendor.pagination.bootstrap-5')}}
							</div>
						</div>
					</div>
					<!-- /.card -->
				</section>
@endsection