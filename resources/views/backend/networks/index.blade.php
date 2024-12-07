@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Data User Referral</h6>
                    <button class="btn btn-primary float-right btn-sm" onclick="openAddModal()">Tambah User Referral</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table dataTable">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Referral</th>
                                    <th>Foto Kartu ID</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($networks as $network)
                                    <tr>
                                        <td>{{ $network->user->username }}</td>
                                        <td>{{ $network->referral }}</td>
                                        <td>{{ $network->photo_id_card ?? '-' }}</td>
                                        <td>{{ $network->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{ route('backoffice.networks.detail') }}?id={{ $network->id }}" class="btn btn-info btn-sm text-white">Detail</a>
                                            <button class="btn btn-warning btn-sm" onclick="editNetwork({{ $network->id }})">Edit</button>
                                            <button class="btn btn-danger btn-sm" onclick="deleteNetwork({{ $network->id }})">Hapus</button>
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

    <!-- Add/Edit Modal -->
    <div class="modal fade bd-example-modal-lg" id="networkModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Add Network</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="networkForm">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="network_id">
                        <div class="form-group">
                            <label for="user_id">User</label>
                            <select id="user_id" name="user_id" class="form-control" {{ isset($network_id) ? 'disabled' : '' }}>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->username }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="referral">Referral</label>
                            <input type="text" id="referral" name="referral" class="form-control" readonly>
                        </div>
                        {{-- <div class="form-group">
                            <label for="photo_id_card">Photo ID Card</label>
                            <input type="text" id="photo_id_card" name="photo_id_card" class="form-control">
                        </div> --}}
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
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
        $(document).ready(function () {
            $('#networkTable').DataTable();
            $('#networkForm').submit(function (e) {
                e.preventDefault();
                let networkId = $('#network_id').val();
                let formData = $(this).serialize();

                if (networkId) {
                    // Update existing network
                    $.ajax({
                        url: '/backoffice/networks/' + networkId,
                        type: 'PATCH',
                        data: formData,
                        success: function (response) {
                            $('#networkModal').modal('hide');
                            Swal.fire('Success', response.message, 'success');
                            location.reload();
                        },
                        error: function () {
                            Swal.fire('Error', 'Something went wrong!', 'error');
                        }
                    });
                } else {
                    // Add new network
                    $.ajax({
                        url: '{{ route("backoffice.networks.store") }}',
                        type: 'POST',
                        data: formData,
                        success: function (response) {
                            $('#networkModal').modal('hide');
                            Swal.fire('Success', response.message, 'success');
                            location.reload();
                        },
                        error: function () {
                            Swal.fire('Error', 'Something went wrong!', 'error');
                        }
                    });
                }
            });
        });

        // Open Add Modal and auto-generate referral
        function openAddModal() {
            $('#networkForm')[0].reset();
            $('#network_id').val('');
            $('#modalLabel').text('Add Network');

            // Generate referral code
            $.get('{{ route("backoffice.networks.generateReferralCode") }}', function(referral) {
                $('#referral').val(referral);
            });

            // Re-enable user select in add mode
            $('#user_id').prop('disabled', false);

            $('#networkModal').modal('show');
        }

        // Open Edit Modal
        function editNetwork(id) {
            $.get('/backoffice/networks/' + id + '/edit', function (data) {
                $('#network_id').val(data.id);
                $('#user_id').val(data.user_id);
                $('#referral').val(data.referral);
                $('#photo_id_card').val(data.photo_id_card);
                $('#status').val(data.status);
                $('#modalLabel').text('Edit Network');

                // Disable user select in edit mode
                $('#user_id').prop('disabled', true);

                $('#networkModal').modal('show');
            });
        }

        // Delete Network with confirmation
        function deleteNetwork(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/backoffice/networks/' + id,
                        type: 'DELETE',
                        success: function (response) {
                            Swal.fire('Deleted!', response.message, 'success');
                            location.reload();
                        },
                        error: function () {
                            Swal.fire('Error', 'Something went wrong!', 'error');
                        }
                    });
                }
            });
        }
    </script>
@endsection
