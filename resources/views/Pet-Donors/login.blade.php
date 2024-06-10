@extends('Layout')
@section('title_nm',"Login::Pet Donors")
@section('Navbar')
@include('Navbar And Footer.navbar')
@section('Main')


<div class="flex items-center justify-center mt-20 mb-8">
    <div class="flex flex-row items-center">
        <img src="{{ asset('Images/DONOR LOGIN PAGE PIC.jpg') }}" alt="Login Image" class="md:block md:h-[28rem] md:w-80 hidden">
        <div class="ml-0 bg-white shadow appearance-none border rounded md:h-[28rem] md:w-80 h-96 w-72 flex items-center justify-center flex-col">
            <h1 class="mb-8 font-bold text-lg">Login As Pet Donor</h1>
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
            <!-- Your form code here -->
            <form action="{{route('donor.authenticate')}}" method="POST">
                @csrf
                <!-- Form fields go here -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address:</label>
                    <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('email')
                    <p class="text-red-500">{{$message}}</p>
                        
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                    <input type="password" id="email" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('password')
                    <p class="text-red-500">{{$message}}</p>
                        
                    @enderror
                </div>
                <button type="submit" class="bg-orange-600 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Verify</button>
            </form>

            <p class="text-sm font-bold mt-7">DON'T HAVE AN ACCOUNT? <a href="{{route('donor-signup')}}" class="text-blue-600">SIGN UP.</a></p>
            <p class="font-bold text-sm cursor-pointer mt-4" id="open-modal">Forget Password? </p>
        </div>
    </div>
</div>

{{--Forget Password Modal--}}
<div class="fixed inset-0 overflow-y-auto flex items-center justify-center z-50 hidden" id="modal">
    <div class="absolute inset-0 bg-gray-800 opacity-75"></div>
    <div class="bg-white rounded-lg p-8 max-w-md mx-auto z-50">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Forget Password?</h2>
            <button id="close-modal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form action="{{route('donor.checkemail')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="email" type="email" placeholder="Email" name="email">
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Submit
                </button>
            </div>
        </form>
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

    const openModalBtn = document.getElementById('open-modal');
        const closeModalBtn = document.getElementById('close-modal');
        const modal = document.getElementById('modal');

        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
</script>
@section('footer')
@include('Navbar And Footer.footer')

    