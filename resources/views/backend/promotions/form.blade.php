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
                                <label for="title">Promotion Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('title', $promotion->title ?? '') }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="short_desc">Short Description <strong>(for SEO)</strong></label>
                                <textarea class="form-control" name="short_desc">{{ old('short_desc', $promotion->short_desc ?? '') }}</textarea>
                            </div>

                            <div class="form-group mt-3">
                                <label for="desc">Promotion Content</label>
                                <textarea class="form-control" id="classic-editor" name="desc">{{ old('desc', $promotion->desc ?? '') }}</textarea>
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
                                <label for="type">Promotion Type</label>
                                <select class="form-control" id="type" name="type" required>
                                    <option value="turnover" {{ old('type', $promotion->type ?? '') == 'turnover' ? 'selected' : '' }}>Turnover</option>
                                    <option value="winover" {{ old('type', $promotion->type ?? '') == 'winover' ? 'selected' : '' }}>Winover</option>
                                    <option value="post" {{ old('type', $promotion->type ?? '') == 'post' ? 'selected' : '' }}>Post</option>
                                </select>
                            </div>

                            <!-- New Fields -->
                            <div class="form-group mt-3">
                                <label for="provider_category">Provider Category</label>
                                <select class="form-control" id="provider_category" name="provider_category" required>
                                    <option value="slot" {{ old('provider_category', $promotion->provider_category ?? '') == 'slot' ? 'selected' : '' }}>Slot</option>
                                    <option value="live_casino" {{ old('provider_category', $promotion->provider_category ?? '') == 'live_casino' ? 'selected' : '' }}>Live Casino</option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="bonus_type">Bonus Type</label>
                                <select class="form-control" id="bonus_type" name="bonus_type" required>
                                    <option value="daily_bonus" {{ old('bonus_type', $promotion->bonus_type ?? '') == 'daily_bonus' ? 'selected' : '' }}>Daily Bonus</option>
                                    <option value="new_member" {{ old('bonus_type', $promotion->bonus_type ?? '') == 'new_member' ? 'selected' : '' }}>New Member</option>
                                    <option value="old_member" {{ old('bonus_type', $promotion->bonus_type ?? '') == 'old_member' ? 'selected' : '' }}>Old Member</option>
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
                                <label for="is_claim">Claim Promotion?</label>
                                <select class="form-control" id="is_claim" name="is_claim" required>
                                    <option value="">Select Claimable?</option>
                                    <option value="1" {{ old('is_claim', $promotion->is_claim ?? '') == 1 ? 'selected' : '' }}>Claim</option>
                                    <option value="0" {{ old('is_claim', $promotion->is_claim ?? '') == 0 ? 'selected' : '' }}>No Claim</option>
                                </select>
                            </div>

                            <!-- Claim Inputs -->
                            <div id="claim-inputs" style="display: none;">
                                <div class="form-group mt-3">
                                    <label for="min_deposit">Min Deposit</label>
                                    <input type="number" class="form-control" id="min_deposit" name="min_deposit"
                                        value="{{ old('min_deposit', $promotion->min_deposit ?? 0) }}">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="max_deposit">Max Deposit</label>
                                    <input type="number" class="form-control" id="max_deposit" name="max_deposit"
                                        value="{{ old('max_deposit', $promotion->max_deposit ?? 0) }}">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="max_withdraw">Max Withdraw</label>
                                    <input type="number" class="form-control" id="max_withdraw" name="max_withdraw"
                                        value="{{ old('max_withdraw', $promotion->max_withdraw ?? 0) }}">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="target">Target</label>
                                    <input type="number" class="form-control" id="target" name="target"
                                        value="{{ old('target', $promotion->target ?? 0) }}">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="percentage_bonus">Percentage Bonus</label>
                                    <input type="number" class="form-control" id="percentage_bonus" name="percentage_bonus"
                                        value="{{ old('percentage_bonus', $promotion->percentage_bonus ?? 0) }}">
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="image">Thumbnail Image</label>
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

        // Script to toggle claim inputs
        document.addEventListener('DOMContentLoaded', function () {
            const isClaimSelect = document.getElementById('is_claim');
            const claimInputs = document.getElementById('claim-inputs');

            function toggleClaimInputs() {
                if (isClaimSelect.value === '1') {
                    claimInputs.style.display = 'block';
                } else {
                    claimInputs.style.display = 'none';
                }
            }

            // Run on page load
            toggleClaimInputs();

            // Event listener for the dropdown
            isClaimSelect.addEventListener('change', toggleClaimInputs);
        });
    </script>
@endsection
