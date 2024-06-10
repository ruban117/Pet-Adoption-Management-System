@extends('Layout')

@section('title_nm','Donor::Update Profile')

@section('Navbar')
@include('Pet-Donors.NAV.AuthNav')

@section('Main')
<div id="dropdown-content" class="hidden flex flex-col items-center justify-between absolute z-10 right-0 mt-0 w-48 bg-white rounded-md shadow-lg space-y-4">
  <div class="part-1 flex flex-row items-center justify-between space-x-4">
    <img src="{{asset('Images/dashboard.webp')}}" alt="" class="h-6 w-6">
    <a href="{{route('donor-dashboard')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold">Dashboard</a>
  </div>
    <div class="part-1 flex flex-row items-center justify-between space-x-4">
      <img src="{{asset('Images/profile.png')}}" alt="" class="h-6 w-6">
      <a href="{{route('my-profile')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold">My Profile</a>
    </div>
    <div class="part-1 flex flex-row items-center justify-between">
      <img src="{{asset('Images/my-pets.png')}}" alt="" class="h-6 w-6">
      <a href="{{ route('donor-pets') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold ml-8">My Pets</a>
    </div>
    <div class="part-1 flex flex-row items-center justify-between">
      <img src="{{asset('Images/address.png')}}" alt="" class="h-6 w-6">
      <a href="{{route('change-password-view')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold ml-1">Change Password</a>
    </div>
    <div class="part-1 flex flex-row items-center justify-between">
      <img src="{{asset('Images/history.png')}}" alt="" class="h-6 w-6">
      <a href="{{route('Request-view')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold ml-1">My History</a>
    </div>
    <div class="part-1 flex flex-row items-center justify-between">
      <img src="{{asset('Images/history.png')}}" alt="" class="h-6 w-6">
      <a href="{{route('donor-pet-status')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold ml-[1.5rem]">Pet Status</a>
    </div>
    <div class="part-1 flex flex-row items-center justify-between">
      <img src="{{asset('Images/logout.png')}}" alt="" class="h-6 w-6">
      <a href="{{route('donor-logout')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold ml-[1.5rem]">Logout</a>
    </div>
</div>


<h1 class="text-2xl font-bold text-[#515279] text-center mt-5">Edit Donor Profile</h1>
<hr class="mx-28 mt-5 font-bold">



@if(session('success'))
        <div id="alert" class="mb-4 mr-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-md relative">
            <button id="close-alert" class="absolute top-0 right-0 -mt-1 -mr-1 px-2 py-1 text-white">&times;</button>
            <p id="msg">{{ session('success') }}</p>
        </div>
        @endif
<form action="{{route('editprofile-image')}}" class="flex flex-col items-start justify-center px-8 mt-8 space-y-7 md:px-72" enctype="multipart/form-data" method="POST">
    <a href="{{route('my-profile')}}" class="font-bold text-blue-500">Back</a>
    @csrf
    <div class="image space-y-4 flex flex-col">
        <label for="" class="text-sm font-bold text-[#5b5047]">Upload Your Image <span class="text-red-600">*</span></label>
        <img src="/storage/{{Auth::guard('donor')->user()->image}}" alt="" class="h-10 w-10">
        <input type="file" name="image" class="@error('image')
        border-red-600 @enderror" value="">
        @error('image')
          <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>
    <div class="image space-y-4 flex items-center justify-center">
        <button type="submit" class="bg-orange-600 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
      </div>
</form>

