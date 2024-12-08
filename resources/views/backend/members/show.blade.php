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

                    <form action="{{ route('backoffice.members.change-password', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="new_password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" name="new_password" id="new_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </form>
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
                                    <th>Tanggal Dibuat</th>
                                    <th>Tanggal Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $trx)    
                                    <tr>
                                        <td>{{ $trx->userBank->account_name }}</td>
                                        <td>{{ $trx->userBank->account_number  }}</td>
                                        <td>{{ $trx->userBank->bank->bank_name }}</td>
                                        <td>Rp {{ number_format($trx->amount, 0, ',', '.') }}</td>
                                        <td>
                                            @if ($trx->status == 'pending')
                                                <span class="badge bg-success">Pending</span>
                                            @elseif($trx->status == 'approved')
                                                <span class="badge bg-success">Disetujui</span>
                                            @elseif($trx->status == 'rejected')
                                                <span class="badge bg-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>{{ $trx->created_ip_address }}</td>
                                        <td>{{ \Carbon\Carbon::parse($trx->created_at)->format('Y-m-d H:i:s') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($trx->updated_at)->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="card-title">Riwayat Permainan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md" id="game-history-table">
                            <thead>
                                <tr>
                                    <th>ID Riwayat</th>
                                    <th>Kode User</th>
                                    <th>Provider</th>
                                    <th>Game</th>
                                    <th>Bet</th>
                                    <th>Win</th>
                                    <th>Tipe</th>
                                    <th>Saldo Dimulai</th>
                                    <th>Saldo Terakhir</th>
                                    <th>Tanggal Permainan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be populated by JavaScript -->
                            </tbody>
                        </table>

                        <!-- Pagination Controls -->
                        <div id="pagination-controls" class="d-flex justify-content-between">
                            <button id="prev-page" class="btn btn-primary" disabled>Previous</button>
                            <span id="page-info"></span>
                            <button id="next-page" class="btn btn-primary">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <input type="number" class="form-control" name="amount" id="amount" value=""
                                required min="1" placeholder="Masukkan Jumlah">
                        </div>

                        <div class="mb-3">
                            <label for="reason" class="form-label">Alasan</label>
                            <textarea class="form-control" name="reason" id="reason" rows="3"
                                placeholder="Masukkan alasan transaksi"></textarea>
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
        let currentPage = 1;
        const perPage = 10;
        function fetchGameHistory(page) {
            fetch('{{ route('backoffice.members.getGameHistoryPlayer', $user->id) }}?page=' + page)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        const tableBody = document.querySelector('#game-history-table tbody');
                        const paginationControls = document.getElementById('pagination-controls');
                        const pageInfo = document.getElementById('page-info');
                        const prevButton = document.getElementById('prev-page');
                        const nextButton = document.getElementById('next-page');

                        tableBody.innerHTML = '';
                        data.game_logs.forEach(log => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                            <td>${log.history_id}</td>
                            <td>${log.user_code}</td>
                            <td>${log.provider_code}</td>
                            <td>${log.game_code}</td>
                            <td>${log.bet_money}</td>
                            <td>${log.win_money}</td>
                            <td>${log.txn_type}</td>
                            <td>${log.user_start_balance}</td>
                            <td>${log.user_end_balance}</td>
                            <td>${new Date(log.created_at).toLocaleString()}</td>
                        `;
                            tableBody.appendChild(row);
                        });

                        pageInfo.textContent = `Page ${data.current_page} of ${data.total_pages}`;
                        prevButton.disabled = data.current_page === 1;
                        nextButton.disabled = data.current_page === data.total_pages;
                    }
                })
                .catch(error => console.error('Error fetching game history:', error));
        }

        document.getElementById('prev-page').addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                fetchGameHistory(currentPage);
            }
        });

        document.getElementById('next-page').addEventListener('click', () => {
            currentPage++;
            fetchGameHistory(currentPage);
        });
        fetchGameHistory(currentPage);
    </script>

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
