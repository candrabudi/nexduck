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
        background-color: #f9fafb;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        color: #333;
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

    .selected-bank-box {
        background-color: #e0f7fa;
        padding: 10px;
        margin-top: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .selected-bank-box h4 {
        margin: 0;
        font-size: 1.2em;
        font-weight: bold;
    }

    .selected-bank-box p {
        margin: 5px 0;
        font-size: 1em;
    }
</style>

<div class="md:w-4/6 2xl:w-4/6 mx-auto mt-20">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @include('frontend.layouts.components.menuprofile')

        <div class="relative col-span-2">
            <div class="flex flex-col w-full">
                <div class="tabs mb-5 flex justify-between w-full">
                    <button id="tab-bank" class="tab-button w-1/2 py-3" onclick="showTab('bank')">Bank</button>
                    <button id="tab-ewallet" class="tab-button w-1/2 py-3" onclick="showTab('ewallet')">Ewallet</button>
                </div>

                <!-- Tab Bank -->
                <div id="tab-content-bank" class="tab-content">
                    <form id="bankForm" action="{{ route('deposit.store') }}" method="POST" onsubmit="showLoading('bank')">
                        @csrf
                        <div class="mt-5">
                            <label for="bankMethod" class="mb-2 text-gray-500">Pilih Bank</label>
                            <select id="bankMethod" name="admin_bank_id" class="block w-full p-2 bg-white dark:bg-gray-900 border rounded-md" onchange="showBankDetails(this)" required>
                                <option value="">Pilih Bank</option>
                                @foreach ($banks as $bank)
                                    <option value="{{ e($bank['bank_code']) }}" data-bank="{{ e(json_encode($bank)) }}">{{ e($bank['bank_name']) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Box untuk menampilkan bank yang dipilih -->
                        <div id="selected-bank-box" class="selected-bank-box hidden">
                            <h4>Bank yang Dipilih:</h4>
                            <p id="selected-bank-name"></p>
                            <p id="selected-bank-account"></p>
                            <p id="selected-bank-account-number"></p>
                        </div>

                        <div id="bank-details" class="details-box hidden"></div>

                        <div class="mt-5">
                            <label class="mb-2 text-gray-500">Rekomendasi Deposit</label>
                            <div class="grid grid-cols-5 gap-4 w-full">
                                @foreach ([50000, 100000, 150000, 200000, 250000] as $amount)
                                    <button type="button" onclick="setAmount('bank', {{ $amount }})" class="recommendation-button w-full py-2 text-center">{{ number_format($amount, 0, ',', '.') }}</button>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-3">
                            <label for="amountInputBank" class="mb-2 text-gray-500">Jumlah Deposit</label>
                            <input id="amountInputBank" name="amount" type="number" min="20000" max="50000000" class="appearance-none border border-gray-300 rounded-md bg-transparent w-full p-2" placeholder="Masukkan Jumlah Deposit" required>
                        </div>

                        <div class="mt-5 w-full flex items-center justify-center">
                            <button type="submit" class="ui-button-blue w-full relative">
                                <span class="uppercase font-semibold text-sm">Deposit via Bank</span>
                                <div class="loading-spinner" id="loading-bank"></div>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Tab Ewallet -->
                <div id="tab-content-ewallet" class="tab-content hidden">
                    <form id="ewalletForm" action="{{ route('deposit.store') }}" method="POST" onsubmit="showLoading('ewallet')">
                        @csrf
                        <div class="mt-5">
                            <label for="ewalletMethod" class="mb-2 text-gray-500">Pilih Ewallet</label>
                            <select id="ewalletMethod" name="ewalletMethod" class="block w-full p-2 bg-white dark:bg-gray-900 border rounded-md" onchange="showEwalletDetails(this)" required>
                                <option value="">Pilih Ewallet</option>
                                @foreach ($ewallets as $ewallet)
                                    <option value="{{ e($ewallet['bank_code']) }}" data-ewallet="{{ e(json_encode($ewallet)) }}">{{ e($ewallet['bank_name']) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="ewallet-details" class="details-box hidden"></div>

                        <div class="mt-5">
                            <label class="mb-2 text-gray-500">Rekomendasi Deposit</label>
                            <div class="grid grid-cols-5 gap-4 w-full">
                                @foreach ([50000, 100000, 150000, 200000, 250000] as $amount)
                                    <button type="button" onclick="setAmount('ewallet', {{ $amount }})" class="recommendation-button w-full py-2 text-center">{{ number_format($amount, 0, ',', '.') }}</button>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-3">
                            <label for="amountInputEwallet" class="mb-2 text-gray-500">Jumlah Deposit</label>
                            <input id="amountInputEwallet" name="amount" type="number" min="20000" max="50000000" class="appearance-none border border-gray-300 rounded-md bg-transparent w-full p-2" placeholder="Masukkan Jumlah Deposit" required>
                        </div>

                        <div class="mt-5 w-full flex items-center justify-center">
                            <button type="submit" class="ui-button-blue w-full relative">
                                <span class="uppercase font-semibold text-sm">Deposit via Ewallet</span>
                                <div class="loading-spinner" id="loading-ewallet"></div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        showTab('bank');
    });

    function showTab(tab) {
        document.getElementById('tab-bank').classList.remove('active');
        document.getElementById('tab-ewallet').classList.remove('active');
        document.getElementById('tab-content-bank').classList.add('hidden');
        document.getElementById('tab-content-ewallet').classList.add('hidden');

        if (tab === 'bank') {
            document.getElementById('tab-bank').classList.add('active');
            document.getElementById('tab-content-bank').classList.remove('hidden');
        } else {
            document.getElementById('tab-ewallet').classList.add('active');
            document.getElementById('tab-content-ewallet').classList.remove('hidden');
        }
    }

    function showLoading(type) {
        document.getElementById(`loading-${type}`).style.display = 'inline-block';
    }

    function showBankDetails(select) {
    // Mengambil data JSON dari atribut data-bank
    const bankDataString = select.selectedOptions[0].dataset.bank;
    
    // Memastikan bahwa data JSON yang diterima valid
    try {
        const bankData = JSON.parse(bankDataString);
        
        // Menampilkan detail bank
        const bankDetailsDiv = document.getElementById('bank-details');
        bankDetailsDiv.innerHTML = `
            <div class="mt-2">
                <p>Nama Bank: <strong>${bankData.bank_name}</strong></p>
                <p>Nama Akun: <strong>${bankData.bank_account.account_name}</strong></p>
                <p>Nomor Rekening: <strong>${bankData.bank_account.account_number}</strong></p>
                <button class="copy-button" onclick="copyToClipboard('${bankData.bank_account.account_number}')">Salin Nomor</button>
            </div>
        `;
        bankDetailsDiv.classList.remove('hidden');

        // Update box bank yang dipilih
        document.getElementById('selected-bank-box').classList.remove('hidden');
        document.getElementById('selected-bank-name').innerText = bankData.bank_name;
        document.getElementById('selected-bank-account').innerText = 'Nama Akun: ' + bankData.bank_account.account_name;
        document.getElementById('selected-bank-account-number').innerText = 'Nomor Rekening: ' + bankData.bank_account.account_number;
    } catch (error) {
        console.error('Gagal parsing data JSON:', error);
    }
}


    function showEwalletDetails(select) {
        const ewalletData = JSON.parse(select.selectedOptions[0].dataset.ewallet);
        const ewalletDetailsDiv = document.getElementById('ewallet-details');
        ewalletDetailsDiv.innerHTML = `
            <div class="mt-2">
                <p>Nama Ewallet: <strong>${ewalletData.bank_name}</strong></p>
                <p>Nama Akun: <strong>${ewalletData.bank_account.account_name}</strong></p>
                <p>Nomor Akun: <strong>${ewalletData.bank_account.account_number}</strong></p>
                <button class="copy-button" onclick="copyToClipboard('${ewalletData.bank_account.account_number}')">Salin Nomor</button>
            </div>
        `;
        ewalletDetailsDiv.classList.remove('hidden');
    }

    function setAmount(type, amount) {
        if (type === 'bank') {
            document.getElementById('amountInputBank').value = amount;
        } else {
            document.getElementById('amountInputEwallet').value = amount;
        }
    }

    function copyToClipboard(text) {
        const el = document.createElement('textarea');
        el.value = text;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
        alert('Nomor berhasil disalin!');
    }
</script>
@endsection
