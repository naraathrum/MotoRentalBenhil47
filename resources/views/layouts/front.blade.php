<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Libraries -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script defer src="https://unpkg.com/alpinejs@3.7.0/dist/cdn.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"
          integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

  <!-- Scripts -->
  @vite(['resources/css/front.css'])

  <!-- Styles -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  @livewireStyles
  
  
</head>

<body>
  <main>
    <nav class=" relative py-4 lg:py-5 px-20 bg-navbar">
      <div class="flex flex-col justify-between w-full lg:flex-row lg:items-center">
        <!-- Logo & Toggler Button here -->
        <div class="flex items-center justify-between">
          <!-- LOGO -->
          <a href="{{ route('front.index') }}">
            <img src="/images/logoo.png" class="lg:w-[80px]" alt="stream" />
          </a>
          <!-- RESPONSIVE NAVBAR BUTTON TOGGLER -->
          <div class="block lg:hidden">
            <button class="p-1 outline-none mobileMenuButton" id="navbarToggler" data-target="#navigation">
              <svg class="text-dark w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                   xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path>
              </svg>
            </button>
          </div>
        </div>

        <!-- Nav Menu -->
        <div class="hidden w-full lg:block" id="navigation">
          <div class="flex flex-col items-baseline gap-4 mt-6 lg:justify-between lg:flex-row lg:items-center lg:mt-0">
          <div class="flex flex-col w-full ml-auto lg:w-auto gap-4 lg:gap-[50px] lg:items-center lg:flex-row">
          
          <a href="#mapss" class="nav-link-item text-white">Maps</a>
            
          </div>
          
            @auth
              <div class="flex flex-col w-full ml-auto lg:w-auto lg:gap-12 lg:items-center lg:flex-row ">
                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a href="{{ route('logout') }}" class="btn-secondary text-white"
                     onclick="event.preventDefault();
                  this.closest('form').submit(); ">
                    Log Out
                  </a>
                </form>
              </div>
            @else
              <div class="flex flex-col w-full ml-auto lg:w-auto lg:gap-12 lg:items-center lg:flex-row">
                <a href="{{ route('login') }}" class="btn-secondary text-white">
                  Log In
                </a>
              </div>
            @endauth
          </div>
        </div>
      </div>
    </nav>

    {{ $slot }}
  </main>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      once: true,
      duration: 300,
      easing: 'ease-out'
    });
  </script>

  <script src="{{ url('js/script.js') }}"></script>
  <div id="openMapPopup" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center z-50 hidden">
  <div id="map" class="w-96 h-64"></div>
</div>

</body>

</html>
