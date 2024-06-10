@extends('Layout')

@section('title_nm','Pet Details')

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
@foreach($pets as $p)
    <h1 class="text-center text-[#515252] text-4xl font-bold">Adopt {{$p->pet_name}}</h1>
    <div class="part-1 flex flex-col items-start justify-between px-5 py-5 space-y-5 lg:px-96">
        <p class="text-blue-600 font-bold lg:text-lg"><a href="{{route('adaptor-avliablepets')}}">< Back To Results</a></p>
        <p class="text-[#515252] text-lg font-bold lg:text-2xl">Heya !!! My Name Is {{$p->pet_name}}</p>
    </div>
    <div class="part-2 flex items-center justify-center">
        <img src="/storage/{{$p->pet_image}}" alt="" class="h-50 w-50 mx-auto lg:h-80 lg:w-80">
        </div>
        <div class="part-3 flex flex-col items-start justify-center py-8 px-5 lg:px-96">
            <h1 class="text-[#515252] text-lg font-bold mb-5 lg:text-2xl">Facts About Me</h1>
            <table>
                <tbody >
                    <tr>
                        <td class="pr-20 text-[#515252] font-bold text-lg lg:text-xl">Breed</td>
                        <td class="lg:text-xl">{{$p->pet_breed}}</td>
                    </tr>
                    <tr>
                        <td class="pr-20 text-[#515252] font-bold text-lg lg:text-xl">Vaccinated</td>
                        <td class="lg:text-xl">{{$p->pet_vaccination}}</td>
                    </tr>
                    <tr>
                        <td class="pr-20 text-[#515252] font-bold text-lg lg:text-xl">Gender</td>
                        <td class="lg:text-xl">{{$p->pet_gender}}</td>
                    </tr>
                    <tr>
                        <td class="pr-20 text-[#515252] font-bold text-lg lg:text-xl">Age</td>
                        <td class="lg:text-xl">{{$p->pet_age}}</td>
                    </tr>
                </tbody>
            </table>
            <hr class="border border-b border-black w-full mt-4">
            <h1 class="text-[#515252] text-lg font-bold pt-5 py-8">My Info</h1>
            <table>
            <tbody >
                <tr>
                    <td class="pr-20 text-[#515252] font-bold text-lg">
                        @if ($p->criteria_one == 'Neutered')
                            <img src="{{ asset('Images/green tik.png') }}" alt="" class="h-10 w-14">
                        @endif
                        @if ($p->criteria_one == 'Not Neutered')
                            <img src="{{ asset('Images/yello exclaim.jpg') }}" alt="" class="h-10 w-14">
                        @endif
                    </td>
                    
                    <td class="lg:text-xl">Neutered</td>
                </tr>
                <tr>
                    <td class="pr-20 text-[#515252] font-bold text-lg">
                        @if ($p->criteria_two == 'Yes')
                            <img src="{{ asset('Images/green tik.png') }}" alt="" class="h-10 w-14">
                        @endif
                        @if ($p->criteria_two == 'No')
                            <img src="{{ asset('Images/yello exclaim.jpg') }}" alt="" class="h-10 w-14">
                        @endif
                    </td>
                    
                    <td class="lg:text-xl">Shots Up To Date</td>
                </tr>
                <tr>
                    <td class="pr-20 text-[#515252] font-bold text-lg">
                        @if ($p->criteria_three == 'Yes')
                            <img src="{{ asset('Images/green tik.png') }}" alt="" class="h-10 w-14">
                        @endif
                        @if ($p->criteria_three == 'No')
                            <img src="{{ asset('Images/yello exclaim.jpg') }}" alt="" class="h-10 w-14">
                        @endif
                    </td>
                    
                    <td class="lg:text-xl">Good With Dogs</td>
                </tr>
                <tr>
                    <td class="pr-20 text-[#515252] font-bold text-lg">
                        @if ($p->criteria_four == 'Yes')
                            <img src="{{ asset('Images/green tik.png') }}" alt="" class="h-10 w-14">
                        @endif
                        @if ($p->criteria_four == 'No')
                            <img src="{{ asset('Images/yello exclaim.jpg') }}" alt="" class="h-10 w-14">
                        @endif
                    </td>
                    
                    <td class="lg:text-xl">Good With Kids</td>
                </tr>
                <tr>
                    <td class="pr-20 text-[#515252] font-bold text-lg"><img src="{{asset('Images/green tik.png')}}" alt="" class="h-10 w-14"></td>
                    <td class="lg:text-xl">Needs Loving Adoptor</td>
                </tr>
            </tbody>
        </table>
        <hr class="border border-b border-black w-full mt-4">
        <h1 class="text-[#515252] text-lg font-bold pt-5 py-8">My Story</h1>
            <div class="social flex flex-row items-start justify-between space-x-8">
                <p><a href=""><img src="{{asset('Images/facebook.jpg')}}" alt="" class="border rounded-3xl h-10 w-10"></a></p>
                <p><a href=""><img src="{{asset('Images/linkedin2.png')}}" alt="" class="border rounded-3xl h-10 w-10"></a></p>
            </div>
            <p class="pt-5 text-lg text-[#515252]">{{$p->donation_reason}}</p>

            <div class="contact flex flex-col items-start justify-between bg-[#f9f9f9] px-5 mt-5 space-y-5">
                <p class="text-red-500 text-sm font-bold py-5">*The Furever Family Finder does not ask for money for any adoption listed on website.</p>
                <p class="text-red-500 text-sm font-bold">*Please do not make any payment for transportation, vaccination etc of pet in advance.</p>
                <p class="text-red-500 text-sm font-bold">*Only make any payment upon arrival of the pet at your location.</p>
                <p class="text-red-500 text-sm font-bold">*Please report to The Furever Family Finder Support Team if anyone asks for money before making any payment.</p>

                <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-6 rounded-full mt-2">
                    <a href="{{route('adaptor-pet-questions',$p->p_id)}}">Adopt {{$p->pet_name}}</a>
                </button>
                
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


