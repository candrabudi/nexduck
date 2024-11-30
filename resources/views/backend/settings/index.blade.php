@extends('backend.layouts.app')

@section('content')
    <style>
        #imagePreviewLogo .file-name {
            font-size: 14px;
            color: #555;
            text-align: center;
            padding: 10px;
            display: block;
            background-color: #f8f9fa;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
    </style>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Basic Info</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('backoffice.settings.storeOrUpdate') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Web Icon -->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Web Icon</label>
                            </div>
                            <div class="col-md-9">
                                <div class="d-inline-block position-relative me-4 mb-3 mb-lg-0 account-profile">
                                    <div id="imagePreview" class="rounded-4 profile-avatar">
                                        <img src="{{ $setting->web_logo }}" width="120" alt="">
                                    </div>
                                    <div class="upload-link" title="update">
                                        <input type="file" class="update-flie" id="imageUpload" name="web_icon">
                                        <i class="fa-solid fa-pen-to-square fs-16"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Web Logo -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Web Logo</label>
                            </div>
                            <div class="col-md-9">
                                <div class="d-inline-block position-relative me-4 mb-3 mb-lg-0 account-profile">
                                    <div id="imagePreviewLogo" class="rounded-4 profile-avatar">
                                        <img src="{{ $setting->web_logo }}" width="120" alt="">
                                    </div>

                                    <div class="upload-link" title="update">
                                        <input type="file" class="update-flie" id="imageUploadLogo" name="web_logo">
                                        <i class="fa-solid fa-pen-to-square fs-16"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Web Name -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Web Name</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="web_name"
                                    value="{{ $setting->web_name ?? '' }}">
                            </div>
                        </div>

                        <!-- Web Description -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Web Description</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="web_description"
                                    value="{{ $setting->web_description ?? '' }}">
                            </div>
                        </div>

                        <!-- Web Token -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Web Token</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="web_token"
                                    value="{{ $setting->web_token ?? '' }}">
                            </div>
                        </div>

                        <!-- Web Maintenance -->
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Web Maintenance</label>
                            </div>
                            <div class="col-md-9">
                                <input type="checkbox" class="form-check-input" name="web_maintenance"
                                    {{ $setting->web_maintenance == 1 ? 'checked' : '' }}>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary ms-2">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('backoffice/vendor/tagify/dist/tagify.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('backoffice/js/dashboard/profile.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/tagify/dist/tagify.js') }}"></script>
    <script>
        // Function to read and preview the selected file name
        function readURL(input, previewId) {
            if (input.files && input.files[0]) {
                // Display the file name of the uploaded file
                var fileName = input.files[0].name;
                $(previewId).text(fileName); // Set the file name as preview text
            }
        }

        // Event listener for image upload (Web Icon)
        $("#imageUpload").change(function() {
            readURL(this, '#imagePreview');
        });

        // Event listener for image upload (Web Logo)
        $("#imageUploadLogo").change(function() {
            readURL(this, '#imagePreviewLogo');
        });
    </script>
@endsection
