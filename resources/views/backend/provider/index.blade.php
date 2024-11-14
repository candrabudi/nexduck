@php
    use App\Helpers\AesEncryptionHelper;
    $encryptedUserId = AesEncryptionHelper::encryptUserId(auth()->user()->id);
@endphp

@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Data Provider</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th width="50">#</th>
                                    <th>Nama Provider</th>
                                    <th>Slug Provider</th>
                                    <th>Kategori</th>
                                    <th width="50">Status</th>
                                    <th width="50">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($providers as $pv)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $pv->provider_name }}</td>
                                        <td>{{ $pv->provider_slug }}</td>
                                        <td>{{ $pv->category->category_name }}</td>
                                        <td>
                                            <span class="badge rounded-pill bg-{{ $pv->provider_status == 1 ? 'success' : 'danger' }} float-end">
                                                {{ $pv->provider_status == 1 ? 'On' : 'Off' }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm"
                                                onclick="showEditModal({{ $pv->id }}, '{{ $pv->provider_code }}', '{{ $pv->provider_name }}', '{{ $pv->provider_slug }}', '{{ $pv->category->category_name }}', {{ $pv->provider_status }}, '{{ $pv->provider_image }}', '{{ $pv->provider_icon }}', '{{ $pv->provider_icon_nav }}')">Edit</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editProviderModal" tabindex="-1" aria-labelledby="editProviderModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProviderModalLabel">Edit Provider</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editProviderForm" enctype="multipart/form-data">
                            <input type="hidden" id="provider_id" name="provider_id">
                            <div class="mb-3">
                                <label for="provider_image" class="form-label">Provider Image</label>
                                <input type="file" class="form-control" id="provider_image" name="provider_image">
                            </div>
                            <div class="mb-3">
                                <label for="provider_icon" class="form-label">Provider Icon</label>
                                <input type="file" class="form-control" id="provider_icon" name="provider_icon">
                            </div>
                            <div class="mb-3">
                                <label for="provider_icon_nav" class="form-label">Provider Icon Navigation</label>
                                <input type="file" class="form-control" id="provider_icon_nav" name="provider_icon_nav">
                            </div>
                            <div class="mb-3">
                                <label for="provider_status" class="form-label">Status Provider</label>
                                <select class="form-select" id="provider_status" name="provider_status">
                                    <option value="1">On</option>
                                    <option value="0">Off</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="updateProvider()">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showEditModal(id, code, name, slug, category, status, image, icon, icon_nav) {
            $('#provider_id').val(id);
            $('#provider_code').val(code);
            $('#provider_name').val(name);
            $('#provider_slug').val(slug);
            // Reset file inputs because browsers don't allow setting file inputs programmatically for security reasons
            $('#provider_image').val('');
            $('#provider_icon').val('');
            $('#provider_icon_nav').val('');
            $('#provider_status').val(status);
            $('#editProviderModal').modal('show');
        }

        function updateProvider() {
            let form = document.getElementById('editProviderForm');
            let formData = new FormData(form);

            $.ajax({
                url: '{{ route('backoffice.provider.update') }}',
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        alert('Error updating provider');
                    }
                },
                error: function(error) {
                    alert('Something went wrong. Please try again later.');
                }
            });
        }
    </script>
@endsection
