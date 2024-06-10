@extends('Layout')

@section('title_nm','Pet Donor::My Profile')

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
<h1 class="my-2 font-bold text-2xl mx-auto text-orange-600 text-center">Your Profile</h1>

<div class="grid place-items-center my-5">
  <div class="rounded-3xl p-6 w-full sm:w-[350px] md:w-[950px] text-white bg-black">
      <div class=" grid grid-cols-1 md:grid-row-3 ">
          <div class="grid-cols-2 grid  p-4">
              <img src="/storage/{{Auth::guard('donor')->user()->image}}" alt="" class="w-28 h-28 rounded-full border border-white">
              <button class="top-0 right-0 mt-4 mr-4 border bg-white rounded-md text-orange-600 border-orange-600 w-32 md:w-52 md:h-10 md:text-lg">
                <a href="{{route('editprofile-view')}}">Edit Profile</a>
            </button>
          </div>
          <div class="grid md:grid-cols-2 ">
              <div class=" p-2">
                  <p class=" text-lg md:text-3xl font-bold my-1">Full Name</p>
                  <p class=" text-md md:text-2xl">{{Auth::guard('donor')->user()->full_name}}</p>
              </div>
              <div class="p-2 ">
                  <p class="text-lg md:text-3xl font-bold my-1">State</p>
                  <p class="text-md md:text-2xl">{{Auth::guard('donor')->user()->state}}</p>
              </div>
          </div>
          <div class=" grid md:grid-cols-2 ">
              <div class="p-2 ">
                  <p class="text-lg md:text-3xl font-bold my-1">Email</p>
                  <p class="text-md md:text-2xl">{{Auth::guard('donor')->user()->email}}</p>
              </div>
              <div class="p-2 ">
                  <p class="text-lg md:text-3xl font-bold my-1">Contact Number</p>
                  <p class="text-md md:text-2xl">{{Auth::guard('donor')->user()->mobile_no}}</p>
              </div>
          </div>
      </div>
  </div>
</div>



@section('footer')
@include('Navbar And Footer.footer')

@section('script')
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
    </script>

