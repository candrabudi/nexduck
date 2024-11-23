@extends('frontend.layouts.app')

@section('content')
    <div class="">

        <!-- Swiper Section -->
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($banners as $banner)    
                    <div class="swiper-slide"
                        style="background-image: url('{{ $banner->banner_image }}');">
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

        <!-- Swiper JS -->
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
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        </script>

        <!-- Search Input Section -->
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
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- CSS for Game Items and Overlay -->
            <style>
                .hightlight-container .item-game {
                    width: 150px;
                    height: 150px;
                    background-size: cover;
                    background-position: center center;
                    border-radius: 8px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                @media (min-width: 768px) {
                    .hightlight-container .item-game {
                        width: 150px;
                        height: 150px;
                    }
                }

                @media (max-width: 767px) {
                    .hightlight-container .item-game {
                        width: 150px;
                        height: 150px;
                    }
                }

                .owl-carousel .owl-item {
                    padding: 10px;
                }

                .game-overlay {
                    background-color: rgba(0, 0, 0, 0.5);
                    color: white;
                    padding: 5px;
                    position: absolute;
                    bottom: 0;
                    width: 100%;
                    text-align: center;
                }

                .game-title {
                    font-size: 12px;
                    font-weight: bold;
                }
            </style>

            <!-- Owl Carousel CSS -->
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

            <!-- Providers Loop -->
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
                            aria-label="Gallery" tabindex="0">
                            @foreach ($pv['games'] as $pgm)
                                <div class="item-game text-gray-700 w-full h-auto mr-4 cursor-pointer"
                                    title="{{ $pgm['game_name'] }}"
                                    style="background-image: url('{{ $pgm['game_image'] }}'); width: 150px; height: 150px; display: inline-block; background-size: cover;"
                                    gamecode="{{ $pgm['game_code'] }}" data-game-id="{{ $pgm['id'] }}"
                                    onclick="handleGameClick(this)">
                                    <a href="javascript:void(0)">
                                        <div class="game-overlay">
                                            <span class="game-title">{{ $pgm['game_name'] }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </section>

                        <!-- Redirect and Login Alert Scripts -->
                        <script>
                            function handleGameClick(gameElement) {
                                const isLoggedIn = {{ Auth::check() ? 'true' : 'false' }}; // Cek apakah pengguna login
                                if (isLoggedIn) {
                                    const gameId = gameElement.getAttribute('data-game-id');
                                    if (gameId) {
                                        window.location.href = `/games/play-game/${gameId}`;
                                    }
                                } else {
                                    showLoginAlert(); // Tampilkan alert jika belum login
                                }
                            }

                            function showLoginAlert() {
                                Swal.fire({
                                    title: 'Harap login terlebih dahulu!',
                                    text: 'Anda harus login untuk memainkan game ini.',
                                    icon: 'warning',
                                    confirmButtonText: 'OK'
                                });
                            }
                        </script>

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
