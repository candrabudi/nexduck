@extends('frontend.layouts.app')

@section('content')
    <div class="md:w-4/6 2xl:w-4/6 mx-auto my-16 p-4">
        <div class="relative mb-3 mt-5 flex flex-col items-start justify-start lg:mb-7 lg:items-center lg:justify-center">
            <div class="flex items-center mb-1 z-50 lg:mb-3">
                <h2 class="min-w-max text-text-default text-xl font-semibold leading-7 lg:text-3xl lg:font-bold lg:leading-8">
                    Promosi
                </h2>
            </div>
            <p class="text-base hidden max-w-sm text-center font-medium text-text-warning lg:block">
                Ganda Kegembiraan: Promosi Eksklusif untuk Penggemar Kasino & Taruhan Olahraga!
            </p>
        </div>

        <div class="reel-base" style="height: auto;">
            <div class="relative flex justify-center items-center lg:mx-auto">
                <nav aria-label="Tabs"
                    class="inline-flex border-b border-border-general-subdued p-1 space-x-2 bg-bgr-lighter border-none w-auto rounded-full focus:outline-none focus:ring-0 focus-visible:outline-focus-ring-primary mb-4 lg:mb-7">
                    <button role="tab" tabindex="0" type="button"
                        class="group text-sm leading-5 font-medium py-2 px-6 transition-all duration-200 cursor-pointer flex items-center space-x-1 -mb-[1px] hover:border-b hover:border-base-primary outline-none border-b border-base-primary hover:bg-bgr-lightest hover:text-text-default bg-bgr-lightest text-text-default rounded-full focus:ring-offset-0 focus-visible:outline-0 focus-visible:outline-offset-0 focus-visible:outline-none">
                        <span class="[&>svg]:fill-current"></span>
                        <span>Semua Bonus</span>
                        <span class="[&>svg]:fill-current"></span>
                    </button>
                    <button role="tab" tabindex="1" type="button"
                        class="group text-sm leading-5 font-medium py-2 px-6 transition-all duration-200 cursor-pointer border-b border-border-general-subdued flex items-center space-x-1 -mb-[1px] hover:border-b hover:border-base-primary outline-none text-text-default border-none hover:bg-bgr-lightest hover:text-text-default rounded-full focus:ring-offset-0 focus-visible:outline-0 focus-visible:outline-offset-0 focus-visible:outline-none">
                        <span class="[&>svg]:fill-current"></span>
                        <span>Paket Selamat Datang</span>
                        <span class="[&>svg]:fill-current"></span>
                    </button>
                    <button role="tab" tabindex="2" type="button"
                        class="group text-sm leading-5 font-medium py-2 px-6 transition-all duration-200 cursor-pointer border-b border-border-general-subdued flex items-center space-x-1 -mb-[1px] hover:border-b hover:border-base-primary outline-none text-text-default border-none hover:bg-bgr-lightest hover:text-text-default rounded-full focus:ring-offset-0 focus-visible:outline-0 focus-visible:outline-offset-0 focus-visible:outline-none">
                        <span class="[&>svg]:fill-current"></span>
                        <span>Bonus Isi Ulang</span>
                        <span class="[&>svg]:fill-current"></span>
                    </button>
                    <button role="tab" tabindex="3" type="button"
                        class="group text-sm leading-5 font-medium py-2 px-6 transition-all duration-200 cursor-pointer border-b border-border-general-subdued flex items-center space-x-1 -mb-[1px] hover:border-b hover:border-base-primary outline-none text-text-default border-none hover:bg-bgr-lightest hover:text-text-default rounded-full focus:ring-offset-0 focus-visible:outline-0 focus-visible:outline-offset-0 focus-visible:outline-none">
                        <span class="[&>svg]:fill-current"></span>
                        <span>Penawaran Eksklusif</span>
                        <span class="[&>svg]:fill-current"></span>
                    </button>
                    <button role="tab" tabindex="4" type="button"
                        class="group text-sm leading-5 font-medium py-2 px-6 transition-all duration-200 cursor-pointer border-b border-border-general-subdued flex items-center space-x-1 -mb-[1px] hover:border-b hover:border-base-primary outline-none text-text-default border-none hover:bg-bgr-lightest hover:text-text-default rounded-full focus:ring-offset-0 focus-visible:outline-0 focus-visible:outline-offset-0 focus-visible:outline-none">
                        <span class="[&>svg]:fill-current"></span>
                        <span>Olahraga</span>
                        <span class="[&>svg]:fill-current"></span>
                    </button>
                </nav>
            </div>
        </div>

        @if ($promotions->isEmpty())
            <div class="empty-data flex flex-col justify-center items-center text-center my-36">
                <img src="/assets/images/no-results.png" alt="" class="w-auto h-auto max-h-[300px]">
                <h3>Tidak ada data untuk ditampilkan</h3>
            </div>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($promotions as $promotion)
                    <a href="{{ route('promotion.show', $promotion->slug) }}"
                        class="relative aspect-[2/1] cursor-pointer overflow-hidden rounded-xl sm:hover:-translate-y-1.5 sm:hover:transition sm:hover:duration-500 sm:hover:ease-in-out">
                        <div
                            class="inline-flex justify-between px-1.5 py-1 items-center space-x-1 py-1 px-4 text-xs font-normal leading-none rounded-full absolute right-3 top-3 bg-bgr-lightest text-text-default">
                            <span>{{ $promotion->date }}</span>
                        </div>
                        <img alt="{{ $promotion->title }}" loading="lazy" decoding="async"
                            class="object-cover w-full h-full" src="{{ $promotion->thumbnail }}">

                        <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-black to-transparent text-white">
                            <h3 class="text-lg font-semibold">{{ $promotion->title }}</h3>
                            <p class="text-sm mt-1">{{ Str::limit($promotion->short_desc, 100) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endsection
