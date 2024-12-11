@php
    $isLoggedIn = Auth::user() ? true : false;
@endphp
@extends('frontend.layouts.app')

@section('content')
    <div class="relative bg-gradient-to-r from-gray-900 to-gray-800 min-h-[28rem] flex items-center justify-between">
        <div class="relative z-10 w-full max-w-2xl px-6 md:px-12 lg:ml-16">
            @auth
                <div class="text-center md:text-left">
                    <h2 class="mt-2 text-4xl font-extrabold text-yellow-400 leading-tight sm:text-5xl">
                        Ayo Deposit dan Mainkan Sekarang!
                    </h2>
                    <p class="mt-4 text-lg text-gray-300">
                        Tingkatkan peluang Anda untuk menang besar dengan melakukan deposit. Bergabunglah dengan ribuan pemain
                        yang sudah meraih kemenangan besar!
                    </p>
                    <a href="{{ route('deposit') }}"
                        class="inline-flex items-center justify-center px-6 py-3 mt-6 text-lg font-semibold text-white bg-green-600 rounded-lg hover:bg-green-500">
                        Deposit Sekarang
                        <span class="ml-2 text-xs italic">Hanya butuh beberapa detik</span>
                    </a>
                    <div class="flex items-center justify-center mt-6 space-x-2 text-gray-300 md:justify-start">
                        <span class="text-xs font-bold">Dipercaya oleh Ribuan Pemain</span>
                        <div class="flex space-x-1">
                            <!-- Bintang -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-500" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M10 15l4.4 2.6-1.2-5.3L17 8.6l-5.4-.4L10 3l-1.6 5.2-5.4.4 3.8 3.7L5.6 18z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-500" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M10 15l4.4 2.6-1.2-5.3L17 8.6l-5.4-.4L10 3l-1.6 5.2-5.4.4 3.8 3.7L5.6 18z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-500" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M10 15l4.4 2.6-1.2-5.3L17 8.6l-5.4-.4L10 3l-1.6 5.2-5.4.4 3.8 3.7L5.6 18z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-500" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M10 15l4.4 2.6-1.2-5.3L17 8.6l-5.4-.4L10 3l-1.6 5.2-5.4.4 3.8 3.7L5.6 18z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-500" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M10 15l4.4 2.6-1.2-5.3L17 8.6l-5.4-.4L10 3l-1.6 5.2-5.4.4 3.8 3.7L5.6 18z"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold">Ulasan Positif</span>
                        <div class="flex items-center ml-1">
                            <span class="ml-1 text-xs font-bold">Dijamin Aman</span>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center md:text-left">
                    <h2 class="mt-2 text-4xl font-extrabold text-yellow-400 leading-tight sm:text-5xl">
                        Ayo Bermain dan Menangkan Hadiah Besar!
                    </h2>
                    <p class="mt-4 text-lg text-gray-300">
                        Bergabunglah dengan ribuan pemain lainnya dan nikmati pengalaman bermain game terbaik yang pernah ada.
                        Banyak pilihan game menarik, promosi tak tertandingi, dan peluang besar untuk menang!
                    </p>
                    <a href="/register"
                        class="inline-flex items-center justify-center px-6 py-3 mt-6 text-lg font-semibold text-white bg-green-600 rounded-lg hover:bg-green-500">
                        Gabung Sekarang
                        <span class="ml-2 text-xs italic">Hanya butuh beberapa detik</span>
                    </a>
                    <div class="flex items-center justify-center mt-6 space-x-2 text-gray-300 md:justify-start">
                        <span class="text-xs font-bold">Dipercaya oleh Ribuan Pemain</span>
                        <div class="flex space-x-1">
                            <!-- Bintang -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-500" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M10 15l4.4 2.6-1.2-5.3L17 8.6l-5.4-.4L10 3l-1.6 5.2-5.4.4 3.8 3.7L5.6 18z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-500" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M10 15l4.4 2.6-1.2-5.3L17 8.6l-5.4-.4L10 3l-1.6 5.2-5.4.4 3.8 3.7L5.6 18z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-500" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M10 15l4.4 2.6-1.2-5.3L17 8.6l-5.4-.4L10 3l-1.6 5.2-5.4.4 3.8 3.7L5.6 18z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-500" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M10 15l4.4 2.6-1.2-5.3L17 8.6l-5.4-.4L10 3l-1.6 5.2-5.4.4 3.8 3.7L5.6 18z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-500" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M10 15l4.4 2.6-1.2-5.3L17 8.6l-5.4-.4L10 3l-1.6 5.2-5.4.4 3.8 3.7L5.6 18z"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-bold">Ulasan Positif</span>
                        <div class="flex items-center ml-1">
                            <span class="ml-1 text-xs font-bold">Dijamin Aman</span>
                        </div>
                    </div>
                </div>
            @endauth
        </div>

        <div class="absolute inset-0">
            <picture>
                <source media="(max-width: 640px)" srcset="{{ asset('images/hero-background-mobile.webp') }}">
                <img src="{{ asset('images/hero-background-desktop.webp') }}" alt="Background"
                    class="absolute inset-0 object-cover w-full h-full" />
            </picture>

            <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-transparent to-gray-900 opacity-80"></div>
        </div>
    </div>

    <div class="slider-container" style="margin-top: 20px;">
        <div class="slider-wrapper">
            <div class="slider">
                @foreach ($banners as $banner)
                <div class="slide">
                    <a href="#">
                        <div class="slide-content" style="background-color: rgb(89, 22, 173);">
                            <img src="{{ $banner->banner_image }}"
                                alt="{{ $banner->banner_image }}">
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Tombol navigasi -->
        <button id="prev" class="slider-btn prev">

            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">

            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Transformed by: SVG Repo Mixer Tools -->
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M9 5L14.15 10C14.4237 10.2563 14.6419 10.5659 14.791 10.9099C14.9402 11.2539 15.0171 11.625 15.0171 12C15.0171 12.375 14.9402 12.7458 14.791 13.0898C14.6419 13.4339 14.4237 13.7437 14.15 14L9 19"
                        stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </g>

            </svg>
        </button>

        <button id="next" class="slider-btn next">

            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">

            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Transformed by: SVG Repo Mixer Tools -->
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M14.9991 19L9.83911 14C9.56672 13.7429 9.34974 13.433 9.20142 13.0891C9.0531 12.7452 8.97656 12.3745 8.97656 12C8.97656 11.6255 9.0531 11.2548 9.20142 10.9109C9.34974 10.567 9.56672 10.2571 9.83911 10L14.9991 5"
                        stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </g>

            </svg>
        </button>

        {{-- <div class="dots" id="dots"></div> --}}
    </div>



    <div style="width: 88%; margin: 50px auto; margin-bottom: -20px;">
        <div class="mb-7 md:mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-7">
                <a href="/slots"
                    class="relative flex items-end overflow-hidden rounded-2xl bg-gray-800 p-4 md:p-7 transition-transform duration-300 hover:-translate-y-1 group custom-card">
                    <img src="{{ asset('images/banner_casino.webp') }}" alt="Slot Banner"
                        class="absolute inset-0 h-full w-full object-cover rounded-2xl opacity-80 transition-opacity duration-300 group-hover:opacity-100" />
                    <!-- Gradient with subtle opacity, thicker at the bottom-left -->
                    <div
                        class="absolute inset-0 bg-gradient-to-tl from-yellow-500 via-transparent to-orange-600 opacity-50">
                    </div>
                    <div class="relative z-10 max-w-md text-container" style="margin-top: 180px;">
                        <div class="mb-1 flex items-center space-x-2">
                            <h2 class="text-lg md:text-2xl font-bold text-white">Slot</h2>
                            <div class="bg-green-500 text-white text-xs font-medium px-2 py-1 rounded-full">
                                Banyak Game
                            </div>
                        </div>
                        <p class="text-sm text-gray-300">
                            Jelajahi berbagai slot menarik dengan tema seru dan hadiah fantastis.
                        </p>
                    </div>
                </a>

                <a href="/casino"
                    class="relative flex items-end overflow-hidden rounded-2xl bg-gray-800 p-4 md:p-7 transition-transform duration-300 hover:-translate-y-1 group custom-card">
                    <img src="{{ asset('images/banner_sports.webp') }}" alt="Casino Banner"
                        class="absolute inset-0 h-full w-full object-cover rounded-2xl opacity-80 transition-opacity duration-300 group-hover:opacity-100" />
                    <!-- Gradient with subtle opacity, thicker at the bottom-left -->
                    <div
                        class="absolute inset-0 bg-gradient-to-tl from-purple-800 via-transparent to-indigo-900 opacity-50">
                    </div>
                    <div class="relative z-10 max-w-md text-container" style="margin-top: 180px;">
                        <div class="mb-1 flex items-center space-x-2">
                            <h2 class="text-lg md:text-2xl font-bold text-white">Casino</h2>
                            <div class="bg-red-500 text-white text-xs font-medium px-2 py-1 rounded-full">
                                Banyak Game
                            </div>
                        </div>
                        <p class="text-sm text-gray-300">
                            Rasakan pengalaman live casino dengan berbagai game seperti blackjack, roulette, dan
                            baccarat.
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>



    @foreach ($providers as $index => $pv)
        <div class="carousel-container carousel-{{ $index }}">
            <div class="carousel-header">
                <h2>
                    <img src="https://www.wild.io/cdn-cgi/image/width=640,quality=75,format=webp//assets/providers-page.svg"
                        alt="Casino Icon">
                    {{ $pv['provider_name'] }}
                </h2>
                <a href="/games">View all <span>{{ count($pv['games']) }}</span></a>
            </div>

            <div class="swiper swiper-{{ $index }}">
                <div class="swiper-wrapper">
                    @foreach ($pv['games'] as $pgm)
                        <div class="swiper-slide" style="background-image: url('{{ $pgm['game_image'] }}');">
                            <div class="game-info">
                                <h3>{{ $pgm['game_name'] }}</h3>
                                <span>{{ $pv['provider_name'] }}</span>
                            </div>

                            <!-- Play Button (appears on hover) -->
                            <div class="play-game-btn">
                                <button class="play-btn" onclick="checkLoginAndPlay('{{ $pgm['id'] }}')">
                                    <i class="fas fa-play"></i> Play
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function checkLoginAndPlay(gameId) {
            @if(auth()->check())
                window.location.href = '/games/play-game/' + gameId;
            @else
                Swal.fire({
                    title: 'You are not logged in!',
                    text: 'Please log in to play the game.',
                    icon: 'warning',
                    confirmButtonText: 'Login',
                    preConfirm: () => {
                        window.location.href = '/login';
                    }
                });
            @endif
        }
    </script>
    
