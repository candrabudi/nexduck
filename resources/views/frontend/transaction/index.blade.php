@extends('frontend.layouts.app')

@section('content')
    <div class="md:w-4/6 2xl:w-4/6 mx-auto mt-20" style="margin-top: 120px;">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @include('frontend.layouts.components.menuprofile')

            <div class="col-span-2 relative">
                <!-- Bagian Penarikan -->
                <div class="flex flex-col w-full bg-gray-100 hover:bg-gray-300/20 dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                    <div class="header flex w-full mb-4">
                        <i class="fa-light fa-money-bill-transfer text-5xl text-green-500 mr-4"></i>
                        <div class="flex flex-col">
                            <h1 class="text-2xl font-bold text-gray-700 dark:text-white">Daftar Penarikan</h1>
                            <p class="text-gray-500 dark:text-gray-400 text-sm">Berikut adalah daftar semua penarikan yang telah diajukan</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Bank</th>
                                        <th scope="col" class="px-6 py-3">Jumlah</th>
                                        <th scope="col" class="px-6 py-3">Status</th>
                                        <th scope="col" class="px-6 py-3">Tanggal Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($withdraws as $withdraw)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                            <td class="px-6 py-3">{{ $withdraw->userBank->bank->bank_code ?? 'Tidak Tersedia' }}</td>
                                            <td class="px-6 py-3">Rp {{ number_format($withdraw->amount, 2, ',', '.') }}</td>
                                            <td class="px-6 py-3 text-green-500 font-bold">{{ ucfirst($withdraw->status) }}</td>
                                            <td class="px-6 py-3">{{ $withdraw->created_at->format('d-m-Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Bagian Deposit -->
                    <div class="header flex w-full mb-4 mt-8">
                        <i class="fa-light fa-money-bill-transfer text-5xl text-blue-500 mr-4"></i>
                        <div class="flex flex-col">
                            <h1 class="text-2xl font-bold text-gray-700 dark:text-white">Daftar Deposit</h1>
                            <p class="text-gray-500 dark:text-gray-400 text-sm">Berikut adalah daftar semua deposit yang telah berhasil</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Bank</th>
                                        <th scope="col" class="px-6 py-3">Jumlah</th>
                                        <th scope="col" class="px-6 py-3">Status</th>
                                        <th scope="col" class="px-6 py-3">Tanggal Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deposits as $deposit)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                            <td class="px-6 py-3">{{ $deposit->userBank->bank->bank_code ?? 'Tidak Tersedia' }}</td>
                                            <td class="px-6 py-3">Rp {{ number_format($deposit->amount, 2, ',', '.') }}</td>
                                            <td class="px-6 py-3 text-blue-500 font-bold">{{ ucfirst($deposit->status) }}</td>
                                            <td class="px-6 py-3">{{ $deposit->created_at->format('d-m-Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
    </div>
@endsection
