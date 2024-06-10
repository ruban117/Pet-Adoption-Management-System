@extends('Layout')

@section('title_nm','ADAPTOR::REQUEST HISTORY')

@section('Navbar')
@include('Pet-Adaptor.NAV.AuthNav')

@section('Main')

<!-- Report Modal -->
<div class="fixed z-10 inset-0 overflow-y-auto hidden" id="modal">
    <div class="flex items-center justify-center min-h-screen">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
  
      <div class="relative bg-white rounded-lg p-8 max-w-md mx-auto">
        <!-- Close button -->
        <button onclick="toggleModal()" class="absolute top-0 right-0 p-2">
          <svg class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
  
        <!-- Modal Content -->
        <div class="flex flex-col space-y-4">
          <h2 class="text-xl font-bold">Report Donor</h2>
          
          <!-- Form -->
          <form action="{{route('adaptor-report')}}" method="POST">
            @csrf
            <input type="hidden" name="reported_person" id="" value="1">
            <div class="mb-4">
              <label for="username" class="block text-gray-700 font-bold mb-2">Report To</label>
              <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-md">
            </div>
            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-bold mb-2">Email Address</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-md">
              </div>
              <div class="mb-4">
                <label for="username" class="block text-gray-700 font-bold mb-2">Report Content</label>
                <textarea name="report_content" id="" cols="30" rows="2" class="border"></textarea>
              </div>
              <input type="hidden" name="reporter_name" value="{{Auth::guard('adaptor')->user()->full_name}}">
              <input type="hidden" name="reporter_email" value="{{Auth::guard('adaptor')->user()->email}}">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

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
<h1 class="text-2xl font-bold text-[#515279] text-center mt-5">My Requests</h1>

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

<div class="flex justify-center items-start mt-8 mb-7">
    <div class="h-96 w-72 md:w-[40rem] lg:w-[80rem]">   

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Donor Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Donor Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Requested Pet Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Request Status
                </th>
                <th scope="col" class="px-6 py-3">
                  Contact Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Report
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pets as $p)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$p->donor_full_name}}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$p->donor_email}}
                </td>
                <td class="px-6 py-4">
                    {{$p->pet_name}}
                </td>
                <td class="px-6 py-4">
                    @if($p->status == 0)
                    Pending
                @elseif ($p->status == 1)
                    Accepted
                @elseif ($p->status == 2)
                    Rejected
                @endif
                </td>
                <td class="px-6 py-4">
                  @if($p->status == 0)
                  Do Not Have Permission
              @elseif ($p->status == 1)
                  {{$p->donor_mobile}}
              @elseif ($p->status == 2)
              Do Not Have Permission
              @endif
              </td>
                <td class="px-6 py-4">
                    <button class="report-btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">Report</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
<div class="mt-5">
    {{ $pets->links() }}
  </div>

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

    document.addEventListener('DOMContentLoaded', function () {
    // Get all buttons with the class "report-btn"
    const reportButtons = document.querySelectorAll('.report-btn');

    // Add click event listener to each "Report" button
    reportButtons.forEach(function (button) {
        button.addEventListener('click', function (e) {
            // Toggle the visibility of the modal
            toggleModal();

            // Get the email and other necessary data from the corresponding table row
            
            let c=e.target.parentNode.parentNode;

            name=c.getElementsByTagName("td")[0].innerText;
            email=c.getElementsByTagName("td")[1].innerText;

            // Populate the form fields in the modal with the data
            document.getElementById('name').value = name;
            document.getElementById('email').value = email;
        });
    });
});

function toggleModal() {
    const modal = document.getElementById('modal');
    modal.classList.toggle('hidden');
}
    </script>

