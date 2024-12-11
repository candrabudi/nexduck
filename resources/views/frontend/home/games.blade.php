@foreach ($providers as $index => $pv)
    <div class="carousel-container carousel-{{ $index }}">
        <div class="carousel-header">
            <h2>
                <img src="https://www.wild.io/cdn-cgi/image/width=640,quality=75,format=webp//assets/providers-page.svg"
                    alt="Casino Icon">
                {{ $pv['provider_name'] }}
            </h2>
            <a href="/games">View all <span>{{ count($pv['games']) }}</span></a>
        </div>

        <div class="swiper swiper-{{ $index }}">
            <div class="swiper-wrapper">
                @foreach ($pv['games'] as $pgm)
                    <div class="swiper-slide" style="background-image: url('{{ $pgm['game_image'] }}');">
                        <div class="game-info">
                            <h3>{{ $pgm['game_name'] }}</h3>
                            <span>{{ $pv['provider_name'] }}</span>
                        </div>
                        <div class="play-game-btn">
                            <button class="play-btn" onclick="checkLoginAndPlay('{{ $pgm['id'] }}')">
                                <i class="fas fa-play"></i> Play
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endforeach
<style>
    /* Base styles for desktop */
    .carousel-container {
        padding: 20px;
        width: 90%;
        height: 300px;
        margin: auto;
        overflow: hidden;
        position: relative;
    }

    .carousel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
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

    .swiper {
        width: 100%;
        height: 100%;
        margin-top: 0px;
    }

    .swiper-slide {
        border: 2px solid #FFF;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #06283d;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-align: center;
        max-height: 220px;
        max-width: 220px;
        padding: 10px;
        margin: 10px;
        position: relative;
        background-size: cover;
        background-position: center;
        transition: opacity 0.3s ease;
    }

    .swiper-slide .game-info {
        position: absolute;
        bottom: 10px;
        left: 10px;
        right: 10px;
        background: rgba(0, 0, 0, 0.8);
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

    /* Play button style */
    .play-game-btn {
        display: none;
        /* Initially hidden */
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 20;
    }

    .play-btn {
        background-color: rgba(0, 0, 0, 0.6);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 25px;
        font-size: 16px;
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .play-btn i {
        margin-right: 8px;
    }

    /* Hover Effect */
    .swiper-slide:hover .game-info {
        opacity: 0;
        /* Optionally, hide the text info on hover */
    }

    .swiper-slide:hover .play-game-btn {
        display: block;
        /* Show the play button on hover */
    }

    .swiper-slide:hover {
        opacity: 0.8;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .carousel-container {
            width: 100%;
            padding: 10px;
        }

        .carousel-header h2 {
            font-size: 1.2rem;
        }

        .carousel-header img {
            width: 25px;
            height: 25px;
        }

        .carousel-header a span {
            font-size: 0.7rem;
        }

        .swiper {
            width: 100%;
            height: 240px !important;
            margin-top: 0px;
        }

        .swiper-slide {
            width: 180px !important;
            margin: 5px;
        }

        .swiper-slide h3 {
            font-size: 0.9rem;
        }

        .swiper-slide span {
            font-size: 0.8rem;
        }
    }

    @media (max-width: 480px) {
        .carousel-container {
            padding: 15px;
            height: 240px !important;
        }

        .carousel-header h2 {
            font-size: 1rem;
        }

        .carousel-header img {
            width: 20px;
            height: 20px;
        }

        .carousel-header a span {
            font-size: 0.6rem;
        }

        .swiper-slide {
            width: 180px;
            height: 180px;
        }

        .swiper-slide h3 {
            font-size: 0.8rem;
        }

        .swiper-slide span {
            font-size: 0.7rem;
        }
    }
</style>