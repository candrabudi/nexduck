@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting">
                    <div class="tbl-caption">
                        <h4 class="heading mb-0">Banner</h4>
                        <div>
                            <a type="button" class="btn btn-primary mb-2 btn-sm" data-bs-toggle="modal"
                                data-bs-target="#createBannerModal">+ Tambah Banner</a>
                        </div>
                    </div>
                    <table id="banners-tbl" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Banner Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $banner)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $banner->banner_name }}</td>
                                    <td><img src="{{ $banner->banner_image }}" width="100"
                                            alt="Banner Image"></td>
                                    <td>{{ $banner->banner_status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning editBannerBtn" data-id="{{ $banner->id }}"
                                            data-name="{{ $banner->banner_name }}"
                                            data-status="{{ $banner->banner_status }}"
                                            data-image="{{ asset('storage/' . $banner->banner_image) }}">Edit</button>
                                        <form action="{{ route('backoffice.banners.destroy', $banner->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
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
    </div>

    <!-- Create Banner Modal -->
    <div class="modal fade" id="createBannerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('backoffice.banners.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="banner_name" class="form-label">Banner Name</label>
                            <input type="text" class="form-control" id="banner_name" name="banner_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="banner_image" class="form-label">Banner Image</label>
                            <input type="file" class="form-control" id="banner_image" name="banner_image" required>
                        </div>
                        <div class="mb-3">
                            <label for="banner_status" class="form-label">Status</label>
                            <select name="banner_status" class="form-select" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Banner Modal -->
    <div class="modal fade" id="editBannerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data" id="editBannerForm">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="POST">
                        <div class="mb-3">
                            <label for="edit_banner_name" class="form-label">Banner Name</label>
                            <input type="text" class="form-control" id="edit_banner_name" name="banner_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_banner_image" class="form-label">Banner Image</label>
                            <input type="file" class="form-control" id="edit_banner_image" name="banner_image">
                            <img id="current_image" src="" width="100" class="mt-2">
                        </div>
                        <div class="mb-3">
                            <label for="edit_banner_status" class="form-label">Status</label>
                            <select name="banner_status" class="form-select" id="edit_banner_status" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Trigger edit modal and populate with banner data
            $('.editBannerBtn').on('click', function() {
                var bannerId = $(this).data('id');
                var bannerName = $(this).data('name');
                var bannerStatus = $(this).data('status');
                var bannerImage = $(this).data('image');

                // Set form action URL
                $('#editBannerForm').attr('action', '/backoffice/banners/update/' + bannerId);

                // Populate modal fields with existing data
                $('#edit_banner_name').val(bannerName);
                $('#edit_banner_status').val(bannerStatus);
                $('#current_image').attr('src', bannerImage);

                // Show edit modal
                $('#editBannerModal').modal('show');
            });
        });
    </script>
@endsection
