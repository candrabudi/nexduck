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
                        <form action="{{ isset($promotion) ? route('backoffice.promotions.update', $promotion->id) : route('backoffice.promotions.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($promotion))
                                @method('PUT')
                            @endif
                            <div class="form-group mt-3">
                                <label for="name">Promotion Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $promotion->name ?? '') }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="description">Promotion Description</label>
                                <textarea class="form-control" id="classic-editor" name="description">{{ old('description', $promotion->description ?? '') }}</textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date"
                                    value="{{ old('start_date', $promotion->start_date ?? '') }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="end_date">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                    value="{{ old('end_date', $promotion->end_date ?? '') }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type" required>
                                    <option value="turnover" {{ old('type', $promotion->type ?? '') == 'turnover' ? 'selected' : '' }}>Turnover</option>
                                    <option value="winover" {{ old('type', $promotion->type ?? '') == 'winover' ? 'selected' : '' }}>Winover</option>
                                    <option value="balance" {{ old('type', $promotion->type ?? '') == 'balance' ? 'selected' : '' }}>Balance</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="status">Status</label>
                                <select class="form-control" id="promotion_status" name="promotion_status" required>
                                    <option value="1" {{ old('promotion_status', $promotion->status ?? '') == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('promotion_status', $promotion->status ?? '') == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
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

@section('scripts')
    <script src="{{ asset('backoffice/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#classic-editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
