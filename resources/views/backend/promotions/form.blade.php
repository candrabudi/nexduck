@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-12 mt-3">
                <div class="card h-auto">
                    <div class="card-body">
                        <form action="{{ route('backoffice.promotions.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Title -->
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
                            </div>

                            <!-- Slug -->
                            <div class="mb-3">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                            </div>

                            <!-- Short Description -->
                            <div class="mb-3">
                                <label class="form-label">Short Description</label>
                                <textarea class="form-control" name="short_desc">{{ old('short_desc') }}</textarea>
                            </div>

                            <!-- Content -->
                            <label class="form-label">Content</label>
                            <textarea class="form-control" id="contentEditor" name="content">{{ old('content') }}</textarea>

                            <div class="row mt-3">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Thumbnail</label>
                                    <input type="file" class="form-control" name="thumbnail">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Min Deposit -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Min Deposit</label>
                                    <input type="number" class="form-control" name="min_deposit" value="{{ old('min_deposit') }}">
                                </div>

                                <!-- Max Deposit -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Max Deposit</label>
                                    <input type="number" class="form-control" name="max_deposit" value="{{ old('max_deposit') }}">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Max Withdraw -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Max Withdraw</label>
                                    <input type="number" class="form-control" name="max_withdraw" value="{{ old('max_withdraw') }}">
                                </div>

                                <!-- Turn Over -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Turn Over</label>
                                    <input type="number" class="form-control" name="turn_over" value="{{ old('turn_over') }}">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Percentage Bonus -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Percentage Bonus</label>
                                    <input type="number" class="form-control" name="percentage_bonus" value="{{ old('percentage_bonus') }}">
                                </div>
                            </div>

                            <!-- Start Date -->
                            <div class="mb-3">
                                <label class="form-label">Start Date</label>
                                <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}">
                            </div>

                            <!-- End Date -->
                            <div class="mb-3">
                                <label class="form-label">End Date</label>
                                <input type="date" class="form-control" name="end_date" value="{{ old('end_date') }}">
                            </div>

                            <!-- Promotion Type -->
                            <div class="mb-3">
                                <label class="form-label">Promotion Type</label>
                                <select class="form-control" name="promotion_type">
                                    <option value="winover" {{ old('promotion_type') == 'winover' ? 'selected' : '' }}>Winover</option>
                                    <option value="turnover" {{ old('promotion_type') == 'turnover' ? 'selected' : '' }}>Turnover</option>
                                    <option value="post" {{ old('promotion_type') == 'post' ? 'selected' : '' }}>Post</option>
                                </select>
                            </div>

                            <!-- Provider Category -->
                            <div class="mb-3">
                                <label class="form-label">Provider Category</label>
                                <select class="form-control" name="provider_category">
                                    <option value="slot" {{ old('provider_category') == 'slot' ? 'selected' : '' }}>Slot</option>
                                    <option value="casino" {{ old('provider_category') == 'casino' ? 'selected' : '' }}>Casino</option>
                                </select>
                            </div>

                            <!-- Bonus Type -->
                            <div class="mb-3">
                                <label class="form-label">Bonus Type</label>
                                <select class="form-control" name="bonus_type">
                                    <option value="daily" {{ old('bonus_type') == 'daily' ? 'selected' : '' }}>Daily</option>
                                    <option value="old" {{ old('bonus_type') == 'old' ? 'selected' : '' }}>Old</option>
                                    <option value="new" {{ old('bonus_type') == 'new' ? 'selected' : '' }}>New</option>
                                </select>
                            </div>
                            <!-- Bonus Type -->
                            <div class="mb-3">
                                <label class="form-label">Bonus Type</label>
                                <select class="form-control" name="status">
                                    <option value="daily" {{ old('status') == 'active' ? 'selected' : '' }}>Publish</option>
                                    <option value="old" {{ old('status') == 'inactive' ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Create Promotion</button>
                            </div>
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
