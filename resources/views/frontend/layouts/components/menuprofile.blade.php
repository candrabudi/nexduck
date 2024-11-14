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
            <li class="w-full">
                <a href="/profile/transactions"
                    class="flex w-full bg-gray-200 hover:bg-gray-300/20 dark:bg-gray-800/50 px-4 py-3 rounded hover:dark:bg-gray-900 transition duration-700 
                    {{ Request::is('profile/transactions') ? 'wallet-active bg-gray-300 dark:bg-gray-800/70' : '' }}">
                    <span class="w-8"><i class="fa-solid fa-chart-mixed"></i></span>
                    <span>Transactions</span>
                </a>
            </li>
        </ul>
    </div>
</div>
