@extends('frontend.layouts.app')

@section('content')
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
            /* Reduced padding for a smaller button */
            font-size: 0.8rem;
            /* Smaller font size */
            border-radius: 5px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .copy-button:hover {
            background-color: #2D9B63;
            /* Darker shade on hover */
        }
    </style>

    <div class="md:w-4/6 2xl:w-4/6 mx-auto mt-20 p-4 md:p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            @include('frontend.layouts.components.menuprofile')

            <div class="relative col-span-2">
                <div class="flex flex-col w-full">
                    <div class="mt-5">
                        <label for="paymentMethod" class="mb-2 text-gray-500">Select Payment Method</label>
                        <select id="paymentMethod" name="payment_method"
                            class="block w-full p-2 bg-white dark:bg-gray-900 border rounded-md"
                            onchange="showPaymentDetails(this)">
                            <option value="">Select Bank or E-wallet</option>
                            <option value="bank" data-method="bank">Bank</option>
                            <option value="ewallet" data-method="ewallet">Ewallet</option>
                        </select>
                    </div>

                    <!-- Payment Method Form (Always visible) -->
                    <div id="payment-form" class="mt-5">
                        <form action="{{ route('deposit.store') }}" method="POST" id="deposit-form">
                            @csrf

                            <!-- Bank Section (Initially hidden) -->
                            <div id="bank-section" class="hidden">
                                <label for="bankMethod" class="mb-2 text-gray-500">Bank</label>
                                <select id="bankMethod" name="admin_bank_id"
                                    class="block w-full p-2 bg-white dark:bg-gray-900 border rounded-md"
                                    onchange="showBankDetails(this)">
                                    <option value="">Select Bank</option>
                                    @foreach ($banks as $bank)
                                        @if ($bank->bankAccount)
                                            <option value="{{ $bank->bankAccount->id }} "
                                                data-bank="{{ json_encode($bank->bankAccount) }} ">
                                                {{ $bank['bank_name'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div id="bank-details" class="details-box hidden">
                                    <p style="color: #000;"><strong>Bank Name:</strong> <span id="bank-name"></span></p>
                                    <p style="color: #000;"><strong>Account Number:</strong> <span
                                            id="account-number"></span></p>
                                    <p style="color: #000;"><strong>Account Holder:</strong> <span id="account-name"></span>
                                    </p>
                                    <button type="button" class="copy-button btn-sm" onclick="copyAccountNumber()">Copy
                                        Account Number</button>
                                </div>
                            </div>

                            <!-- Ewallet Section (Initially hidden) -->
                            <div id="ewallet-section" class="hidden">
                                <label for="ewalletMethod" class="mb-2 text-gray-500">Ewallet</label>
                                <select id="ewalletMethod" name="ewalletMethod"
                                    class="block w-full p-2 bg-white dark:bg-gray-900 border rounded-md"
                                    onchange="showEwalletDetails(this)">
                                    <option value="">Select Ewallet</option>
                                    @foreach ($ewallets as $ewallet)
                                        <option value="{{ $ewallet['bank_code'] }}"
                                            data-ewallet="{{ json_encode($ewallet) }}">{{ $ewallet['bank_name'] }}</option>
                                    @endforeach
                                </select>
                                <div id="ewallet-details" class="details-box hidden"></div>
                            </div>

                            <!-- Promotions Section -->
                            <div class="mt-5">
                                <label for="promotion" class="mb-2 text-gray-500">Promotions</label>
                                <select id="promotion" name="promotion_id"
                                    class="block w-full p-2 bg-white dark:bg-gray-900 border rounded-md"
                                    onchange="showPromotionDetails(this)">
                                    <option value="">Select Promotion</option>
                                    @foreach ($promotions as $promotion)
                                        <option value="{{ $promotion->id }}" data-promotion="{{ json_encode($promotion) }}"
                                            data-promotion-detail="{{ json_encode($promotion->promotionDetail) }}">
                                            {{ $promotion->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="promotion-details" class="promotion-details hidden">
                                <p style="color: #000;"><strong>Promosi: </strong><span id="promotion-name"></span></p>
                                <p style="color: #000;"><strong>Min. Deposit: </strong><span id="min-deposit"></span></p>
                                <p style="color: #000;"><strong>Max. Deposit: </strong><span id="max_deposit"></span></p>
                                <p style="color: #000;"><strong>Target Harus Tercapai: </strong><span
                                        id="target_promo"></span> * Bonus + total
                                    deposit</p>
                            </div>

                            <div class="mt-5">
                                <label class="mb-3 text-gray-500">Rekomendasi Deposit</label>
                                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 w-full"
                                    style="margin-top: 15px;">
                                    @foreach ([50000, 100000, 150000, 200000, 250000] as $amount)
                                        <button type="button" style="color: #000" onclick="setAmount({{ $amount }})"
                                            class="w-full py-3 text-center rounded-lg border border-gray-300 bg-gray-200 hover:bg-blue-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 transform hover:scale-105 active:scale-100">
                                            IDR {{ number_format($amount) }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Amount Input -->
                            <div class="mt-3">
                                <p class="mb-2 text-gray-500">IDR&nbsp;20,000 - IDR&nbsp;50,000,000</p>
                                <div
                                    class="w-full flex items-center justify-between bg-white dark:bg-gray-900 rounded py-1">
                                    <div class="flex w-full">
                                        <input id="amountInput" name="amount" type="number"
                                            class="appearance-none border border-gray-300 rounded-md bg-transparent w-full p-2"
                                            placeholder="Enter amount here" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-5 w-full flex items-center justify-center">
                                <button type="submit" class="ui-button-blue w-full">
                                    <span class="uppercase font-semibold text-sm">Deposit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Function to copy account number to clipboard
        function copyAccountNumber() {
            const accountNumber = document.getElementById('account-number').textContent;
            navigator.clipboard.writeText(accountNumber).then(() => {
                Swal.fire({
                    title: 'Copied!',
                    text: 'Account number has been copied to clipboard.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            }).catch((err) => {
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to copy account number.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        }

        // Show payment details based on selection
        function showPaymentDetails(select) {
            const method = select.value;
            document.getElementById('payment-form').classList.remove('hidden');

            // Hide both sections initially
            document.getElementById('bank-section').classList.add('hidden');
            document.getElementById('ewallet-section').classList.add('hidden');
            document.getElementById('promotion-details').classList.add('hidden');

            if (method === 'bank') {
                document.getElementById('bank-section').classList.remove('hidden');
            } else if (method === 'ewallet') {
                document.getElementById('ewallet-section').classList.remove('hidden');
            }
        }

        // Show bank details based on selected bank
        function showBankDetails(select) {
            const bankDetails = select.selectedOptions[0].dataset.bank ? JSON.parse(select.selectedOptions[0].dataset
                .bank) : null;
            const bankDetailsDiv = document.getElementById('bank-details');
            const accountNumberSpan = document.getElementById('account-number');
            const bankNameSpan = document.getElementById('bank-name');
            const accountNameSpan = document.getElementById('account-name');

            if (bankDetails) {
                bankNameSpan.textContent = bankDetails.bank_name;
                accountNumberSpan.textContent = bankDetails.account_number;
                accountNameSpan.textContent = bankDetails.account_holder;
                bankDetailsDiv.classList.remove('hidden');
            } else {
                bankDetailsDiv.classList.add('hidden');
            }
        }

        // Show e-wallet details (stub)
        function showEwalletDetails(select) {
            const ewalletDetails = select.selectedOptions[0].dataset.ewallet ? JSON.parse(select.selectedOptions[0].dataset
                .ewallet) : null;
            const ewalletDetailsDiv = document.getElementById('ewallet-details');

            if (ewalletDetails) {
                ewalletDetailsDiv.innerHTML =
                    `<p style="color: #000;"><strong>E-wallet:</strong> ${ewalletDetails.bank_name}</p>`;
                ewalletDetailsDiv.classList.remove('hidden');
            } else {
                ewalletDetailsDiv.classList.add('hidden');
            }
        }

        // Set amount
        function setAmount(amount) {
            document.getElementById('amountInput').value = amount;
        }

        // Show promotion details
        function showPromotionDetails(select) {
            const promotion = select.selectedOptions[0].dataset.promotion ? JSON.parse(select.selectedOptions[0].dataset
                .promotion) : null;
            const promotionDetailsDiv = document.getElementById('promotion-details');
            const promotionName = document.getElementById('promotion-name');
            const minDeposit = document.getElementById('min-deposit');
            const maxDeposit = document.getElementById('max_deposit');
            const targetPromo = document.getElementById('target_promo');

            if (promotion) {
                promotionName.textContent = promotion.name;
                minDeposit.textContent = promotion.min_deposit;
                maxDeposit.textContent = promotion.max_deposit;
                targetPromo.textContent = promotion.promotionDetail.target_promo;
                promotionDetailsDiv.classList.remove('hidden');
            } else {
                promotionDetailsDiv.classList.add('hidden');
            }
        }
    </script>
@endsection
