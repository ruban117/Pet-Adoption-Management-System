@extends('Layout')
@section('style')
@section('title_nm',"Create Account::Pet Adaptors")
@section('Navbar')
@include('Navbar And Footer.navbar')
@section('Main')
@if ($errors->any())
            <div id="error-alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
@endif
<div class="flex justify-center ">
    <div class="flex py-20 ">
        <div class="">
            <form action="{{route('adaptor.register')}}" class="flex flex-col border-2 px-7 justify-center shadow-lg h-[33rem]" method="POST">
                @csrf
                <p class="mt-3 font-bold text-xl mx-auto text-orange-600 md:text-2xl" >Signup as Pet Adopter</p>
                <lable class="mt-3 font-bold">Full Name: <span class="text-red-600">*</span></lable>
                <input type="text" name="name" class="shadow-md border-2  outline-orange-500 rounded-md px-4 h-10 w-60 @error('name')
                border-red-600 @enderror" placeholder="Full Name">
                <lable class=" font-bold">Email Address: <span class="text-red-600">*</span></lable>
                <input type="email" name="email" class="shadow-md border-2  outline-orange-500 rounded-md px-4 h-10 w-60 @error('email')
                border-red-600 @enderror" placeholder="Email Address">
                <lable class=" font-bold">Mobile No: <span class="text-red-600">*</span></lable>
                <input type="number" name="number" class="shadow-md border-2  outline-orange-500 rounded-md px-4 h-10 w-60 @error('number')
                border-red-600 @enderror" placeholder="Mobile No">
                <label class=" font-bold">State: <span class="text-red-600">*</span></label>
                <select name="state" class="shadow-md border-2 my-2 outline-orange-500 rounded-md px-4 h-10 w-60 @error('state') @enderror">
                    <option disabled selected>--SELECT STATE--</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="West Bengal">West Bengal</option>
                    <option value="Andaman & Nicobar">Andaman & Nicobar (UT)</option>
                    <option value="Chandigarh">Chandigarh (UT)</option>
                    <option value="Dadra & Nagar Haveli and Daman & Diu">Dadra & Nagar Haveli and Daman & Diu (UT)</option>
                    <option value="Delhi">Delhi [National Capital Territory (NCT)]</option>
                    <option value="Jammu & Kashmir">Jammu & Kashmir (UT)</option>
                    <option value="Ladakh">Ladakh (UT)</option>
                    <option value="Lakshadweep">Lakshadweep (UT)</option>
                    <option value="Puducherry">Puducherry (UT)</option>
                </select>
                <lable class=" font-bold">Pincode: <span class="text-red-600">*</span></lable>
                <input type="number" name="pin"  class="shadow-md border-2  outline-orange-500 rounded-md px-4 h-10 w-60 @error('pin')
                border-red-600 @enderror" placeholder="Pincode">
                <lable class=" font-bold">Password: <span class="text-red-600">*</span></lable>
                <input type="password" name="password"  class="shadow-md border-2  outline-orange-500 rounded-md px-4 h-10 w-60 @error('password')
                border-red-600 @enderror" placeholder="Password">
                <lable class="my-2 font-bold">Confirm Password: <span class="text-red-600">*</span></lable>
                <input type="password" name="confpassword"  class="shadow-md border-2  outline-orange-500 rounded-md px-4 h-10 w-60 mb-3 @error('confpassword')
                border-red-600 @enderror" placeholder="Confirm Password">
                <button class="text-white bg-orange-600 hover:bg-orange-500 w-20 py-1 font-bold rounded-lg my-2 mx-auto mt-2">Get OTP</button>
                <p class="font-bold text-sm my-6">ALREADY HAVE AN ACCOUNT? <a href="{{route('adaptor-login')}}" class="text-blue-500 cursor-pointer hover:text-blue-400">SIGN IN</a></p>
            </form>
        </div>
        <div class="">
            <img src="{{asset("Images/dogcat.jpg")}}" alt="cat" class="hidden md:block h-[33rem] w-80 shadow-lg">
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

    setTimeout(function() {
                        document.getElementById('error-alert').style.display = 'none';
    }, 5000); // 5000 milliseconds = 5 seconds
</script>
@section('footer')
@include('Navbar And Footer.footer')