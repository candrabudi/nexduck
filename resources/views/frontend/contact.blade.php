@extends('frontend.layouts.app')
@section('title', 'Kontak Kami')
@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold text-gray-100 text-center mb-8">Hubungi Kami</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gradient-to-b from-gray via-transparent to-transparent shadow-lg rounded-2xl p-6 text-center relative">
                <div class="absolute inset-0 bg-gradient-to-b from-gray via-transparent to-transparent opacity-20 rounded-2xl"></div>
                <div class="relative z-10">
                    <div class="mb-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/2593/2593678.png" alt="Live Chat" class="mx-auto w-20 h-20">
                    </div>
                    <h2 class="text-xl font-semibold text-white mb-2">Live Chat</h2>
                    <p class="text-white leading-relaxed">
                        Chat langsung dengan Customer Service kami untuk solusi cepat.
                    </p>
                    <a href="/live-chat"
                        class="inline-block mt-4 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
                        Mulai Chat
                    </a>
                </div>
            </div>

            <div class="bg-gradient-to-b from-gray via-transparent to-transparent shadow-lg rounded-2xl p-6 text-center relative">
                <div class="absolute inset-0 bg-gradient-to-b from-gray via-transparent to-transparent opacity-20 rounded-2xl"></div>
                <div class="relative z-10">
                    <div class="mb-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/2504/2504941.png" alt="Telegram" class="mx-auto w-20 h-20">
                    </div>
                    <h2 class="text-xl font-semibold text-white mb-2">Telegram</h2>
                    <p class="text-white leading-relaxed">
                        Bergabung dengan kami di Telegram untuk update terbaru dan dukungan.
                    </p>
                    <a href="https://t.me/ONICTOTO"
                        class="inline-block mt-4 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
                        Gabung Sekarang
                    </a>
                </div>
            </div>

            <div class="bg-gradient-to-b from-gray via-transparent to-transparent shadow-lg rounded-2xl p-6 text-center relative">
                <div class="absolute inset-0 bg-gradient-to-b from-gray via-transparent to-transparent opacity-20 rounded-2xl"></div>
                <div class="relative z-10">
                    <div class="mb-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/2504/2504957.png" alt="WhatsApp" class="mx-auto w-20 h-20">
                    </div>
                    <h2 class="text-xl font-semibold text-white mb-2">WhatsApp</h2>
                    <p class="text-white leading-relaxed">
                        Hubungi kami langsung melalui WhatsApp untuk bantuan lebih lanjut.
                    </p>
                    <a href="https://wa.me/123456789"
                        class="inline-block mt-4 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
