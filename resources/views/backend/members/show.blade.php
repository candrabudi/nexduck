@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <!-- Card Content -->
        <div class="col-xl-4">
            <div class="card">
                {{-- <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="card-title mb-0">Data Member</h6>
                    <!-- Edit Button to Trigger Modal -->
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#transactionModal">
                        Edit Transaksi
                    </button>
                </div> --}}
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="card-title mb-0">Data Member</h6>
                    <!-- Edit Button to Trigger SweetAlert -->
                    <button type="button" class="btn btn-sm btn-primary" onclick="showComingSoonAlert()">
                        Edit Transaksi
                    </button>
                </div>

                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row" class="text-muted">Username</th>
                                <td class="fw-semibold">{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-muted">Email</th>
                                <td class="fw-semibold">{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-muted">Nama Lengkap</th>
                                <td class="fw-semibold">{{ $user->member->full_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-muted">Nomor Handphone</th>
                                <td class="fw-semibold">{{ $user->member->phone_number }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-xl-4">
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="card-title">Aktivitas User</h6>
                </div>
                <div class="card-body">
                    <!-- Tabel aktivitas user -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Aktivitas</th>
                                <th>IP Address</th>
                                <th>Browser</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Login</td>
                                <td>192.168.1.1</td>
                                <td>Chrome</td>
                                <td>2024-11-29</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="card-title">Game Dimainkan</h6>
                </div>
                <div class="card-body">
                    <!-- Tabel game yang dimainkan -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Game</th>
                                <th>IP Address</th>
                                <th>Browser</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Slot Adventure</td>
                                <td>192.168.1.1</td>
                                <td>Chrome</td>
                                <td>2024-11-29</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="card-title">Daftar Transaksi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th>Nama Bank</th>
                                    <th>Nomor Akun</th>
                                    <th>Bank</th>
                                    <th>Nominal</th>
                                    <th>Status</th>
                                    <th>IP Address</th>
                                    <th>Browser</th>
                                    <th>Tanggal Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>123456789</td>
                                    <td>BCA</td>
                                    <td>Rp 1.000.000</td>
                                    <td><span class="badge bg-success">Berhasil</span></td>
                                    <td>192.168.1.1</td>
                                    <td>Chrome</td>
                                    <td>2024-11-29</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <!-- Modal for Transaction Update -->
    <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transactionModalLabel">Update Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe Transaksi</label>
                            <select class="form-select" name="type" id="type" required>
                                <option value="manual_deposit">Manual Deposit</option>
                                <option value="manual_withdraw">Manual Withdraw</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="amount" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="amount" id="amount" value="" required
                                min="1" placeholder="Masukkan Jumlah">
                        </div>

                        <div class="mb-3">
                            <label for="reason" class="form-label">Alasan</label>
                            <textarea class="form-control" name="reason" id="reason" rows="3" placeholder="Masukkan alasan transaksi"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function showComingSoonAlert() {
            Swal.fire({
                icon: 'info',
                title: 'Coming Soon',
                text: 'Fitur ini belum tersedia!',
                confirmButtonText: 'OK'
            });
        }
    </script>
@endsection
