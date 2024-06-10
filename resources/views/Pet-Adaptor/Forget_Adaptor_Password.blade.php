<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PAMS :: Adaptor Password Change</title>
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
        @elseif(session('error'))
        <div id="alert" class="alert alert-danger mb-4 mr-4 rounded-lg shadow-md position-relative">
            <button id="close-alert" class="close" data-dismiss="alert">&times;</button>
            <p id="msg">{{ session('error') }}</p>
        </div>
        
        @endif

<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Change Password</div>
                <div class="card-body">
                    <form method="POST" action="{{route('adaptor.forget')}}">
                        @csrf
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputEmailAddress">New Password</label>
                                <input class="form-control" name="newpassword" id="inputEmailAddress" type="password" placeholder="Enter your New Password">
                                @error('newpassword')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputEmailAddress">Confirm Password</label>
                                <input class="form-control" name="cpassword" id="inputEmailAddress" type="password" placeholder="Confirm Password">
                                @error('cpassword')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 d-grid gap-2 mt-4">
                                <button class="btn btn-primary" type="submit">Save changes</button>
                            </div>
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