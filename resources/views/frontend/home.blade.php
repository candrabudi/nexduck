@extends('frontend.layouts.app')
@section('content')
    <div class="">
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"
                    style="background-image: url('https://api2-p7g.imgnxb.com/images/P7G/id_cbd_8d22b25c-d49d-42d9-b1af-7b5b312a9f78_1728472534997.jpg');">
                </div>
                <div class="swiper-slide"
                    style="background-image: url('https://api2-p7g.imgnxb.com/images/P7G/id_cbd_cbc8214e-197c-4c11-88ca-9f158ef6edf6_1728380651430.jpg');">
                </div>
                <div class="swiper-slide"
                    style="background-image: url('https://api2-p7g.imgnxb.com/images/P7G/id_cbd_ad41f7de-ce7d-4b14-9135-b529c18a3c00_1728380695850.jpg');">
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

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

            <div class="w-full flex justify-between mb-4">
                <h2 class="text-xl font-bold">Slot</h2>
            </div>
            <div style="background: black; border-radius: 14px; padding: 10px; min-height: 130px; margin-bottom: 20px; position: relative;">
                <div class="home-menu-list"
                    style="display: flex; flex-wrap: nowrap; gap: 20px; margin-bottom: 0; overflow-x: auto; overflow-y: hidden; white-space: nowrap; scroll-behavior: smooth; padding-bottom: 40px;">
                    @foreach ($slots as $sl)
                        <div class="home-menu-item text-center"
                            style="flex: 0 0 auto; width: 80px; height: 80px; background-color: rgba(126, 214, 223, 0.2); display: flex; align-items: center; justify-content: center; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s, box-shadow 0.3s;">
                            <a href="{{ route('game', $sl->provider_slug) }}"
                                style="display: block; height: 100%; width: 100%;">
                                <div class="home-menu-img"
                                    style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                                    <img src="{{ $sl->provider_image }}" alt="{{ $sl->provider_name }}"
                                        style="max-width: 100%; height: auto;">
                                </div>
                                <span class="provider-name">{{ $sl->provider_name }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="w-full flex justify-between mb-4">
                <h2 class="text-xl font-bold">Casino</h2>
            </div>
            <div style="background: black; border-radius: 14px; padding: 10px; min-height: 130px; margin-bottom: 20px; position: relative;">
                <div class="home-menu-list"
                    style="display: flex; flex-wrap: nowrap; gap: 20px; margin-bottom: 0; overflow-x: auto; overflow-y: hidden; white-space: nowrap; scroll-behavior: smooth; padding-bottom: 40px;">
                    @foreach ($casinos as $csn)
                        <div class="home-menu-item text-center"
                            style="flex: 0 0 auto; width: 80px; height: 80px; background-color: rgba(126, 214, 223, 0.2); display: flex; align-items: center; justify-content: center; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s, box-shadow 0.3s;">
                            <a href="{{ route('game', $csn->provider_slug) }}"
                                style="display: block; height: 100%; width: 100%;">
                                <div class="home-menu-img"
                                    style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                                    <img src="{{ $csn->provider_image }}" alt="{{ $csn->provider_name }}"
                                        style="max-width: 100%; height: auto;">
                                </div>
                                <span class="provider-name">{{ $csn->provider_name }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const providerNames = document.querySelectorAll('.provider-name');
                    
                    providerNames.forEach(function (nameElement) {
                        const nameText = nameElement.textContent.trim();
                        const words = nameText.split(' ');
            
                        if (words.length > 1) {
                            const firstLine = words.slice(0, 2).join(' ');
                            const secondLine = words.slice(2).join(' ');
            
                            if (secondLine) {
                                nameElement.innerHTML = `${firstLine}<br>${secondLine}`;
                            }
                        }
                    });
                });
            </script>                

            <style>
                .home-menu-list {
                    scrollbar-width: thin;
                    scrollbar-color: rgba(126, 214, 223, 0.5) transparent;
                }
        
                .home-menu-list::-webkit-scrollbar {
                    height: 6px;
                }
        
                .home-menu-list::-webkit-scrollbar-track {
                    background: transparent;
                }
        
                .home-menu-list::-webkit-scrollbar-thumb {
                    background-color: rgba(126, 214, 223, 0.5);
                    border-radius: 10px;
                }
        
                .home-menu-item:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
                }
        
                @media (min-width: 768px) {
                    .home-menu-item {
                        flex: 1 1 calc(16.66% - 20px);
                        max-width: calc(16.66% - 20px);
                    }
                }
        
                @media (max-width: 767px) {
                    .home-menu-list {
                        display: flex;
                        flex-wrap: nowrap;
                        overflow-x: auto;
                        overflow-y: hidden;
                        white-space: nowrap;
                        scroll-behavior: smooth;
                    }
        
                    .home-menu-item {
                        flex: 0 0 auto;
                        width: 80px;
                        max-width: 80px;
                    }
                }
        
                .home-menu-list:before, .home-menu-list:after {
                    content: '';
                    position: absolute;
                    top: 0;
                    bottom: 0;
                    width: 30px;
                    pointer-events: none;
                    z-index: 2;
                    transition: opacity 0.3s;
                }
        
                .home-menu-list:before {
                    left: 0;
                    background: linear-gradient(to right, black, transparent);
                }
        
                .home-menu-list:after {
                    right: 0;
                    background: linear-gradient(to left, black, transparent);
                }
        
                .home-menu-list:hover:before,
                .home-menu-list:hover:after {
                    opacity: 1;
                }
            </style>


            <div class="hightlight-container" style="margin-top: 50px;">
                <div class="w-full flex justify-between mb-4">
                    <h2 class="text-xl font-bold">Highlights</h2>
                </div>
                <div class="grid grid-cols-3 md:grid-cols-6 gap-4 mb-5">
                    <div class="item-game text-gray-700 w-full h-auto mr-4 cursor-pointer" title="Gates of Olympus"
                        style="background-image: url('/storage/fivers/vs20olympgate.png'); background-size: cover; background-position: center;">
                        <a href="/games/play/12221/vs20olympgate" class=""></a>
                        <div class="flex justify-between w-full text-gray-700 dark:text-gray-400 px-3 py-2">
                            <div class="flex flex-col justify-start items-start"></div>
                        </div>
                    </div>
                    <div class="item-game text-gray-700 w-full h-auto mr-4 cursor-pointer" title="Sailor Princess"
                        style="background-image: url('/storage/fivers/sailor.png'); background-size: cover; background-position: center;">
                        <a href="/games/play/12794/sailor" class=""></a>
                        <div class="flex justify-between w-full text-gray-700 dark:text-gray-400 px-3 py-2">
                            <div class="flex flex-col justify-start items-start"></div>
                        </div>
                    </div>
                    <div class="item-game text-gray-700 w-full h-auto mr-4 cursor-pointer" title="Infinity Club"
                        style="background-image: url('/storage/fivers/nightclub.png'); background-size: cover; background-position: center;">
                        <a href="/games/play/12795/nightclub" class=""></a>
                        <div class="flex justify-between w-full text-gray-700 dark:text-gray-400 px-3 py-2">
                            <div class="flex flex-col justify-start items-start"></div>
                        </div>
                    </div>
                    <div class="item-game text-gray-700 w-full h-auto mr-4 cursor-pointer" title="Nezha Legend"
                        style="background-image: url('/storage/fivers/nezha.png'); background-size: cover; background-position: center;">
                        <a href="/games/play/12796/nezha" class=""></a>
                        <div class="flex justify-between w-full text-gray-700 dark:text-gray-400 px-3 py-2">
                            <div class="flex flex-col justify-start items-start"></div>
                        </div>
                    </div>
                    <div class="item-game text-gray-700 w-full h-auto mr-4 cursor-pointer" title="Bird Island"
                        style="background-image: url('/storage/fivers/bird.png'); background-size: cover; background-position: center;">
                        <a href="/games/play/12797/bird" class=""></a>
                        <div class="flex justify-between w-full text-gray-700 dark:text-gray-400 px-3 py-2">
                            <div class="flex flex-col justify-start items-start"></div>
                        </div>
                    </div>
                    <div class="item-game text-gray-700 w-full h-auto mr-4 cursor-pointer" title="Field Of Honor"
                        style="background-image: url('/storage/fivers/honor.png'); background-size: cover; background-position: center;">
                        <a href="/games/play/12798/honor" class=""></a>
                        <div class="flex justify-between w-full text-gray-700 dark:text-gray-400 px-3 py-2">
                            <div class="flex flex-col justify-start items-start"></div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .hightlight-container .item-game {
                    width: 300px;
                    height: 200px;
                }

                @media (min-width: 768px) {
                    .hightlight-container .item-game img {
                        height: 200px;
                        /* Height for desktop */
                    }
                }

                @media (max-width: 767px) {
                    .hightlight-container .item-game img {
                        height: 150px;
                        /* Height for mobile */
                    }
                }
            </style>



            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

            <div class="mt-5">
                <div class="game-list flex flex-col mt-5 relative">
                    <div class="w-full flex justify-between mb-2">
                        <h2 class="text-xl font-bold">TopTrend Gaming</h2>
                        <div class="flex">
                            <a href="/casino/provider/170/category/all" class="item-game px-3 py-2 mr-2 rounded">See
                                all</a>
                            <button class="item-game px-3 py-2 rounded mr-2 owl-prev"><i
                                    class="fa-solid fa-angle-left"></i></button>
                            <button class="item-game px-3 py-2 rounded owl-next"><i
                                    class="fa-solid fa-angle-right"></i></button>
                        </div>
                    </div>
                    <section class="carousel owl-carousel" dir="ltr" aria-label="Gallery" tabindex="0">
                        <div class="item-game text-gray-700 w-full h-auto mr-4 cursor-pointer" title="Golden Dragon"
                            cover="fivers/GoldenDragon.png" gamecode="GoldenDragon" type="fivers">
                            <a href="/games/play/12708/GoldenDragon" class="">
                                <img src="/storage/fivers/GoldenDragon.png" alt="" class="w-full">
                            </a>
                            <div class="flex justify-between w-full text-gray-700 dark:text-gray-400 px-3 py-2">
                            </div>
                        </div>
                        <div class="item-game text-gray-700 w-full h-auto mr-4 cursor-pointer" title="Golden Dragon"
                            cover="fivers/GoldenDragon.png" gamecode="GoldenDragon" type="fivers">
                            <a href="/games/play/12708/GoldenDragon" class="">
                                <img src="//dsuown9evwz4y.cloudfront.net/Images/providers/PP/vswaysmahwblck.webp?v=20241103-1"
                                    alt="" class="w-full">
                            </a>
                            <div class="flex justify-between w-full text-gray-700 dark:text-gray-400 px-3 py-2">
                            </div>
                        </div>
                        <div class="item-game text-gray-700 w-full h-auto mr-4 cursor-pointer" title="Golden Dragon"
                            cover="fivers/GoldenDragon.png" gamecode="GoldenDragon" type="fivers">
                            <a href="/games/play/12708/GoldenDragon" class="">
                                <img src="//dsuown9evwz4y.cloudfront.net/Images/providers/PP/vswaysmahwin2.webp?v=20241103-1"
                                    alt="" class="w-full">
                            </a>
                            <div class="flex justify-between w-full text-gray-700 dark:text-gray-400 px-3 py-2">
                            </div>
                        </div>
                        <div class="item-game text-gray-700 w-full h-auto mr-4 cursor-pointer" title="Golden Dragon"
                            cover="fivers/GoldenDragon.png" gamecode="GoldenDragon" type="fivers">
                            <a href="/games/play/12708/GoldenDragon" class="">
                                <img src="//dsuown9evwz4y.cloudfront.net/Images/providers/HACKSAW/HACKSAW_1534.webp?v=20241103-1"
                                    alt="" class="w-full">
                            </a>
                            <div class="flex justify-between w-full text-gray-700 dark:text-gray-400 px-3 py-2">
                            </div>
                        </div>
                        <div class="item-game text-gray-700 w-full h-auto mr-4 cursor-pointer" title="Golden Dragon"
                            cover="fivers/GoldenDragon.png" gamecode="GoldenDragon" type="fivers">
                            <a href="/games/play/12708/GoldenDragon" class="">
                                <img src="//dsuown9evwz4y.cloudfront.net/Images/providers/PGSOFT/mahjong-ways2.webp?v=20241103-1"
                                    alt="" class="w-full">
                            </a>
                            <div class="flex justify-between w-full text-gray-700 dark:text-gray-400 px-3 py-2">
                            </div>
                        </div>
                    </section>
                </div>
            </div>


            <!---->
        </div>
    </div>
@endsection
