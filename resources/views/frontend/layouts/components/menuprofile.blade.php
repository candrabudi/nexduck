<div class="col-span-1 hidden md:block">
    <h1 class="text-2xl font-bold mb-3">
        Portfolio
    </h1>
    <div class="bg-gray-100 dark:bg-gray-700 w-full rounded shadow">
        <ul>
            <!-- Balance menu -->
            <li class="w-full mb-3">
                <a href="/profile/wallet"
                    class="flex w-full bg-gray-200 hover:bg-gray-300/20 dark:bg-gray-800/50 px-4 py-3 rounded hover:dark:bg-gray-900 transition duration-700 
                    {{ Request::is('profile/wallet') ? 'wallet-active bg-gray-300 dark:bg-gray-800/70' : '' }}">
                    <span class="w-8"><i class="fa-light fa-wallet"></i></span>
                    <span>Balance</span>
                </a>
            </li>

            <!-- Deposit menu -->
            <li class="w-full mb-3">
                <a href="/profile/deposit"
                    class="flex w-full bg-gray-200 hover:bg-gray-300/20 dark:bg-gray-800/50 px-4 py-3 rounded hover:dark:bg-gray-900 transition duration-700 
                    {{ Request::is('profile/deposit') ? 'wallet-active bg-gray-300 dark:bg-gray-800/70' : '' }}">
                    <span class="w-8"><i class="fa-sharp fa-light fa-piggy-bank"></i></span>
                    <span>Deposit</span>
                </a>
            </li>

            <!-- Withdraw menu -->
            <li class="w-full mb-3">
                <a href="/profile/withdraw"
                    class="flex w-full bg-gray-200 hover:bg-gray-300/20 dark:bg-gray-800/50 px-4 py-3 rounded hover:dark:bg-gray-900 transition duration-700 
                    {{ Request::is('profile/withdraw') ? 'wallet-active bg-gray-300 dark:bg-gray-800/70' : '' }}">
                    <span class="w-8"><i class="fa-light fa-money-simple-from-bracket"></i></span>
                    <span>Withdraw</span>
                </a>
            </li>

            <!-- Transactions menu -->
            <li class="w-full mb-3">
                <a href="/profile/transactions"
                    class="flex w-full bg-gray-200 hover:bg-gray-300/20 dark:bg-gray-800/50 px-4 py-3 rounded hover:dark:bg-gray-900 transition duration-700 
                    {{ Request::is('profile/transactions') ? 'wallet-active bg-gray-300 dark:bg-gray-800/70' : '' }}">
                    <span class="w-8"><i class="fa-solid fa-chart-mixed"></i></span>
                    <span>Transactions</span>
                </a>
            </li>

            <!-- Referral menu -->
            <li class="w-full mb-3">
                <a href="/profile/referral"
                    class="flex w-full bg-gray-200 hover:bg-gray-300/20 dark:bg-gray-800/50 px-4 py-3 rounded hover:dark:bg-gray-900 transition duration-700 
                    {{ Request::is('profile/referral') ? 'wallet-active bg-gray-300 dark:bg-gray-800/70' : '' }}">
                    <span class="w-8"><i class="fa-light fa-user-friends"></i></span>
                    <span>Referral</span>
                </a>
            </li>

            <li class="w-full">
                <a href="{{ route('setting.profile') }}"
                    class="flex w-full bg-gray-200 hover:bg-gray-300/20 dark:bg-gray-800/50 px-4 py-3 rounded hover:dark:bg-gray-900 transition duration-700 
                    {{ Request::is('profile/setting') ? 'wallet-active bg-gray-300 dark:bg-gray-800/70' : '' }}">
                    <span class="w-8"><i class="fa-solid fa-chart-mixed"></i></span>
                    <span>Profile</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Mobile Menu with Horizontal Scroll (Visible Always) -->
<div class="md:hidden">
    <div class="overflow-x-auto bg-gray-100 dark:bg-gray-700 p-4 rounded shadow mt-4">
        <ul class="flex space-x-4">
            <!-- Balance menu -->
            <li class="flex-shrink-0 mb-3">
                <a href="/profile/wallet"
                    class="flex items-center bg-gray-200 hover:bg-gray-300/20 dark:bg-gray-800/50 px-4 py-3 rounded hover:dark:bg-gray-900 transition duration-700 
                    {{ Request::is('profile/wallet') ? 'wallet-active bg-gray-300 dark:bg-gray-800/70' : '' }}">
                    <span class="w-8"><i class="fa-light fa-wallet"></i></span>
                    <span>Balance</span>
                </a>
            </li>

            <!-- Deposit menu -->
            <li class="flex-shrink-0 mb-3">
                <a href="/profile/deposit"
                    class="flex items-center bg-gray-200 hover:bg-gray-300/20 dark:bg-gray-800/50 px-4 py-3 rounded hover:dark:bg-gray-900 transition duration-700 
                    {{ Request::is('profile/deposit') ? 'wallet-active bg-gray-300 dark:bg-gray-800/70' : '' }}">
                    <span class="w-8"><i class="fa-sharp fa-light fa-piggy-bank"></i></span>
                    <span>Deposit</span>
                </a>
            </li>

            <!-- Withdraw menu -->
            <li class="flex-shrink-0 mb-3">
                <a href="/profile/withdraw"
                    class="flex items-center bg-gray-200 hover:bg-gray-300/20 dark:bg-gray-800/50 px-4 py-3 rounded hover:dark:bg-gray-900 transition duration-700 
                    {{ Request::is('profile/withdraw') ? 'wallet-active bg-gray-300 dark:bg-gray-800/70' : '' }}">
                    <span class="w-8"><i class="fa-light fa-money-simple-from-bracket"></i></span>
                    <span>Withdraw</span>
                </a>
            </li>

            <!-- Transactions menu -->
            <li class="flex-shrink-0">
                <a href="/profile/transactions"
                    class="flex items-center bg-gray-200 hover:bg-gray-300/20 dark:bg-gray-800/50 px-4 py-3 rounded hover:dark:bg-gray-900 transition duration-700 
                    {{ Request::is('profile/transactions') ? 'wallet-active bg-gray-300 dark:bg-gray-800/70' : '' }}">
                    <span class="w-8"><i class="fa-solid fa-chart-mixed"></i></span>
                    <span>Transactions</span>
                </a>
            </li>

            <!-- Referral menu -->
            <li class="flex-shrink-0">
                <a href="/profile/referral"
                    class="flex items-center bg-gray-200 hover:bg-gray-300/20 dark:bg-gray-800/50 px-4 py-3 rounded hover:dark:bg-gray-900 transition duration-700 
                    {{ Request::is('profile/referral') ? 'wallet-active bg-gray-300 dark:bg-gray-800/70' : '' }}">
                    <span class="w-8"><i class="fa-light fa-user-friends"></i></span>
                    <span>Referral</span>
                </a>
            </li>
        </ul>
    </div>
</div>
