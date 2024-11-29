@php
    use App\Models\User;
    use App\Models\Setting;
    $setting = Setting::first();
@endphp
@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">API Credentials</h4>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">Add
                        Credential</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Agent URL</th>
                                    <th>Agent Code</th>
                                    <th>Agent Signature</th>
                                    <th>Agent Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($apiCredentials as $credential)
                                    <tr>
                                        <td>{{ $credential->id }}</td>
                                        <td>{{ $credential->agent_url }}</td>
                                        <td>{{ $credential->agent_code }}</td>
                                        <td>{{ $credential->agent_signature }}</td>
                                        <td>{{ $credential->agent_type }}</td>
                                        <td>
                                            <span
                                                class="badge rounded-pill bg-{{ $credential->agent_status == 1 ? 'success' : 'danger' }}">
                                                {{ $credential->agent_status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary"
                                                onclick="editCredential({{ $credential->id }})">Edit</button>
                                            <button class="btn btn-danger"
                                                onclick="deleteCredential({{ $credential->id }})">Delete</button>
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

    <div id="createModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create API Credential</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form id="createForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="agent_url">Agent URL</label>
                            <input type="text" class="form-control" id="agent_url" name="agent_url">
                        </div>
                        <div class="form-group">
                            <label for="agent_code">Agent Code</label>
                            <input type="text" class="form-control" id="agent_code" name="agent_code">
                        </div>
                        <div class="form-group">
                            <label for="agent_signature">Agent Signature</label>
                            <input type="text" class="form-control" id="agent_signature" name="agent_signature">
                        </div>
                        <div class="form-group">
                            <label for="agent_password">Agent Password</label>
                            <input type="text" class="form-control" id="agent_password" name="agent_password">
                        </div>
                        <div class="form-group">
                            <label for="agent_type">Agent Type</label>
                            <select class="form-control" id="agent_type" name="agent_type">
                                <option value="sg">SG</option>
                                <option value="nexus">Nexus</option>
                                <option value="sgx">SGX</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="agent_status">Agent Status</label>
                            <select class="form-control" id="agent_status" name="agent_status">
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit API Credential</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form id="editForm">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_agent_url">Agent URL</label>
                            <input type="text" class="form-control" id="edit_agent_url" name="agent_url">
                        </div>
                        <div class="form-group">
                            <label for="edit_agent_code">Agent Code</label>
                            <input type="text" class="form-control" id="edit_agent_code" name="agent_code">
                        </div>
                        <div class="form-group">
                            <label for="edit_agent_signature">Agent Signature</label>
                            <input type="text" class="form-control" id="edit_agent_signature" name="agent_signature">
                        </div>
                        <div class="form-group">
                            <label for="edit_agent_password">Agent Password</label>
                            <input type="text" class="form-control" id="edit_agent_password" name="agent_password">
                        </div>
                        <div class="form-group">
                            <label for="edit_agent_type">Agent Type</label>
                            <select class="form-control" id="edit_agent_type" name="agent_type">
                                <option value="sg">SG</option>
                                <option value="nexus">Nexus</option>
                                <option value="sgx">SGX</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_agent_status">Agent Status</label>
                            <select class="form-control" id="edit_agent_status" name="agent_status">
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#createForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('backoffice.apicredentials.store') }}',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    }
                }
            });
        });

        function editCredential(id) {
            $.get('{{ url('backoffice/api-credentials/edit/'.$setting->web_token."/:id") }}'.replace(
                ':id', id), function(response) {
                let data = response.apiCredential;
                $('#editForm').attr('action',
                    '{{ url('backoffice/api-credentials/update/'.$setting->web_token."/:id") }}'
                    .replace(':id', id));
                $('#edit_agent_url').val(data.agent_url);
                $('#edit_agent_code').val(data.agent_code);
                $('#edit_agent_signature').val(data.agent_signature);
                $('#edit_agent_password').val(data.agent_password);
                $('#edit_agent_type').val(data.agent_type);
                $('#edit_agent_status').val(data.agent_status);
                $('#editModal').modal('show');
            });
        }

        // Submit edit form
        $('#editForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    }
                }
            });
        });

        function deleteCredential(id) {
            if (confirm('Are you sure you want to delete this credential?')) {
                $.ajax({
                    url: '{{ url('backoffice/api-credentials/destroy'.$setting->web_token."/:id") }}'
                        .replace(':id', id),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token added here
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            location.reload();
                        }
                    }
                });
            }
        }
    </script>
@endsection
