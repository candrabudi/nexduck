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
                    <h4 class="mb-0">Data Member</h4>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Member</button>
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
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Akun Status</th>
                                    <th>Kunci Game</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->member->full_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <span
                                                class="badge rounded-pill bg-{{ $user->status == 1 ? 'success' : 'danger' }}">
                                                {{ $user->status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge rounded-pill bg-{{ $user->lock_game == 1 ? 'success' : 'danger' }}">
                                                {{ $user->lock_game == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger"
                                                onclick="deleteCredential({{ $user->id }})">Detail</button>
                                            <button class="btn btn-primary"
                                                onclick="editCredential({{ $user->id }})">Edit</button>
                                            <button class="btn btn-danger"
                                                onclick="deleteCredential({{ $user->id }})">Delete</button>
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
                    <h5 class="modal-title" id="createModalLabel">Tambah Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form id="createForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group mt-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group mt-3">
                            <label for="full_name">Nama Lengkap</label>
                            <input type="text" class="form-control" id="full_name" name="full_name">
                        </div>
                        <div class="form-group mt-3">
                            <label for="phone_number">Nomor Handphone</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number">
                        </div>
                        <hr class="mt-3">
                        <h5>Data Bank</h5>
                        <div class="form-group mt-3">
                            <label for="bank_id">Bank</label>
                            <select name="bank_id" class="form-control" id="bank_id">
                                <option value="">Pilih Bank</option>
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="account_name">Nama Akun Bank</label>
                            <input type="text" class="form-control" id="account_name" name="account_name">
                        </div>
                        <div class="form-group mt-3">
                            <label for="account_numbers">Nomor Akun Bank</label>
                            <input type="text" class="form-control" id="account_numbers" name="account_numbers">
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
                    <h5 class="modal-title" id="editModalLabel">Edit Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <label for="edit_username">Username</label>
                            <input type="text" class="form-control" id="edit_username" name="username">
                        </div>
                        <div class="form-group mt-3">
                            <label for="edit_email">Email</label>
                            <input type="text" class="form-control" id="edit_email" name="email">
                        </div>
                        <div class="form-group mt-3">
                            <label for="edit_full_name">Full Name</label>
                            <input type="text" class="form-control" id="edit_full_name" name="full_name">
                        </div>
                        <div class="form-group mt-3">
                            <label for="edit_phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="edit_phone_number" name="phone_number">
                        </div>
                        <div class="form-group mt-3">
                            <label for="edit_status">Account Status</label>
                            <select class="form-control" id="edit_status" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="edit_lock_game">Lock Game</label>
                            <select class="form-control" id="edit_lock_game" name="lock_game">
                                <option value="0">Unlocked</option>
                                <option value="1">Locked</option>
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
                url: '{{ route('backoffice.members.store') }}',
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
            $.get('{{ url('backoffice/members/edit/' . $setting->web_token) }}/' + id, function(response) {
                let user = response.user;
                let member = user.member;

                $('#editForm').attr('action', '{{ url('backoffice/members/update/' . $setting->web_token) }}/' +
                    id);

                $('#edit_username').val(user.username);
                $('#edit_email').val(user.email);
                $('#edit_full_name').val(member.full_name);
                $('#edit_phone_number').val(member.phone_number);
                $('#edit_status').val(user.status);
                $('#edit_lock_game').val(member.lock_game);

                $('#editModal').modal('show');
            });
        }

        $('#editForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: $('#editForm').attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    }
                },
                error: function(error) {
                    console.log(error);
                    alert('There was an error updating the data.');
                }
            });
        });

        function deleteCredential(id) {
            if (confirm("Are you sure you want to delete this member?")) {
                $.ajax({
                    url: '{{ url('backoffice/members/delete/' . $setting->web_token) }}/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
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
