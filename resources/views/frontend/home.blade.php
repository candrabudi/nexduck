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
                            <!-- SVG Bintang -->
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
                            <!-- SVG Bintang -->
                        </div>
                        <span class="text-xs font-bold">Ulasan Positif</span>
                        <div class="flex items-center ml-1">
                            <span class="ml-1 text-xs font-bold">Dijamin Aman</span>
                        </div>
                    </div>
                </div>
            @endauth
        </div>

        <!-- Gambar Background -->
        <div class="absolute inset-0">
            <picture>
                <source media="(max-width: 640px)" srcset="{{ asset('images/hero-background-mobile.webp') }}">
                <img src="{{ asset('images/hero-background-desktop.webp') }}" alt="Background"
                    class="absolute inset-0 object-cover w-full h-full" />
            </picture>

            <!-- Overlay untuk Mobile -->
            <div class="sm:hidden absolute inset-0 bg-black bg-opacity-50"></div>

            <!-- Gradient Overlay untuk semua layar -->
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-transparent to-gray-900 opacity-80"></div>
        </div>
    </div>

    @include('frontend.home.slide')

    <div style="width: 88%; margin: 50px auto; margin-bottom: -20px;">
        <div class="mb-7 md:mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-7">
                <a href="/slots"
                    class="relative flex items-end overflow-hidden rounded-2xl bg-gray-800 p-4 md:p-7 transition-transform duration-300 hover:-translate-y-1 group custom-card sm:w-[90%] sm:h-[150px]">
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
                    class="relative flex items-end overflow-hidden rounded-2xl bg-gray-800 p-4 md:p-7 transition-transform duration-300 hover:-translate-y-1 group custom-card sm:w-[90%] sm:h-[150px]">
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


    @include('frontend.home.games')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function checkLoginAndPlay(gameId) {
            @if (auth()->check())
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
@endsection
@section('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
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
