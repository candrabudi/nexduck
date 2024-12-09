@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Data Promotor</h6>
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                        data-bs-target=".bd-example-modal-lg">Tambah Promotor</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->status == 1 ? 'Active' : 'Locked' }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm edit-btn" data-id="{{ $user->id }}"
                                                data-username="{{ $user->username }}" data-email="{{ $user->email }}"
                                                data-status="{{ $user->status }}" data-bs-toggle="modal"
                                                data-bs-target=".edit-modal">
                                                Edit
                                            </button>
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

    <!-- Modal Create Promotor -->
    <div class="modal fade bd-example-modal-lg" id="createPromotorModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Promotor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createPromotorForm">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Locked</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Promotor -->
    <div class="modal fade edit-modal" id="updatePromotorModal" tabindex="-1" role="dialog"
        aria-labelledby="updatePromotorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-header">
                <h5 class="modal-title">Edit Promotor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-content">
                <form id="updatePromotorForm">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_id" name="id">
                        <div class="form-group mb-3">
                            <label for="edit_username">Username</label>
                            <input type="text" class="form-control" id="edit_username" name="username" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="edit_email">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="edit_password">Password (Optional)</label>
                            <input type="password" class="form-control" id="edit_password" name="password">
                        </div>
                        <div class="form-group mb-3">
                            <label for="edit_status">Status</label>
                            <select class="form-control" id="edit_status" name="status" required>
                                <option value="1">Active</option>
                                <option value="0">Locked</option>
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
        $(document).ready(function() {
            // Handle form create submit
            $('#createPromotorForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('backoffice.promotors.store') }}',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#createPromotorModal').modal('hide');
                        location.reload(); // Reload page to reflect changes
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Something went wrong!');
                    }
                });
            });

            // Handle form update submit
            $('#updatePromotorForm').on('submit', function(e) {
                e.preventDefault();

                var id = $('#edit_id').val();
                $.ajax({
                    type: 'PUT',
                    url: '/backoffice/promotor/' + id,
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#updatePromotorModal').modal('hide');
                        location.reload(); // Reload page to reflect changes
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Something went wrong!');
                    }
                });
            });

            // Fill update modal with data
            $('.edit-btn').on('click', function() {
                $('#edit_id').val($(this).data('id'));
                $('#edit_username').val($(this).data('username'));
                $('#edit_email').val($(this).data('email'));
                $('#edit_status').val($(this).data('status'));
            });
        });
    </script>
@endsection
