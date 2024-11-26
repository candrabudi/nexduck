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
    </style>

    <div class="md:w-4/6 2xl:w-4/6 mx-auto mt-20" style="margin-top: 120px;">
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

                    <!-- Payment Method Form -->
                    <div id="payment-form" class="hidden mt-5">
                        <form action="{{ route('deposit.store') }}" method="POST" id="deposit-form">
                            @csrf
                            <div id="bank-section" class="hidden">
                                <label for="bankMethod" class="mb-2 text-gray-500">Bank</label>
                                <select id="bankMethod" name="admin_bank_id"
                                    class="block w-full p-2 bg-white dark:bg-gray-900 border rounded-md"
                                    onchange="showBankDetails(this)">
                                    <option value="">Select Bank</option>
                                    @foreach ($banks as $bank)
                                        @if ($bank->bankAccount)
                                            <option value="{{ $bank->bankAccount->id }}"
                                                data-bank="{{ json_encode($bank->bankAccount) }}">
                                                {{ $bank['bank_name'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div id="bank-details" class="details-box hidden"></div>
                            </div>

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
                                <p><strong>Promosi: </strong><span id="promotion-name"></span></p>
                                <p><strong>Min. Deposit: </strong><span id="min-deposit"></span></p>
                                <p><strong>Max. Deposit: </strong><span id="max_deposit"></span></p>
                                <p><strong>Target Harus Tercapai: </strong><span id="target_promo"></span> * Bonus + total
                                    deposit</p>
                            </div>

                            <div class="mt-5">
                                <label class="mb-2 text-gray-500">Rekomendasi Deposit</label>
                                <div class="grid grid-cols-5 gap-4 w-full">
                                    @foreach ([50000, 100000, 150000, 200000, 250000] as $amount)
                                        <button type="button" onclick="setAmount({{ $amount }})"
                                            class="recommendation-button w-full py-2 text-center">{{ $amount }}</button>
                                    @endforeach
                                </div>
                            </div>

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
        // Listen for form submission
        document.getElementById('deposit-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission for SweetAlert

            const form = this;

            // Submit the form via AJAX
            fetch(form.action, {
                    method: form.method,
                    body: new FormData(form),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success SweetAlert
                        Swal.fire({
                            title: 'Success!',
                            text: data.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            // Optionally, redirect or perform any other actions after success
                            window.location.reload(); // For example, reload the page
                        });
                    } else {
                        // If there's a pending transaction, show a SweetAlert with the message
                        Swal.fire({
                            title: 'Transaction Pending!',
                            text: data.message,
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => {
                    // Handle network or other errors
                    Swal.fire({
                        title: 'Error!',
                        text: 'Something went wrong, please try again later.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
        });
    </script>
    <script>
        function showPaymentDetails(select) {
            const method = select.value;
            document.getElementById('payment-form').classList.remove('hidden');
            document.getElementById('bank-section').classList.add('hidden');
            document.getElementById('ewallet-section').classList.add('hidden');

            if (method === 'bank') {
                document.getElementById('bank-section').classList.remove('hidden');
            } else if (method === 'ewallet') {
                document.getElementById('ewallet-section').classList.remove('hidden');
            }
        }

        function showBankDetails(select) {
            const bankDetailsContainer = document.getElementById('bank-details');
            const selectedOption = select.selectedOptions[0];

            if (selectedOption.value === "") {
                bankDetailsContainer.classList.add('hidden');
                bankDetailsContainer.innerHTML = "";
            } else {
                const bankData = JSON.parse(selectedOption.getAttribute('data-bank'));
                bankDetailsContainer.innerHTML = `
            <p style="color: #000"><strong>Nomor Rekening: </strong>${bankData.account_number}
                <button onclick="copyToClipboard('${bankData.account_number}')" 
                        style="margin-left: 10px; background-color: #10B981; color: white; border: none; padding: 5px 10px; cursor: pointer;">
                    Copy
                </button>
            </p>
            <p style="color: #000"><strong>Bank Name: </strong>${bankData.bank_name}</p>
        `;
                bankDetailsContainer.classList.remove('hidden');
            }
        }

        function showEwalletDetails(select) {
            const ewalletDetailsContainer = document.getElementById('ewallet-details');
            const selectedOption = select.selectedOptions[0];

            if (selectedOption.value === "") {
                ewalletDetailsContainer.classList.add('hidden');
                ewalletDetailsContainer.innerHTML = "";
            } else {
                const ewalletData = JSON.parse(selectedOption.getAttribute('data-ewallet'));
                ewalletDetailsContainer.innerHTML = `
            <p style="color: #000"><strong>Nomor Ewallet: </strong>${ewalletData.account_number}
                <button onclick="copyToClipboard('${ewalletData.account_number}')" 
                        style="margin-left: 10px; background-color: #10B981; color: white; border: none; padding: 5px 10px; cursor: pointer;">
                    Copy
                </button>
            </p>
            <p style="color: #000"><strong>Ewallet Name: </strong>${ewalletData.bank_name}</p>
        `;
                ewalletDetailsContainer.classList.remove('hidden');
            }
        }

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('Nomor rekening/ewallet berhasil disalin!');
            }).catch(err => {
                alert('Gagal menyalin: ', err);
            });
        }



        function setAmount(amount) {
            const amountInput = document.getElementById('amountInput');
            if (amountInput) {
                amountInput.value = amount;
            }
        }
    </script>
@endsection
