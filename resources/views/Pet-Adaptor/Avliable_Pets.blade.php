@extends('Layout')

@section('title_nm','Avliable Dogs And Cats For Adoption')

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
<h1 class="text-center font-extrabold text text-[#515252] text-3xl mt-4">Pets Available For Adoption</h1>
@if(session('success'))
        <div id="alert" class="mb-4 mr-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-md relative">
            <button id="close-alert" class="absolute top-0 right-0 -mt-1 -mr-1 px-2 py-1 text-white">&times;</button>
            <p id="msg">{{ session('success') }}</p>
        </div>
        @endif
        @if(session('error'))
        <div id="alert" class="mb-4 mr-4 bg-red-500 text-white px-4 py-2 rounded-lg shadow-md relative">
            <button id="close-alert" class="absolute top-0 right-0 -mt-1 -mr-1 px-2 py-1 text-white">&times;</button>
            <p id="msg text-center">{{ session('error') }}</p>
        </div>
        @endif
<div class="hero mt-5 lg:flex lg:justify-between  lg:flex-row-reverse">
    <div id="loader"
        class="fixed top-0 left-0 w-full hidden h-full flex justify-center items-center bg-white bg-opacity-80 z-50 ">
        <!-- Add your loader GIF image here -->
        <img src="{{asset('Images/tpn-loading-icon.gif')}}" alt="Loading..." class="w-80 h-80">
    </div>
    <div id="heroContent"
        class="inside-hero flex flex-col justify-between items-center px-6 py-6 space-y-6 lg:flex-row lg:space-y-0 lg:grid lg:grid-cols-3">
        @foreach($pets as $p)
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 lg:mx-4 lg:my-4 lg:flex lg:items-center">
            <a href="">
                <img class="rounded-t-lg w-full lg:w-40 lg:h-40 mx-2" src="/storage/{{$p->pet_image}}" alt="">
            </a>
            <div class="p-6">
                <a href="">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$p->pet_name}}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$p->pet_age}} <br>{{$p->state}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 flex flex-col items-start">
                    Owner Details
                    <p class=" text-gray-700 dark:text-gray-400">
                        Owner Name:- {{$p->full_name}}
                    </p>
                    <p class="mb-4 text-gray-700 dark:text-gray-400">
                        Contact:- <a href="#" class="font-bold">See</a>
                    </p>
                </p>
                <a href="{{route('adaptor-pet-details',$p->p_id)}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    See Details
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
        
        @endforeach
    </div>
    <div
        class="fixed bottom-0 left-0 right-0 flex justify-center items-center py-4 border border-t-4 bg-white lg:hidden">
        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
            class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-6 rounded-full mt-2 ">Search By
            Filters</button>
    </div>

    <div
        class="part2 hidden lg:flex lg:flex-col lg:items-start  px-5 ml-5 mt-10 w-80 h-[30rem] border border-[#515252]">
        <a href="{{route('adaptor-avliablepets')}}" class="flex flex-row items-center"><img src="{{asset('Images/gog.png')}}" alt="" class="h-10 w-10">Clear
            All Filters</a>
        <form action="{{route('adaptor-avliablepets-sub')}}" method="POST" class="flex flex-col space-y-5">
            @csrf
            <label for="Pet_Type" class="mt-5 text-[#515252] font-bold text-lg">Pet Type</label>
            <select name="pet_type" id="" class="h-9 w-60 border border-[#515252]">
                <option value="" selected disabled>--SELECT PET TYPE--</option>
                <option value="Dog">Dog</option>
                <option value="Cat">Cat</option>
            </select>
            <label for="search_state" class="mt-5 text-[#515252] font-bold text-lg">State</label>
            <select name="state" id="" class="h-9 w-60 border border-[#515252]">
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
            <label for="search_state" class="mt-5 text-[#515252] font-bold text-lg">PinCode</label>
            <input type="number" name="pin" class="h-9 w-60 border border-[#515252]" placeholder="Pincode">
            <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-6 rounded-full mt-2"
                type="submit">Apply Filter</button>
        </form>
    </div>
</div>
<div id="authentication-modal" class="fixed lg:hidden inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <!-- Modal content -->
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-4 md:p-5">
        <!-- Modal header -->
        <div class="flex items-center justify-between border-b p-4 md:p-5 rounded-t">
            <h3 class="text-xl font-semibold text-gray-900">
                Apply The Filter
            </h3>
            <button type="button"
                class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                data-modal-hide="authentication-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5">
            <form class="space-y-4 flex flex-col items-center justify-between" action="{{route('adaptor-avliablepets-sub')}}" method="POST">
                <label for="Pet_Type" class="mt-5 text-[#515252] font-bold text-lg">Pet Type</label>
                <select name="pet_type" id="" class="h-9 w-60 border border-[#515252]">
                    <option value="">Dog</option>
                    <option value="">Cat</option>
                </select>
                <label for="search_state" class="mt-5 text-[#515252] font-bold text-lg">State</label>
                <select name="pet_type" id="" class="h-9 w-60 border border-[#515252]">
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
                <label for="search_state" class="mt-5 text-[#515252] font-bold text-lg">PinCode</label>
                <input type="number" class="h-9 w-60 border border-[#515252]">
                <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-6 rounded-full mt-2"
                    type="submit">Apply Filter</button>
            </form>
        </div>
    </div>
</div>
<div class="mt-5">
    {{ $pets->links() }}
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

        document.addEventListener('DOMContentLoaded', function () {
        const closeAlertButton = document.getElementById('close-alert');
        const alertBox = document.getElementById('alert');

        closeAlertButton.addEventListener('click', function () {
            alertBox.style.display = 'none';
        });
    });
    </script>

