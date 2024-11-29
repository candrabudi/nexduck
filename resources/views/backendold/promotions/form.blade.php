@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">{{ isset($promotion) ? 'Edit Promotion' : 'Create Promotion' }}</h4>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form
                            action="{{ isset($promotion) ? route('backoffice.promotions.update', $promotion->id) : route('backoffice.promotions.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($promotion))
                                @method('PUT')
                            @endif

                            <!-- Title and Slug (side-by-side) -->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="title">Promotion Title</label>
                                    <input type="text" class="form-control border-input" id="title" name="title"
                                        value="{{ old('title', $promotion->title ?? '') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control border-input" id="slug" name="slug"
                                        value="{{ old('slug', $promotion->slug ?? '') }}" readonly required>
                                </div>
                            </div>

                            <!-- Short Description and Content (side-by-side) -->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="short_desc">Short Description <strong>(for SEO)</strong></label>
                                    <textarea class="form-control border-input" name="short_desc">{{ old('short_desc', $promotion->short_desc ?? '') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="content">Promotion Content</label>
                                <textarea class="form-control border-input" id="classic-editor" name="content">{{ old('content', $promotion->content ?? '') }}</textarea>
                            </div>

                            <!-- Start Date and End Date (side-by-side) -->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" class="form-control border-input" id="start_date"
                                        name="start_date" value="{{ old('start_date', $promotion->start_date ?? '') }}"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="end_date">End Date</label>
                                    <input type="date" class="form-control border-input" id="end_date" name="end_date"
                                        value="{{ old('end_date', $promotion->end_date ?? '') }}" required>
                                </div>
                            </div>

                            <!-- Promotion Type and Provider Category (side-by-side) -->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="promotion_type">Promotion Type</label>
                                    <select class="form-control border-input" id="promotion_type" name="promotion_type"
                                        required>
                                        <option value="turnover"
                                            {{ old('promotion_type', $promotion->promotion_type ?? '') == 'turnover' ? 'selected' : '' }}>
                                            Turnover</option>
                                        <option value="winover"
                                            {{ old('promotion_type', $promotion->promotion_type ?? '') == 'winover' ? 'selected' : '' }}>
                                            Winover</option>
                                        <option value="post"
                                            {{ old('promotion_type', $promotion->promotion_type ?? '') == 'post' ? 'selected' : '' }}>
                                            Post</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="provider_category">Provider Category</label>
                                    <select class="form-control border-input" id="provider_category"
                                        name="provider_category">
                                        <option value="slot"
                                            {{ old('provider_category', $promotion->provider_category ?? '') == 'slot' ? 'selected' : '' }}>
                                            Slot</option>
                                        <option value="casino"
                                            {{ old('provider_category', $promotion->provider_category ?? '') == 'casino' ? 'selected' : '' }}>
                                            Casino</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Bonus Type and Status (side-by-side) -->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="bonus_type">Bonus Type</label>
                                    <select class="form-control border-input" id="bonus_type" name="bonus_type">
                                        <option value="daily"
                                            {{ old('bonus_type', $promotion->bonus_type ?? '') == 'daily' ? 'selected' : '' }}>
                                            Daily</option>
                                        <option value="new"
                                            {{ old('bonus_type', $promotion->bonus_type ?? '') == 'new' ? 'selected' : '' }}>
                                            New</option>
                                        <option value="old"
                                            {{ old('bonus_type', $promotion->bonus_type ?? '') == 'old' ? 'selected' : '' }}>
                                            Old</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="status">Status</label>
                                    <select class="form-control border-input" id="status" name="status" required>
                                        <option value="active"
                                            {{ old('status', $promotion->status ?? '') == 'active' ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="inactive"
                                            {{ old('status', $promotion->status ?? '') == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Thumbnail Image -->
                            <div class="form-group">
                                <label for="thumbnail">Thumbnail Image</label>
                                <input type="file" class="form-control border-input" id="thumbnail" name="thumbnail">
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('backoffice.promotions') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .form-control.border-input {
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .form-control.border-input:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('backoffice/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#classic-editor'))
            .catch(error => {
                console.error(error);
            });

        // JavaScript to auto-generate slug from title
        document.getElementById('title').addEventListener('input', function () {
            var title = this.value;
            var slug = title.toLowerCase()
                .replace(/[^a-z0-9]+/g, '-') // Replace non-alphanumeric characters with '-'
                .replace(/^-+/, '') // Remove leading dashes
                .replace(/-+$/, ''); // Remove trailing dashes
            document.getElementById('slug').value = slug;
        });
    </script>
@endsection
