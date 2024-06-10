@extends('Layout')

@section('title_nm','Manage And Update Pet Details')

@section('Navbar')
@include('Pet-Donors.NAV.AuthNav')

@section('Main')
<div class="hero">
    <div class="relative">
        <!-- Dropdown content -->
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
      </div><div id="dropdown-content" class="hidden flex flex-col items-center justify-between absolute z-10 right-0 mt-0 w-48 bg-white rounded-md shadow-lg space-y-4">
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
      <img src={{asset('Images/home-hero.jpg')}} alt="Image" class="w-full h-auto md:h-[30rem]">
      <div
        class="absolute bottom-0 left-10 right-10 bg-white h-1/3 border-l border-r border-t border-opacity-25 md:left-60 md:right-60 flex flex-col z-0">
        <p class="text-center font-bold text-[#515252] md:text-2xl md:mt-5">Welcome {{Auth::guard('donor')->user()->full_name}}</p>
        <p class="text-center text-sm md:text-lg text-[#515252]">Every Pet Deserves a Good Home. #FureverFamilyFinder
        </p>
        <button
          class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-6 md:mx-20 rounded-full mt-10 md:my-auto hidden md:block"><a href="{{route('donor-pets')}}">Donate A Pet</a></button>


      </div>
    </div>
    <div
      class="mx-10 md:mx-60 bg-white h-28 md:h-11 border-l border-r border-b border-opacity-25 flex flex-col justify-center px-10 ">
      <button
        class="bg-orange-500 hover:bg-orange-700 text-white  py-2 px-4 md:hidden rounded-full mt-10 md:my-auto">See Your
        Choice</button>
    </div>
    <h1 class="text-center text-[#515252] px-10 mt-6 text-xl font-bold lg:text-3xl">Your Pet Adoption Journey With The
      Furever
      Family Finder</h1>

    <div class="phase3 flex flex-col justify-between items-center py-10 lg:flex-row lg:px-36">
      <div class="part1 h-56 w-56 lg:h-[30rem] lg:w-[30rem]"><img src="{{asset('Images/adopt-me.jpg')}}" alt=""></div>
      <div class="part2 h-auto w-full md:w-1/2 flex items-center p-2 mt-4 md:mt-0">
        <table class="table-fixed">
          <tbody>
            <tr>
              <td><img src="{{asset('Images/search.png')}}" alt="" class="h-10 w-10 mr-10"></td>
              <td class="lg:text-lg"><b>Search Pet</b><br>Adopt a dog or cat who's right for you. Simply enter your city
                above to start your search.</td>
            </tr>
            <tr>
              <td><img src="{{asset('Images/connect.png')}}" alt="" class="h-10 w-10 mr-10"></td>
              <td class="lg:text-lg"><b>Connect</b><br>Once you find a pet, click "show number" to get contact info for
                their pet parent or rescue. Contact them to learn more about how to meet and adopt the pet.</td>
            </tr>
            <tr>
              <td><img src="{{asset('Images/adopt.png')}}" alt="" class="h-10 w-10 mr-10"></td>
              <td class="lg:text-lg"><b>Adopt</b><br>The rescue or pet parents will walk you through their adoption
                process. Prepare your home for the arrival of your fur baby to help them adjust to their new family.
              </td>
            </tr>
            <tr>
              <td><img src="{{asset('Images/vaccination.png')}}" alt="" class="h-10 w-10 mr-10"></td>
              <td class="lg:text-lg"><b>Free Vet Consultation</b><br>Furever Family Finder will help your pet to settle
                down in its new home, once you complete the Adoption journey reach out to us for free vet consultation.
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div>
      <h1 class="text-center text-[#515252] px-10 mt-6 text-xl font-bold lg:text-3xl">How It Works?</h1>
      <div class="flex flex-col items-center justify-center space-y-5 lg:flex-row lg:justify-between lg:px-44">
        <div class="one flex flex-col justify-center items-center">
          <img src="{{asset('Images/search.jpg')}}" alt="" class="h-14 w-14">
          <p class="font-bold text-lg text-[#515252]">Search</p>
          <p class="text-sm">Simply enter your city start your search</p>
        </div>
        <div class="two flex flex-col justify-center items-center">
          <img src="{{asset('Images/meet.png')}}" alt="" class="h-14 w-14">
          <p class="font-bold text-lg text-[#515252]">Meet</p>
          <p class="text-sm">Schedule your appointment</p>
        </div>
        <div class="three flex flex-col justify-center items-center">
          <img src="{{asset('Images/cart.png')}}" alt="" class="h-14 w-14">
          <p class="font-bold text-lg text-[#515252]">Adopt</p>
          <p class="text-sm">Finally adopt the dog or cat you love</p>
        </div>
      </div>
    </div>
    <div class="phase-4 relative">
      <img src="{{asset('Images/phase 4.jpg')}}" alt="" class="h-[28rem] w-full object-cover">
      <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white">
        <h2 class="text-sm md:text-lg mt-24 font-bold">Approximately 1478 dogs & cats die every day on road in India. We are on a mission to provide every dog and cat a home before 2035. It’s just one of the many ways The Furever Family Finder! gives back and helps you become a part of something larger. </h2>
        <button class="h-10 w-40 border rounded-full bg-white text-black font-bold hover:bg-orange-600 focus:bg-orange-600 transition-colors duration-300 mt-10">
          <a href="">Donate A Pet</a>
        </button>
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

