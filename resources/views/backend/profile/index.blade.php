@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Profile User</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('backoffice.profile.update') }}" method="POST" enctype="multipart/form-data" class="mt-2">
                        @csrf
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Username</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username', $user->username) }}">
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Email</label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    value="{{ old('email', $user->email) }}">
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Password</label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <small class="text-muted">Leave blank if you don't want to change password.</small>
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-md-3">
                                <label class="form-label mb-md-0">Confirm Password</label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
