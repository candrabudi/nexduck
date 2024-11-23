@php
    use App\Models\Setting;
    use App\Models\Bank;
    use App\Models\Category;
    $categories = Category::where('category_status', 1)
        ->get();
    $setting = Setting::first();
    $banks = Bank::where('bank_status', 1)
        ->get();
@endphp
<html lang="pt-BR" class="dark">
<head>
    <style id="react-native-stylesheet"></style>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700&amp;family=Roboto+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100&amp;display=swap"
        rel="stylesheet">
    <title>DUCK BET</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
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
    <link rel="preload" as="style" href="{{ asset('build/assets/app-a5287762.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/app-a5287762.css') }}" data-navigate-track="reload">
    <style></style>
    <style></style>
</head>

<body color-theme="dark" class="bg-base text-gray-800 dark:text-gray-300 ">
    <div id="viperpro" data-v-app="">
        <div class="">
            @include('frontend.layouts.nav')
            
            @include('frontend.layouts.components.aside')
            @include('frontend.layouts.components.sidebar')
            <div class="sm:ml-64 mt-[65px]">
                <div class="relative">
                        @yield('content')
                    <div class="footer pb-32 md:pb-5 mt-5 footer-color p-4 md:p-8">
                        <hr class="border-t border-gray-200 dark:border-gray-600 mt-5">
                        <div class="mt-5 flex flex-col justify-start">
                            <p class="text-[3px] w-full"></p>
                            <div class="eng-license">
                                <img src="https://assets.website-files.com/6483631a773f6af2b4edabab/6483631a773f6af2b4edabb4_curacao.png"
                                    width="150" loading="eager" alt="" class="ico-brand-type-footer">
                                <p class="txt-label text-[10px]">DUCK BET is operated by BritoSistemaBet, company
                                    registration number 150731, with registered address at Groot Kwartierweg 10, Curaçao
                                    and is licensed and authorized by the Government of Curacao and operates under the
                                    Master License of Gaming Services Provider, N.V. #365/JAZ License Number:
                                    GLH-OCCHKTW0709172018. Payment agent company is Horangi Trading Limited with address
                                    Chytron, 30, 2nd floor, Flat/Office A22, 1075, Nicosia, Cyprus and Registration
                                    number: HE 411494.<br><br>Gambling can be addictive. Please play responsibly.only
                                    accepts customers over 18 years of age.</p>
                            </div>
                            <p></p>
                            <p class="flex text-[10px] md:text-[12px] w-full"></p>
                        </div>
                    </div>
                    @include('frontend.layouts.components.mobilemenu')
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/datepicker.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggle-btn');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
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
