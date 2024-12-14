@extends('frontend.layouts.app')

@section('content')
    @include('frontend.layouts.components.style_game')
    <div class="mb-5 w-full p-6">
        <div class="flex space-x-4">
            <div class="relative w-full">
                <input type="search" id="game-search" oninput="searchGames()"
                    class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search game" required />
            </div>

            <div class="relative w-full">
                <select id="provider-filter" onchange="searchGames()"
                    class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Providers</option>
                    @foreach ($slots as $provider)
                        <option value="{{ $provider->id }}">{{ $provider->provider_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div id="game-cards" class="grid grid-cols-6 gap-6 px-6 pb-6">
        <!-- Game cards will be loaded here dynamically -->
    </div>

    <button id="load-more" onclick="loadMoreGames()"
        class="mt-4 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition duration-200"
        style="width: 50%; margin: auto;display: block;">
        Load More
    </button>

    <div id="confirm-modal" class="modal fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="z-index: 9999999999;">
        <div class="modal-content bg-white rounded-lg shadow-lg p-6 max-w-md" style="width: 80%">
            <img id="modal-game-image" class="modal-image rounded-lg mb-4 w-full object-cover h-64" src=""
                alt="Game Image">
            <div id="modal-game-info" class="text-xl font-bold text-gray-700 mb-2"></div>
            <div id="modal-game-provider" class="text-sm text-gray-500 mb-4"></div>
            <div class="flex justify-center space-x-4">
                <button id="confirm-play"
                    class="modal-button bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg focus:outline-none transition duration-200">Yes,
                    Play!</button>
                <button id="cancel-modal"
                    class="modal-button cancel bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg focus:outline-none transition duration-200">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        let offset = 0;
        let limit = 20; // Number of games to load per request
        let isLoading = false; // Flag to avoid multiple simultaneous requests

        function searchGames() {
            if (isLoading) return;

            const searchQuery = document.getElementById('game-search').value;
            const providerId = document.getElementById('provider-filter').value;

            // Reset offset when search query or filter changes
            offset = 0;

            isLoading = true;
            fetch(
                    `{{ route('games.search') }}?query=${searchQuery}&provider_id=${providerId}&offset=${offset}&limit=${limit}`
                    )
                .then(response => response.json())
                .then(data => {
                    const gameCards = document.getElementById('game-cards');
                    gameCards.innerHTML = ''; // Clear previous results

                    data.games.forEach(game => {
                        // Generate a random RTP between 65 and 98
                        const randomRTP = (Math.random() * (98 - 65) + 65).toFixed(
                            2); // Two decimal points for better display

                        const gameCard = `
                            <div class="game-card cursor-pointer" onclick="openModal('${game.game_name}', '${game.game_provider_code}', '${game.game_image}', '/games/play-game/${game.id}')">
                                <img src="${game.game_image}" alt="${game.game_name}" class="game-image" />
                                <div class="game-name-container">
                                    <div class="game-name">${game.game_name.length > 15 ? game.game_name.slice(0, 15) + '...' : game.game_name}</div>
                                    <div class="game-provider">${game.game_provider_code}</div>
                                    <div class="game-rtp">RTP: ${randomRTP}%</div>
                                </div>
                            </div>
                        `;
                        gameCards.innerHTML += gameCard;
                    });
                    offset += limit;
                    isLoading = false;
                });
        }


        function loadMoreGames() {
            const searchQuery = document.getElementById('game-search').value;
            const providerId = document.getElementById('provider-filter').value;

            if (isLoading) return;

            isLoading = true;
            fetch(
                    `{{ route('games.search') }}?query=${searchQuery}&provider_id=${providerId}&offset=${offset}&limit=${limit}`
                    )
                .then(response => response.json())
                .then(data => {
                    const gameCards = document.getElementById('game-cards');
                    data.games.forEach(game => {
                        // Check if the RTP for this game has already been cached
                        let randomRTP = sessionStorage.getItem(`rtp_${game.id}`);

                        if (!randomRTP) {
                            // Generate a random RTP between 65 and 98 and cache it
                            randomRTP = (Math.random() * (98 - 65) + 65).toFixed(2);
                            sessionStorage.setItem(`rtp_${game.id}`, randomRTP);
                        }

                        // Determine the color of the progress bar based on RTP
                        let rtpColor;
                        if (randomRTP <= 75) {
                            rtpColor = 'yellow'; // Yellow for RTP 65-75
                        } else if (randomRTP <= 85) {
                            rtpColor = 'green'; // Green for RTP 76-85
                        } else {
                            rtpColor = 'lime'; // Bright green for RTP 86-98
                        }

                        // Calculate the percentage of the progress bar width based on RTP
                        const rtpPercentage = ((randomRTP - 65) / (98 - 65)) * 100;

                        const gameCard = `
                    <div class="game-card cursor-pointer" onclick="openModal('${game.game_name}', '${game.game_provider_code}', '${game.game_image}', '/games/play-game/${game.id}')">
                        <img src="${game.game_image}" alt="${game.game_name}" class="game-image" />
                        <div class="game-name-container">
                            <div class="game-name">${game.game_name.length > 15 ? game.game_name.slice(0, 15) + '...' : game.game_name}</div>
                            <div class="game-provider">${game.game_provider_code}</div>
                            <!-- RTP progress bar -->
                            <div class="game-rtp-container" style="background-color: #e0e0e0; border-radius: 5px; height: 10px; width: 100%; margin-top: 5px;">
                                <div class="game-rtp-bar" style="background-color: ${rtpColor}; width: ${rtpPercentage}%; height: 100%; border-radius: 5px;"></div>
                            </div>
                            <div class="game-rtp">RTP: ${randomRTP}%</div> <!-- RTP value -->
                        </div>
                    </div>
                `;
                        gameCards.innerHTML += gameCard;
                    });
                    offset += limit;
                    isLoading = false;
                });
        }


        function openModal(gameName, gameProvider, gameImage, gameUrl) {
            document.getElementById('modal-game-info').textContent = gameName;
            document.getElementById('modal-game-provider').textContent = gameProvider;
            document.getElementById('modal-game-image').src = gameImage;

            const confirmButton = document.getElementById('confirm-play');
            confirmButton.onclick = function() {
                window.location.href = gameUrl;
            };

            const modal = document.getElementById('confirm-modal');
            modal.classList.add('active');
            modal.classList.remove('hidden');
        }

        document.getElementById('cancel-modal').addEventListener('click', function() {
            const modal = document.getElementById('confirm-modal');
            modal.classList.remove('active');
            modal.classList.add('hidden');
        });

        // Infinite Scroll implementation using IntersectionObserver
        const loadMoreButton = document.getElementById('load-more');
        const observer = new IntersectionObserver(([entry]) => {
            if (entry.isIntersecting) {
                loadMoreGames();
            }
        }, {
            rootMargin: '0px 0px 200px 0px'
        });
        observer.observe(loadMoreButton);
    </script>
@endsection
