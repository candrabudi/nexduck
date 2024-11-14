@extends('frontend.layouts.app')
@section('content')
    <div class="md:w-4/6 2xl:w-4/6 mx-auto">
        <div class="px-4 py-5">
            <div style="background: black; border-radius: 14px; padding: 10px; min-height: 130px; margin-bottom: 20px; position: relative;">

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
            </div>
            
            <div class="header-title flex justify-between">
                <h1 class="mb-4 text-3xl leading-none text-gray-900 md:text-3xl lg:text-3xl dark:text-white">List of <span
                        class="bg-blue-100 text-blue-800 text-2xl font-semibold me-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-2">{{ $provider->provider_name }}</span>
                </h1>
                <p class="text-2xl flex items-center justify-center">Total <strong>({{ count($games) }})</strong></p>
            </div>
            <form class="mb-5 mt-5"><label for="search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">To look for</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"><svg
                            class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"></path>
                        </svg>
                    </div>
                    <input type="search" id="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700/20 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search games">

                </div>
            </form>
            <div>
                <div class="relative w-full">
                    <div class="grid grid-cols-2 md:grid-cols-6 gap-4 mb-5" id="games-list">
                        @foreach ($games as $gm)
                            <div class="item-game text-gray-700 w-full h-auto mr-4 cursor-pointer"
                                data-name="{{ $gm->game_name }}" title="{{ $gm->game_name }}" cover="{{ $gm->game_image }}"
                                gamecode="{{ $gm->game_code }}" type="fivers">
                                <a href="{{ route('game.playGame', $gm->id) }}">
                                    <img src="{{ $gm->game_image }}" alt="{{ $gm->game_name }}" class="w-full">
                                </a>
                                <div class="flex justify-between w-full text-gray-700 dark:text-gray-400 px-3 py-2">
                                    <div class="flex flex-col justify-start items-start">
                                        <span>{{ $gm->game_name }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.getElementById('search').addEventListener('keyup', function() {
            let searchValue = this.value.toLowerCase();

            let games = document.querySelectorAll('#games-list .item-game');
            games.forEach(function(game) {
                let gameName = game.getAttribute('data-name').toLowerCase();
                if (gameName.includes(searchValue)) {
                    game.style.display = "block";
                } else {
                    game.style.display = "none";
                }
            });
        });
    </script>
@endsection
