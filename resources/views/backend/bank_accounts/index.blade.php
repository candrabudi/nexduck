@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="tbl-caption d-flex justify-content-between align-items-center">
                        <h4 class="heading mb-0">Bank Accounts</h4>
                        <div>
                            <a type="button" class="btn btn-primary mb-2 btn-sm" data-bs-toggle="modal"
                                data-bs-target="#createBankAccountModal">+ Add Bank Account</a>
                        </div>
                    </div>

                    <table id="bank-accounts-tbl" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Akun</th>
                                <th>Bank</th>
                                <th>Nomor Akun</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bankAccounts as $account)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $account->account_name }}</td>
                                    <td>{{ $account->bank->bank_name }}</td>
                                    <td>{{ $account->account_number }}</td>
                                    <td>{{ $account->account_status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning editBankAccountBtn"
                                            data-id="{{ $account->id }}" data-name="{{ $account->account_name }}"
                                            data-number="{{ $account->account_number }}"
                                            data-status="{{ $account->account_status }}" data-bank="{{ $account->bank_id }}"
                                            data-image="{{ asset('storage/' . $account->account_image) }}">Edit</button>
                                        <form action="{{ route('backoffice.bank-accounts.destroy', $account->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Bank Account Modal -->
    <!-- Modal untuk Menambahkan Akun Bank -->
    <div class="modal fade" id="createBankAccountModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Akun Bank</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('backoffice.bank-accounts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="account_name" class="form-label">Nama Akun</label>
                            <input type="text" class="form-control" id="account_name" name="account_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="bank_id" class="form-label">Bank</label>
                            <select name="bank_id" class="form-select" required>
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="account_number" class="form-label">Nomor Akun</label>
                            <input type="text" class="form-control" id="account_number" name="account_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="account_status" class="form-label">Status</label>
                            <select name="account_status" class="form-select" required>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal untuk Mengedit Akun Bank -->
    <div class="modal fade" id="editBankAccountModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Akun Bank</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data" id="editBankAccountForm">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="POST">
                        <div class="mb-3">
                            <label for="edit_account_name" class="form-label">Nama Akun</label>
                            <input type="text" class="form-control" id="edit_account_name" name="account_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_bank_id" class="form-label">Bank</label>
                            <select name="bank_id" class="form-select" id="edit_bank_id" required>
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_account_number" class="form-label">Nomor Akun</label>
                            <input type="text" class="form-control" id="edit_account_number" name="account_number"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_account_status" class="form-label">Status</label>
                            <select name="account_status" class="form-select" id="edit_account_status" required>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Trigger edit modal and populate with bank account data
            $('.editBankAccountBtn').on('click', function() {
                var accountId = $(this).data('id');
                var accountName = $(this).data('name');
                var accountNumber = $(this).data('number');
                var accountStatus = $(this).data('status');
                var bankId = $(this).data('bank');
                var accountImage = $(this).data('image');

                // Set form action URL
                $('#editBankAccountForm').attr('action', '/backoffice/bank-accounts/' + accountId);

                // Populate modal fields with existing data
                $('#edit_account_name').val(accountName);
                $('#edit_account_number').val(accountNumber);
                $('#edit_account_status').val(accountStatus);
                $('#edit_bank_id').val(bankId);
                $('#current_image').attr('src', accountImage);

                // Show modal after filling the data
                $('#editBankAccountModal').modal('show');
            });
        });
    </script>
@endsection
