@extends('frontend.layouts.app')

@section('content')
    <style>
        .tab-button {
            transition: background-color 0.3s, color 0.3s;
        }

        .tab-button.active {
            background-color: #10B981; /* bg-green-500 */
            color: white;
        }

        .tab-button:not(.active) {
            background-color: #E5E7EB; /* bg-gray-300 */
            color: #4B5563; /* text-gray-700 */
        }

        .details-box {
            margin-top: 15px;
            padding: 15px;
            background-color: #f0f4f8;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            color: #333; /* Black text */
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

        .loading-spinner {
            display: none;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid #4CAF50;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <div class="md:w-4/6 2xl:w-4/6 mx-auto mt-20" style="margin-top: 120px;">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @include('frontend.layouts.components.menuprofile')

            <div class="relative col-span-2">
                <div class="flex flex-col w-full">
                    <form id="withdrawForm" action="{{ route('withdraw.store') }}" method="POST" onsubmit="showLoading()">
                        @csrf
                        <div class="mt-5">
                            <label for="bankMethod" class="mb-2 text-gray-500">Pilih Bank</label>
                            <select id="bankMethod" name="bankMethod" class="block w-full p-2 bg-white dark:bg-gray-900 border rounded-md" required>
                                <option value="">Pilih Bank</option>
                                @foreach ($memberbanks as $ma)
                                    <option value="{{ e($ma->id) }}">{{ e($ma->bank->bank_name . ' - ' . $ma->account_name . ' - ' . $ma->account_number) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="bank-details" class="details-box hidden">
                            <p class="text-gray-700">Nama Bank: <strong id="bankName"></strong></p>
                            <p class="text-gray-700">Nomor Rekening: <strong id="accountNumber"></strong></p>
                            <p class="text-gray-700">Nama Pemilik: <strong id="accountName"></strong></p>
                        </div>

                        <div class="mt-3">
                            <p class="mb-2 text-gray-500">Jumlah Penarikan (IDR 20.000 - IDR 50.000.000)</p>
                            <input id="amountInput" type="number" name="amount" min="20000" max="50000000" step="1000" class="appearance-none border border-gray-300 rounded-md bg-transparent w-full p-2" placeholder="Masukkan jumlah penarikan" required>
                        </div>

                        <div class="mt-5 w-full flex items-center justify-center">
                            <button type="submit" class="ui-button-blue w-full relative">
                                <span class="uppercase font-semibold text-sm">Tarik Dana</span>
                                <div class="loading-spinner" id="loading-spinner"></div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bankMethod = document.getElementById('bankMethod');
            bankMethod.addEventListener('change', showBankDetails);
        });

        function showBankDetails() {
            const selectedOption = document.getElementById('bankMethod').selectedOptions[0];
            const bankDetailsDiv = document.getElementById('bank-details');

            if (!selectedOption || selectedOption.value === "") {
                bankDetailsDiv.classList.add('hidden');
                return;
            }

            const bankName = selectedOption.textContent.split(' - ')[0];
            const accountName = selectedOption.textContent.split(' - ')[1];
            const accountNumber = selectedOption.textContent.split(' - ')[2];

            document.getElementById('bankName').textContent = bankName;
            document.getElementById('accountNumber').textContent = accountNumber;
            document.getElementById('accountName').textContent = accountName;

            bankDetailsDiv.classList.remove('hidden');
        }

        function showLoading() {
            const spinner = document.getElementById('loading-spinner');
            spinner.style.display = 'inline-block';
        }
    </script>
@endsection
