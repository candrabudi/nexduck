@extends('frontend.layouts.app')

@section('content')
    <style>
        /* Ensure dropdown is hidden initially */
        .dropdown-content {
            display: none;
        }

        .dropdown-content.show {
            display: block;
            z-index: 999999;
        }

        /* Custom styles for game cards */
        .game-card {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9));
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .game-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.5);
        }

        /* Play button appears on hover */
        .play-now {
            opacity: 0;
            transition: opacity 0.3s;
        }

        .game-card:hover .play-now {
            opacity: 1;
        }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>

    <div class="flex justify-between items-center py-4 px-6">
        <div>
            <h1 class="text-3xl font-bold">Slots</h1>
            <p class="text-sm">5816 Games</p>
        </div>
        <div class="flex space-x-4">
            <!-- Sort by Novelty Dropdown -->
            <div class="relative">
                <button onclick="toggleDropdown('novelty-dropdown')"
                    class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md flex items-center">
                    Novelty
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-4 h-4 ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="novelty-dropdown"
                    class="dropdown-content absolute right-0 mt-2 w-48 bg-gray-700 rounded-md shadow-lg">
                    <ul>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-600">Newest</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-600">Popular</a></li>
                    </ul>
                </div>
            </div>

            <!-- Provider Dropdown -->
            <div class="relative">
                <button onclick="toggleDropdown('provider-dropdown')"
                    class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-md flex items-center">
                    Provider: All
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-4 h-4 ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="provider-dropdown"
                    class="dropdown-content absolute right-0 mt-2 w-48 bg-gray-700 rounded-md shadow-lg">
                    <ul>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-600">1spin4win</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-600">3 Oaks</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-600">Amigo</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-5 cursor-pointer w-full p-6">
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

    <div id="game-cards" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-8 gap-4 px-6 pb-6">
        @foreach ($games as $game)
            <div class="flex-none">
                <a href="{{ route('game.playGame', $game->id) }}" class="block relative group">
                    <div class="relative rounded-lg overflow-hidden p-2"
                        style="background: linear-gradient(to bottom, {{ $game->start_color ?? '#535c68' }}, {{ $game->end_color ?? '#2d3436' }});">
                        <!-- Game Image -->
                        <img src="{{ $game->game_image }}" alt="{{ $game->game_name }}"
                            class="rounded-md h-40 w-full object-cover" />
    
                        <!-- Game Info -->
                        <div class="absolute inset-0 flex flex-col justify-end p-4">
                            <div class="bg-white/90 p-2 rounded shadow-md">
                                <div class="text-center text-sm font-semibold text-black">
                                    {{ $game->game_name }}
                                </div>
                                <div class="text-xs text-center text-gray-600">
                                    {{ $game->game_provider_code }}
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    


    <!-- JavaScript for Dropdown and Search -->
    <script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle('show');
        }

        // Close dropdown if clicked outside
        window.onclick = function(event) {
            if (!event.target.matches('.flex.items-center')) {
                const dropdowns = document.getElementsByClassName("dropdown-content");
                for (let i = 0; i < dropdowns.length; i++) {
                    const openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

        // AJAX Search Functionality
        function searchGames() {
            const searchQuery = document.getElementById('game-search').value;

            fetch(`/search-games?query=${searchQuery}`)
                .then(response => response.json())
                .then(data => {
                    const gameCards = document.getElementById('game-cards');
                    gameCards.innerHTML = ''; // Clear current game cards

                    data.games.forEach(game => {
                        const gameCard = `
                            <div class="game-card rounded-lg overflow-hidden relative">
                                <img src="${game.image_url}" alt="Game Image" class="w-full h-32 object-cover">
                                <div class="p-4">
                                    <h3 class="text-lg font-bold text-white">${game.name}</h3>
                                    <p class="text-sm text-gray-400">${game.provider}</p>
                                </div>
                                <div class="absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center play-now">
                                    <button class="bg-gray-600 text-white px-4 py-2 rounded-md">Play Now</button>
                                </div>
                            </div>
                        `;
                        gameCards.innerHTML += gameCard;
                    });
                });
        }
    </script>
@endsection
