@extends('Layout')
@section('title_nm',"OTP-VERIFICATION::Adopter")
@section('Navbar')
@include('Navbar And Footer.navbar')
@section('Main')

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
<div class="flex items-center justify-center mt-20 mb-8">
    <div class="flex flex-row items-center">
        <img src="{{ asset('Images/DONOR LOGIN PAGE PIC.jpg') }}" alt="Login Image" class="md:block md:h-[28rem] md:w-80 hidden">
        <div class="ml-0 bg-white shadow appearance-none border rounded md:h-[28rem] md:w-80 h-72 w-72 flex items-center justify-center flex-col">
            <!-- Your form code here -->
            <form action="{{route('donor.otppassverify')}}" method="POST">
                @csrf
                <!-- Form fields go here -->
                <div class="mb-4">
                    <label for="otp" class="block text-gray-700 text-sm font-bold mb-2">
                        Enter The OTP Which Is Sent To Your Email
                        </label>
                    <input type="number" id="email" name="otp" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <button type="submit" class="bg-orange-600 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Verify Email</button>
            </form>
        </div>
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
    document.addEventListener('DOMContentLoaded', function () {
        const closeAlertButton = document.getElementById('close-alert');
        const alertBox = document.getElementById('alert');

        closeAlertButton.addEventListener('click', function () {
            alertBox.style.display = 'none';
        });
    });
</script>
@section('footer')
@include('Navbar And Footer.footer')

    