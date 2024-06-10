@extends('Layout')

@section('title_nm','Re-Home Or Adopt A Pet From Nearby Location')

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
<h1 class="text-2xl font-bold text-[#515279] text-center mt-5">Your Adopted Pets</h1>
@if(session('success'))
                <div id="alert" class="mb-4 mr-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-md relative">
                    <button id="close-alert" class="absolute top-0 right-0 -mt-1 -mr-1 px-2 py-1 text-white">&times;</button>
                    <p id="msg">{{ session('success') }}</p>
                </div>
                @endif

<div class="flex justify-center items-start mt-8 mb-7">
  <div class="bg-white shadow appearance-none border rounded h-96 w-72 md:w-[40rem] lg:w-[80rem] relative flex flex-col items-center justify-center">
      @foreach($pets as $p)
      <a href="{{ route('show-adaptor-pet', $p->p_id) }}" class="mt-5">
          <div class="bg-white shadow appearance-none border rounded h-14 w-44 flex flex-row items-center justify-center space-x-4">
              <img src="{{asset('Images/dogavatar.jpg')}}" alt="" class="h-10 w-10">
              <p class="text-sm font-bold">{{$p->pet_name}}</p>
          </div>
      </a>
      @endforeach
      <div class="mt-5">
        {{ $pets->links() }}
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

        document.addEventListener('DOMContentLoaded', function () {
        const closeAlertButton = document.getElementById('close-alert');
        const alertBox = document.getElementById('alert');

        closeAlertButton.addEventListener('click', function () {
            alertBox.style.display = 'none';
        });
      });
    </script>

