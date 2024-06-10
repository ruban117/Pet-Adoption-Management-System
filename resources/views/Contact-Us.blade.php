@extends('Layout')

@section('title_nm',"Contact Us")

@section('Navbar')
@include('Navbar And Footer.navbar')
@section('Main')
@if(session('success'))
        <div id="alert" class="mb-4 mr-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-md relative">
            <button id="close-alert" class="absolute top-0 right-0 -mt-1 -mr-1 px-2 py-1 text-white">&times;</button>
            <p id="msg">{{ session('success') }}</p>
        </div>
        @endif
<div class="flex justify-center ">
    <div class="flex py-20 ">
        <div class="">
            <img src="{{asset("Images/catfeedback.jpeg")}}" alt="cat" class="hidden md:block h-[33rem] w-80 shadow-lg">
        </div>
        <div class="">
            <form action="{{route('submit-feedback')}}" class="flex flex-col border-2 px-7 justify-center shadow-lg h-[33rem]" method="POST" enctype="multipart/form-data">
                @csrf
                <p class="my-2 font-bold text-2xl mx-auto text-orange-600 " >Submit Your Feedback</p>
                <lable class="mt-3 font-bold">Full Name: <span class="text-red-600">*</span></lable>
                <input type="text" name="name" class="shadow-md border-2  outline-orange-500 rounded-md px-4 h-10 w-60 " placeholder="Full Name">
                <p class="text-red-500">
                        @error('name')
                            {{ $message }}
                        @enderror
                </p>
                <lable class="mt-3 font-bold">Email Address: <span class="text-red-600">*</span></lable>
                <input type="email" name="email" class="shadow-md border-2  outline-orange-500 rounded-md px-4 h-10 w-60" placeholder="Email Address">
                <p class="text-red-500">
                    @error('email')
                        {{ $message }}
                    @enderror
                </p>
                <label for="state" class="block text-gray-700 text-sm font-bold mb-2">Rating: <span class="text-red-600">*</span></label>
                    <select name="ratings" id="state" class="h-9 w-60 border  @error('ratings')
                    border-red-600 @enderror">
                        <option disabled selected>--SELECT RATING--</option>
                        <option value="1">Worst</option>
                        <option value="2">Average</option>
                        <option value="3">Not Bad</option>
                        <option value="4">Better</option>
                        <option value="5">Wonderful</option>
                    </select>
                    <p class="text-red-500">
                        @error('ratings')
                            {{ $message }}
                        @enderror
                    </p>
                <lable class="mt-3 font-bold">Designation: <span class="text-red-600">*</span></lable>
                <input type="text" name="designation" class="shadow-md border-2  outline-orange-500 rounded-md px-4 h-10 w-60" placeholder="Designation">
                <p class="text-red-500">
                    @error('designation')
                        {{ $message }}
                    @enderror
                </p>
                <lable class="mt-3 font-bold">Image</lable>
                <input type="file" name="image" class="pt-1 outline-orange-500 rounded-md px-4 h-10 w-60 ">
                <lable class="mt-3 font-bold">Feedback <span class="text-red-600">*</span></lable>
                <textarea name="feedback" cols="30" rows="10" class="shadow-md border-2  outline-orange-500 rounded-md px-4 h-10 w-60"></textarea> 
                <p class="text-red-500">
                    @error('feedback')
                        {{ $message }}
                    @enderror
                </p>
                <button type="submit" class="text-white bg-orange-600 hover:bg-orange-500 w-20 py-1 font-bold rounded-lg my-2 mx-auto mt-6">Submit</button>
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
