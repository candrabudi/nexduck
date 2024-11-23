@extends('frontend.layouts.app')

@section('content')
    <div class="md:w-4/6 2xl:w-4/6 mx-auto my-16 p-4">
        <div class="header-title">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">{{ $promotion->name }}</h1>
            <p class="text-sm text-gray-500">{{ $promotion->created_at->format('d M Y') }}</p>
        </div>

        <div class="promotion-detail mt-6 bg-white shadow-md rounded-lg p-6">
            <!-- Gambar -->
            <img src="{{ $promotion->image }}" alt="{{ $promotion->name }}" class="w-full h-64 object-cover rounded-lg mb-4">

            <!-- Deskripsi -->
            <p class="text-gray-800 text-lg leading-relaxed">
                {{ $promotion->description }}
            </p>

            <!-- Tombol kembali -->
            <a href="{{ route('promotion.index') }}" class="inline-block mt-6 text-blue-500 hover:underline">
                &larr; Kembali ke daftar promosi
            </a>
        </div>
    </div>
@endsection
