@extends('Layout')

@section('title_nm','Donor::Change Password')

@section('Navbar')
@include('Pet-Adaptor.NAV.AuthNav')

@section('Main')
<div id="dropdown-content" class="hidden flex flex-col items-center justify-between absolute z-10 right-0 mt-0 w-48 bg-white rounded-md shadow-lg space-y-4">
  <div class="part-1 flex flex-row items-center justify-between space-x-4">
      <img src="{{asset('Images/dashboard.webp')}}" alt="" class="h-6 w-6">
      <a href="{{route('adaptor-dashboard')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold">Dashboard</a>
    </div>
  <div class="part-1 flex flex-row items-center justify-between space-x-4">
    <img src="{{asset('Images/profile.png')}}" alt="" class="h-6 w-6">
    <a href="{{route('adaptor-my-profile')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold">My Profile</a>
  </div>
  <div class="part-1 flex flex-row items-center justify-between">
    <img src="{{asset('Images/my-pets.png')}}" alt="" class="h-6 w-6">
    <a href="{{ route('adaptor-pets') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold ml-8">My Pets</a>
  </div>
  <div class="part-1 flex flex-row items-center justify-between">
    <img src="{{asset('Images/address.png')}}" alt="" class="h-6 w-6">
    <a href="{{route('adaptor-change-password-view')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold ml-1">Change Password</a>
  </div>
  <div class="part-1 flex flex-row items-center justify-between">
    <img src="{{asset('Images/history.png')}}" alt="" class="h-6 w-6">
    <a href="{{route('Adaptor-History-view')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold ml-1">My History</a>
  </div>
  <div class="part-1 flex flex-row items-center justify-between">
    <img src="{{asset('Images/logout.png')}}" alt="" class="h-6 w-6">
    <a href="{{route('adaptor-logout')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold ml-[1.5rem]">Logout</a>
  </div>
</div>


<h1 class="text-2xl font-bold text-[#515279] text-center mt-5">Change Your Password</h1>
<hr class="mx-28 mt-5 font-bold">



@if(session('success'))
        <div id="alert" class="mb-4 mr-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-md relative">
            <button id="close-alert" class="absolute top-0 right-0 -mt-1 -mr-1 px-2 py-1 text-white">&times;</button>
            <p id="msg">{{ session('success') }}</p>
        </div>
        @endif
        @if(session('error'))
        <div id="alert" class="mb-4 mr-4 bg-red-500 text-white px-4 py-2 rounded-lg shadow-md relative">
            <button id="close-alert" class="absolute top-0 right-0 -mt-1 -mr-1 px-2 py-1 text-white">&times;</button>
            <p id="msg">{{ session('error') }}</p>
        </div>
        @endif

<form action="{{route('adaptor-change-password-action')}}" class="flex flex-col items-start justify-center px-8 mt-8 space-y-7 md:px-72" enctype="multipart/form-data" method="POST">
    
  @csrf
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Enter Your Old Password <span class="text-red-600">*</span></label>
    <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline md:w-[34rem] @error('password')
    border-red-600 @enderror">
    @error('password')
    <p class="text-red-500">{{$message}}</p>
  @enderror
  </div>
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Enter Your New Password <span class="text-red-600">*</span></label>
    <input type="password" id="password" name="newpassword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline md:w-[34rem] @error('newpassword')
    border-red-600 @enderror">
    @error('newpassword')
    <p class="text-red-500">{{$message}}</p>
  @enderror
  </div>
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Confirm Password <span class="text-red-600">*</span></label>
    <input type="password" id="cpassword" name="cpassword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline md:w-[34rem] @error('cpassword')
    border-red-600 @enderror">
    @error('cpassword')
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