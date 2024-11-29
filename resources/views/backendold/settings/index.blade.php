@php
    use App\Models\Setting;
    $setting = Setting::first();
@endphp

@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Pengaturan Website</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('backoffice.settings.storeOrUpdate') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-3">
                                <label for="web_name">Website Name</label>
                                <input type="text" class="form-control" id="web_name" name="web_name" value="{{ old('web_name', $setting->web_name ?? '') }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="web_icon">Website Icon (webp, ico, jpg, jpeg, png)</label>
                                <input type="file" class="form-control" id="web_icon" name="web_icon" accept=".webp, .ico, .jpg, .jpeg, .png">
                                @if ($setting && $setting->web_icon)
                                    <img src="{{ asset($setting->web_icon) }}" alt="Current Icon" width="100" class="mt-2">
                                @endif
                            </div>
                            <div class="form-group mt-3">
                                <label for="web_logo">Website Logo (webp, ico, jpg, jpeg, png)</label>
                                <input type="file" class="form-control" id="web_logo" name="web_logo" accept=".webp, .ico, .jpg, .jpeg, .png">
                                @if ($setting && $setting->web_logo)
                                    <img src="{{ asset($setting->web_logo) }}" alt="Current Logo" width="100" class="mt-2">
                                @endif
                            </div>
                            <div class="form-group mt-3">
                                <label for="web_description">Website Description</label>
                                <textarea class="form-control" id="web_description" name="web_description" required>{{ old('web_description', $setting->web_description ?? '') }}</textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="web_token">Website Token</label>
                                <input type="text" class="form-control" id="web_token" name="web_token" value="{{ old('web_token', $setting->web_token ?? '') }}" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="web_maintenance">Maintenance Mode</label>
                                <select class="form-control" id="web_maintenance" name="web_maintenance">
                                    <option value="0" {{ old('web_maintenance', $setting->web_maintenance ?? '') == '0' ? 'selected' : '' }}>Off</option>
                                    <option value="1" {{ old('web_maintenance', $setting->web_maintenance ?? '') == '1' ? 'selected' : '' }}>On</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="web_running_text">Running Text</label>
                                <input type="text" class="form-control" id="web_running_text" name="web_running_text" value="{{ old('web_running_text', $setting->web_running_text ?? '') }}">
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
