@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">User List</h6>
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
                                <th>Phone Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->status == 1 ? 'Active' : 'Locked' }}</td>
                                    <td>{{ $user->member->phone_number ?? '-' }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="viewDetail({{ $user->id }})">
                                            Detail
                                        </button>
                                        <button class="btn btn-warning btn-sm" onclick="lockUser({{ $user->id }})">
                                            Lock User
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
@endsection

@section('styles')
    <!-- Add any custom styles if necessary -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        // View user details with query params
        function viewDetail(userId) {
            // Redirect to the user details page with query parameters
            window.location.href = '/backoffice/members-detail?user_id=' + userId;
        }

        // Lock user function with query params
        function lockUser(userId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to lock this user.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, lock it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/backoffice/users/' + userId + '/lock?status=locked',
                        type: 'PATCH',
                        success: function(response) {
                            Swal.fire('Locked!', 'The user has been locked.', 'success');
                            location.reload(); // Reload to see the status change
                        },
                        error: function() {
                            Swal.fire('Error!', 'There was a problem locking the user.', 'error');
                        }
                    });
                }
            });
        }
    </script>
@endsection
