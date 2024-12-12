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
                <!-- Gambar untuk resolusi besar (1920px dan lebih) -->
                <source media="(min-width: 1920px)" srcset="{{ asset('images/hero-background-desktop.webp') }}">
                <!-- Gambar untuk resolusi desktop menengah (1368px - 1919px) -->
                <source media="(min-width: 1368px) and (max-width: 1919px)"
                    srcset="{{ asset('images/hero-background-desktop.webp') }}">
                <!-- Gambar untuk resolusi desktop umum (1280px - 1367px) -->
                <source media="(min-width: 1280px) and (max-width: 1367px)"
                    srcset="{{ asset('images/hero-background-desktop.webp') }}">
                <!-- Gambar untuk resolusi lebih kecil (mobile) -->
                <source media="(max-width: 640px)" srcset="{{ asset('images/hero-background-mobile.webp') }}">
                <!-- Gambar default untuk fallback -->
                <img src="{{ asset('images/hero-background-desktop.webp') }}" alt="Background Desktop"
                    class="absolute inset-0 object-cover w-full h-full" />
            </picture>

            <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-transparent to-gray-900 opacity-60"></div>
        </div>

    </div>

    <div class="" style="margin-top: -50px;">
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($banners as $banner)
                    <div class="swiper-slide"
                        style="background-image: url('{{ $banner->banner_image }}'); background-size: cover; background-position: center;">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-1/4 h-full bg-gradient-to-r from-black/70 to-transparent"></div>
                            <div class="flex-1"></div>
                            <div class="w-1/4 h-full bg-gradient-to-l from-black/70 to-transparent"></div>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center text-center">
                            <div class="text-white max-w-md px-4">
                                <h2 class="text-3xl md:text-4xl font-bold">{{ $banner->title }}</h2>
                                <p class="text-sm md:text-base mt-2">{{ $banner->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

        <style>
            /* Aturan umum untuk desktop */
            .custom-card {
                height: 500px;
            }

            /* Aturan untuk tampilan mobile dengan lebar kurang dari 768px */
            @media (max-width: 768px) {
                .custom-card {
                    height: 100px;
                }

                .card-menu-game {
                    margin-bottom: -25px;
                }

                .custom-card .text-container {
                    margin-top: 100px;
                    /* Sesuaikan margin teks agar proporsional di tampilan mobile */
                }
            }
        </style>

        <div class="md:w-4/6 2xl:w-4/6 mx-auto p-4 card-menu-game">
            <div class="mb-7 md:mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-7">
                    <a href="/slots"
                        class="relative flex items-end overflow-hidden rounded-2xl bg-gray-800 p-4 md:p-7 transition-transform duration-300 hover:-translate-y-1 group custom-card">
                        <img src="{{ asset('images/banner_casino.webp') }}" alt="Slot Banner"
                            class="absolute inset-0 h-full w-full object-cover rounded-2xl opacity-80 transition-opacity duration-300 group-hover:opacity-100" />
                        <div class="absolute inset-0 bg-gradient-to-b from-yellow-500 to-orange-600 opacity-40"></div>
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
                        <img src="{{ asset('images/banner_casino.webp') }}" alt="Casino Banner"
                            class="absolute inset-0 h-full w-full object-cover rounded-2xl opacity-80 transition-opacity duration-300 group-hover:opacity-100" />
                        <div class="absolute inset-0 bg-gradient-to-b from-purple-800 to-indigo-900 opacity-40"></div>
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


        @if (Auth::user())
            <div class="md:w-4/6 2xl:w-4/6 mx-auto p-4">
                <h2 class="text-3xl font-extrabold text-white mb-6 text-center">Promotion Progress</h2>
                <div id="promotion-container"
                    class="bg-gradient-to-t from-[#1d1f2f] to-[#292b42] shadow-2xl rounded-lg p-8">
                </div>
            </div>

            <script>
                async function fetchPromotionProgress(userId) {
                    try {
                        const response = await fetch(`/promotion-progress/${userId}`);
                        const historyGame = await fetch(`/history-game`);

                        if (!response.ok) {
                            throw new Error('Promotion not found');
                        }

                        const data = await response.json();
                        updatePromotionUI(data.promotion, data.progress);

                    } catch (error) {
                        document.getElementById('promotion-container').innerHTML =
                            `<p class="text-red-600 font-bold">${error.message}</p>`;
                    }
                }

                function updatePromotionUI(promotion, progress) {
                    const container = document.getElementById('promotion-container');
                    container.innerHTML = `
                    <div class="mb-6 text-white">
                        <p class="text-xl font-bold mb-2"><strong>Nominal Deposit:</strong> 
                            <span class="text-green-400 font-semibold">${new Intl.NumberFormat('id-ID').format(promotion.nominal_deposit)} IDR</span>
                        </p>
                        <p class="text-xl font-bold mb-2"><strong>Target:</strong> 
                            <span class="text-green-400 font-semibold">${new Intl.NumberFormat('id-ID').format(promotion.target)} IDR</span>
                        </p>
                        <p class="text-xl font-bold mb-2"><strong>Current Progress:</strong> 
                            <span class="text-green-400 font-semibold">${new Intl.NumberFormat('id-ID').format(promotion.current_target)} IDR</span>
                        </p>
                    </div>

                    <!-- Elegant Progress Bar -->
                    <div class="w-full bg-gray-700 rounded-full h-6 mb-4 shadow-inner">
                        <div id="progress-bar" class="h-6 rounded-full text-center font-bold text-white bg-gradient-to-r from-[#1abc9c] to-[#16a085] shadow-lg"
                            style="width: 0%; transition: width 1s ease-in-out;">
                            <span id="progress-text" class="absolute inset-0 flex items-center justify-center font-semibold text-xl">${progress.toFixed(2)}%</span>
                        </div>
                    </div>
                    `;

                    const progressBar = document.getElementById('progress-bar');
                    const progressText = document.getElementById('progress-text');
                    progressBar.style.width = `${progress}%`;
                    progressText.textContent = `${progress.toFixed(2)}%`;
                }

                document.addEventListener('DOMContentLoaded', () => {
                    const userId = {{ Auth::user()->id }};
                    fetchPromotionProgress(userId);
                });
            </script>
        @endif



        <div class="md:w-4/6 2xl:w-4/6 mx-auto p-4">
            {{-- <div class="mb-5 cursor-pointer w-full">
                <div class="flex">
                    <div class="relative w-full">
                        <input type="search"
                            class="block dark:focus:border-green-500 p-2.5 w-full z-20 text-sm text-gray-900 rounded-e-lg input-color-primary border-none focus:outline-none dark:border-s-gray-800 dark:border-gray-800 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Search game" required="">
                        <button type="submit"
                            class="absolute top-0 end-0 h-full p-2.5 text-sm font-medium text-white rounded-e-lg dark:bg-[#1C1E22]">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </div> --}}

            <div class="carousel-container">
                <div class="carousel-header">
                    <h2>
                        <img src="https://www.wild.io/cdn-cgi/image/width=640,quality=75,format=webp//assets/providers-page.svg"
                            alt="Casino Icon">
                        Casino
                    </h2>
                    <a href="/games">View all <span>6703</span></a>
                </div>

                <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!-- Slide 1 -->
                        <div class="swiper-slide"
                            style="background-image: url('https://www.wild.io/cdn-cgi/image/width=3840,quality=75,format=webp/https://wild.io/thumbnail/pragmaticexternal/GatesofOlympusXmas1000.webp');">
                            <div class="game-info">
                                <h3>Gates of Olympus Xmas</h3>
                                <span>Pragmatic Play</span>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="swiper-slide"
                            style="background-image: url('https://www.wild.io/cdn-cgi/image/width=3840,quality=75,format=webp/https://cdn.wild.io/thumbnail/pragmaticexternal/SantasXmasRush.png');">
                            <div class="game-info">
                                <h3>Santa's Xmas Rush</h3>
                                <span>Pragmatic Play</span>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="swiper-slide" style="background-image: url('https://via.placeholder.com/300x180');">
                            <div class="game-info">
                                <h3>Coins of Christmas</h3>
                                <span>Betsoft</span>
                            </div>
                        </div>
                        <!-- Slide 4 -->
                        <div class="swiper-slide" style="background-image: url('https://via.placeholder.com/300x180');">
                            <div class="game-info">
                                <h3>Snow Slingers</h3>
                                <span>Hacksaw Gaming</span>
                            </div>
                        </div>
                        <!-- Slide 5 -->
                        <div class="swiper-slide" style="background-image: url('https://via.placeholder.com/300x180');">
                            <div class="game-info">
                                <h3>Wild Moon Thieves</h3>
                                <span>BGaming</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($providers as $index => $pv)
                <div class="mt-5">
                    <div class="game-list flex flex-col mt-5 relative">
                        <div class="w-full flex justify-between mb-2">
                            <h2 class="text-xl font-bold text-white">{{ $pv['provider_name'] }}</h2>
                            <div class="flex">
                                <a href="/slots" class="item-game px-3 py-2 mr-2 rounded bg-gray-900 text-white">See
                                    all</a>
                                <button class="item-game px-3 py-2 rounded mr-2 custom-prev bg-gray-900 text-white"
                                    data-target="#carousel-{{ $index }}">
                                    <i class="fa-solid fa-angle-left"></i>
                                </button>
                                <button class="item-game px-3 py-2 rounded custom-next bg-gray-900 text-white"
                                    data-target="#carousel-{{ $index }}">
                                    <i class="fa-solid fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                        <section class="carousel owl-carousel" id="carousel-{{ $index }}" dir="ltr"
                            aria-label="Gallery">
                            @foreach ($pv['games'] as $pgm)
                                <div class="flex-none">
                                    <a href="{{ $isLoggedIn ? route('game.playGame', $pgm['id']) : '#' }}"
                                        onclick="{{ !$isLoggedIn ? 'showLoginAlert(); return false;' : '' }}"
                                        class="block relative group">
                                        <div
                                            class="relative rounded-lg overflow-hidden p-2 bg-gray-800 transition-all duration-300 ease-in-out">
                                            <!-- Game Image with dark background opacity -->
                                            <div class="relative w-full h-full bg-black bg-opacity-60">
                                                <img src="{{ $pgm['game_image'] }}" alt="{{ $pgm['game_name'] }}"
                                                    class="rounded-lg w-full object-cover transition-transform transform group-hover:scale-105 group-hover:opacity-80 game-image" />

                                                <!-- Play Button Icon with full opacity -->
                                                <div class="absolute inset-0 flex justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                                    style="z-index: 999999;">
                                                    <i class="fa-solid fa-play text-white text-4xl"></i>
                                                </div>
                                            </div>

                                            <!-- Game Info and RTP Progress -->
                                            <div class="absolute inset-0 flex flex-col justify-end p-4">
                                                <div class="p-2 rounded shadow-md" style="background: #333;">
                                                    <div class="text-center text-sm font-semibold text-white">
                                                        {{ $pgm['game_name'] }}</div>
                                                    <div class="text-xs text-center text-gray-400">
                                                        {{ $pv['provider_name'] }}</div>

                                                    <!-- RTP Progress Bar -->
                                                    <div class="mt-2 w-full h-2 bg-gray-600 rounded-full">
                                                        @php
                                                            $rtp = rand(60, 98);
                                                            if ($rtp >= 90) {
                                                                $color = 'bg-green-500';
                                                            } elseif ($rtp >= 80) {
                                                                $color = 'bg-yellow-500';
                                                            } elseif ($rtp >= 70) {
                                                                $color = 'bg-orange-500';
                                                            } else {
                                                                $color = 'bg-red-500';
                                                            }
                                                        @endphp
                                                        <div class="h-2 rounded-full {{ $color }}"
                                                            style="width: {{ $rtp }}%;"></div>
                                                    </div>
                                                    <div class="text-xs text-center text-gray-400 mt-1">RTP:
                                                        {{ $rtp }}%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </section>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('styles')
    <style>
        .swiper-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 20px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #fff;
            width: 40px;
            height: 40px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .swiper-pagination-bullet-active {
            background-color: #10b981;
        }

        /* Add this to your custom CSS file */
        @media (max-width: 767px) {
            .game-image {
                width: 180px;
                height: 180px;
            }
        }

        @media (min-width: 768px) {
            .game-image {
                width: 300px;
                height: 200px;
            }
        }


        .carousel-container {
            padding: 20px;
            width: 750px;
            height: 350px;
            margin: auto;
            overflow: hidden;
            position: relative;
            border: 1px solid #333;
        }

        .carousel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
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

        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #06283d;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            height: 220px;
            width: 350px;
            padding: 10px;
            margin: 10px;
            position: relative;
            background-size: cover;
            background-position: center;
        }

        /* Overlay box for the text (darker background) */
        .swiper-slide .game-info {
            position: absolute;
            bottom: 10px;
            left: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.8);
            /* Darker background */
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
    </style>
@endsection
@section('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'fraction',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            keyboard: {
                enabled: true,
                onlyInViewport: true,
            },
        });
    </script>
    <script>
        $(document).ready(function() {
            @foreach ($providers as $index => $pv)
                // Initialize Owl Carousel for each provider
                $("#carousel-{{ $index }}").owlCarousel({
                    items: 5, // Default number of items for larger screens
                    margin: 10,
                    loop: true,
                    nav: false, // Optional: Enable nav if needed
                    responsive: {
                        0: {
                            items: 2 // 2 items on mobile
                        },
                        400: {
                            items: 2
                        }
                        768: {
                            items: 4 // 4 items on tablets
                        },
                        1024: {
                            items: 5 // 5 items on larger screens
                        }
                    }
                });

                // Custom navigation for "previous" button
                $('[data-target="#carousel-{{ $index }}"].custom-prev').on('click', function() {
                    var owl = $('#carousel-{{ $index }}');
                    owl.trigger('prev.owl.carousel'); // Go to previous item
                });

                // Custom navigation for "next" button
                $('[data-target="#carousel-{{ $index }}"].custom-next').on('click', function() {
                    var owl = $('#carousel-{{ $index }}');
                    owl.trigger('next.owl.carousel'); // Go to next item
                });
            @endforeach
        });
    </script>
@endsection