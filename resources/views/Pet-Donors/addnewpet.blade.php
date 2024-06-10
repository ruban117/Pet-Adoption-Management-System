@extends('Layout')

@section('title_nm','Donor::Add New Pet')

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


<h1 class="text-2xl font-bold text-[#515279] text-center mt-5">Add New Pet</h1>
<hr class="mx-28 mt-5 font-bold">

@if(session('success'))
        <div id="alert" class="mb-4 mr-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-md relative">
            <button id="close-alert" class="absolute top-0 right-0 -mt-1 -mr-1 px-2 py-1 text-white">&times;</button>
            <p id="msg">{{ session('success') }}</p>
        </div>
        @endif

<form action="{{route('add-pet')}}" class="flex flex-col items-start justify-center px-8 mt-8 space-y-7 md:px-72" enctype="multipart/form-data" method="POST">
  @csrf
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Upload Your Pet's Image <span class="text-red-600">*</span></label>
    <input type="file" name="image" class="@error('image')
    border-red-600 @enderror">
    @error('image')
      <p class="text-red-500">{{$message}}</p>
    @enderror
  </div>
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Pet's Name? <span class="text-red-600">*</span></label>
    <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline md:w-[34rem] @error('name')
    border-red-600 @enderror">
    @error('name')
    <p class="text-red-500">{{$message}}</p>
  @enderror
  </div>
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Pet's Type? <span class="text-red-600">*</span></label>
      <select name="pettype" id="pettype" class=" md:w-[34rem] h-9 w-60 border  @error('pettype')
                    border-red-600 @enderror">
                        <option disabled selected>--SELECT Type--</option>
                        <option value="Dog">Dog</option>
                        <option value="Cat">Cat</option>
                        
      </select>
      @error('pettype')
      <p class="text-red-500">{{$message}}</p>
    @enderror
  </div>
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047] ">Pet's Breed? <span class="text-red-600">*</span></label>
      <select name="breed" id="breed" class=" md:w-[34rem] h-9 w-60 border  @error('breed')
                    border-red-600 @enderror">
                        <option disabled selected>--SELECT BREED--</option>
                        <option value="Golden Retriever">Golden Retriever</option>
                        <option value="German Shepherd">German Shepherd</option>
                        <option value="French Bulldog">French Bulldog</option>
                        <option value="Pug">Pug</option>
                        <option value="British Shorthair">British Shorthair</option>
                        <option value="Pomeranian">Pomeranian</option>
                        <option value="Labrador Retriever">Labrador Retriever</option>
                        <option value="American Shorthair">American Shorthair Cat</option>
                        <option value="Maine Coon">Maine Coon Cat</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Beagle">Beagle</option>
                        <option value="Persian cat">Persian cat</option>
                        <option value="Ragdoll">Ragdoll</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="Border Collie Cat">Border Collie Cat</option>
                        <option value="Maltese">Maltese</option>
                        <option value="Boston Terrier">Boston Terrier</option>
                        <option value="King Charles Spaniel">King Charles Spaniel</option>
                        <option value="Siamese">Siamese</option>
                        <option value="Desi Street Dog">Desi Street Dog</option>
                        <option value="Desi Street Cat">Desi Street Cat</option>
        </select>
      @error('breed')
        <p class="text-red-500">{{$message}}</p>
      @enderror
  </div>
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Pet's Age? <span class="text-red-600">*</span></label>
      <select name="petage" id="petage" class="md:w-[34rem] h-9 w-60 border  @error('petage')
                    border-red-600 @enderror">
                        <option disabled selected>--SELECT AGE--</option>
                        <option value="Upto 6 Months">Upto 6 Months</option>
                        <option value="6 To 18 Months">6 To 18 Months</option>
                        <option value="1.5 To 3 Years">1.5 To 3 Years</option>
                        <option value="3 Years Or More">3 Years Or More</option>
                        
      </select>
      @error('petage')
        <p class="text-red-500">{{$message}}</p>
      @enderror
  </div>

  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Pet's Gender? <span class="text-red-600">*</span></label>
      <select name="petgender" id="pet-gender" class="md:w-[34rem] h-9 w-60 border  @error('petgender')
                    border-red-600 @enderror">
                        <option disabled selected>--SELECT GENDER--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
      </select>
      @error('petgender')
      <p class="text-red-500">{{$message}}</p>
    @enderror
  </div>
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Pet's Vaccination? <span class="text-red-600">*</span></label>
      <select name="petvaccination" id="petvaccination" class="md:w-[34rem] h-9 w-60 border  @error('petvaccination')
                    border-red-600 @enderror">
                        <option disabled selected>--SELECT VACCINATION STATUS--</option>
                        <option value="Vaccinated">Vaccinated</option>
                        <option value="Not Vaccinated">Not Vaccinated</option>
      </select>
      @error('petvaccination')
      <p class="text-red-500">{{$message}}</p>
    @enderror
  </div>
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Pet's Neutered? <span class="text-red-600">*</span></label>
      <select name="petneutered" id="petneutered" class="md:w-[34rem] h-9 w-60 border  @error('petneutered')
                    border-red-600 @enderror">
                        <option disabled selected>--SELECT--</option>
                        <option value="Neutered">Neutered</option>
                        <option value="Not Neutered">Not Neutered</option>
      </select>
    @error('petneutered')
      <p class="text-red-500">{{$message}}</p>
    @enderror
  </div>
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Shots Up To Date? <span class="text-red-600">*</span></label>
      <select name="shotsuptodate" id="shotsuptodate" class="md:w-[34rem] h-9 w-60 border  @error('shotsuptodate')
                    border-red-600 @enderror">
                        <option disabled selected>--SELECT--</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
      </select>
      @error('shotsuptodate')
      <p class="text-red-500">{{$message}}</p>
    @enderror
  </div>
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Good With Dogs? <span class="text-red-600">*</span></label>
      <select name="gooddogs" id="gooddogs" class="md:w-[34rem] h-9 w-60 border  @error('gooddogs')
                    border-red-600 @enderror">
                        <option disabled selected>--SELECT--</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
      </select>
    @error('gooddogs')
      <p class="text-red-500">{{$message}}</p>
    @enderror
  </div>
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Good With Kids? <span class="text-red-600">*</span></label>
      <select name="goodkids" id="good-kids" class="md:w-[34rem] h-9 w-60 border  @error('goodkids')
                    border-red-600 @enderror">
                        <option disabled selected>--SELECT--</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
      </select>
      @error('goodkids')
      <p class="text-red-500">{{$message}}</p>
    @enderror
  </div>
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Why you want to donate your pet? <span class="text-red-600">*</span></label>
      <textarea name="donationreason" id="" cols="30" rows="10" class="md:w-[34rem] shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('donationreason')
      border-red-600 @enderror"></textarea>
      @error('donationreason')
      <p class="text-red-500">{{$message}}</p>
    @enderror
  </div>
  <div class="image space-y-4 flex flex-col">
    <label for="" class="text-sm font-bold text-[#5b5047]">Upload Your Pet's Vaccination Certificate</label>
    <input type="file" name="cretificate_pdf" class="@error('cretificate_pdf')
    border-red-600 @enderror">
    @error('cretificate_pdf')
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