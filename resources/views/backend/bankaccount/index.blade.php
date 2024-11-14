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
                    <h4 class="mb-0">Data Akun Bank</h4>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Bank</button>
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
                                    <th>Nama Akun</th>
                                    <th>Nomor Akun</th>
                                    <th>Status Bank</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accounts as $account)
                                    <tr>
                                        <td>{{ $account->id }}</td>
                                        <td>{{ $account->bank->bank_code }}</td>
                                        <td>{{ $account->bank->bank_name }}</td>
                                        <td>{{ $account->account_name }}</td>
                                        <td>{{ $account->account_number }}</td>
                                        <td>
                                            <span class="badge rounded-pill bg-{{ $account->account_status == 1 ? 'success' : 'danger' }}">
                                                {{ $account->account_status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" onclick="editCredential({{ $account->id }})">Edit</button>
                                            <button class="btn btn-danger" onclick="deleteCredential({{ $account->id }})">Delete</button>
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

    {{-- Create Modal --}}
    <div id="createModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Akun Bank</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createForm">
                    @csrf
                    <div class="modal-body">
                        {{-- Bank ID --}}
                        <div class="form-group">
                            <label for="bank_id">Bank</label>
                            <select name="bank_id" class="form-control" id="bank_id">
                                <option value="">Pilih Bank</option>
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- Account Name --}}
                        <div class="form-group">
                            <label for="account_name">Nama Akun Bank</label>
                            <input type="text" class="form-control" id="account_name" name="account_name">
                        </div>
                        {{-- Account Number --}}
                        <div class="form-group">
                            <label for="account_number">Nomor Akun Bank</label>
                            <input type="text" class="form-control" id="account_number" name="account_number">
                        </div>
                        {{-- Account Image --}}
                        <div class="form-group">
                            <label for="account_image">Gambar / Qris</label>
                            <input type="file" class="form-control" id="account_image" name="account_image">
                        </div>
                        {{-- Account Status --}}
                        <div class="form-group">
                            <label for="account_status">Akun Status</label>
                            <select class="form-control" id="account_status" name="account_status">
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

    {{-- Edit Modal --}}
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Akun Bank</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        {{-- Bank ID --}}
                        <div class="form-group">
                            <label for="edit_bank_id">Bank</label>
                            <select name="bank_id" class="form-control" id="edit_bank_id">
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- Account Name --}}
                        <div class="form-group">
                            <label for="edit_account_name">Nama Akun Bank</label>
                            <input type="text" class="form-control" id="edit_account_name" name="account_name">
                        </div>
                        {{-- Account Number --}}
                        <div class="form-group">
                            <label for="edit_account_number">Nomor Akun Bank</label>
                            <input type="text" class="form-control" id="edit_account_number" name="account_number">
                        </div>
                        {{-- Account Image --}}
                        <div class="form-group">
                            <label for="edit_account_image">Gambar / Qris</label>
                            <input type="file" class="form-control" id="edit_account_image" name="account_image">
                        </div>
                        {{-- Account Status --}}
                        <div class="form-group">
                            <label for="edit_account_status">Akun Status</label>
                            <select class="form-control" id="edit_account_status" name="account_status">
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
        // Create Form Submission
        $('#createForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('backoffice.bankaccounts.store') }}',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    }
                }
            });
        });

        // Edit Credential
        function editCredential(id) {
            $.get('{{ url('backoffice/bankaccounts/edit/' . $setting->web_token . '/:id') }}'.replace(':id', id), function(response) {
                let data = response.apiCredential;
                $('#editForm').attr('action', '{{ url('backoffice/bankaccounts/update/' . $setting->web_token . '/:id') }}'.replace(':id', id));
                $('#edit_account_name').val(data.account_name);
                $('#edit_account_number').val(data.account_number);
                $('#edit_account_status').val(data.account_status);
                $('#editModal').modal('show');
            });
        }

        // Edit Form Submission
        $('#editForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    }
                }
            });
        });

        // Delete Credential
        function deleteCredential(id) {
            if (confirm('Are you sure you want to delete this credential?')) {
                $.ajax({
                    url: '{{ url('backoffice/bankaccounts/destroy/' . $setting->web_token . '/:id') }}'.replace(':id', id),
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
