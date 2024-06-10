<div class="navbar flex justify-between items-center p-2 relative">
    <div class="logo">
        <img src="{{asset('Images/Logo.png')}}" class="h-10 w-16" alt="">
    </div>
    <div class="Account-Info md:order-3 flex flex-row items-center relative">
        <p id="account-dropdown">
            <button id="account-dropdown" class="h-10 w-10 border rounded-full md:hidden bg-orange-500 text-white font-bold hover:bg-orange-600 focus:bg-orange-600 transition-colors duration-300">{{substr(Auth::guard('adaptor')->user()->full_name, 0, 1)}}</button>
        </a>
        <button id="account-dropdown" class="h-10 w-10 border rounded-full hidden md:block bg-orange-500 text-white font-bold hover:bg-orange-600 focus:bg-orange-600 transition-colors duration-300">{{substr(Auth::guard('adaptor')->user()->full_name, 0, 1)}}</button>
    </div>
</div>

<script>
    // JavaScript to toggle dropdown visibility
    document.getElementById("account-dropdown").addEventListener("click", function() {
        var dropdownContent = document.getElementById("dropdown-content");
        dropdownContent.classList.toggle("hidden");
    });
</script>
