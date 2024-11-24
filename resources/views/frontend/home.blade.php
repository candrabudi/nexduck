@extends('frontend.layouts.app')

@section('content')
    <div class="relative bg-gradient-to-r from-gray-900 to-gray-800 min-h-[28rem] flex items-center justify-between">
        <!-- Konten Kiri -->
        <div class="relative z-10 w-full max-w-2xl px-6 md:px-12 lg:ml-16">
            <div class="text-center md:text-left">
                <h2 class="mt-2 text-4xl font-extrabold text-yellow-400 leading-tight sm:text-5xl">
                    Ayo Bermain dan Menangkan Hadiah Besar!
                </h2>
                <p class="mt-4 text-lg text-gray-300">
                    Bergabunglah dengan ribuan pemain lainnya dan nikmati pengalaman bermain game terbaik yang pernah ada.
                    Banyak pilihan game menarik, promosi tak tertandingi, dan peluang besar untuk menang!
                </p>
                <a href="/?m=signup"
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
                    </div>
                    <span class="text-xs font-bold">Ulasan Positif</span>
                    <div class="flex items-center ml-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-500" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path d="M10 15l4.4 2.6-1.2-5.3L17 8.6l-5.4-.4L10 3l-1.6 5.2-5.4.4 3.8 3.7L5.6 18z"></path>
                        </svg>
                        <span class="ml-1 text-xs font-bold">Dijamin Aman</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latar Belakang -->
        <div class="absolute inset-0">
            <picture>
                <source media="(min-width: 1280px)" srcset="{{ asset('images/hero-background-desktop.webp') }}">
                <source media="(max-width: 640px)" srcset="{{ asset('images/hero-background-mobile.webp') }}">
                <img src="{{ asset('images/hero-background-desktop.webp') }}" alt="Background"
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
                        <!-- Gradient hanya di kanan dan kiri -->
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-1/4 h-full bg-gradient-to-r from-black/70 to-transparent"></div>
                            <div class="flex-1"></div>
                            <div class="w-1/4 h-full bg-gradient-to-l from-black/70 to-transparent"></div>
                        </div>
                        <!-- Teks di tengah -->
                        <div class="absolute inset-0 flex items-center justify-center text-center">
                            <div class="text-white max-w-md px-4">
                                <h2 class="text-3xl md:text-4xl font-bold">{{ $banner->title }}</h2>
                                <p class="text-sm md:text-base mt-2">{{ $banner->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Tombol navigasi -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>

        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.swiper', {
                loop: true, // Pastikan loop aktif
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    type: 'fraction', // Tampilkan fraction sebagai pagination
                },
                navigation: {
                    nextEl: '.swiper-button-next', // Navigasi ke slide berikutnya
                    prevEl: '.swiper-button-prev', // Navigasi ke slide sebelumnya
                },
                keyboard: {
                    enabled: true, // Navigasi dengan keyboard
                    onlyInViewport: true,
                },
            });
        </script>
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
        </style>


        <div class="md:w-4/6 2xl:w-4/6 mx-auto p-4">
            <div class="mb-7 md:mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-7">
                    <!-- Slot Banner -->
                    <a href="/slots"
                        class="relative flex items-end overflow-hidden rounded-2xl bg-gray-800 p-4 md:p-7 transition-transform duration-300 hover:-translate-y-1 group"
                        style="display: inline-block;height: 500px;">
                        <img src="{{ asset('images/banner_casino.webp') }}" alt="Slot Banner"
                            class="absolute inset-0 h-full w-full object-cover rounded-2xl opacity-80 transition-opacity duration-300 group-hover:opacity-100" />
                        <div class="absolute inset-0 bg-gradient-to-b from-yellow-500 to-orange-600 opacity-40"></div>
                        <div class="relative z-10 max-w-md" style="margin-top: 180px;">
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

                    <!-- Casino Banner -->
                    <a href="/casino"
                        class="relative flex items-end overflow-hidden rounded-2xl bg-gray-800 p-4 md:p-7 transition-transform duration-300 hover:-translate-y-1 group"
                        style="display: inline-block;height: 500px;">
                        <img src="{{ asset('images/banner_casino.webp') }}" alt="Casino Banner"
                            class="absolute inset-0 h-full w-full object-cover rounded-2xl opacity-80 transition-opacity duration-300 group-hover:opacity-100" />
                        <div class="absolute inset-0 bg-gradient-to-b from-purple-800 to-indigo-900 opacity-40"></div>
                        <div class="relative z-10 max-w-md" style="margin-top: 180px;">
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


        <script src="https://cdn.tailwindcss.com"></script>
        <div class="md:w-4/6 2xl:w-4/6 mx-auto p-4">
            <div class="mb-5 cursor-pointer w-full">
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
            </div>

            <!-- CSS for Game Items and Overlay -->


            <!-- Owl Carousel CSS -->
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

            @foreach ($providers as $index => $pv)
                <div class="mt-5">
                    <div class="game-list flex flex-col mt-5 relative">
                        <div class="w-full flex justify-between mb-2">
                            <h2 class="text-xl font-bold">{{ $pv['provider_name'] }}</h2>
                            <div class="flex">
                                <a href="{{ route('game', $pv['provider_slug']) }}"
                                    class="item-game px-3 py-2 mr-2 rounded">See all</a>
                                <button class="item-game px-3 py-2 rounded mr-2 custom-prev"
                                    data-target="#carousel-{{ $index }}">
                                    <i class="fa-solid fa-angle-left"></i>
                                </button>
                                <button class="item-game px-3 py-2 rounded custom-next"
                                    data-target="#carousel-{{ $index }}">
                                    <i class="fa-solid fa-angle-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Carousel Section -->
                        <section class="carousel owl-carousel" id="carousel-{{ $index }}" dir="ltr"
                            aria-label="Gallery">
                            @foreach ($pv['games'] as $pgm)
                                <div class="flex-none">
                                    <a href="/games/{{ $pgm['game_slug'] }}" class="block relative group">
                                        <div class="relative rounded-lg overflow-hidden p-2"
                                            style="background: linear-gradient(to bottom, {{ $pgm['start_color'] ?? '#10b981' }}, {{ $pgm['end_color'] ?? '#065f46' }});">
                                            <!-- Game Image -->
                                            <img src="{{ $pgm['game_image'] }}" alt="{{ $pgm['game_name'] }}"
                                                class="rounded-md h-40 w-full object-cover" />

                                            <!-- Game Info -->
                                            <div class="absolute inset-0 flex flex-col justify-end p-4">
                                                <div class="bg-white/90 p-2 rounded shadow-md">
                                                    <div class="text-center text-sm font-semibold text-black">
                                                        {{ $pgm['game_name'] }}</div>
                                                    <div class="text-xs text-center text-gray-600">
                                                        {{ $pv['provider_name'] }}</div>
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

    <!-- External JS Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Initialize OwlCarousel and Custom Navigation -->
    <script>
        $(document).ready(function() {
            @foreach ($providers as $index => $pv)
                $("#carousel-{{ $index }}").owlCarousel({
                    items: 5,
                    margin: 10,
                    loop: true,
                    nav: false,
                    responsive: {
                        0: {
                            items: 2
                        },
                        768: {
                            items: 4
                        },
                        1024: {
                            items: 5
                        }
                    }
                });

                $('[data-target="#carousel-{{ $index }}"].custom-prev').on('click', function() {
                    var owl = $('#carousel-{{ $index }}');
                    owl.trigger('prev.owl.carousel');
                });

                $('[data-target="#carousel-{{ $index }}"].custom-next').on('click', function() {
                    var owl = $('#carousel-{{ $index }}');
                    owl.trigger('next.owl.carousel');
                });
            @endforeach
        });
    </script>
@endsection
