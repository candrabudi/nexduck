<style>
    .close-btn {
        background-color: transparent;
        color: #fff;
        font-size: 16px;
        border: none;
        cursor: pointer;
        font-weight: bold;
        text-transform: uppercase;
        padding: 10px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    /* Efek hover pada tombol close */
    .close-btn:hover {
        background-color: #555;
        color: #ddd;
    }
</style>
<div class="sidebar" id="sidebar">
    <span id="close-btn" class="bg-red-600 text-white font-bold py-1 px-2 rounded-full text-sm cursor-pointer"
        style="right: 15px; top: 10px; position: absolute;">Tutup Menu</span>
    <div class="sidebar-content">
        <aside style="margin-top: 30px; padding: 10px;">
            <div class="h-full pb-4 overflow-y-auto sidebar-color mt-2">

                <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-4 text-white">
                    <div class="grid grid-cols-2 gap-2">
                        <!-- Item 1 -->
                        <a href="/" tabindex="0"
                            class="flex items-center space-x-2 p-2 rounded-md bg-gradient-to-r from-pink-200 to-pink-400 transition-transform hover:scale-105">
                            <div class="text-left">
                                <span class="block text-[9px] font-bold uppercase text-pink-800">Spin Bonus</span>
                                <span class="block text-[8px] text-gray-700">Mainkan dan Menang!</span>
                            </div>
                        </a>

                        <!-- Item 2 -->
                        <a href="/" tabindex="0"
                            class="flex items-center space-x-2 p-2 rounded-md bg-gradient-to-r from-green-200 to-green-400 transition-transform hover:scale-105">
                            <div class="text-left">
                                <span class="block text-[9px] font-bold uppercase text-green-800">Ajak Teman</span>
                                <span class="block text-[8px] text-gray-700">Dapatkan Bonus</span>
                            </div>
                        </a>

                        <!-- Item 3 -->
                        <a href="/" tabindex="0"
                            class="flex items-center space-x-2 p-2 rounded-md bg-gradient-to-r from-blue-200 to-blue-400 transition-transform hover:scale-105">
                            <div class="text-left">
                                <span class="block text-[9px] font-bold uppercase text-blue-800">Undian</span>
                                <span class="block text-[8px] text-gray-700">Hadiah Menanti</span>
                            </div>
                        </a>

                        <!-- Item 4 -->
                        <a href="/" tabindex="0"
                            class="flex items-center space-x-2 p-2 rounded-md bg-gradient-to-r from-orange-200 to-orange-400 transition-transform hover:scale-105">
                            <div class="text-left">
                                <span class="block text-[9px] font-bold uppercase text-orange-800">Toko Bonus</span>
                                <span class="block text-[8px] text-gray-700">Temukan Penawaran</span>
                            </div>
                        </a>

                        <!-- Item 5 -->
                        <a href="/" tabindex="0"
                            class="flex items-center space-x-2 p-2 rounded-md bg-gradient-to-r from-cyan-200 to-cyan-400 transition-transform hover:scale-105">
                            <div class="text-left">
                                <span class="block text-[9px] font-bold uppercase text-cyan-800">Bonus Telegram</span>
                                <span class="block text-[8px] text-gray-700">Langganan Sekarang</span>
                            </div>
                        </a>

                        <!-- Item 6 -->
                        <a href="/" tabindex="0"
                            class="flex items-center space-x-2 p-2 rounded-md bg-gradient-to-r from-indigo-200 to-indigo-400 transition-transform hover:scale-105">
                            <div class="text-left">
                                <span class="block text-[9px] font-bold uppercase text-indigo-800">Aplikasi
                                    Mobile</span>
                                <span class="block text-[8px] text-gray-700">Unduh Sekarang</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="p-2 mt-2">

                    <ul class="font-medium" style="background: rgba(25, 44, 61, 0.3); border-radius: 4px;">
                        <li class="px-3">
                            <a href="/"
                                class="l-5 flex items-center w-full p-2 text-gray-700 font-normal transition duration-700 rounded-lg group dark:text-gray-400 dark:hover:text-white">
                                <img src="{{ asset('images/sidemenu_lobby.svg') }}" alt="" width="16">
                                <span class="ml-3">Home</span>
                            </a>
                            <a href="/slots"
                                class="l-5 flex items-center w-full p-2 text-gray-700 font-normal transition duration-700 rounded-lg group dark:text-gray-400 dark:hover:text-white">
                                <img src="{{ asset('images/sidemenu_slots.svg') }}" alt="" width="16">
                                <span class="ml-3">Slot</span>
                            </a>
                            <a href="/live-casino"
                                class="l-5 flex items-center w-full p-2 text-gray-700 font-normal transition duration-700 rounded-lg group dark:text-gray-400 dark:hover:text-white">
                                <img src="{{ asset('images/sidemenu_casino.svg') }}" alt="" width="16">
                                <span class="ml-3">Live Casino</span>
                            </a>
                            <a href="#" onclick="comingSoon('Table Games')"
                                class="l-5 flex items-center w-full p-2 text-gray-700 font-normal transition duration-700 rounded-lg group dark:text-gray-400 dark:hover:text-white">
                                <img src="{{ asset('images/icon_table_games.svg') }}" alt="" width="16">
                                <span class="ml-3">Table Games</span>
                            </a>
                        </li>
                    </ul>

                    <ul class="font-medium mt-2" style="background: rgba(25, 44, 61, 0.3); border-radius: 4px;">
                        <li class="px-3">
                            <a href="/promotion"
                                class="l-5 flex items-center w-full p-2 text-gray-700 font-normal transition duration-700 rounded-lg group dark:text-gray-400 dark:hover:text-white">
                                <img src="{{ asset('images/sidemenu_promotions.svg') }}" alt="" width="16">
                                <span class="ml-3">Promosi</span>
                            </a>
                            <a href="#" onclick="comingSoon('Tournaments')"
                                class="l-5 flex items-center w-full p-2 text-gray-700 font-normal transition duration-700 rounded-lg group dark:text-gray-400 dark:hover:text-white">
                                <img src="{{ asset('images/icon_tournaments.svg') }}" alt="" width="16">
                                <span class="ml-3">Tournaments</span>
                            </a>

                            <a href="#" onclick="comingSoon('VIP Club')"
                                class="l-5 flex items-center w-full p-2 text-gray-700 font-normal transition duration-700 rounded-lg group dark:text-gray-400 dark:hover:text-white">
                                <img src="{{ asset('images/icon_vip.svg') }}" alt="" width="16">
                                <span class="ml-3">VIP Club</span>
                            </a>

                            <script>
                                function comingSoon(feature) {
                                    Swal.fire({
                                        title: feature + ' Coming Soon!',
                                        text: 'This feature is not available yet.',
                                        icon: 'info',
                                        confirmButtonText: 'OK',
                                        customClass: {
                                            popup: 'bg-white dark:bg-gray-800 rounded-lg shadow-lg',
                                            title: 'text-gray-900 dark:text-white',
                                            confirmButton: 'bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded',
                                            cancelButton: 'bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded',
                                        }
                                    });
                                }
                            </script>
                        </li>
                    </ul>
                    <ul class="font-medium mt-2" style="background: rgba(25, 44, 61, 0.3); border-radius: 4px;">
                        <li class="px-3">
                            <a href="/support"
                                class="l-5 flex items-center w-full p-2 text-gray-700 font-normal transition duration-700 rounded-lg group dark:text-gray-400 dark:hover:text-white">
                                <img src="{{ asset('images/sidemenu_support.svg') }}" alt="" width="16">
                                <span class="ml-3">Tentang Kami</span>
                            </a>
                        </li>
                        <li class="px-3">
                            <a href="/contact"
                                class="l-5 flex items-center w-full p-2 text-gray-700 font-normal transition duration-700 rounded-lg group dark:text-gray-400 dark:hover:text-white">
                                <img src="{{ asset('images/sidemenu_support.svg') }}" alt="" width="16">
                                <span class="ml-3">Kontak Kami</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
    </div>
</div>
