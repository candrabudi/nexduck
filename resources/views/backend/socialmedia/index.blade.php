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
                    <h4 class="mb-0">Social Media</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Add Social Media</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>Type</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($socialMedia as $social)
                                    <tr>
                                        <td>{{ $social->name }}</td>
                                        <td>{{ $social->link_social_media }}</td>
                                        <td>{{ $social->type }}</td>
                                        <td><img src="{{ asset('storage/' . $social->image) }}" alt="image" width="50"></td>
                                        <td>
                                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editSocial({{ $social->id }})">Edit</button>
                                            <form action="{{ route('social-media.destroy', $social->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
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
    </div>

   <!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Adjust modal size if necessary -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Add Social Media</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('social-media.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="link_social_media">Link</label>
                        <input type="url" class="form-control" id="link_social_media" name="link_social_media" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="type">Type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="instagram">Instagram</option>
                            <option value="youtube">YouTube</option>
                            <option value="twitter">Twitter</option>
                            <option value="telegram">Telegram</option>
                            <option value="facebook">Facebook</option>
                            <option value="tiktok">TikTok</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Adjust modal size if necessary -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Social Media</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="edit_name">Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="edit_link_social_media">Link</label>
                        <input type="url" class="form-control" id="edit_link_social_media" name="link_social_media" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="edit_type">Type</label>
                        <select class="form-control" id="edit_type" name="type" required>
                            <option value="instagram">Instagram</option>
                            <option value="youtube">YouTube</option>
                            <option value="twitter">Twitter</option>
                            <option value="telegram">Telegram</option>
                            <option value="facebook">Facebook</option>
                            <option value="tiktok">TikTok</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="edit_image">Image</label>
                        <input type="file" class="form-control" id="edit_image" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    <script>
        function editSocial(id) {
            console.log('Edit social media id:', id);  // Pastikan ID yang benar diterima

            $.ajax({
                url: `/backoffice/social-media/${id}/${{!! json_encode($setting->web_token) !!}}/edit`,
                method: 'GET',
                success: function(data) {
                    console.log('Data received:', data);  // Lihat apakah data diterima dengan benar
                    $('#edit_name').val(data.name);
                    $('#edit_link_social_media').val(data.link_social_media);
                    $('#edit_type').val(data.type);
                    
                    $('#editForm').attr('action', `/backoffice/social-media/${id}/${{!! json_encode($setting->web_token) !!}}`);
                },
                error: function(error) {
                    console.error('Error:', error);  // Log error untuk debugging
                }
            });
        }

    </script>
@endsection
