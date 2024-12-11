<div class="slider-container" style="margin-top: 20px;">
    <div class="slider-wrapper">
        <div class="slider">
            @foreach ($banners as $banner)
                <div class="slide">
                    <a href="#">
                        <div class="slide-content" style="background-color: rgb(89, 22, 173);">
                            <img src="{{ $banner->banner_image }}" alt="{{ $banner->banner_image }}">
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Tombol navigasi -->
    <button id="prev" class="slider-btn prev">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M9 5L14.15 10C14.4237 10.2563 14.6419 10.5659 14.791 10.9099C14.9402 11.2539 15.0171 11.625 15.0171 12C15.0171 12.375 14.9402 12.7458 14.791 13.0898C14.6419 13.4339 14.4237 13.7437 14.15 14L9 19"
                stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>

    <button id="next" class="slider-btn next">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M14.9991 19L9.83911 14C9.56672 13.7429 9.34974 13.433 9.20142 13.0891C9.0531 12.7452 8.97656 12.3745 8.97656 12C8.97656 11.6255 9.0531 11.2548 9.20142 10.9109C9.34974 10.567 9.56672 10.2571 9.83911 10L14.9991 5"
                stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>

    <!-- Dots navigation -->
    <div class="dots" id="dots"></div>
</div>

<style>
    .slider-container {
        position: relative;
        width: 90%;
        margin: auto;
        padding: 10px;
        height: 400px;
    }

    .slider-wrapper {
        overflow: hidden;
    }

    .slider {
        display: flex;
        transition: transform 0.5s ease;
    }

    /* Styling for each slide */
    .slide {
        flex: 0 0 100%;
        border-radius: 1.5rem;
    }

    /* Styling for slide content */
    .slide-content {
        position: relative;
        z-index: 10;
        width: 90%;
        height: 400px;
        margin: auto;
        padding: 20px;
        overflow: hidden;
        border-radius: 1.5rem;
    }

    .slide-content img {
        position: absolute;
        height: 100%;
        width: 100%;
        inset: 0;
        object-fit: cover;
        object-position: center;
    }

    /* Styling for prev and next buttons */
    .slider-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        border: none;
        border-radius: 50%;
        padding: 10px;
        cursor: pointer;
        z-index: 10;
    }

    .slider-btn.prev {
        left: 10px;
    }

    .slider-btn.next {
        right: 10px;
    }

    /* Styling for dot navigation */
    .dots {
        text-align: center;
        margin-top: 10px;
    }

    .dot {
        display: inline-block;
        height: 12px;
        width: 12px;
        margin: 0 5px;
        background-color: #bbb;
        border-radius: 50%;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .dot.active {
        background-color: #717171;
    }

    /* Responsive adjustments for mobile */
    @media (max-width: 768px) {
        .slider-container {
            padding: 10px;
            height: 200px;
        }

        .slider-btn {
            padding: 8px;
        }

        .slide-content {
            height: 400px !important;
        }

        .slide-content img {
            height: 100%;
        }

        .dots {
            margin-top: 5px;
        }
    }

    @media (max-width: 480px) {
        .slider-container {
            padding: 10px;
            height: 200px;
            width: 100%!important;
        }

        .slider-btn {
            padding: 6px;
        }

        .slide-content {
            height: 200px !important;
        }

        .slide-content img {
            height: 100%;
        }

        .dots {
            margin-top: 5px;
        }
    }
</style>

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    const dotsContainer = document.getElementById('dots');

    // Add dots
    slides.forEach((slide, index) => {
        const dot = document.createElement('span');
        dot.classList.add('dot');
        if (index === 0) dot.classList.add('active');
        dot.addEventListener('click', () => showSlide(index));
        dotsContainer.appendChild(dot);
    });

    function showSlide(index) {
        if (index < 0) {
            currentSlide = slides.length - 1;
        } else if (index >= slides.length) {
            currentSlide = 0;
        } else {
            currentSlide = index;
        }
        updateSlider();
    }

    function updateSlider() {
        const slider = document.querySelector('.slider');
        slider.style.transform = `translateX(-${currentSlide * 100}%)`;
        document.querySelectorAll('.dot').forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });
    }

    prevButton.addEventListener('click', () => showSlide(currentSlide - 1));
    nextButton.addEventListener('click', () => showSlide(currentSlide + 1));

    // Optional: Automatically cycle through slides
    setInterval(() => {
        showSlide(currentSlide + 1);
    }, 5000); // Change slide every 5 seconds
</script>
