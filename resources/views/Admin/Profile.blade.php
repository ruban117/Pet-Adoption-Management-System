<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PAMS :: Administrative Panel</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{asset('admin-assests/plugins/fontawesome-free/css/all.min.css')}}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{asset('admin-assests/css/adminlte.min.css')}}">
		<link rel="stylesheet" href="{{asset('admin-assests/css/custom.css')}}">
	</head>
	<body class="hold-transition sidebar-mini">
        @if(session('success'))
        <div id="alert" class="alert alert-success mb-4 mr-4 rounded-lg shadow-md position-relative">
            <button id="close-alert" class="close" data-dismiss="alert">&times;</button>
            <p id="msg">{{ session('success') }}</p>
        </div>
        
        @endif

<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="{{route('admin.home')}}">Back To Dashboard</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <form action="{{route('admin.changeimage')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2 img-fluid" src="/storage/{{Auth::guard('admin')->user()->image}}" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <input class="btn btn-primary" type="file" name="image" accept="image/png, image/jpeg">
                        <button class="btn btn-primary my-2" type="submit">Upload new image</input>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form method="POST" action="{{route('admin.change-name')}}">
                        @csrf
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Full Name</label>
                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your Full name" value="{{Auth::guard('admin')->user()->full_name}}" name="full_name">
                            </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="{{Auth::guard('admin')->user()->email}}" disabled>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const closeAlertButton = document.getElementById('close-alert');
        const alertBox = document.getElementById('alert');

        closeAlertButton.addEventListener('click', function () {
            alertBox.style.display = 'none';
        });
    });
</script>


</body>
</html>