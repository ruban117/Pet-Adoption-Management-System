@extends('Layout')

@section('swiper-bundle')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

@section('style')
<style>
    .swiper-horizontal>.swiper-pagination-bullets .swiper-pagination-bullet,
    .swiper-pagination-horizontal.swiper-pagination-bullets .swiper-pagination-bullet {
      width: 16px !important;
      height: 4px !important;
      border-radius: 5px !important;
      margin: 0 6px !important;
    }

    .swiper-pagination {
      bottom: 2px !important;
    }

    .swiper-wrapper {
      height: max-content !important;
      width: max-content !important;
      padding-bottom: 64px;
    }

    .swiper-pagination-bullet-active {
      background: #4F46E5 !important;
    }

    .swiper-slide.swiper-slide-active>.slide_active\:border-indigo-600 {
      --tw-border-opacity: 1;
      border-color: rgb(79 70 229 / var(--tw-border-opacity));
    }

    .swiper-slide.swiper-slide-active>.group .slide_active\:text-gray-800 {
      ---tw-text-opacity: 1;
      color: rgb(31 41 55 / var(--tw-text-opacity));
    }
</style>

@section('title_nm','Re-Home Or Adopt A Pet From Nearby Location')

@section('Navbar')
@include('Navbar And Footer.navbar')

