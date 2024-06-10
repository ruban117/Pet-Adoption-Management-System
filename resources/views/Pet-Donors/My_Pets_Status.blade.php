@extends('Layout')

@section('title_nm','DONOR::REQUEST HISTORY')

@section('Navbar')
@include('Pet-Donors.NAV.AuthNav')

@section('Main')


<div id="dropdown-content" class="hidden flex flex-col items-center justify-between absolute z-10 right-0 mt-0 w-48 bg-white rounded-md shadow-lg space-y-4">
    <div class="part-1 flex flex-row items-center justify-between space-x-4">
      <img src="{{asset('Images/dashboard.webp')}}" alt="" class="h-6 w-6">
      <a href="{{route('donor-dashboard')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold">Dashboard</a>
    </div>
      <div class="part-1 flex flex-row items-center justify-between space-x-4">
        <img src="{{asset('Images/profile.png')}}" alt="" class="h-6 w-6">
        <a href="{{route('my-profile')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold">My Profile</a>
      </div>
      <div class="part-1 flex flex-row items-center justify-between">
        <img src="{{asset('Images/my-pets.png')}}" alt="" class="h-6 w-6">
        <a href="{{ route('donor-pets') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold ml-8">My Pets</a>
      </div>
      <div class="part-1 flex flex-row items-center justify-between">
        <img src="{{asset('Images/address.png')}}" alt="" class="h-6 w-6">
        <a href="{{route('change-password-view')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold ml-1">Change Password</a>
      </div>
      <div class="part-1 flex flex-row items-center justify-between">
        <img src="{{asset('Images/history.png')}}" alt="" class="h-6 w-6">
        <a href="{{route('Request-view')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold ml-1">My History</a>
      </div>
      <div class="part-1 flex flex-row items-center justify-between">
        <img src="{{asset('Images/history.png')}}" alt="" class="h-6 w-6">
        <a href="{{route('donor-pet-status')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold ml-[1.5rem]">Pet Status</a>
      </div>
      <div class="part-1 flex flex-row items-center justify-between">
        <img src="{{asset('Images/logout.png')}}" alt="" class="h-6 w-6">
        <a href="{{route('donor-logout')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 text-sm font-bold ml-[1.5rem]">Logout</a>
      </div>
</div>
<h1 class="text-2xl font-bold text-[#515279] text-center mt-5">My Pet Status</h1>

<div class="flex justify-center items-start mt-8 mb-7">
    <div class="h-96 w-72 md:w-[40rem] lg:w-[80rem]">   

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Adaptor Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Pet Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Pet Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Certificate
                </th>
                <th scope="col" class="px-6 py-3">
                    Feelings
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pets as $p)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td scope="row" class="adaptor-name px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{$p->adaptor_name}}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$p->pet_name}}
                </td>
                <td class="px-6 py-4">
                    <img src="/storage/{{$p->pethealth_image}}" alt="" class="h-20 w-20">
                </td>
                <td class="px-6 py-4">
                   <a href="/storage/{{$p->pethealth_certificate}}" target="blank">See Certificate</a>

                </td>
                <td class="px-6 py-4">
                    {{$p->Content}}
                
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

