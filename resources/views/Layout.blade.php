<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  @yield('swiper-bundle')
  @yield('style')
  <style>
    /* Style for the loading screen */
    .loading-screen {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999; /* Make sure it's on top of everything */
    }

    .loading-spinner {
      border: 8px solid #f3f3f3; /* Light grey */
      border-top: 8px solid #3498db; /* Blue */
      border-radius: 50%;
      width: 50px;
      height: 50px;
      animation: spin 1s linear infinite; /* Animation for spinning */
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    /* Hide the content when the loading screen is displayed */
    body.loading {
      overflow: hidden;
    }
  </style>
  <title>@yield('title_nm')</title>
</head>

<body class="loading"> <!-- Add the 'loading' class to the body by default -->
<!-- Loading screen -->
<div class="loading-screen" id="loading-screen">
  <div class="loading-spinner"></div>
</div>
  @yield('Navbar')
  @yield('Main')
  @yield('footer')

  @yield('script')
  <script>
    window.addEventListener('load', function() {
      var loadingScreen = document.getElementById('loading-screen');
      if (loadingScreen) {
        loadingScreen.style.display = 'none';
        document.body.classList.remove('loading'); // Remove 'loading' class from body
      }
    });
  </script>
</body>

</html>