@section('Main')
<div class="hero">
    <div class="relative">
      <img src={{asset('Images/home-hero.jpg')}} alt="Image" class="w-full h-auto md:h-[30rem]">
      <div
        class="absolute bottom-0 left-10 right-10 bg-white h-1/3 border-l border-r border-t border-opacity-25 md:left-60 md:right-60 flex flex-col">
        <p class="text-center font-bold text-[#515252] md:text-2xl md:mt-5">Re-Home and Adopt a Pet in India</p>
        <p class="text-center text-sm md:text-lg text-[#515252]">Every Pet Deserves a Good Home. #FureverFamilyFinder
        </p>
        <button
          class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-6 md:mx-20 rounded-full mt-10 md:my-auto hidden md:block"><a href="{{route('AboutUsPage')}}">About Us</a></button>


      </div>
    </div>
    <div
      class="mx-10 md:mx-60 bg-white h-28 md:h-11 border-l border-r border-b border-opacity-25 flex flex-col justify-center px-10 ">
      <button
        class="bg-orange-500 hover:bg-orange-700 text-white  py-2 px-4 md:hidden rounded-full mt-10 md:my-auto">See Your
        Choice</button>
    </div>
    <h1 class="text-center text-[#515252] px-10 mt-6 text-xl font-bold lg:text-3xl">Your Pet Adoption Journey With The
      Furever
      Family Finder</h1>

    <div class="phase3 flex flex-col justify-between items-center py-10 lg:flex-row lg:px-36">
      <div class="part1 h-56 w-56 lg:h-[30rem] lg:w-[30rem]"><img src="{{asset('Images/adopt-me.jpg')}}" alt=""></div>
      <div class="part2 h-auto w-full md:w-1/2 flex items-center p-2 mt-4 md:mt-0">
        <table class="table-fixed">
          <tbody>
            <tr>
              <td><img src="{{asset('Images/search.png')}}" alt="" class="h-10 w-10 mr-10"></td>
              <td class="lg:text-lg"><b>Search Pet</b><br>Adopt a dog or cat who's right for you. Simply enter your city
                above to start your search.</td>
            </tr>
            <tr>
              <td><img src="{{asset('Images/connect.png')}}" alt="" class="h-10 w-10 mr-10"></td>
              <td class="lg:text-lg"><b>Connect</b><br>Once you find a pet, click "show number" to get contact info for
                their pet parent or rescue. Contact them to learn more about how to meet and adopt the pet.</td>
            </tr>
            <tr>
              <td><img src="{{asset('Images/adopt.png')}}" alt="" class="h-10 w-10 mr-10"></td>
              <td class="lg:text-lg"><b>Adopt</b><br>The rescue or pet parents will walk you through their adoption
                process. Prepare your home for the arrival of your fur baby to help them adjust to their new family.
              </td>
            </tr>
            <tr>
              <td><img src="{{asset('Images/vaccination.png')}}" alt="" class="h-10 w-10 mr-10"></td>
              <td class="lg:text-lg"><b>Free Vet Consultation</b><br>Furever Family Finder will help your pet to settle
                down in its new home, once you complete the Adoption journey reach out to us for free vet consultation.
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div>
      <h1 class="text-center text-[#515252] px-10 mt-6 text-xl font-bold lg:text-3xl">How It Works?</h1>
      <div class="flex flex-col items-center justify-center space-y-5 lg:flex-row lg:justify-between lg:px-44">
        <div class="one flex flex-col justify-center items-center">
          <img src="{{asset('Images/search.jpg')}}" alt="" class="h-14 w-14">
          <p class="font-bold text-lg text-[#515252]">Search</p>
          <p class="text-sm">Simply enter your city start your search</p>
        </div>
        <div class="two flex flex-col justify-center items-center">
          <img src="{{asset('Images/meet.png')}}" alt="" class="h-14 w-14">
          <p class="font-bold text-lg text-[#515252]">Meet</p>
          <p class="text-sm">Schedule your appointment</p>
        </div>
        <div class="three flex flex-col justify-center items-center">
          <img src="{{asset('Images/cart.png')}}" alt="" class="h-14 w-14">
          <p class="font-bold text-lg text-[#515252]">Adopt</p>
          <p class="text-sm">Finally adopt the dog or cat you love</p>
        </div>
      </div>
    </div>
    <section class="py-24 ">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-16 ">
          <span class="text-sm text-gray-500 font-medium text-center block mb-2">TESTIMONIAL</span>
          <h2 class="text-4xl text-center font-bold text-gray-500 ">What our happy user says!</h2>
        </div>
        <!--Slider wrapper-->

        <div class="swiper mySwiper">
          <div class="swiper-wrapper w-max">
            @foreach ($feedback as $f)
            <div class="swiper-slide">
              <div
                class="group bg-white border border-solid border-gray-300 rounded-xl p-6 transition-all duration-500  w-full mx-auto hover:border-indigo-600 hover:shadow-sm slide_active:border-indigo-600">
                <div class="">
                  <div class="flex items-center mb-7 gap-2 text-amber-500 transition-all duration-500  ">
                    <svg class="w-5 h-5" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M8.10326 1.31699C8.47008 0.57374 9.52992 0.57374 9.89674 1.31699L11.7063 4.98347C11.8519 5.27862 12.1335 5.48319 12.4592 5.53051L16.5054 6.11846C17.3256 6.23765 17.6531 7.24562 17.0596 7.82416L14.1318 10.6781C13.8961 10.9079 13.7885 11.2389 13.8442 11.5632L14.5353 15.5931C14.6754 16.41 13.818 17.033 13.0844 16.6473L9.46534 14.7446C9.17402 14.5915 8.82598 14.5915 8.53466 14.7446L4.91562 16.6473C4.18199 17.033 3.32456 16.41 3.46467 15.5931L4.15585 11.5632C4.21148 11.2389 4.10393 10.9079 3.86825 10.6781L0.940384 7.82416C0.346867 7.24562 0.674378 6.23765 1.4946 6.11846L5.54081 5.53051C5.86652 5.48319 6.14808 5.27862 6.29374 4.98347L8.10326 1.31699Z"
                        fill="currentColor" />
                    </svg>
                    <span class="text-base font-semibold text-indigo-600">{{$f->ratings}}</span>
                  </div>
                  <p
                    class="text-base text-gray-600 leading-6  transition-all duration-500 pb-8 group-hover:text-gray-800 slide_active:text-gray-800">
                    {{$f->feedback}}
                  </p>
                </div>
                <div class="flex items-center gap-5 border-t border-solid border-gray-200 pt-5">
                  <img class="h-10 w-10" src="storage/{{$f->image}}" alt="avatar" />
                  <div class="block">
                    <h5 class="text-gray-900 font-medium transition-all duration-500  mb-1">{{$f->full_name}}</h5>
                    <span class="text-sm leading-4 text-gray-500">{{$f->designation}}</span>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
    <div class="phase-4 relative">
      <img src="{{asset('Images/phase 4.jpg')}}" alt="" class="h-[28rem] w-full object-cover">
      <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white">
        <h2 class="text-sm md:text-lg mt-24 font-bold">Approximately 1478 dogs & cats die every day on road in India. We are on a mission to provide every dog and cat a home before 2035. It’s just one of the many ways The Furever Family Finder! gives back and helps you become a part of something larger. </h2>
        <button class="h-10 w-40 border rounded-full bg-white text-black font-bold hover:bg-orange-600 focus:bg-orange-600 transition-colors duration-300 mt-10">
          <a href="{{route('select-login')}}">Login</a>
        </button>
      </div>
    </div>
    </div>
</div>

@section('footer')
@include('Navbar And Footer.footer')

@section('script')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
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
        var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 32,
        loop: true,
        centeredSlides: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,

        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            640: {
            slidesPerView: 1,
            spaceBetween: 32,
            },
            768: {
            slidesPerView: 2,
            spaceBetween: 32,
            },
            1024: {
            slidesPerView: 3,
            spaceBetween: 32,
            },
        },
        });
    </script>

