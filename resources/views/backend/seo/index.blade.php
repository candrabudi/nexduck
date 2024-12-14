@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Advanced SEO Settings</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('backoffice.sitemap.generate') }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-primary">Generate Sitemap</button>
                    </form>
                    <form action="{{ route('backoffice.seo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- SEO Title -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">SEO Title</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="seo_title"
                                    value="{{ old('seo_title', $seo->seo_title ?? '') }}">
                            </div>
                        </div>

                        <!-- SEO Description -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">SEO Description</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="seo_description" class="form-control" rows="5">{{ old('seo_description', $seo->seo_description ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- SEO Keywords -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">SEO Keywords</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="seo_keywords"
                                    value="{{ old('seo_keywords', $seo->seo_keywords ?? '') }}">
                            </div>
                        </div>

                        <!-- Google Analytics -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Google Analytics Tracking ID</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="google_analytics"
                                    value="{{ old('google_analytics', $seo->google_analytics ?? '') }}">
                            </div>
                        </div>

                        <!-- Facebook Pixel -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Facebook Pixel ID</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="facebook_pixel"
                                    value="{{ old('facebook_pixel', $seo->facebook_pixel ?? '') }}">
                            </div>
                        </div>

                        <!-- Google Search Console -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Google Search Console Verification Code</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="google_search_console"
                                    value="{{ old('google_search_console', $seo->google_search_console ?? '') }}">
                            </div>
                        </div>

                        <!-- Facebook App ID -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Facebook App ID</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="facebook_app_id"
                                    value="{{ old('facebook_app_id', $seo->facebook_app_id ?? '') }}">
                            </div>
                        </div>

                        <!-- Twitter Card -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Twitter Card Type</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="twitter_card"
                                    value="{{ old('twitter_card', $seo->twitter_card ?? '') }}">
                            </div>
                        </div>

                        <!-- Open Graph Title -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">OG Title</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="og_title"
                                    value="{{ old('og_title', $seo->og_title ?? '') }}">
                            </div>
                        </div>

                        <!-- Open Graph Description -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">OG Description</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="og_description" class="form-control" rows="5">{{ old('og_description', $seo->og_description ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- Twitter Title -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Twitter Title</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="twitter_title"
                                    value="{{ old('twitter_title', $seo->twitter_title ?? '') }}">
                            </div>
                        </div>

                        <!-- Twitter Description -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Twitter Description</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="twitter_description" class="form-control" rows="5">{{ old('twitter_description', $seo->twitter_description ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- OG Image Upload -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">OG Image</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="og_image">
                                @if($seo && $seo->og_image)
                                    <p class="mt-2"><a href="{{ asset('storage/' . $seo->og_image) }}" target="_blank">Current OG Image</a></p>
                                @endif
                            </div>
                        </div>

                        <!-- Twitter Image Upload -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Twitter Image</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="twitter_image">
                                @if($seo && $seo->twitter_image)
                                    <p class="mt-2"><a href="{{ asset('storage/' . $seo->twitter_image) }}" target="_blank">Current Twitter Image</a></p>
                                @endif
                            </div>
                        </div>

                        <!-- Sitemap File Upload -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Upload Sitemap (XML)</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="sitemap_file">
                                @if($seo && $seo->sitemap_url)
                                    <p class="mt-2"><a href="{{ asset('storage/' . $seo->sitemap_url) }}" target="_blank">Current Sitemap</a></p>
                                @endif
                            </div>
                        </div>

                        <!-- Robots File Upload -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Upload Robots (TXT)</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="robots_file">
                                @if($seo && $seo->robots_txt)
                                    <p class="mt-2"><a href="{{ asset('storage/' . $seo->robots_txt) }}" target="_blank">Current Robots</a></p>
                                @endif
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Save Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
