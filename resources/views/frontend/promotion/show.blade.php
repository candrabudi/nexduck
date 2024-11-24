@extends('frontend.layouts.app')

@section('content')
<div class="container mx-auto my-16 px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8" style="padding: 20px;">
        <!-- Bagian Konten Utama -->
        <div class="md:col-span-2" style="margin-right: 20px;">
            <div class="promotion-detail bg-white shadow-md rounded-lg p-6">
                <div class="header-title mb-6">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-black">{{ $promotion->title }}</h1>
                    <p class="text-sm text-gray-500">
                        Dibuat pada: {{ $promotion->created_at->format('d M Y') }}
                    </p>
                    <p class="text-sm text-gray-700">
                        Periode Promosi: 
                        <span class="font-semibold">{{ \Carbon\Carbon::parse($promotion->start_date)->format('d M Y') }}</span> 
                        - 
                        <span class="font-semibold">{{ \Carbon\Carbon::parse($promotion->end_date)->format('d M Y') }}</span>
                    </p>
                </div>
                
    
                <!-- Gambar -->
                <img src="{{ $promotion->image }}" alt="{{ $promotion->title }}" class="w-full h-64 object-cover rounded-lg mb-4">

                <!-- Deskripsi -->
                <p class="text-gray-800 text-lg leading-relaxed mb-4" style="color: #333;">
                    {!! $promotion->desc !!}
                </p>

                <!-- Tombol Kembali -->
                <a href="{{ route('promotion.index') }}" class="inline-block mt-6 text-blue-500 hover:underline">
                    &larr; Kembali ke daftar promosi
                </a>
            </div>
        </div>

        <div>
            <div class="bg-gray-100 shadow-md rounded-lg p-4">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Promosi Lainnya</h2>
                @forelse ($otherPromotions as $otherPromotion)
                    <div class="mb-4">
                        <a href="{{ route('promotion.show', $otherPromotion->id) }}" class="block">
                            <img src="{{ $otherPromotion->image }}" alt="{{ $otherPromotion->name }}"
                                class="w-full h-32 object-cover rounded-lg mb-2">
                            <h3 class="text-lg font-semibold text-gray-800 hover:text-blue-500">
                                {{ $otherPromotion->name }}
                            </h3>
                        </a>
                        <p class="text-sm text-gray-500">
                            {{ $otherPromotion->created_at->format('d M Y') }}
                        </p>
                    </div>
                @empty
                    <p class="text-gray-500">Tidak ada promosi lain untuk saat ini.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
