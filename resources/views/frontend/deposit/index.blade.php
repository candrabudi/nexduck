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
            color: white;
        }

        .recommendation-button {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px;
            text-align: center;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .recommendation-button:hover {
            background-color: #555;
        }

        .copy-button {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .copy-button:hover {
            background-color: #45a049;
        }
    </style>

    <div class="md:w-4/6 2xl:w-4/6 mx-auto mt-20" style="margin-top: 120px;">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @include('frontend.layouts.components.menuprofile')

            <div class="relative col-span-2">
                <div class="flex flex-col w-full">
                    <div class="tabs mb-5 flex justify-between w-full">
                        <button id="tab-bank" class="tab-button w-1/2 py-3 bg-gray-300 text-gray-700 rounded-l-lg" onclick="showTab('bank')">Bank</button>
                        <button id="tab-ewallet" class="tab-button w-1/2 py-3 bg-gray-300 text-gray-700 rounded-r-lg" onclick="showTab('ewallet')">Ewallet</button>
                    </div>

                    <div id="tab-content-bank" class="tab-content">
                        <form action="{{ route('deposit.store') }}" method="POST">
                            @csrf
                            <div class="mt-5">
                                <label for="bankMethod" class="mb-2 text-gray-500">Bank</label>
                                <select id="bankMethod" name="admin_bank_id" class="block w-full p-2 bg-white dark:bg-gray-900 border rounded-md" onchange="showBankDetails(this)">
                                    <option value="">Select Bank</option>
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank['bank_code'] }}" data-bank="{{ json_encode($bank) }}">{{ $bank['bank_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="bank-details" class="details-box hidden"></div>

                            <div class="mt-5">
                                <label class="mb-2 text-gray-500">Rekomendasi Deposit</label>
                                <div class="grid grid-cols-5 gap-4 w-full">
                                    @foreach ([50000, 100000, 150000, 200000, 250000] as $amount)
                                        <button type="button" onclick="setAmount({{ $amount }})" class="recommendation-button w-full py-2 text-center">{{ $amount }}</button>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mt-3">
                                <p class="mb-2 text-gray-500">IDR&nbsp;20,000 - IDR&nbsp;50,000,000</p>
                                <div class="w-full flex items-center justify-between bg-white dark:bg-gray-900 rounded py-1">
                                    <div class="flex w-full">
                                        <input id="amountInputBank" name="amount" type="number" min="20.00" max="50000.00" step="0.01" class="appearance-none border border-gray-300 rounded-md bg-transparent w-full p-2" placeholder="Enter amount here" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 w-full flex items-center justify-center">
                                <button type="submit" class="ui-button-blue w-full">
                                    <span class="uppercase font-semibold text-sm">Deposit via Bank</span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div id="tab-content-ewallet" class="tab-content hidden">
                        <form action="">
                            <div class="mt-5">
                                <label for="ewalletMethod" class="mb-2 text-gray-500">Ewallet</label>
                                <select id="ewalletMethod" name="ewalletMethod" class="block w-full p-2 bg-white dark:bg-gray-900 border rounded-md" onchange="showEwalletDetails(this)">
                                    <option value="">Select Ewallet</option>
                                    @foreach ($ewallets as $ewallet)
                                        <option value="{{ $ewallet['bank_code'] }}" data-ewallet="{{ json_encode($ewallet) }}">{{ $ewallet['bank_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="ewallet-details" class="details-box hidden"></div>

                            <div class="mt-5">
                                <label class="mb-2 text-gray-500">Rekomendasi Deposit</label>
                                <div class="grid grid-cols-5 gap-4 w-full">
                                    @foreach ([50, 100, 150, 200, 250] as $amount)
                                        <button type="button" onclick="setAmount({{ $amount }})" class="recommendation-button w-full py-2 text-center">{{ $amount }}</button>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mt-3">
                                <p class="mb-2 text-gray-500">IDR&nbsp;20,000 - IDR&nbsp;50,000,000</p>
                                <div class="w-full flex items-center justify-between bg-white dark:bg-gray-900 rounded py-1">
                                    <div class="flex w-full">
                                        <input id="amountInputEwallet" type="number" min="20.00" max="50000.00" step="0.01" class="appearance-none border border-gray-300 rounded-md bg-transparent w-full p-2" placeholder="Enter amount here" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 w-full flex items-center justify-center">
                                <button type="submit" class="ui-button-blue w-full">
                                    <span class="uppercase font-semibold text-sm">Deposit via Ewallet</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showTab('bank');
        });

        function showTab(tab) {
            document.getElementById('tab-bank').classList.remove('active', 'bg-green-500', 'text-white');
            document.getElementById('tab-ewallet').classList.remove('active', 'bg-green-500', 'text-white');
            document.getElementById('tab-content-bank').classList.add('hidden');
            document.getElementById('tab-content-ewallet').classList.add('hidden');

            if (tab === 'bank') {
                document.getElementById('tab-bank').classList.add('active', 'bg-green-500', 'text-white');
                document.getElementById('tab-content-bank').classList.remove('hidden');
            } else {
                document.getElementById('tab-ewallet').classList.add('active', 'bg-green-500', 'text-white');
                document.getElementById('tab-content-ewallet').classList.remove('hidden');
            }
        }

        function showBankDetails(select) {
            let bankData = JSON.parse(select.selectedOptions[0].dataset.bank);
            let bankDetailsDiv = document.getElementById('bank-details');
            bankDetailsDiv.innerHTML = `
                <div class="mt-2" style="background: #b2bec3; padding: 20px;border-radius: 8px;">
                    <img src="/path/to/images/${bankData.bank_image}" alt="${bankData.bank_name}" class="w-12 h-12">
                    <p style="color: #2d3436">Bank Name: <strong>${bankData.bank_name}</strong></p>
                    <p style="color: #2d3436">Account Name: <strong>${bankData.bank_account.account_name}</strong></p>
                    <p style="color: #2d3436">Account Number: <strong>${bankData.bank_account.account_number}</strong></p>
                    <button class="copy-button" onclick="copyToClipboard('${bankData.bank_account.account_number}')">Copy Number</button>
                </div>
            `;
            bankDetailsDiv.classList.remove('hidden');
        }

        function showEwalletDetails(select) {
            let ewalletData = JSON.parse(select.selectedOptions[0].dataset.ewallet);
            let ewalletDetailsDiv = document.getElementById('ewallet-details');
            ewalletDetailsDiv.innerHTML = `
                <div class="mt-2" style="background: #b2bec3; padding: 20px;border-radius: 8px;">
                    <img src="/path/to/images/${ewalletData.bank_image}" alt="${ewalletData.bank_name}" class="w-12 h-12">
                    <p style="color: #2d3436">Ewallet Name: <strong>${ewalletData.bank_name}</strong></p>
                    <p style="color: #2d3436">Account Name: <strong>${ewalletData.bank_account.account_name}</strong></p>
                    <p style="color: #2d3436">Account Number: <strong>${ewalletData.bank_account.account_number}</strong></p>
                    <button class="copy-button" onclick="copyToClipboard('${ewalletData.bank_account.account_number}')">Copy Number</button>
                </div>
            `;
            ewalletDetailsDiv.classList.remove('hidden');
        }

        function copyToClipboard(text) {
            const el = document.createElement('textarea');
            el.value = text;
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
        }

        function setAmount(amount) {
            let activeTab = document.querySelector('.tab-button.active').id;
            if (activeTab === 'tab-bank') {
                document.getElementById('amountInputBank').value = amount;
            } else {
                document.getElementById('amountInputEwallet').value = amount;
            }
        }
    </script>
@endsection
