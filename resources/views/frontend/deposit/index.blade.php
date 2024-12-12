@extends('frontend.layouts.app')

@section('content')
    <div class="md:w-4/6 2xl:w-4/6 mx-auto mt-20 p-4 md:p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @include('frontend.layouts.components.menuprofile')

            <div class="relative col-span-2 bg-gray-800 text-white rounded-lg shadow-lg p-6">
                <div class="flex flex-col w-full">
                    <div class="mt-5">
                        <label for="paymentMethod" class="mb-2 text-gray-400">Select Payment Method</label>
                        <select id="paymentMethod" name="payment_method"
                            class="block w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                            onchange="showPaymentDetails(this)">
                            <option value="">Select Bank, E-wallet or QRIS</option>
                            <option value="bank" data-method="bank">Bank</option>
                            <option value="ewallet" data-method="ewallet">Ewallet</option>
                            <option value="qris" data-method="qris">QRIS</option>
                        </select>
                    </div>

                    <div id="payment-form" class="mt-5">
                        <form action="{{ route('deposit.store') }}" method="POST" id="deposit-form">
                            @csrf
                            <!-- Bank Section -->
                            <div id="bank-section" class="hidden">
                                <label for="bankMethod" class="mb-2 text-gray-400">Bank</label>
                                <select id="bankMethod" name="admin_bank_id"
                                    class="block w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    onchange="showBankDetails(this)">
                                    <option value="">Select Bank</option>
                                    @foreach ($banks as $bank)
                                        @if ($bank->bankAccount)
                                            <option value="{{ $bank->bankAccount->id }}"
                                                data-bank="{{ json_encode($bank->bankAccount) }}">
                                                {{ $bank['bank_name'] }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <div id="bank-details" class="details-box hidden mt-3 text-black">
                                    <p style="color: black"><strong>Nomor Rekening:</strong> <span
                                            id="account-number"></span></p>
                                    <p style="color: black"><strong>Nama Penerima:</strong> <span id="account-name"></span>
                                    </p>
                                    <div id="account-image-wrapper" class="mt-2 hidden">
                                        <strong>Account Image:</strong><br>
                                        <img id="account-image" src="" alt="Account Image"
                                            class="w-100 h-100 object-cover rounded-md">
                                    </div>
                                    <button type="button"
                                        class="copy-button btn-sm mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-all"
                                        onclick="copyAccountNumber()">Copy Account Number</button>
                                </div>
                            </div>

                            <div id="ewallet-section" class="hidden">
                                <label for="ewalletMethod" class="mb-2 text-gray-400">Ewallet</label>
                                <select id="ewalletMethod" name="admin_ewallet_id"
                                    class="block w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    onchange="showEwalletDetails(this)">
                                    <option value="">Select Ewallet</option>
                                    @foreach ($ewallets as $ewallet)
                                        <option value="{{ $ewallet->bankAccount->id }}"
                                            data-ewallet="{{ json_encode($ewallet->bankAccount) }}">
                                            {{ $ewallet['bank_name'] }}</option>
                                    @endforeach
                                </select>
                                <div id="ewallet-details" class="details-box hidden mt-3 text-white"></div>
                            </div>

                            <div id="qris-section" class="hidden mt-5">
                                <label for="qrisMethod" class="mb-2 text-gray-400">QRIS</label>
                                <select id="qrisMethod" name="admin_qris_id"
                                    class="block w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    onchange="showQrisDetails(this)">
                                    <option value="">Select QRIS</option>
                                    @foreach ($qris as $qris_item)
                                        <option value="{{ $qris_item->bankAccount->id }}" data-qris="{{ json_encode($qris_item->bankAccount) }}">
                                            {{ $qris_item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div id="qris-details" class="details-box hidden mt-3 text-black">
                                    <p style="color: black"><strong>QRIS ID:</strong> <span id="qris-id"></span></p>
                                    <div id="qris-code-wrapper" class="mt-2">
                                        <strong>QR Code:</strong><br>
                                        <img id="qris-code" src="" alt="QR Code"
                                            class="w-100 h-100 object-cover rounded-md">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <label for="promotion" class="mb-2 text-gray-400">Promotions</label>
                                <select id="promotion" name="promotion_id"
                                    class="block w-full p-3 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    onchange="showPromotionDetails(this)">
                                    <option value="">Select Promotion</option>
                                    @foreach ($promotions as $promotion)
                                        <option value="{{ $promotion->id }}"
                                            data-promotion="{{ json_encode($promotion) }}"
                                            data-promotion-detail="{{ json_encode($promotion->promotionDetail) }}">
                                            {{ $promotion->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="promotion-details" class="promotion-details hidden mt-3 text-black">
                                <p style="color: black"><strong>Promosi: </strong><span id="promotion-name"></span></p>
                                <p style="color: black"><strong>Min. Deposit: </strong><span id="min-deposit"></span></p>
                                <p style="color: black"><strong>Max. Deposit: </strong><span id="max_deposit"></span></p>
                                <p style="color: black"><strong>Target Harus Tercapai: </strong><span
                                        id="target_promo"></span></p>
                            </div>

                            <div class="mt-5">
                                <label class="mb-3 text-gray-400">Rekomendasi Deposit</label>
                                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 w-full">
                                    @foreach ([50000, 100000, 150000, 200000, 250000] as $amount)
                                        <button type="button"
                                            class="w-full py-3 text-center rounded-lg border border-gray-600 bg-gray-700 hover:bg-blue-500 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 transform hover:scale-105 active:scale-100"
                                            onclick="setAmount({{ $amount }})">
                                            IDR {{ number_format($amount) }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mt-3">
                                <p class="mb-2 text-gray-400">IDR&nbsp;20,000 - IDR&nbsp;50,000,000</p>
                                <div class="w-full flex items-center justify-between bg-gray-700 rounded py-1">
                                    <div class="flex w-full">
                                        <input id="amountInput" name="amount" type="number"
                                            class="appearance-none border border-gray-600 rounded-md bg-transparent w-full p-3 text-white"
                                            placeholder="Enter amount here" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-5 w-full flex items-center justify-center">
                                <button type="submit"
                                    class="bg-blue-500 text-white w-full py-3 rounded-md hover:bg-blue-600 transition-all">
                                    <span class="uppercase font-semibold text-sm">Konfirmasi Deposit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function showPaymentDetails(select) {
            const method = select.value;
            if (method === 'bank') {
                document.getElementById('bank-section').classList.remove('hidden');
                document.getElementById('ewallet-section').classList.add('hidden');
                document.getElementById('qris-section').classList.add('hidden');
            } else if (method === 'ewallet') {
                document.getElementById('ewallet-section').classList.remove('hidden');
                document.getElementById('bank-section').classList.add('hidden');
                document.getElementById('qris-section').classList.add('hidden');
            } else if (method === 'qris') {
                document.getElementById('qris-section').classList.remove('hidden');
                document.getElementById('bank-section').classList.add('hidden');
                document.getElementById('ewallet-section').classList.add('hidden');
            }
        }

        function showQrisDetails(select) {
            const qrisDetails = select.options[select.selectedIndex].getAttribute('data-qris');
            const qrisData = JSON.parse(qrisDetails);

            document.getElementById('qris-id').innerText = qrisData.account_number;
            if (qrisData.account_image) {
                document.getElementById('qris-code').src = qrisData.account_image;
            }
            document.getElementById('qris-details').classList.remove('hidden');
        }

        function showBankDetails(select) {
            const bankDetails = select.options[select.selectedIndex].getAttribute('data-bank');
            const bankData = JSON.parse(bankDetails);

            document.getElementById('account-number').innerText = bankData.account_number;
            document.getElementById('account-name').innerText = bankData.account_name;

            const accountImageWrapper = document.getElementById('account-image-wrapper');
            if (bankData.account_image) {
                document.getElementById('account-image').src = bankData
                    .account_image;
                accountImageWrapper.classList.remove('hidden');
            } else {
                accountImageWrapper.classList.add('hidden');
            }

            document.getElementById('bank-details').classList.remove('hidden');
        }


        function showEwalletDetails(select) {
            const ewalletDetails = select.options[select.selectedIndex].getAttribute('data-ewallet');
            const ewalletData = JSON.parse(ewalletDetails);
            document.getElementById('ewallet-details').innerHTML = `
                    <p style="color: black"><strong>Nomor Akun:</strong> ${ewalletData.account_number}</p>
                    <p style="color: black"><strong>Nama Akun:</strong> ${ewalletData.account_name}</p>
                `;
            document.getElementById('ewallet-details').classList.remove('hidden');
        }

        function showPromotionDetails(select) {
            const promotionDetails = select.options[select.selectedIndex].getAttribute('data-promotion-detail');
            const promotionData = JSON.parse(promotionDetails);
            document.getElementById('promotion-name').innerText = promotionData.title;
            document.getElementById('min-deposit').innerText = promotionData.min_deposit;
            document.getElementById('max_deposit').innerText = promotionData.max_deposit;
            document.getElementById('target_promo').innerText = promotionData.target;
            document.getElementById('promotion-details').classList.remove('hidden');
        }

        function setAmount(amount) {
            document.getElementById('amountInput').value = amount;
        }

        function copyAccountNumber() {
            const accountNumber = document.getElementById('account-number').innerText;
            navigator.clipboard.writeText(accountNumber).then(function() {
                alert("Account number copied to clipboard!");
            }, function(err) {
                alert('Failed to copy: ' + err);
            });
        }
    </script>
@endsection


@section('styles')
    <style>
        .tab-button {
            transition: background-color 0.3s, color 0.3s;
        }

        .tab-button.active {
            background-color: #10B981;
            color: white;
        }

        .tab-button:not(.active) {
            background-color: #E5E7EB;
            color: #4B5563;
        }

        .details-box {
            margin-top: 15px;
            padding: 15px;
            background-color: #f0f4f8;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .promotion-details {
            background: #b2bec3;
            padding: 20px;
            border-radius: 8px;
            margin-top: 15px;
        }

        .copy-button {
            background-color: #10B981;
            color: white;
            padding: 4px 8px;
            font-size: 0.8rem;
            border-radius: 5px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .copy-button:hover {
            background-color: #2D9B63;
        }
    </style>
@endsection
