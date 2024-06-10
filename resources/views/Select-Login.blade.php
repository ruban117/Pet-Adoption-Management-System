@extends('Layout')

@section('title_nm',"Login Type")

@section('Navbar')
@include('Navbar And Footer.navbar')
@section('Main')
    <h1 class="font-bold text-center text-lg mt-5 md:mt-10 md:text-4xl">Select User Type To Login</h1>
    <div class="flex flex-col justify-center items-center mt-5 md:flex-row md:space-x-16 lg:space-x-80 md:mt-14">
        <div class="flex flex-col items-center space-y-5 transform hover:scale-105">
            <a href="{{route('adaptor-login')}}"><img src="{{asset('Images/Pet-Adoptor.png')}}" alt="" class="md:h-56 md:w-56"></a> 
            <p class="italic font-bold">Login As Pet Adoptor</p>
        </div>
        <div class="flex flex-col items-center space-y-1 transform hover:scale-105">
            <a href="{{route('donor-login')}}"><img src="{{asset('Images/Pet-ReHomer.png')}}" alt="" class="md:h-56 md:w-56"></a>
            <p class="italic font-bold">Login As Pet Donator</p>
        </div>
    </div>
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
@section('footer')
@include('Navbar And Footer.footer')
