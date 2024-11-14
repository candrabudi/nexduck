@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4>Data Banner</h4>
                        <a href="{{ route('backoffice.banners', ['id' => null]) }}" class="btn btn-sm btn-primary mb-3">Create New Banner</a>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
        
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Banner Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $bann)
                                    <tr>
                                        <td>{{ $bann->id }}</td>
                                        <td>{{ $bann->banner_name }}</td>
                                        <td><img src="{{ asset('storage/' . $bann->banner_image) }}" alt="{{ $bann->banner_name }}" width="100"></td>
                                        <td>{{ $bann->banner_status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{ route('backoffice.banners', ['id' => $bann->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('backoffice.banners.destroy', $bann->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4>{{ $banner ? 'Edit Banner' : 'Create Banner' }}</h4>

                        <!-- Form for creating or editing a banner -->
                        <form
                            action="{{ $banner ? route('backoffice.banners.update', $banner->id) : route('backoffice.banners.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($banner)
                                @method('PUT')
                            @endif

                            <div class="form-group mt-3">
                                <label for="banner_name">Banner Name</label>
                                <input type="text" name="banner_name" class="form-control" 
                                    value="{{ old('banner_name', $banner->banner_name ?? '') }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="banner_image">Banner Image</label>
                                <input type="file" name="banner_image" class="form-control">
                                @if ($banner && $banner->banner_image)
                                    <img src="{{ asset('storage/' . $banner->banner_image) }}" 
                                        alt="{{ $banner->banner_name }}" width="100" class="mt-2">
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="banner_status">Status</label>
                                <select name="banner_status" class="form-control">
                                    <option value="0" {{ old('banner_status', $banner->banner_status ?? 0) == 0 ? 'selected' : '' }}>
                                        Inactive
                                    </option>
                                    <option value="1" {{ old('banner_status', $banner->banner_status ?? 1) == 1 ? 'selected' : '' }}>
                                        Active
                                    </option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">{{ $banner ? 'Update' : 'Save' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