<form action="{{route('editprofile-one')}}" class="flex flex-col items-start justify-center px-8 mt-8 space-y-7 md:px-72" enctype="multipart/form-data" method="POST">
    
  @csrf
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Full Name? <span class="text-red-600">*</span></label>
    <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline md:w-[34rem] @error('name')
    border-red-600 @enderror" value="{{Auth::guard('donor')->user()->full_name}}">
    @error('name')
    <p class="text-red-500">{{$message}}</p>
  @enderror
  </div>
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Email Address <span class="text-red-600">*</span></label>
    <input type="email" disabled id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline md:w-[34rem] @error('email')
    border-red-600 @enderror" value="{{Auth::guard('donor')->user()->email}}">
    @error('email')
    <p class="text-red-500">{{$message}}</p>
  @enderror
  </div>
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Mobile Number <span class="text-red-600">*</span></label>
    <input type="number" id="mobile" name="mobile" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline md:w-[34rem] @error('mobile')
    border-red-600 @enderror" value="{{Auth::guard('donor')->user()->mobile_no}}">
    @error('mobile')
    <p class="text-red-500">{{$message}}</p>
  @enderror
  </div>
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Address <span class="text-red-600">*</span></label>
    <input type="text" id="address" name="address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline md:w-[34rem] @error('address')
    border-red-600 @enderror" value="{{Auth::guard('donor')->user()->address}}">
    @error('address')
    <p class="text-red-500">{{$message}}</p>
  @enderror
  </div>
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Select State? <span class="text-red-600">*</span></label>
    <select name="state" id="state" class="h-9 w-60 border md:w-[34rem]  @error('state')
    border-red-600 @enderror">
        <option selected value="{{Auth::guard('donor')->user()->state}}">{{Auth::guard('donor')->user()->state}}</option>
        <option value="Andhra Pradesh">Andhra Pradesh</option>
        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
        <option value="Assam">Assam</option>
        <option value="Bihar">Bihar</option>
        <option value="Chhattisgarh">Chhattisgarh</option>
        <option value="Goa">Goa</option>
        <option value="Gujarat">Gujarat</option>
        <option value="Haryana">Haryana</option>
        <option value="Himachal Pradesh">Himachal Pradesh</option>
        <option value="Jharkhand">Jharkhand</option>
        <option value="Karnataka">Karnataka</option>
        <option value="Kerala">Kerala</option>
        <option value="Maharashtra">Maharashtra</option>
        <option value="Madhya Pradesh">Madhya Pradesh</option>
        <option value="Manipur">Manipur</option>
        <option value="Meghalaya">Meghalaya</option>
        <option value="Mizoram">Mizoram</option>
        <option value="Nagaland">Nagaland</option>
        <option value="Odisha">Odisha</option>
        <option value="Punjab">Punjab</option>
        <option value="Rajasthan">Rajasthan</option>
        <option value="Sikkim">Sikkim</option>
        <option value="Tamil Nadu">Tamil Nadu</option>
        <option value="Tripura">Tripura</option>
        <option value="Telangana">Telangana</option>
        <option value="Uttar Pradesh">Uttar Pradesh</option>
        <option value="Uttarakhand">Uttarakhand</option>
        <option value="West Bengal">West Bengal</option>
        <option value="Andaman & Nicobar">Andaman & Nicobar (UT)</option>
        <option value="Chandigarh">Chandigarh (UT)</option>
        <option value="Dadra & Nagar Haveli and Daman & Diu">Dadra & Nagar Haveli and Daman & Diu (UT)</option>
        <option value="Delhi">Delhi [National Capital Territory (NCT)]</option>
        <option value="Jammu & Kashmir">Jammu & Kashmir (UT)</option>
        <option value="Ladakh">Ladakh (UT)</option>
        <option value="Lakshadweep">Lakshadweep (UT)</option>
        <option value="Puducherry">Puducherry (UT)</option>
    </select>
      @error('state')
      <p class="text-red-500">{{$message}}</p>
    @enderror
  </div>
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Pin-Code <span class="text-red-600">*</span></label>
    <input type="number" id="pin-code" name="pin_code" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline md:w-[34rem] @error('pin_code')
    border-red-600 @enderror" value="{{Auth::guard('donor')->user()->pin_code}}">
    @error('pin_code')
    <p class="text-red-500">{{$message}}</p>
  @enderror
  </div>
  
  <div class="image space-y-4 flex items-center justify-center">
    <button type="submit" class="bg-orange-600 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
  </div>
</form>


@section('footer')
@include('Navbar And Footer.footer')
<script>
  document.addEventListener('DOMContentLoaded', function () {
  const hamburgerMenu = document.getElementById('hamburger-menu');
  const menuOverlay = document.getElementById('menu-overlay');
  const closeMenuButton = document.getElementById('close-menu');

  hamburgerMenu.addEventListener('click', function () {
      menuOverlay.classList.remove('hidden');
  });

  closeMenuButton.addEventListener('click', function () {
      menuOverlay.classList.add('hidden');
  });
  });
  document.addEventListener('DOMContentLoaded', function () {
        const closeAlertButton = document.getElementById('close-alert');
        const alertBox = document.getElementById('alert');

        closeAlertButton.addEventListener('click', function () {
            alertBox.style.display = 'none';
        });
    });
</script>