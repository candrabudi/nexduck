@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Social Media Information</h6>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#socialMediaModal" id="addNewSocialMediaBtn">Add New Social Media</button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="socialMediaTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Link</th>
                            <th>Type</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($socialMediaList as $socialMedia)
                            <tr>
                                <td>{{ $socialMedia->name }}</td>
                                <td>{{ $socialMedia->link_social_media }}</td>
                                <td>{{ ucfirst($socialMedia->type) }}</td>
                                <td>
                                    @if ($socialMedia->image)
                                        <img src="{{ $socialMedia->image }}" class="img-thumbnail" style="width: 50px;">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-warning editBtn" data-id="{{ $socialMedia->id }}" data-name="{{ $socialMedia->name }}" data-link="{{ $socialMedia->link_social_media }}" data-type="{{ $socialMedia->type }}" data-image="{{ $socialMedia->image }}">Edit</button>
                                    <button class="btn btn-danger deleteBtn" data-id="{{ $socialMedia->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {!! $socialMediaList->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Create/Update Social Media -->
<div class="modal fade" id="socialMediaModal" tabindex="-1" aria-labelledby="socialMediaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="socialMediaModalLabel">Add New Social Media</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="socialMediaForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="socialMediaId">
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Social Media Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="link_social_media" class="form-label">Social Media Link</label>
                        <input type="url" class="form-control" name="link_social_media" id="link_social_media" required>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Social Media Type</label>
                        <select class="form-control" name="type" id="type" required>
                            <option value="instagram">Instagram</option>
                            <option value="youtube">YouTube</option>
                            <option value="twitter">Twitter</option>
                            <option value="telegram">Telegram</option>
                            <option value="facebook">Facebook</option>
                            <option value="tiktok">TikTok</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Social Media Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Open the modal for adding a new social media
    $('#addNewSocialMediaBtn').on('click', function() {
        $('#socialMediaModalLabel').text('Add New Social Media');
        $('#socialMediaForm')[0].reset();
        $('#socialMediaId').val('');
        $('#image').val('');
        $('#socialMediaForm').attr('action', '{{ url('backoffice/social-media') }}');
    });

    // Open the modal for editing an existing social media
    $(document).on('click', '.editBtn', function() {
        let socialMedia = $(this).data();
        $('#socialMediaModalLabel').text('Edit Social Media');
        $('#socialMediaForm')[0].reset();
        $('#socialMediaId').val(socialMedia.id);
        $('#name').val(socialMedia.name);
        $('#link_social_media').val(socialMedia.link);
        $('#type').val(socialMedia.type);
        $('#socialMediaForm').attr('action', '{{ url('backoffice/social-media') }}/' + socialMedia.id);

        // Open the modal explicitly using Bootstrap Modal API
        var myModal = new bootstrap.Modal(document.getElementById('socialMediaModal'));
        myModal.show();
    });

    // Handle form submission for creating/updating social media
    $('#socialMediaForm').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    $('#socialMediaModal').modal('hide');
                    window.location.reload(); // Reload the page to reflect the changes
                } else {
                    alert('Something went wrong.');
                }
            },
            error: function() {
                alert('Error occurred while processing request.');
            }
        });
    });

    // Handle deleting social media record
    $(document).on('click', '.deleteBtn', function() {
        let socialMediaId = $(this).data('id');

        if (confirm('Are you sure you want to delete this social media?')) {
            $.ajax({
                url: '{{ url('backoffice/social-media') }}/' + socialMediaId,
                method: 'DELETE',
                success: function(response) {
                    if (response.success) {
                        window.location.reload(); // Reload the page after deleting
                    } else {
                        alert('Failed to delete social media.');
                    }
                }
            });
        }
    });
</script>
@endsection
