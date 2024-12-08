@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12 mt-3">
                    <div class="card h-auto">
                        <div class="card-body">

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('backoffice.promotions.update', ['id' => $promotion->id]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Title -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ old('title', $promotion->title) }}" required>
                                </div>

                                <!-- Slug -->
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" class="form-control" name="slug"
                                        value="{{ old('slug', $promotion->slug) }}" required>
                                </div>

                                <!-- Short Description -->
                                <div class="mb-3">
                                    <label for="short_desc" class="form-label">Short Description</label>
                                    <textarea class="form-control" name="short_desc" required>{{ old('short_desc', $promotion->short_desc) }}</textarea>
                                </div>

                                <!-- Content (CKEditor) -->
                                <div class="mb-3">
                                    <label for="content" class="form-label">Content</label>
                                    <textarea class="form-control" id="contentEditor" name="content" required>{{ old('content', $promotion->content) }}</textarea>
                                </div>

                                <!-- Start Date -->
                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" name="start_date"
                                        value="{{ old('start_date', $promotion->start_date) }}" required>
                                </div>

                                <!-- End Date -->
                                <div class="mb-3">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="date" class="form-control" name="end_date"
                                        value="{{ old('end_date', $promotion->end_date) }}" required>
                                </div>

                                <!-- Thumbnail -->
                                <div class="mb-3">
                                    <label for="thumbnail" class="form-label">Thumbnail</label>
                                    <input type="file" class="form-control" name="thumbnail">
                                </div>

                                <!-- Promotion Details -->
                                <h4>Promotion Details</h4>

                                <!-- Min Deposit -->
                                <div class="mb-3">
                                    <label for="min_deposit" class="form-label">Min Deposit</label>
                                    <input type="number" class="form-control" name="min_deposit"
                                        value="{{ old('min_deposit', $promotion->details->min_deposit) }}" required>
                                </div>

                                <!-- Max Deposit -->
                                <div class="mb-3">
                                    <label for="max_deposit" class="form-label">Max Deposit</label>
                                    <input type="number" class="form-control" name="max_deposit"
                                        value="{{ old('max_deposit', $promotion->details->max_deposit) }}" required>
                                </div>

                                <!-- Max Withdraw -->
                                <div class="mb-3">
                                    <label for="max_withdraw" class="form-label">Max Withdraw</label>
                                    <input type="number" class="form-control" name="max_withdraw"
                                        value="{{ old('max_withdraw', $promotion->details->max_withdraw) }}" required>
                                </div>

                                <!-- Turn Over -->
                                <div class="mb-3">
                                    <label for="turn_over" class="form-label">Turn Over</label>
                                    <input type="number" class="form-control" name="turn_over"
                                        value="{{ old('turn_over', $promotion->details->turn_over) }}" required>
                                </div>

                                <!-- Percentage Bonus -->
                                <div class="mb-3">
                                    <label for="percentage_bonus" class="form-label">Percentage Bonus</label>
                                    <input type="number" class="form-control" name="percentage_bonus"
                                        value="{{ old('percentage_bonus', $promotion->details->percentage_bonus) }}"
                                        required>
                                </div>

                                <!-- Promotion Type -->
                                <div class="mb-3">
                                    <label for="promotion_type" class="form-label">Promotion Type</label>
                                    <select class="form-control" name="promotion_type" required>
                                        <option value="winover"
                                            {{ old('promotion_type', $promotion->promotion_type) == 'winover' ? 'selected' : '' }}>
                                            Winover
                                        </option>
                                        <option value="turnover"
                                            {{ old('promotion_type', $promotion->promotion_type) == 'turnover' ? 'selected' : '' }}>
                                            Turnover
                                        </option>
                                        <option value="post"
                                            {{ old('promotion_type', $promotion->promotion_type) == 'post' ? 'selected' : '' }}>
                                            Post</option>
                                    </select>
                                </div>

                                <!-- Provider Category -->
                                <div class="mb-3">
                                    <label for="provider_category" class="form-label">Provider Category</label>
                                    <select class="form-control" name="provider_category">
                                        <option value="slot"
                                            {{ old('provider_category', $promotion->provider_category) == 'slot' ? 'selected' : '' }}>
                                            Slot
                                        </option>
                                        <option value="casino"
                                            {{ old('provider_category', $promotion->provider_category) == 'casino' ? 'selected' : '' }}>
                                            Casino
                                        </option>
                                    </select>
                                </div>

                                <!-- Bonus Type -->
                                <div class="mb-3">
                                    <label for="bonus_type" class="form-label">Bonus Type</label>
                                    <select class="form-control" name="bonus_type">
                                        <option value="daily"
                                            {{ old('bonus_type', $promotion->bonus_type) == 'daily' ? 'selected' : '' }}>
                                            Daily</option>
                                        <option value="old"
                                            {{ old('bonus_type', $promotion->bonus_type) == 'old' ? 'selected' : '' }}>
                                            Old
                                        </option>
                                        <option value="new"
                                            {{ old('bonus_type', $promotion->bonus_type) == 'new' ? 'selected' : '' }}>
                                            New
                                        </option>
                                    </select>
                                </div>
                                
                                <!-- Bonus Type -->
                                <div class="mb-3">
                                    <label for="status" class="form-label">Bonus Type</label>
                                    <select class="form-control" name="status">
                                        <option value="daily"
                                            {{ old('status', $promotion->status) == 'active' ? 'selected' : '' }}>
                                            Publish</option>
                                        <option value="old"
                                            {{ old('status', $promotion->status) == 'inactive' ? 'selected' : '' }}>
                                            Draft
                                        </option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Promotion</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('backoffice/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backoffice/vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('backoffice/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- Style css -->
    <link class="main-css" href="{{ asset('backoffice/css/style.css') }}" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <style>
        /* Tambahkan custom style untuk editor jika diperlukan */
        .ck-editor__editable {
            min-height: 200px; /* Setidaknya tinggi 200px */
            background-color: #f4f4f4; /* Warna latar belakang */
            font-family: Arial, sans-serif; /* Setel font */
            font-size: 16px; /* Ukuran font */
        }
    </style>
@endsection
@section('scripts')
    <script src="{{ asset('backoffice/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js') }}"></script>


    <!-- Ck-editor -->
    <script src="{{ asset('backoffice/vendor/ckeditor/ckeditor.js') }}"></script>

    <!--select plugins-file-->
    <script src="{{ asset('backoffice/vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backoffice/js/plugins-init/select2-init.js') }}"></script>


    <script src="{{ asset('backoffice/js/dashboard/cms.js') }}"></script>
    <script src="{{ asset('backoffice/js/deznav-init.js') }}"></script>
    <script src="{{ asset('backoffice/js/custom.min.js') }}"></script>
    <script src="{{ asset('backoffice/js/demo.js') }}"></script>
    <script src="{{ asset('backoffice/js/styleSwitcher.js') }}"></script>
    <script>
        // Inisialisasi CKEditor pada textarea dengan id 'ckeditor'
        ClassicEditor
            .create(document.querySelector('#contentEditor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function() {
            // Initialize datepicker
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd', // Date format
                autoclose: true // Close after selecting date
            });
        });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").on('change', function() {

            readURL(this);
        });
        $('.remove-img').on('click', function() {
            var imageUrl = "images/no-img-avatar.png";
            $('.avatar-preview, #imagePreview').removeAttr('style');
            $('#imagePreview').css('background-image', 'url(' + imageUrl + ')');
        });
    </script>
@endsection
