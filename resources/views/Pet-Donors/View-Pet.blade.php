@extends('Layout')

@section('title_nm','PET DONORS::VIEW PET DETAILS')

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
<h1 class="text-2xl font-bold text-[#515279] text-center mt-5">Your Pets</h1>

<div class="flex justify-center items-start mt-8 mb-7"> 
    <!-- Adjusted flex and items properties here -->
    <div class="bg-white shadow appearance-none border rounded h-96 w-72 md:w-[40rem] lg:w-[80rem] relative flex flex-col items-center justify-center"> 
        @foreach($pets as $pet)
        <div class="bg-white shadow appearance-none border rounded h-14 w-44 flex flex-row items-center justify-center space-x-4">
            <img src="{{asset('Images/dogavatar.jpg')}}" alt="" class="h-10 w-10">
            <p class="text-sm font-bold">{{$pet->pet_name}}</p> 
            <a href="{{route('update-pet',$pet->p_id)}}" class="font-bold text-blue-500">Edit</a>
        </div>
        <div class="flex flex-col items-center justify-between bg-white shadow appearance-none border rounded h-52 w w-60 mt-4 py-4">
            <p class="font-bold">Breed Name:- {{$pet->pet_breed}}</p>
            <p class="font-bold">Gender:- {{$pet->pet_gender}}</p>
            <p class="font-bold">Age:- {{$pet->pet_age}}</p>
            <p class="font-bold">Vaccinated?:- {{$pet->pet_vaccination}}</p>
        </div>
        @endforeach
        <a href="{{ route('donor-pets', Auth::guard('donor')->user()->id) }}" class="text-blue-600 font-bold mt-3">Back</a>
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

