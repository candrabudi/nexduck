@extends('frontend.layouts.app')

@section('content')
    <div class="md:w-4/6 2xl:w-4/6 mx-auto my-16 p-4">
        <div class="header-title flex justify-between">
            <h1 class="mb-4 text-3xl leading-none text-gray-900 md:text-3xl lg:text-3xl dark:text-white">
                <span
                    class="bg-blue-100 text-blue-800 text-2xl font-semibold me-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-2">
                    Promosi
                </span>
                List
            </h1>
            <p class="text-2xl flex items-center justify-center">
                Total <strong>({{ $promotions->count() }})</strong>
            </p>
        </div>

        @if($promotions->isEmpty())
            <div class="empty-data flex flex-col justify-center items-center text-center my-36">
                <img src="/assets/images/no-results.png" alt="" class="w-auto h-auto max-h-[300px]">
                <h3>No data to show</h3>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($promotions as $promotion)
                    <div class="card bg-white shadow-md rounded-lg" style="margin-left: 20px;padding: 10px; box-sizing: border-box;">
                        <img src="{{ $promotion->image }}" alt="{{ $promotion->name }}" 
                             class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h2 class="text-lg font-semibold" style="color: #333">{{ $promotion->name }}</h2>
                            <span class="text-gray-500 text-xs block mt-2">{{ $promotion->created_at->format('d M Y') }}</span>
                            <a href="{{ route('promotion.show', $promotion->slug) }}" class="inline-block mt-4 text-blue-500 hover:underline" style="background: #333; padding: 5px;border-radius: 4px; width: 30%; text-align: center;">Baca</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
