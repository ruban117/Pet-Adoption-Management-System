@extends('Layout')

@section('title_nm','About Furever Family Member')

@section('Navbar')
@include('Navbar And Footer.navbar')

@section('Main')
<div class="hero relative">
    <img src="{{asset('Images/About-Us Banner.jpg')}}" alt="" class="w-full  h-48 md:h-80 lg:h-[28rem]">
    <div class="absolute left-0 top-4 p-4 w-56 md:ml-24 md:w-72 md:py-16 lg:w-[35rem] lg:mt-20">
        <p class="text-black font-bold text-center md:text-2xl lg:text-5xl">About The Furever Family Finder</p>
        <div class="w-48 md:w-64 md:py-4 lg:w-[34rem] lg:py-6">
            <p class="text-black  text-center md:text-lg lg:text-3xl">Founded in 2024, ThePetNest is the India’s largest network of 5-star pet care service providers.</p>
        </div>
    </div>
    <div class="phase-2 flex flex-col justify-center  py-5 px-4 space-y-5 lg:px-40">
        <p class="text-left text-[#515252] font-bold">Whether you need in-home pet grooming, pet boarding, pet training, dog walking, pet insurance, pet relocation, or vet on call, ThePetNest connects pet parents with pet care heroes who’ll treat their pet like family.</p>
        <p class="text-left text-[#515252] font-bold">We understand your pet is family. And you can trust us to keep your pet happy, healthy, and sweet as ever.</p>
        <p class="text-left text-[#515252] font-bold">But it’s not just about pet love. ThePetNest is also committed to making pet care safe, easy, and affordable so that everyone can experience the unconditional love of a pet. Whatever you and your furr babies are into, we’re into it too. And we’ve got your back. Anytime. Anywhere.</p>
        <p class="text-left text-[#515252] font-bold">ThePetNest donates a portion of every service to Pet NGO’s & Rescue shelters through this program. We also provide meals to shelter dogs in India.</p>
    </div>

    <div class="phase-4 flex flex-col justify-between items-center py-5 bg-[#f4f5f6]">
        <p class="text-center font-bold lg:text-2xl text-[#515252] text-lg">Millions of services booked. Thousands of wagging tails.</p>
        <div class="counts flex flex-row items-center  justify-between py-5 space-x-2">
            <p class="text-lg text-blue-600 font-bold">35+ Cities</p>
            <p class="text-lg text-blue-600 font-bold">1500 Heroes</p>
            <p class="text-lg text-blue-600 font-bold">96% Reviews</p>
        </div>
        <p class="text-center font-bold lg:text-2xl text-[#515252] text-lg">5-Star Petcare Heroes in your neighborhood</p>
        <div class="tics flex flex-col justify-between py-5">
            <ul class="list-none">
                <li class="flex items-center">
                    <svg class="w-4 h-4 mr-2 text-[#515252]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Background or identity checks
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 mr-2 text-[#515252]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Reservation protection
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 mr-2 text-[#515252]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Ongoing service education
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 mr-2 text-[#515252]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Trust and safety experts
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 mr-2 text-[#515252]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Furever Family Member Guarantee
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 mr-2 text-[#515252]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    24/7 support
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 mr-2 text-[#515252]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Verified reviews
                </li>
            </ul>
        </div>

        <p class="text-center font-bold lg:text-2xl text-[#515252] text-lg">Good Pets. Good people.</p>
        <p class="text-center  text-[#515252] text-lg">Whether you need to donate your pet or adopt a new pet, Furever Family Finder got you, your pets and pet's lifestyle covered.</p>
        
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