@extends('frontend.layouts.app')

@section('content')
<style>
   .game-card {
        background: white;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s, box-shadow 0.3s;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        height: 100%;
        overflow: hidden;
        position: relative;
    }

    .game-card:hover { transform: scale(1.05); box-shadow: 0 6px 12px rgba(0, 0, 0, 0.5); }

    .game-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .game-name-container {
        background-color: rgba(0, 0, 0, 0.7);
        width: 100%;
        padding: 10px;
        text-align: center;
    }

    .game-name {
        font-size: 1.2rem;
        color: white;
        font-weight: bold;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .game-provider {
        color: white;
        font-size: 0.8rem;
        margin-top: 5px;
    }

    .play-now {
        opacity: 0;
        transition: opacity 0.3s;
    }

    .game-card:hover .play-now {
        opacity: 1;
    }

    @media (max-width: 768px) {
        .game-image {
            height: 180px;
            width: 180px;
        }

        .game-card {
            height: 250px;
        }

        .game-name {
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .game-image {
            height: 120px;
            width: 120px;
        }

        .game-card {
            height: 180px;
        }

        .game-name {
            font-size: 0.9rem;
        }
    }

    /* Modal Styles */
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background: white;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        max-width: 600px;
        width: 100%;
        padding-left: 20px;
        padding-right: 20px;
    }

    .modal-button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        margin: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .modal-button.cancel {
        background-color: #f44336;
    }

    /* Modal Image */
    .modal-image {
        max-width: 100%;
        height: auto;
        margin-bottom: 15px;
        border-radius: 8px;
        margin: auto;
    }

    /* Modal Game Info */
    .modal-game-info {
        font-size: 1.2rem;
        margin-top: 10px;
    }

    .modal-game-provider {
        font-size: 1rem;
        color: #666;
        margin-top: 5px;
    }

    /* Media Query for Smaller Modal on Mobile */
    @media (max-width: 480px) {
        .modal-content {
            padding: 15px;
            max-width: 90%;
            width: auto;
        }

        .modal-image {
            width: 100%;
            height: auto;
            margin: auto;
        }

        .modal-game-info {
            font-size: 1rem;
        }

        .modal-game-provider {
            font-size: 0.9rem;
        }

        .modal-button {
            padding: 8px 16px;
            font-size: 0.9rem;
        }

        .modal-button.cancel {
            padding: 8px 16px;
            font-size: 0.9rem;
        }
    }
</style>

<script src="https://cdn.tailwindcss.com"></script>

<div class="mb-5 w-full p-6">
    <div class="flex space-x-4">
        <div class="relative w-full">
            <input type="search" id="game-search" oninput="searchGames()"
                class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded-lg border-none focus:outline-none"
                placeholder="Search game" required=""/>
        </div>

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

<div id="game-cards" class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-6 gap-6 px-6 pb-6">
    @foreach ($games as $game)
        <div class="game-card" onclick="openModal('{{ $game->game_name }}', '{{ $game->game_provider_code }}', '{{ $game->game_image }}', '{{ route('game.playGame', $game->id) }}')">
            <div class="relative group w-full">
                <img src="{{ $game->game_image }}" alt="{{ $game->game_name }}" class="game-image" />
                <div class="game-name-container">
                    <div class="game-name">{{ Str::limit($game->game_name, 15) }}</div>
                    <div class="game-provider">{{ $game->game_provider_code }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<button id="load-more" onclick="loadMoreGames()" class="mt-4 w-full bg-gray-600 text-white py-2 rounded-md">Load More</button>

<!-- Modal -->
<div id="confirm-modal" class="modal">
    <div class="modal-content">
        <img id="modal-game-image" class="modal-image" src="" alt="Game Image">
        <div id="modal-game-info" class="modal-game-info"></div>
        <div id="modal-game-provider" class="modal-game-provider"></div>
        <div class="flex justify-center">
            <button id="confirm-play" class="modal-button">Ya, mainkan!</button>
            <button id="cancel-modal" class="modal-button cancel">Batal</button>
        </div>
    </div>
</div>

<script>
    let offset = 50;

    function searchGames() {
        const searchQuery = document.getElementById('game-search').value;
        const providerId = document.getElementById('provider-filter').value;

        fetch(`{{ route('games.search') }}?query=${searchQuery}&provider_id=${providerId}`)
            .then(response => response.json())
            .then(data => {
                const gameCards = document.getElementById('game-cards');
                gameCards.innerHTML = '';

                data.games.forEach(game => {
                    const gameCard = `
                        <div class="game-card" onclick="openModal('${game.game_name}', '${game.game_provider_code}', '${game.game_image}', '/games/play/${game.id}')">
                            <div class="relative group w-full">
                                <img src="${game.game_image}" alt="${game.game_name}" class="game-image" />
                                <div class="game-name-container">
                                    <div class="game-name">${game.game_name.length > 15 ? game.game_name.slice(0, 15) + '...' : game.game_name}</div>
                                    <div class="game-provider">${game.game_provider_code}</div>
                                </div>
                            </div>
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
                        <div class="game-card" onclick="openModal('${game.game_name}', '${game.game_provider_code}', '${game.game_image}', '/games/play/${game.id}')">
                            <div class="relative group w-full">
                                <img src="${game.game_image}" alt="${game.game_name}" class="game-image" />
                                <div class="game-name-container">
                                    <div class="game-name">${game.game_name.length > 15 ? game.game_name.slice(0, 15) + '...' : game.game_name}</div>
                                    <div class="game-provider">${game.game_provider_code}</div>
                                </div>
                            </div>
                        </div>
                    `;
                    gameCards.innerHTML += gameCard;
                });

                offset += 50;
            });
    }

    function openModal(gameName, providerCode, gameImage, playUrl) {
        const modal = document.getElementById('confirm-modal');
        const modalImage = document.getElementById('modal-game-image');
        const modalGameInfo = document.getElementById('modal-game-info');
        const modalGameProvider = document.getElementById('modal-game-provider');
        const confirmButton = document.getElementById('confirm-play');
        const cancelButton = document.getElementById('cancel-modal');

        modal.style.display = 'flex';
        modalImage.src = gameImage;
        modalGameInfo.textContent = gameName;
        modalGameProvider.textContent = `Provider: ${providerCode}`;

        confirmButton.onclick = () => {
            window.location.href = playUrl;
        };

        cancelButton.onclick = () => {
            modal.style.display = 'none';
        };
    }

    window.onclick = (event) => {
        const modal = document.getElementById('confirm-modal');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    };
</script>
@endsection
