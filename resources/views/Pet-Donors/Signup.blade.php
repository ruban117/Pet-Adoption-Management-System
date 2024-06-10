@extends('Layout')
@section('title_nm',"Create Account::Pet Donors")
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

<div class="flex items-center justify-center mt-10 mb-4">
    <div class="flex flex-row-reverse items-center">
        <img src="{{ asset('Images/DONOR SIGNUP PIC.jpg') }}" alt="Login Image" class="md:block md:h-[40rem] md:w-96 hidden">
        <div class="ml-0 bg-white shadow appearance-none border rounded md:h-[40rem] md:w-96 h-[38rem] w-72 flex items-center justify-center flex-col">
            <!-- Your form code here -->
            <form action="{{route('donor.register')}}" method="POST">
                @csrf
                <!-- Form fields go here -->
                <div class="mb-2">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Full Name: <span class="text-red-600">*</span></label>
                    <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 @error('name')
                        border-red-600 @enderror leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-2">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address: <span class="text-red-600">*</span></label>
                    <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email')
                    border-red-600 @enderror">
                </div>
                <div class="mb-2">
                    <label for="state" class="block text-gray-700 text-sm font-bold mb-2">State: <span class="text-red-600">*</span></label>
                    <select name="state" id="state" class="h-9 w-60 border  @error('state')
                    border-red-600 @enderror">
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
                </div>
                <div class="mb-2">
                    <label for="number" class="block text-gray-700 text-sm font-bold mb-2">Mobile: <span class="text-red-600">*</span></label>
                    <input type="number" id="number" name="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('pin')
                    border-red-600 @enderror">
                </div>
                <div class="mb-2">
                    <label for="pin" class="block text-gray-700 text-sm font-bold mb-2">Pin Code: <span class="text-red-600">*</span></label>
                    <input type="number" id="pin" name="pin" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('pin')
                    border-red-600 @enderror">
                </div>
                <div class="mb-2">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password: <span class="text-red-600">*</span></label>
                    <input type="password" id="pass" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password')
                    border-red-600 @enderror">
                </div>
                <div class="mb-2">
                    <label for="confpassword" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password: <span class="text-red-600">*</span></label>
                    <input type="password" id="confpassword" name="confpassword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('confpassword')
                    border-red-600 @enderror">
                </div>
                <button type="submit" class="bg-orange-600 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Get OTP</button>
            </form>

            <p class="text-sm font-bold mt-7">ALREADY HAVE AN ACCOUNT? <a href="{{route('donor-login')}}" class="text-blue-600">SIGN IN.</a></p>
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