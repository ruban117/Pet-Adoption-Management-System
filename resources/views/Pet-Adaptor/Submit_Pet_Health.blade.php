@extends('Layout')

@section('title_nm','PET ADOPTERS::VIEW PET DETAILS')

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
@foreach ($pets as $p)
    

<h1 class="text-2xl font-bold text-[#515279] text-center mt-5">Submit Pet Health For {{$p->pet_name}}</h1>

<div class="flex justify-center items-start mt-8 mb-7"> 
    <!-- Adjusted flex and items properties here -->
    <div class="bg-white shadow appearance-none border rounded h-96 w-72 md:w-[40rem] lg:w-[80rem] relative flex flex-col items-center justify-center"> 
        <form action="{{route('submit-pet-health',$p->p_id)}}" class="flex flex-col items-start justify-center px-8 mt-8 space-y-7 md:px-72" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="old_owner_id" id="" value="{{$p->old_owner_id}}">
            <div class="image space-y-4 flex flex-col">
                <label for="" class="text-sm font-bold text-[#5b5047]">Upload Your Pet's Image <span class="text-red-600">*</span></label>
                <input type="file" name="image" class="@error('image')
                border-red-600 @enderror" >
                @error('image')
                  <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="image space-y-4 flex flex-col">
                <label for="" class="text-sm font-bold text-[#5b5047]">Upload Your Pet's Vaccination Certificate <span class="text-red-600">*</span></label>
                <input type="file" name="certificate" class="@error('certificate')
                border-red-600 @enderror" >
                @error('certificate')
                  <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="image space-y-4 flex flex-col">
                <label for="" class="text-sm font-bold text-[#5b5047]">Your Feelings <span class="text-red-600">*</span></label>
                <textarea name="feelings" id="" cols="30" rows="2" class="border @error('feelings')
                border-red-600 @enderror"></textarea>
                @error('feelings')
                  <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="image space-y-4 flex items-center justify-center">
                <button type="submit" class="bg-orange-600 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
              </div>
        </form>
        <a href="{{ route('adaptor-pets')}}" class="text-blue-600 font-bold mt-1">Back</a>
    </div>
</div>

@endforeach


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

