@extends('frontend.layouts.app')
@section('title', 'Pengaturan Profil')
@section('content')
    <div class="md:w-4/6 2xl:w-4/6 mx-auto mt-20 p-4 md:p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            @include('frontend.layouts.components.menuprofile')

            <div class="relative col-span-2">
                <div class="flex flex-col w-full p-6 bg-gray-100 shadow-md rounded-lg">
                    <h2 class="text-xl font-semibold mb-4 text-gray-800">Profile Settings</h2>

                    <form action="{{ route('profile.update') }}" method="POST" id="profileForm">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" name="username" id="username"
                                value="{{ old('username', auth()->user()->username) }}"
                                class="input-readonly mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 text-black"
                                readonly>
                            @error('username')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email"
                                value="{{ old('email', auth()->user()->email) }}"
                                class="input-readonly mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 text-black"
                                readonly>
                            @error('email')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                            <input type="password" name="password" id="password"
                                class="input-readonly mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 text-black"
                                readonly>
                            @error('password')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                                Password Baru</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="input-readonly mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 text-black"
                                readonly>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button id="editButton" type="button"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                                Edit Profile
                            </button>
                            <button id="cancelButton" type="button"
                                class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 hidden">
                                Cancel
                            </button>
                            <button type="submit" id="submitButton"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 hidden">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('editButton').addEventListener('click', function() {
            const inputs = document.querySelectorAll('#profileForm input');
            inputs.forEach(input => {
                input.removeAttribute('readonly');
                input.classList.remove('input-readonly');
            });
            document.getElementById('editButton').classList.add('hidden');
            document.getElementById('cancelButton').classList.remove('hidden');
            document.getElementById('submitButton').classList.remove('hidden');
        });

        document.getElementById('cancelButton').addEventListener('click', function() {
            const inputs = document.querySelectorAll('#profileForm input');
            inputs.forEach(input => {
                input.setAttribute('readonly', true);
                input.classList.add('input-readonly');
            });
            document.getElementById('editButton').classList.remove('hidden');
            document.getElementById('cancelButton').classList.add('hidden'); 
            document.getElementById('submitButton').classList.add('hidden');
        });
    </script>

    <style>
        .input-readonly {
            background-color: #e5e7eb;
            color: #6b7280;
        }
    </style>
@endsection