@endsection
@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        <style>.slider-container {
            position: relative;
            width: 80%;
            margin: auto;
            padding: 10px;
            height: 400px;
        }

        .slider-wrapper {
            overflow: hidden;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease;
        }

        /* Styling for each slide */
        .slide {
            flex: 0 0 100%;
            /* Full width */
            border-radius: 1.5rem;
        }

        /* Styling for slide content */
        .slide-content {
            position: relative;
            z-index: 10;
            width: 88%;
            height: 400px;
            margin: auto;
            padding: 20px;
            /* Set height of 200px */
            overflow: hidden;
            border-radius: 1.5rem;
        }

        .slide-content img {
            position: absolute;
            height: 100%;
            width: 100%;
            inset: 0;
            object-fit: cover;
            object-position: center;
        }

        /* Styling for prev and next buttons */
        .slider-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            border-radius: 50%;
            padding: 10px;
            cursor: pointer;
            z-index: 10;
        }

        .slider-btn.prev {
            right: 10px;
        }

        .slider-btn.next {
            left: 10px;
        }

        /* Styling for dot navigation */
        .dots {
            text-align: center;
            margin-top: 10px;
        }

        .dot {
            display: inline-block;
            height: 12px;
            width: 12px;
            margin: 0 5px;
            background-color: #bbb;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .dot.active {
            background-color: #717171;
        }

        /* Responsive adjustments for mobile */
        @media (max-width: 768px) {
            .slider-container {
                padding: 10px;
                /* Padding for mobile */
                height: 200px;
                /* Set fixed height of 200px */
            }

            .slider-btn {
                padding: 8px;
            }

            .slide-content {
                height: 400px !important;
            }

            .slide-content img {
                height: 100%;
            }

            .dots {
                margin-top: 5px;
            }
        }

        @media (max-width: 480px) {
            .slider-container {
                padding: 10px;
                /* Padding for small screens */
                height: 200px;
                /* Set fixed height of 200px */
            }

            .slider-btn {
                padding: 6px;
            }

            .slide-content {
                height: 200px !important;
            }

            .slide-content img {
                height: 100%;
            }

            .dots {
                margin-top: 5px;
            }
        }
    </style>

    </style>

    <style>
        .game-providers {
            padding: 20px;
            width: 80%;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .view-all {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #22c55e;
            font-weight: bold;
        }

        .view-all .badge {
            display: inline-block;
            background-color: #22c55e;
            color: #0f172a;
            padding: 2px 8px;
            border-radius: 999px;
            margin-left: 8px;
        }

        .providers {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .provider-card {
            flex: 0 0 132px;
            text-align: center;
            background-color: #1e293b;
            padding: 16px;
            border-radius: 12px;
            transition: background-color 0.3s;
        }

        .provider-card:hover {
            background-color: #334155;
        }

        .provider-card img {
            max-width: 100%;
            height: 48px;
            object-fit: contain;
            opacity: 0.8;
        }

        .provider-card .games-count {
            display: inline-block;
            margin-top: 8px;
            background-color: rgba(34, 197, 94, 0.15);
            color: #22c55e;
            padding: 4px 8px;
            font-size: 0.8rem;
            border-radius: 12px;
        }
    </style>
    <style>
        /* Base styles for desktop */
        .carousel-container {
            padding: 20px;
            width: 90%;
            height: 300px;
            margin: auto;
            overflow: hidden;
            position: relative;
        }

        .carousel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .carousel-header h2 {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            margin: 0;
        }

        .carousel-header img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .carousel-header a {
            text-decoration: none;
            color: #00ff99;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .carousel-header a span {
            margin-left: 5px;
            background-color: #00ff99;
            color: #000;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
        }

        .swiper {
            width: 100%;
            height: 100%;
            margin-top: 0px;
        }

        .swiper-slide {
            border: 2px solid #FFF;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #06283d;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-height: 220px;
            max-width: 220px;
            padding: 10px;
            margin: 10px;
            position: relative;
            background-size: cover;
            background-position: center;
            transition: opacity 0.3s ease;
        }

        .swiper-slide .game-info {
            position: absolute;
            bottom: 10px;
            left: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.8);
            padding: 10px;
            border-radius: 8px;
        }

        .swiper-slide h3 {
            font-size: 1rem;
            margin: 5px 0;
            color: #fff;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .swiper-slide span {
            font-size: 0.9rem;
            color: #00ff99;
        }

        /* Play button style */
        .play-game-btn {
            display: none;
            /* Initially hidden */
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 20;
        }

        .play-btn {
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .play-btn i {
            margin-right: 8px;
        }

        /* Hover Effect */
        .swiper-slide:hover .game-info {
            opacity: 0;
            /* Optionally, hide the text info on hover */
        }

        .swiper-slide:hover .play-game-btn {
            display: block;
            /* Show the play button on hover */
        }

        .swiper-slide:hover {
            opacity: 0.8;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .carousel-container {
                width: 100%;
                padding: 10px;
            }

            .carousel-header h2 {
                font-size: 1.2rem;
            }

            .carousel-header img {
                width: 25px;
                height: 25px;
            }

            .carousel-header a span {
                font-size: 0.7rem;
            }

            .swiper {
                width: 100%;
                height: 240px !important;
                margin-top: 0px;
            }

            .swiper-slide {
                width: 180px !important;
                margin: 5px;
            }

            .swiper-slide h3 {
                font-size: 0.9rem;
            }

            .swiper-slide span {
                font-size: 0.8rem;
            }
        }

        @media (max-width: 480px) {
            .carousel-container {
                padding: 15px;
                height: 240px !important;
            }

            .carousel-header h2 {
                font-size: 1rem;
            }

            .carousel-header img {
                width: 20px;
                height: 20px;
            }

            .carousel-header a span {
                font-size: 0.6rem;
            }

            .swiper-slide {
                width: 180px;
                height: 180px;
            }

            .swiper-slide h3 {
                font-size: 0.8rem;
            }

            .swiper-slide span {
                font-size: 0.7rem;
            }
        }
    </style>
@endsection
@section('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        let currentSlide = 0;

        const slides = document.querySelectorAll('.slide');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');
        const dotsContainer = document.getElementById('dots');

        // Add dots
        slides.forEach((slide, index) => {
            const dot = document.createElement('span');
            dot.classList.add('dot');
            if (index === 0) dot.classList.add('active');
            dot.addEventListener('click', () => showSlide(index));
            dotsContainer.appendChild(dot);
        });

        function showSlide(index) {
            if (index < 0) {
                currentSlide = slides.length - 1;
            } else if (index >= slides.length) {
                currentSlide = 0;
            } else {
                currentSlide = index;
            }
            updateSlider();
        }

        function updateSlider() {
            const slider = document.querySelector('.slider');
            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
            document.querySelectorAll('.dot').forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }

        prevButton.addEventListener('click', () => showSlide(currentSlide - 1));
        nextButton.addEventListener('click', () => showSlide(currentSlide + 1));

        // Optional: Automatically cycle through slides
        setInterval(() => {
            showSlide(currentSlide + 1);
        }, 5000); // Change slide every 5 seconds
    </script>
    <script>
        @foreach ($providers as $index => $pv)
            const swiper{{ $index }} = new Swiper('.swiper-{{ $index }}', {
                slidesPerView: 'auto', // Adjusts to the width of the slides
                spaceBetween: 0, // No space between the slides
                loop: true, // Infinite loop
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                centeredSlides: true, // Centers the first slide in the view
                breakpoints: {
                    320: {
                        slidesPerView: 2, // Adjust based on screen size
                        spaceBetween: 0,
                    },
                    480: {
                        slidesPerView: 3,
                        spaceBetween: 0,
                    },
                    640: {
                        slidesPerView: 4,
                        spaceBetween: 0,
                    },
                    768: {
                        slidesPerView: 5,
                        spaceBetween: 0,
                    },
                    1024: {
                        slidesPerView: 6,
                        spaceBetween: 0,
                    },
                },
            });
        @endforeach
    </script>
@endsection
