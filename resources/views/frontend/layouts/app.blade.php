@php
    use App\Models\Setting;
    use App\Models\SeoSetting;
    use App\Models\Category;
    use App\Models\Bank;
    use App\Models\LiveChat;

    $seoSettings = SeoSetting::first();
    $livechat = LiveChat::first();
    $categories = Category::where('category_status', 1)->get();
    $setting = Setting::first();
    $banks = Bank::where('bank_status', 1)->get();
@endphp
<html lang="pt-BR" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" id="meta-description" content="{{ $seoSettings->seo_description ?? 'Default description' }}">
    <meta name="keywords" id="meta-keywords" content="{{ $seoSettings->seo_keywords ?? 'default, keywords' }}">

    <meta property="og:title" id="og-title" content="{{ $seoSettings->og_title ?? 'Default Web Name' }}">
    <meta property="og:description" id="og-description"
        content="{{ $seoSettings->og_description ?? 'Default description' }}">
    <meta property="og:image" id="og-image"
        content="{{ asset('storage/' . ($seoSettings->og_image ?? 'default-image.jpg')) }}">
    <meta property="og:url" content="{{ url()->current() }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" id="twitter-title" content="{{ $seoSettings->twitter_title ?? 'Default Web Name' }}">
    <meta name="twitter:description" id="twitter-description"
        content="{{ $seoSettings->twitter_description ?? 'Default description' }}">
    <meta name="twitter:image" id="twitter-image"
        content="{{ asset('storage/' . ($seoSettings->twitter_image ?? 'default-image.jpg')) }}">

    @if ($seoSettings->google_analytics)
        <meta name="google-site-verification" content="{{ $seoSettings->google_analytics }}">
    @endif

    <!-- Facebook Pixel -->
    @if ($seoSettings->facebook_pixel)
        <script>
            fbq('init', '{{ $seoSettings->facebook_pixel }}');
            fbq('track', 'PageView');
        </script>
    @endif

    @if ($seoSettings->google_search_console)
        <meta name="google-site-verification" content="{{ $seoSettings->google_search_console }}">
    @endif

    <!-- Facebook App ID -->
    @if ($seoSettings->facebook_app_id)
        <meta property="fb:app_id" content="{{ $seoSettings->facebook_app_id }}">
    @endif


    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700&amp;family=Roboto+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100&amp;display=swap"
        rel="stylesheet">
    <title>@yield('title') | {{ $setting->web_name }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .swiper {
            width: 65%;
            height: 300px;
            position: relative;
            margin: 100px auto;
            margin-bottom: 0px;
            border-radius: 14px;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            color: #fff;
            background-size: cover;
            background-position: center;
        }

        .swiper-pagination {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            background: #fff;
            border-radius: 50%;
            opacity: 0.5;
            transition: background 0.3s, opacity 0.3s;
        }

        .swiper-pagination-bullet-active {
            width: 15px;
            height: 8px;
            background: #007aff;
            opacity: 1;
            border-radius: 4px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            background: #007aff;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            color: #fff;
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .swiper {
                width: 90%;
                height: 150px !important;
                margin-bottom: 0px !important;
            }

            .swiper-button-next,
            .swiper-button-prev {
                width: 25px;
                height: 25px;
                margin-top: 0px;
            }

            .swiper-button-next::after,
            .swiper-button-prev::after {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .swiper {
                width: 90%;
                height: 150px !important;
                margin-bottom: 0px !important;
            }

            .swiper-button-next,
            .swiper-button-prev {
                width: 20px;
                height: 20px;
                margin-top: 0px;
            }

            .swiper-button-next::after,
            .swiper-button-prev::after {
                font-size: 12px;
            }

            .swiper-pagination-bullet {
                width: 8px;
                height: 8px;
            }
        }
    </style>
    <style>
        body {
            font-family: &#039;
            Roboto Condensed&#039;
            ,
            sans-serif;
        }

        :root {
            --ci-primary-color: #1da639;
            --ci-primary-opacity-color: #03ad4022;
            --ci-secundary-color: #0db849;
            --ci-gray-dark: #3b3b3b;
            --ci-gray-light: #c9c9c9;
            --ci-gray-medium: #676767;
            --ci-gray-over: #191A1E;
            --title-color: #ffffff;
            --text-color: #98A7B5;
            --sub-text-color: #656E78;
            --placeholder-color: #4D565E;
            --background-color: #24262B;
            --standard-color: #1C1E22;
            --shadow-color: #111415;
            --page-shadow: linear-gradient(to right, #111415, rgba(17, 20, 21, 0));
            --autofill-color: #f5f6f7;
            --yellow-color: #FFBF39;
            --yellow-dark-color: #d7a026;
            --border-radius: .25rem;
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-scroll-snap-strictness: proximity;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgba(59, 130, 246, .5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --input-primary: #dedede;
            --input-primary-dark: #1E2024;
            --carousel-banners: #bdbdbd;
            --carousel-banners-dark: #1E2024;
            --sidebar-color: #ffffff !important;
            --sidebar-color-dark: #191A1E !important;
            --navtop-color #d8d8de;
            --navtop-color-dark: #24262B;
            --side-menu #828282;
            --side-menu-dark: #24262B;
            --footer-color #919191;
            --footer-color-dark: #1E2024;
            --card-color #ababab;
            --card-color-dark: #1E2024;
        }

        .navtop-color {
            background-color: #ffffff !important;
        }

        :is(.dark .navtop-color) {
            background-color: #191A1E !important;
        }

        .bg-base {
            background-color: #e8e8e8;
        }

        :is(.dark .bg-base) {
            background-color: #24262B;
        }
    </style>
    <link rel="preload" as="style" href="{{ asset('/buildassets/assets/app-a5287762.css') }}">
    <link rel="stylesheet" href="{{ asset('/buildassets/assets/app-a5287762.css') }}" data-navigate-track="reload">
    @yield('styles')
</head>

<body color-theme="dark" class="bg-base text-gray-800 dark:text-gray-300 ">
    <a href="{{ $livechat->link_livechat }}" target="_blank" class="fixed right-4 z-50" style="bottom: 85px;">
        <div class="bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 transition">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M20 11C20 8.19108 20 6.78661 19.3259 5.77772C19.034 5.34096 18.659 4.96596 18.2223 4.67412C17.2134 4 15.8089 4 13 4H11C8.19108 4 6.78661 4 5.77772 4.67412C5.34096 4.96596 4.96596 5.34096 4.67412 5.77772C4 6.78661 4 8.19108 4 11C4 13.8089 4 15.2134 4.67412 16.2223C4.96596 16.659 5.34096 17.034 5.77772 17.3259C6.65907 17.9148 7.8423 17.9892 10 17.9986V18L11.1056 20.2111C11.4741 20.9482 12.5259 20.9482 12.8944 20.2111L14 18V17.9986C16.1577 17.9892 17.3409 17.9148 18.2223 17.3259C18.659 17.034 19.034 16.659 19.3259 16.2223C20 15.2134 20 13.8089 20 11ZM8 12C8.55228 12 9 11.5523 9 11C9 10.4477 8.55228 10 8 10C7.44772 10 7 10.4477 7 11C7 11.5523 7.44772 12 8 12ZM13 11C13 11.5523 12.5523 12 12 12C11.4477 12 11 11.5523 11 11C11 10.4477 11.4477 10 12 10C12.5523 10 13 10.4477 13 11ZM17 11C17 11.5523 16.5523 12 16 12C15.4477 12 15 11.5523 15 11C15 10.4477 15.4477 10 16 10C16.5523 10 17 10.4477 17 11Z"
                    fill="white"></path>
            </svg>
        </div>
    </a>
    <div id="viperpro" data-v-app="">
        <div class="">
            @include('frontend.layouts.nav')

            @include('frontend.layouts.components.aside')
            @include('frontend.layouts.components.sidebar')
            <div class="sm:ml-64 mt-[65px]">
                <div class="relative">
                    @yield('content')
                    <div class="footer pb-32 md:pb-5 mt-5 footer-color p-4 md:p-8">
                        <div class="content-section py-8 text-white">
                            <div class="container mx-auto px-4">
                                <h1 class="text-3xl font-semibold mb-6">Bitcoin Slots</h1>
                                <p class="text-sm text-gray-200 mb-6">
                                    Welcome to NxWhisper.io! We are one of the best platforms for playing Bitcoin slots
                                    and
                                    other casino games. Since its inception, it has grown to become a leading platform
                                    in the online crypto casino world.
                                </p>

                                <h2 class="text-2xl font-semibold mb-4">Play Bitcoin Slots Online at NxWhisper.io</h2>
                                <p class="text-sm text-gray-200 mb-6">
                                    Our platform has redefined online casino excitement with a vast collection of
                                    thrilling slot games. It offers a colorful environment for players to enjoy their
                                    gameplay. The benefits here range from the welcoming 350% bonus offer to highly
                                    rewarding promotional offers and loyalty programs. Upon signing up, you will get
                                    access to our convenient, bright, and user-friendly platform! Why wait? Sign up and
                                    enjoy the benefits provided by NxWhisper.io.
                                </p>

                                <h2 class="text-2xl font-semibold mb-4">How to Play Bitcoin Slot Games Online</h2>
                                <p class="text-sm text-gray-200 mb-6">
                                    Bitcoin slots operate on a set of straightforward rules. The objective is to match
                                    specific combinations of symbols across the reels. Each slot game has a unique
                                    paytable, outlining the value of each symbol and the winning combinations. Players
                                    should check out the presence of special symbols like NxWhispers and Scatters
                                    because
                                    they are often the key triggers behind the bonus features or free spins.
                                </p>

                                <!-- Read More / Read Less Button Section -->
                                <div class="text-sm text-gray-200" id="moreContent">
                                    <p>
                                        NxWhisper.io offers diverse betting options to cater to your unique preferences,
                                        even
                                        for Bitcoin live casino games. Before spinning the reels, you can customize your
                                        bet size. Adjust the coin denomination, number of coins per line, and the number
                                        of active paylines to tailor your bets to your gaming style.
                                    </p>
                                    <p id="dots">...</p>
                                    <div id="more" class="hidden transition-all duration-300 ease-in-out">
                                        <p>
                                            Bitcoin slots are one of the most accessible casino titles to play in online
                                            gambling now. In the step-by-step guide below, we've highlighted the process
                                            of placing your first bet. Let's get started:
                                        </p>
                                        <ul>
                                            <li><strong>Step 1:</strong> Sign Up - We believe in making things easy for
                                                you. Head to NxWhisper.io's user-friendly website and click the "Sign
                                                Up"
                                                button. Fill in your details, create a strong password, verify your
                                                email, and voila! You're officially part of our gaming community.</li>
                                            <li><strong>Step 2:</strong> Deposit Crypto - Now that you're a member, you
                                                can explore and play all the games available. Click the "Deposit" button
                                                and select BTC or other available coins as your preferred payment
                                                method. The site will then provide you with a unique wallet address to
                                                transfer your preferred amount of crypto. Confirm the transaction; your
                                                account will be loaded with the funds within a few moments.</li>
                                            <li><strong>Step 3:</strong> Explore Our Bitcoin Slots Section -
                                                NxWhisper.io has
                                                curated a collection of top-notch Bitcoin casino slots, available when
                                                you navigate to the "Slots" section. Choose your favorite titles and get
                                                ready to place your bets.</li>
                                            <li><strong>Step 4:</strong> Set Your Bet - Now, adjust your bet size using
                                                the user-friendly controls. The site has options that cater to both high
                                                roller and conservative bettors.</li>
                                            <li><strong>Step 5:</strong> Spin and Win - With your bets set, hit the
                                                "Spin" button and watch the reels come to life.</li>
                                        </ul>
                                    </div>
                                    <button id="readMoreBtn"
                                        class="mt-4 py-2 px-6 rounded-full bg-gradient-to-l from-gray-800 to-gray-500 text-white font-semibold hover:opacity-80 transition-opacity duration-300">
                                        Read More
                                    </button>
                                </div>
                            </div>
                        </div>

                        <footer class="bg-dark-blue text-white py-8">
                            <div class="container mx-auto px-4">
                                <!-- Logo and Social Media -->
                                <div class="flex flex-col items-center space-y-4 mb-8">
                                    <img src="{{ $setting->web_logo }}" alt="NxWhisper.io Logo" class="h-9">
                                    <p class="text-sm">© 2024 NxWhisper. All rights reserved.</p>
                                    <div class="flex space-x-4">
                                        <a href="" target="_blank" rel="noreferrer"
                                            class="text-xl hover:opacity-75">
                                            <i class="fab fa-telegram"></i>
                                        </a>
                                        <a href="" target="_blank" rel="noreferrer"
                                            class="text-xl hover:opacity-75">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="" target="_blank"
                                            rel="noreferrer" class="text-xl hover:opacity-75">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        <a href="" target="_blank" rel="noreferrer"
                                            class="text-xl hover:opacity-75">
                                            <i class="fab fa-discord"></i>
                                        </a>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span>AM</span>
                                        <button
                                            class="bg-white w-10 h-6 rounded-full flex items-center justify-between px-1 focus:outline-none">
                                            <span class="w-4 h-4 bg-green-500 rounded-full shadow-md"></span>
                                        </button>
                                        <span>PM</span>
                                    </div>
                                </div>

                                <!-- Footer Links -->
                                <div
                                    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8 text-sm">
                                    <div>
                                        <h4 class="font-semibold uppercase mb-4">Slot Games</h4>
                                        <ul class="space-y-2">
                                            <li><a href="/categories/slots" class="hover:text-primary">Slots</a></li>
                                            <li><a href="/categories/skill-games" class="hover:text-primary">Skill
                                                    Games</a></li>
                                            <li><a href="/categories/jackpot" class="hover:text-primary">Jackpot</a>
                                            </li>
                                            <li><a href="/categories/bonus-buy" class="hover:text-primary">Bonus
                                                    Buy</a>
                                            </li>
                                            <li><a href="/categories/crash-games" class="hover:text-primary">Crash
                                                    Games</a></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold uppercase mb-4">Live Casino</h4>
                                        <ul class="space-y-2">
                                            <li><a href="/categories/roulette" class="hover:text-primary">Roulette</a>
                                            </li>
                                            <li><a href="/categories/blackjack"
                                                    class="hover:text-primary">Blackjack</a>
                                            </li>
                                            <li><a href="/casino" class="hover:text-primary">Live
                                                    Casino</a></li>
                                            <li><a href="/categories/table-games" class="hover:text-primary">Table
                                                    Games</a></li>
                                            <li><a href="/categories/video-poker" class="hover:text-primary">Video
                                                    Poker</a></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold uppercase mb-4">Casino</h4>
                                        <ul class="space-y-2">
                                            <li><a href="/about" class="hover:text-primary">About Us</a></li>
                                            <li><a href="/promotions" class="hover:text-primary">Promotions</a></li>
                                            <li><a href="/tournaments" class="hover:text-primary">Tournaments</a></li>
                                            <li><a href="https://wildpartners.io/"
                                                    class="hover:text-primary">Affiliate Program</a></li>
                                            <li><a href="/loyalty" class="hover:text-primary">Loyalty Program</a></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold uppercase mb-4">Legal</h4>
                                        <ul class="space-y-2">
                                            <li><a href="/privacy" class="hover:text-primary">Privacy Policy</a></li>
                                            <li><a href="/terms" class="hover:text-primary">Terms & Conditions</a>
                                            </li>
                                            <li><a href="/bonus-terms" class="hover:text-primary">Bonus Terms</a></li>
                                            <li><a href="/responsible-gambling" class="hover:text-primary">Responsible
                                                    Gambling</a></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold uppercase mb-4">Support</h4>
                                        <ul class="space-y-2">
                                            <li><a href="/support" class="hover:text-primary">Live Support</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Awards Section -->
                                <div class="mt-8">
                                    <p class="text-sm text-center">Awards</p>
                                    <div class="flex flex-wrap justify-center mt-4 md:mt-8 lg:mt-0">
                                        <img src="images/best-new-casino.svg" alt="Best New Casino"
                                            class="h-10 mx-2 mb-4 sm:mb-0">
                                        <img src="images/best-casino.svg" alt="Best Casino"
                                            class="h-10 mx-2 mb-4 sm:mb-0">
                                        <img src="images/players-choice.svg" alt="Players Choice"
                                            class="h-10 mx-2 mb-4 sm:mb-0">
                                        <img src="images/intercom.svg" alt="Intercom" class="h-10 mx-2 mb-4 sm:mb-0">
                                    </div>
                                </div>


                            </div>
                        </footer>


                    </div>
                    @include('frontend.layouts.components.mobilemenu')
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.min.js') }}"></script>
    <script>
        document.getElementById("readMoreBtn").addEventListener("click", function() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("readMoreBtn");

            if (moreText.classList.contains("hidden")) {
                moreText.classList.remove("hidden");
                dots.style.display = "none";
                btnText.textContent = "Read Less";
            } else {
                moreText.classList.add("hidden");
                dots.style.display = "inline";
                btnText.textContent = "Read More";
            }
        });
    </script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggle-btn');
        const closeBtn = document.getElementById('close-btn');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        closeBtn.addEventListener('click', () => {
            sidebar.classList.remove('active');
        });
    </script>
    <script>
        const modal = document.getElementById('modalRegister');
        const openModalRegisterBtn = document.getElementById('openModalRegisterBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');

        openModalRegisterBtn.onclick = function() {
            modal.style.display = 'flex';
        }
        closeModalBtn.onclick = function() {
            modal.style.display = 'none';
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
    <script>
        const modalLogin = document.getElementById("modalLogin");
        const openModalLoginBtn = document.getElementById("openModalLoginBtn");

        const closeModalLoginBtn = document.getElementById("closeModalLoginBtn");

        openModalLoginBtn.onclick = function() {
            modalLogin.classList.remove("hidden");
        }

        closeModalLoginBtn.onclick = function() {
            modalLogin.classList.add("hidden");
        }
        window.onclick = function(event) {
            if (event.target == modalLogin) {
                modalLogin.classList.add("hidden");
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                responsive: {
                    0: {
                        items: 3
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            });

            // Mengatur tombol navigasi kustom
            $('.owl-prev').click(function() {
                $('.carousel').trigger('prev.owl.carousel');
            });
            $('.owl-next').click(function() {
                $('.carousel').trigger('next.owl.carousel');
            });
        });
    </script>
    @yield('scripts')
    <div>
        <div>
            <div class="Vue-Toastification__container top-left"></div>
        </div>
        <div>
            <div class="Vue-Toastification__container top-center"></div>
        </div>
        <div>
            <div class="Vue-Toastification__container top-right"></div>
        </div>
        <div>
            <div class="Vue-Toastification__container bottom-left"></div>
        </div>
        <div>
            <div class="Vue-Toastification__container bottom-center"></div>
        </div>
        <div>
            <div class="Vue-Toastification__container bottom-right"></div>
        </div>
    </div>
</body>

</html>
