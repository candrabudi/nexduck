@extends('frontend.layouts.app')

@section('content')
    <div class="md:w-4/6 2xl:w-4/6 mx-auto mt-20" style="margin-top: 120px;">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @include('frontend.layouts.components.menuprofile')

            <div class="col-span-2 relative">
                <!-- Withdrawal Section -->
                <div class="flex flex-col w-full bg-gray-200 hover:bg-gray-300/20 dark:bg-gray-700 p-4 rounded">
                    <div class="header flex w-full mb-3">
                        <i class="fa-light fa-money-bill-transfer text-5xl mr-3"></i>
                        <div class="flex flex-col">
                            <h1 class="text-2xl font-bold">Withdrawal List</h1>
                            <p class="text-gray-400 text-sm">Below is the list of all requested withdrawals</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 border dark:border-gray-600">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Bank</th>
                                        <th scope="col" class="px-6 py-3">Amount</th>
                                        <th scope="col" class="px-6 py-3">Status</th>
                                        <th scope="col" class="px-6 py-3">Transaction Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($withdraws as $withdraw)
                                        <tr>
                                            <td class="px-6 py-3">{{ $withdraw->userBank->bank->bank_code ?? 'N/A' }}</td>
                                            <td class="px-6 py-3">Rp {{ number_format($withdraw->amount, 2) }}</td>
                                            <td class="px-6 py-3">{{ ucfirst($withdraw->status) }}</td>
                                            <td class="px-6 py-3">{{ $withdraw->created_at->format('Y-m-d') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="header flex w-full mb-3 mt-5">
                        <i class="fa-light fa-money-bill-transfer text-5xl mr-3"></i>
                        <div class="flex flex-col">
                            <h1 class="text-2xl font-bold">Deposit List</h1>
                            <p class="text-gray-400 text-sm">List of completed deposits</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 border dark:border-gray-600">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Bank</th>
                                        <th scope="col" class="px-6 py-3">Amount</th>
                                        <th scope="col" class="px-6 py-3">Status</th>
                                        <th scope="col" class="px-6 py-3">Transaction Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deposits as $deposit)
                                        <tr>
                                            <td class="px-6 py-3">{{ $deposit->userBank->bank->bank_code ?? 'N/A' }}</td>
                                            <td class="px-6 py-3">Rp {{ number_format($deposit->amount, 2) }}</td>
                                            <td class="px-6 py-3">{{ ucfirst($deposit->status) }}</td>
                                            <td class="px-6 py-3">{{ $deposit->created_at->format('Y-m-d') }}</td>
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
