@extends('frontend.layouts.app')

@section('content')
    <style>
        .dropdown-content { display: none; }
        .dropdown-content.show { display: block; z-index: 999999; }
        .game-card {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9));
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .game-card:hover { transform: scale(1.05); box-shadow: 0 6px 12px rgba(0, 0, 0, 0.5); }
        .play-now { opacity: 0; transition: opacity 0.3s; }
        .game-card:hover .play-now { opacity: 1; }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>

    <div class="mb-5 w-full p-6">
        <div class="flex space-x-4">
            <div class="relative w-full">
                <input type="search" id="game-search" oninput="searchGames()"
                    class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded-lg border-none focus:outline-none"
                    placeholder="Search game" required="">
            </div>

            <!-- Dropdown filter by provider -->
            <div class="relative w-full">
                <select id="provider-filter" onchange="searchGames()"
                    class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded-lg border-none focus:outline-none">
                    <option value="">All Providers</option>
                    @foreach ($slots as $provider)
                        <option value="{{ $provider->id }}">{{ $provider->provider_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Updated grid classes for responsiveness and spacing -->
    <div id="game-cards" class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-6 gap-6 px-6 pb-6">
        @foreach ($games as $game)
            <div class="game-card aspect-w-1 aspect-h-1">
                <a href="{{ route('game.playGame', $game->id) }}" class="block relative group w-full">
                    <img src="{{ $game->game_image }}" alt="{{ $game->game_name }}" class="rounded-md w-full h-full object-cover" />
                    <div class="absolute inset-0 flex flex-col justify-end p-4">
                        <div class="bg-white/90 p-2 rounded shadow-md">
                            <div class="text-center text-sm font-semibold text-black">{{ $game->game_name }}</div>
                            <div class="text-xs text-center text-gray-600">{{ $game->game_provider_code }}</div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <button id="load-more" onclick="loadMoreGames()" class="mt-4 w-full bg-gray-600 text-white py-2 rounded-md">Load More</button>

    <script>
        let offset = 50;

        function searchGames() {
            const searchQuery = document.getElementById('game-search').value;
            const providerId = document.getElementById('provider-filter').value;

            fetch(`{{ route('games.search') }}?query=${searchQuery}&provider_id=${providerId}`)
                .then(response => response.json())
                .then(data => {
                    const gameCards = document.getElementById('game-cards');
                    gameCards.innerHTML = ''; // Clear previous search results

                    data.games.forEach(game => {
                        const gameCard = `
                            <div class="game-card aspect-w-1 aspect-h-1">
                                <a href="/games/play/${game.id}" class="block relative group w-full">
                                    <img src="${game.game_image}" alt="${game.game_name}" class="rounded-md w-full h-full object-cover" />
                                    <div class="absolute inset-0 flex flex-col justify-end p-4">
                                        <div class="bg-white/90 p-2 rounded shadow-md">
                                            <div class="text-center text-sm font-semibold text-black">
                                                ${game.game_name}
                                            </div>
                                            <div class="text-xs text-center text-gray-600">
                                                ${game.game_provider_code}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `;
                        gameCards.innerHTML += gameCard;
                    });
                });
        }

        function loadMoreGames() {
            const providerId = document.getElementById('provider-filter').value;

            fetch(`{{ route('games.loadMore') }}?offset=${offset}&provider_id=${providerId}`)
                .then(response => response.json())
                .then(data => {
                    const gameCards = document.getElementById('game-cards');

                    data.games.forEach(game => {
                        const gameCard = `
                            <div class="game-card aspect-w-1 aspect-h-1">
                                <a href="/games/play/${game.id}" class="block relative group w-full">
                                    <img src="${game.game_image}" alt="${game.game_name}" class="rounded-md w-full h-full object-cover" />
                                    <div class="absolute inset-0 flex flex-col justify-end p-4">
                                        <div class="bg-white/90 p-2 rounded shadow-md">
                                            <div class="text-center text-sm font-semibold text-black">
                                                ${game.game_name}
                                            </div>
                                            <div class="text-xs text-center text-gray-600">
                                                ${game.game_provider_code}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `;
                        gameCards.innerHTML += gameCard;
                    });

                    offset += 50; // Increase offset for next load
                });
        }
    </script>
@endsection
