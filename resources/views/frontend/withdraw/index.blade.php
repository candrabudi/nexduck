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
            color: white; /* White text */
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
                    <form action="" method="POST">
                        @csrf
                        <div class="mt-5">
                            <label for="bankMethod" class="mb-2 text-gray-500">Bank</label>
                            <select id="bankMethod" name="bankMethod" class="block w-full p-2 bg-white dark:bg-gray-900 border rounded-md" required>
                                <option value="">Select Bank</option>
                                @foreach ($memberbanks as $ma)
                                    <option value="{{ $ma->id }}">{{ $ma->bank->bank_code. ' - ' .$ma->account_name .' - '. $ma->account_number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="bank-details" class="details-box hidden">

                        </div>

                        <div class="mt-3">
                            <p class="mb-2 text-gray-500">IDR&nbsp;20,000 - IDR&nbsp;50,000,000</p>
                            <div class="w-full flex items-center justify-between bg-white dark:bg-gray-900 rounded py-1">
                                <div class="flex w-full">
                                    <input id="amountInput" type="number" name="amount" min="20000" max="50000000" step="1000" class="appearance-none border border-gray-300 rounded-md bg-transparent w-full p-2" placeholder="Enter amount here" required>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 w-full flex items-center justify-center">
                            <button type="submit" class="ui-button-blue w-full">
                                <span class="uppercase font-semibold text-sm">Withdraw</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
