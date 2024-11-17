<div class="flex sm:hidden">
    <div
        class="fixed z-40 w-full h-16 max-w-lg -translate-x-1/2 bg-white border border-gray-200 bottom-0 left-1/2 dark:bg-gray-800 dark:border-gray-800">
        <div class="grid h-full max-w-lg grid-cols-5 mx-auto">
            <!-- Tombol Home -->
            <button data-tooltip-target="tooltip-home" type="button" aria-label="Home"
                class="inline-flex flex-col items-center justify-center px-5 rounded-l-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <i class="fa-duotone fa-house-chimney mb-1 text-xl" aria-hidden="true"></i>
                <span class="text-[12px]">Beranda</span>
            </button>
            <div id="tooltip-home" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Beranda
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <!-- Tombol Kasino -->
            <button data-tooltip-target="tooltip-casino" type="button" aria-label="Kasino"
                class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <i class="fa-duotone fa-dice mb-1 text-xl" aria-hidden="true"></i>
                <span class="text-[12px]">Kasino</span>
            </button>
            <div id="tooltip-casino" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Kasino
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <!-- Tombol Deposit -->
            <div class="flex items-center justify-center">
                <button data-tooltip-target="tooltip-new" type="button" aria-label="Deposit Baru"
                    class="inline-flex items-center justify-center w-10 h-10 font-medium bg-[#ff0000] rounded-full hover:bg-[#ff0000] group focus:ring-4 focus:bg-[#ff0000] focus:outline-none dark:focus:bg-[#ff0000]">
                    <i class="fa-solid fa-dollar-sign" aria-hidden="true"></i>
                    <span class="sr-only">Deposit</span>
                </button>
            </div>
            <div id="tooltip-new" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Deposit Baru
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <!-- Tombol Undang Teman -->
            <button data-tooltip-target="tooltip-sport" type="button" aria-label="Undang Teman"
                class="inline-flex flex-col items-center justify-center px-5 rounded-r-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <i class="fa-solid fa-users mb-1 text-xl" aria-hidden="true"></i>
                <span class="text-[12px]">Undang</span>
            </button>
            <div id="tooltip-sport" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Undang Teman
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <!-- Tombol Portofolio -->
            <button data-tooltip-target="tooltip-wallet" type="button" aria-label="Portofolio"
                class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <i class="fa-duotone fa-wallet mb-1 text-xl" aria-hidden="true"></i>
                <span class="text-[12px]">Portofolio</span>
            </button>
            <div id="tooltip-wallet" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Portofolio
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
    </div>
</div>
