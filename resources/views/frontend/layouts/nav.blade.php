<nav class="fixed navbar top-0 z-50 w-full navtop-color border-none custom-box-shadow">
    <div class="px-3 lg:px-5 lg:pl-3 nav-menu">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start py-3">
                <button type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar"
                    id="toggle-btn">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <style>
                    .sidebar {
                        position: fixed;
                        top: 0;
                        left: -100%;
                        width: 100%;
                        height: 100%;
                        /* background-color: rgba(51, 51, 51, 0.95); */
                        background: #191A1E;
                        color: white;
                        transition: left 0.3s ease;
                        z-index: 999;
                    }

                    .sidebar.active {
                        left: 0;
                    }

                    @media (max-width: 768px) {
                        .hide-aside {
                            display: none;
                        }
                    }
                </style>
                <a href="/" class="flex ml-2 md:mr-24">
                    <div class="">
                        <img src="{{ $setting->web_logo }}" alt="" class="h-8 mr-3 dark:block">
                    </div>
                </a>
            </div>
            <div class="hidden md:block"></div>
            @if (Auth::user())
                <div class="flex items-center py-3">
                    <div class="flex items-center">
                        <button type="button" class="flex justify-center items-center mr-3 pt-1 wallet-money">
                            <div class="mr-2">
                                <img src="https://cdn270.picsart.com/297e52e4-65f2-409d-8a3e-032d3b24403b/451868880001211.png?to=crop&amp;type=webp&amp;r=1456x1456&amp;q=85" 
                                    alt="" width="20">
                            </div>
                            <div>
                                <strong id="user-balance">
                                    Rp 0
                                </strong>
                            </div>
                        </button>
                        
                        <script>
                            function updateBalance() {
                                fetch('{{ route('getBall') }}')
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.status === 1) {
                                            const userBalance = data.user.balance;
                                            const formattedBalance = new Intl.NumberFormat('id-ID').format(userBalance);
                                            document.getElementById('user-balance').innerText = 'Rp ' + formattedBalance;
                                        } else {
                                            console.error('Gagal mengambil data balance');
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Terjadi kesalahan:', error);
                                    });
                            }
                            setInterval(updateBalance, 3000);
                        </script>
                        
                        <button class="hidden md:block ui-button-blue mr-3 rounded"
                            onclick="window.location.href='/profile/deposit'">
                            Deposit
                        </button>

                        <div class="flex items-center ml-3">
                            <div>
                                <button type="button"
                                    class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                    aria-expanded="false" id="dropdown-toggle-button">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 rounded-full" src="/assets/images/profile.jpg"
                                        alt="User Profile">
                                </button>
                                <div id="dropdown-user"
                                    class="hidden absolute right-0 mt-2 w-48 bg-gray-700 rounded-lg shadow-lg">
                                    <ul class="py-2 text-sm text-white">
                                        <li>
                                            <a href="/profile/wallet" class="block px-4 py-2">Profile</a>
                                        </li>
                                        <li>
                                            <a href="/settings" class="block px-4 py-2">Settings</a>
                                        </li>
                                        <li>
                                            <form action="/logout" method="POST" class="block px-4 py-2">
                                                @csrf
                                                <button type="submit" class="w-full text-left">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <script>
                            const button = document.getElementById('dropdown-toggle-button');
                            const dropdown = document.getElementById('dropdown-user');

                            button.addEventListener('click', () => {
                                dropdown.classList.toggle('hidden');
                            });

                            window.addEventListener('click', (event) => {
                                if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                                    dropdown.classList.add('hidden');
                                }
                            });
                        </script>

                    </div>
                </div>
            @else
                <div class="flex items-center py-3">
                    <div class="flex ml-5">
                        <button class="ui-button-blue" onclick="navigateTo('/login')">Login</button>
                        <button class="ui-button-blue ml-3 rounded" onclick="navigateTo('/register')">Register</button>
                    </div>
                    
                    <script>
                        function navigateTo(url) {
                            window.location.href = url;
                        }
                    </script>
                    
                </div>
            @endif

        </div>
    </div>
</nav>
