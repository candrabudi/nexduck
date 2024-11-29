@php
    use App\Models\User;
    use App\Models\Setting;
    $setting = Setting::first();
@endphp

@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Filter Form -->
        <form method="GET" action="{{ route('backoffice.transactions.deposit') }}">
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="start_date">Tanggal Mulai</label>
                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                </div>
                <div class="col-md-3">
                    <label for="end_date">Tanggil Akhir</label>
                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                </div>
                <div class="col-md-3">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="">-- Pilih Status --</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="updated_by">Diupdate ?</label>
                    <select name="updated_by" class="form-control">
                        <option value="">-- Select Updated By --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ request('updated_by') == $user->id ? 'selected' : '' }}>{{ $user->username }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mt-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('backoffice.transactions.deposit') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Bank</th>
                    <th>Nama Bank Admin</th>
                    <th>No Bank Admin</th>
                    <th>Nominal</th>
                    <th>Status</th>
                    <th>Diupdate ?</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->user->username }}</td>
                        <td>{{ $transaction->userBank->bank->bank_name ?? 'N/A' }}</td>
                        <td>{{ $transaction->userBank->account_name ?? 'N/A' }}</td>
                        <td>{{ $transaction->userBank->account_number ?? 'N/A' }}</td>
                        <td>{{ number_format($transaction->amount, 2) }}</td>
                        <td>{{ ucfirst($transaction->status) }}</td>
                        <td>{{ $transaction->userUpdate->username ?? 'N/A' }}</td>
                        <td>
                            @if ($transaction->status == 'pending')
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updateStatusModal"
                                    onclick="editTransaction({{ $transaction->id }})">Ubah Status</button>
                            @else
                                <button class="btn btn-sm btn-secondary btn-sm" disabled>Sudah Update</button>
                            @endif
                            <button class="btn btn-sm btn-info" onclick="viewTransactionDetails({{ $transaction->id }})">Detail</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal: Update Status -->
    <div id="updateStatusModal" class="modal fade" tabindex="-1" aria-labelledby="updateStatusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="updateStatusForm" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateStatusModalLabel">Update Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="transaction_status">Status</label>
                            <select id="transaction_status" name="transaction_status" class="form-control">
                                <option value="process">Process</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                        <div class="form-group" id="reason-group" style="display: none;">
                            <label for="reason">Reason</label>
                            <textarea id="reason" name="reason" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal: View Transaction Details -->
    <div id="viewTransactionModal" class="modal fade" tabindex="-1" aria-labelledby="viewTransactionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewTransactionModalLabel">Transaction Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="transactionDetailsContent">
                    <!-- Transaction details will be populated here via AJAX -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const webToken = @json($setting->web_token);

        function editTransaction(id) {
            $.get(`/backoffice/transactions/deposit/${webToken}/${id}`, function(transaction) {
                $('#transaction_status').val(transaction.status);
                $('#reason').val(transaction.reason || '');
                if (transaction.status === 'rejected') {
                    $('#reason-group').show();
                } else {
                    $('#reason-group').hide();
                }

                $('#updateStatusForm').attr('action', `/backoffice/transactions/deposit/${webToken}/${id}/update-status`);
            });
        }

        function viewTransactionDetails(id) {
            $.get(`/backoffice/transactions/deposit/${webToken}/${id}`, function(transaction) {
                let details = `
                    <h5>Transaction ID: ${transaction.id}</h5>
                    <p><strong>Bank (Admin):</strong> ${transaction.admin_bank ? transaction.admin_bank.bank_name : 'N/A'}</p>
                    <p><strong>Bank (User):</strong> ${transaction.user_bank ? transaction.user_bank.account_name : 'N/A'} - ${transaction.user_bank ? transaction.user_bank.account_number : 'N/A'}</p>
                    <p><strong>Amount:</strong> ${transaction.amount}</p>
                    <p><strong>Status:</strong> ${transaction.status}</p>
                    <p><strong>Updated By:</strong> ${transaction.user_update ? transaction.user_update.username : 'N/A'}</p>
                    <p><strong>Reason:</strong> ${transaction.reason || 'N/A'}</p>
                    <p><strong>Proof of Transfer:</strong> ${transaction.proof_of_transfer ? '<img src="' + transaction.proof_of_transfer + '" alt="Proof of Transfer" class="img-fluid">' : 'N/A'}</p>
                    <p><strong>Created At:</strong> ${transaction.created_at}</p>
                    <p><strong>Updated At:</strong> ${transaction.updated_at}</p>
                    <p><strong>User Info:</strong> ${transaction.user ? transaction.user.username : 'N/A'} - ${transaction.user ? transaction.user.email : 'N/A'}</p>
                    <p><strong>Member Info:</strong> ${transaction.user && transaction.user.member ? transaction.user.member.full_name : 'N/A'}</p>
                `;
                $('#transactionDetailsContent').html(details);
                $('#viewTransactionModal').modal('show');
            });
        }
    </script>
@endsection
