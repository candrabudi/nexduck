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
                    <h4 class="mb-0">API Credentials</h4>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">Add Credential</button>
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
                                    <th>Kode Bank</th>
                                    <th>Nama Bank</th>
                                    <th>Status Bank</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banks as $bank)
                                    <tr>
                                        <td>{{ $bank->id }}</td>
                                        <td>{{ $bank->bank_code }}</td>
                                        <td>{{ $bank->bank_name }}</td>
                                        <td>
                                            <span class="badge rounded-pill bg-{{ $bank->bank_status == 1 ? 'success' : 'danger' }}">
                                                {{ $bank->bank_status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" onclick="editCredential({{ $bank->id }})">Edit</button>
                                            <button class="btn btn-danger" onclick="deleteCredential({{ $bank->id }})">Delete</button>
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
    <div id="createModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create API Credential</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="bank_code">Kode Bank</label>
                            <input type="text" class="form-control" id="bank_code" name="bank_code">
                        </div>
                        <div class="form-group">
                            <label for="bank_name">Nama Bank</label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name">
                        </div>
                        <div class="form-group">
                            <label for="bank_status">Status Bank</label>
                            <select class="form-control" id="bank_status" name="bank_status">
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
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
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit API Credential</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_bank_code">Kode Bank</label>
                            <input type="text" class="form-control" id="edit_bank_code" name="bank_code">
                        </div>
                        <div class="form-group">
                            <label for="edit_bank_name">Nama Bank</label>
                            <input type="text" class="form-control" id="edit_bank_name" name="bank_name">
                        </div>
                        <div class="form-group">
                            <label for="edit_bank_status">Status Bank</label>
                            <select class="form-control" id="edit_bank_status" name="bank_status">
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                url: '{{ route('backoffice.banks.store') }}',
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
            $.get('{{ url("backoffice/banks/edit/" . $setting->web_token . "/:id") }}'.replace(':id', id), function(response) {
                let data = response.apiCredential;
                $('#editForm').attr('action', '{{ url("backoffice/banks/update/" . $setting->web_token . "/:id") }}'.replace(':id', id));
                $('#edit_bank_code').val(data.bank_code);
                $('#edit_bank_name').val(data.bank_name);
                $('#edit_bank_status').val(data.bank_status);
                $('#editModal').modal('show');
            });
        }

        $('#editForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
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

        function deleteCredential(id) {
            if (confirm('Are you sure you want to delete this credential?')) {
                $.ajax({
                    url: '{{ url("backoffice/destroy/" . $setting->web_token . "/:id") }}'.replace(':id', id),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
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
