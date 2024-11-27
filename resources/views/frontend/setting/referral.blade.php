@extends('frontend.layouts.app')

@section('content')
    <div class="md:w-4/6 2xl:w-4/6 mx-auto mt-20 p-4 md:p-6 text-white">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            @include('frontend.layouts.components.menuprofile')

            <div class="relative col-span-2">
                <div class="flex flex-col w-full p-6 bg-gray-800 shadow-md rounded-lg">
                    <h2 class="text-xl font-semibold mb-4 text-white">Daftar Referral</h2>

                    <!-- Check if $network is available -->
                    @if(!$network)
                        <div class="bg-yellow-500 text-black p-4 mb-4 rounded-lg">
                            <span class="font-semibold">Info: </span>
                            Untuk mengaktifkan referral, silakan hubungi kami melalui <a href="javascript:void(0);" class="text-blue-600">Live Chat</a>.
                        </div>
                    @else
                        <!-- Added class to improve the copy functionality -->
                        <input type="text" value="{{ asset('register') }}?referral={{ $network->referral }}" class="mb-3 p-2 rounded bg-gray-700 text-white cursor-pointer" readonly onclick="this.select(); document.execCommand('copy');">
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-gray-800 rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gray-600">
                                    <th class="px-6 py-3 text-left text-sm font-medium text-white">No</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Nama Pengguna</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Email</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Tanggal Bergabung</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Status</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($referrals as $index => $referral)
                                    <tr class="bg-gray-800 border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $referral->user->username }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $referral->user->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ \Carbon\Carbon::parse($referral->created_at)->format('d M Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            @if($referral->user->status == 1)
                                                <span class="text-green-600 font-semibold">Aktif</span>
                                            @else
                                                <span class="text-red-600 font-semibold">Nonaktif</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <button 
                                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
                                                onclick="openModal({{ $referral->id }})">View Transaction</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if(count($referrals) > 0)
                        <div class="mt-4">
                            {{ $referrals->links() }} <!-- Pagination Links -->
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Transaction Details -->
    <div id="transaction-modal" class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-gray-800 p-6 rounded-lg w-1/3">
            <h3 class="text-xl text-white font-semibold mb-4">Transaction Details</h3>
            <div id="transaction-details" class="text-white">
                <!-- Transaction details table will be displayed here -->
            </div>
            <button onclick="closeModal()" class="mt-4 px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Close</button>
        </div>
    </div>

    <script>
        function openModal(referralId) {
            // Simulate fetching data (you would normally fetch data from an API here)
            const transactionDetails = `
                <table class="min-w-full bg-gray-700 rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-600">
                            <th class="px-4 py-2 text-left text-sm font-medium text-white">Jenis Transaksi</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white">Nominal Transaksi</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white">Tanggal Transaksi</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-white">Status Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-gray-800 border-b">
                            <td class="px-4 py-2 text-sm text-white">Deposit</td>
                            <td class="px-4 py-2 text-sm text-white">Rp 1,000,000</td>
                            <td class="px-4 py-2 text-sm text-white">01 Jan 2024</td>
                            <td class="px-4 py-2 text-sm text-white">
                                <span class="text-green-600 font-semibold">Completed</span>
                            </td>
                        </tr>
                        <tr class="bg-gray-800 border-b">
                            <td class="px-4 py-2 text-sm text-white">Withdrawal</td>
                            <td class="px-4 py-2 text-sm text-white">Rp 500,000</td>
                            <td class="px-4 py-2 text-sm text-white">05 Jan 2024</td>
                            <td class="px-4 py-2 text-sm text-white">
                                <span class="text-red-600 font-semibold">Failed</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            `;

            // Insert the details into the modal
            document.getElementById('transaction-details').innerHTML = transactionDetails;

            // Show the modal
            document.getElementById('transaction-modal').classList.remove('hidden');
        }

        function closeModal() {
            // Hide the modal
            document.getElementById('transaction-modal').classList.add('hidden');
        }
    </script>
@endsection
