@extends('frontend.layouts.app')
@section('title', 'Dompet Saya')
@section('content')
    <div class="md:w-4/6 2xl:w-4/6 mx-auto mt-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @include('frontend.layouts.components.menuprofile')

            <div class="relative col-span-2">
                <div
                    class="flex flex-col w-full bg-gray-200 hover:bg-gray-300/20 dark:bg-gray-800/50 p-4 rounded hover:dark:bg-gray-900">
                    <div class="mt-5 grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
                        <a href="{{ route('deposit') }}"
                            class="flex bg-white dark:bg-gray-900 p-4 border border-gray-300 dark:border-gray-600 rounded-lg">
                            <div class="text-5xl mr-3"><i class="fa-light fa-money-simple-from-bracket"></i></div>
                            <div class="flex flex-col">
                                <h1 class="text-lg">Deposit</h1>
                                <p class="text-sm dark:text-gray-500">Klik untuk melakukan deposit</p>
                            </div>
                        </a>
                        <a href="{{ route('withdraw') }}"
                            class="flex bg-white dark:bg-gray-900 p-4 border border-gray-300 dark:border-gray-600 rounded-lg">
                            <div class="text-5xl mr-3"><i class="fa-sharp fa-light fa-money-bill-transfer"></i></div>
                            <div class="flex flex-col">
                                <h1 class="text-lg">Penarikan</h1>
                                <p class="text-sm dark:text-gray-500">Klik di sini untuk menarik dana</p>
                            </div>
                        </a>
                    </div>
                    <div class="mt-5 flex flex-col">
                        <h1 class="mb-3 text-2xl">Portofolio Saya</h1>
                        <div
                            class="w-48 text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white w-full">
                            <button type="button"
                                class="relative inline-flex justify-between items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 rounded-t-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                <div class="flex items-center">
                                    <i class="fa-light fa-wallet text-3xl mr-2"></i>
                                    <div class="flex flex-col items-start">
                                        <p>Rp 0</p>
                                        <p class="text-[12px] dark:text-gray-500">Rp 0,00</p>
                                    </div>
                                </div>
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Aktif</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
