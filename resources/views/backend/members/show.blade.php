@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card profile-overview">
                <div class="card-body d-flex">
                    <div class="clearfix">
                        <div class="d-inline-block position-relative me-sm-4 me-3 mb-3 mb-lg-0">
                            <img src="https://cdn-icons-png.flaticon.com/512/3906/3906577.png" alt=""
                                class="rounded-4 profile-avatar">
                            <span
                                class="fa fa-circle border border-3 border-white text-success position-absolute bottom-0 end-0 rounded-circle"></span>
                        </div>
                    </div>
                    <div class="clearfix d-xl-flex flex-grow-1">
                        <div class="clearfix pe-md-5">
                            <h3 class="fw-semibold mb-1">{{ $user->member->full_name }} <img
                                    src="https://cdn-icons-png.flaticon.com/512/6270/6270515.png" width="24"
                                    alt="Blue Tick"></h3>
                            <ul class="d-flex flex-wrap fs-6 align-items-center">
                                <li class="me-3 d-inline-flex align-items-center"><i
                                        class="las la-user me-1 fs-18"></i>{{ $user->username }}</li>
                                <li class="me-3 d-inline-flex align-items-center"><i
                                        class="las la-phone me-1 fs-18"></i>{{ $user->member->phone_number }}</li>
                                <li class="me-3 d-inline-flex align-items-center"><i
                                        class="las la-envelope me-1 fs-18"></i>{{ $user->email }}</li>
                            </ul>
                            <div class="d-md-flex d-none flex-wrap">
                                <div class="border outline-dashed rounded p-2 d-flex align-items-center me-3 mt-3">
                                    <div
                                        class="avatar avatar-md style-1 bg-primary-light text-primary rounded d-flex align-items-center justify-content-center">

                                        <img src="https://cdn-icons-png.flaticon.com/512/16914/16914760.png " width="32"
                                            alt="">
                                    </div>
                                    <div class="clearfix ms-2">
                                        <h3 class="mb-0 fw-semibold lh-1">Rp {{ number_format($totalDeposit, 0, ',', '.') }}
                                        </h3>
                                        <span class="fs-14">Total Deposit</span>
                                    </div>
                                </div>
                                <div class="border outline-dashed rounded p-2 d-flex align-items-center me-3 mt-3">
                                    <div
                                        class="avatar avatar-md style-1 bg-primary-light text-primary rounded d-flex align-items-center justify-content-center">
                                        <img src="https://cdn-icons-png.flaticon.com/512/2769/2769253.png" width="32"
                                            alt="">
                                    </div>
                                    <div class="clearfix ms-2">
                                        <h3 class="mb-0 fw-semibold lh-1">Rp
                                            {{ number_format($totalWithdraw, 0, ',', '.') }}
                                        </h3>
                                        <span class="fs-14">Total Withdraw</span>
                                    </div>
                                </div>
                                <div class="border outline-dashed rounded p-2 d-flex align-items-center me-3 mt-3">
                                    <div
                                        class="avatar avatar-md style-1 bg-primary-light text-primary rounded d-flex align-items-center justify-content-center">
                                        <img src="https://cdn-icons-png.flaticon.com/512/11509/11509409.png" width="32"
                                            alt="">
                                    </div>
                                    <div class="clearfix ms-2">
                                        <h3 class="mb-0 fw-semibold lh-1">Rp
                                            {{ number_format($totalDeposit - $totalWithdraw, 0, ',', '.') }}</h3>
                                        <span class="fs-14"></span>Kalkulasi Profit
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix mt-3 mt-xl-0 ms-auto d-flex flex-column col-xl-4">
                            <div class="clearfix mb-3 text-xl-end">
                                <a href="javascript:void(0);" class="btn btn-sm btn-primary text-white"
                                    onclick="showComingSoonAlert()">Edit Transaksi</a>
                                <a href="javascript:void(0);" class="btn btn-sm btn-danger ms-2"
                                    onclick="showComingSoonAlert()">Lock Game</a>
                                <a href="javascript:void(0);" class="btn btn-sm btn-warning ms-2" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalCenter">Ganti Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="card-title">Aktivitas User</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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
                                @foreach ($logActivities as $la)
                                    <tr>
                                        <td>{{ $la->menu }}</td>
                                        <td>{{ $la->ip_address }}</td>
                                        <td>{{ $la->browser }}</td>
                                        <td>{{ \Carbon\Carbon::parse($la->created_at)->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <nav>
                        <ul class="pagination pagination-sm">
                            <li class="page-item {{ $logActivities->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $logActivities->previousPageUrl() }}">
                                    <i class="la la-angle-left"></i>
                                </a>
                            </li>
        
                            @foreach ($logActivities->getUrlRange(1, $logActivities->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $logActivities->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
        
                            <li class="page-item {{ $logActivities->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $logActivities->nextPageUrl() }}">
                                    <i class="la la-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="card-title">Game Dimainkan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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
                                @foreach ($logGames as $lg)
                                    <tr>
                                        <td>{{ $lg->game->game_name }}</td>
                                        <td>{{ $lg->ip_address }}</td>
                                        <td>{{ $lg->browser }}</td>
                                        <td>{{ $lg->created_at->format('Y-m-d') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
        
                    <!-- Custom Pagination Layout -->
                    <nav>
                        <ul class="pagination pagination-sm">
                            <!-- Previous Button -->
                            <li class="page-item {{ $logGames->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $logGames->previousPageUrl() }}">
                                    <i class="la la-angle-left"></i>
                                </a>
                            </li>
        
                            <!-- Page Number Links -->
                            @foreach ($logGames->getUrlRange(1, $logGames->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $logGames->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
        
                            <!-- Next Button -->
                            <li class="page-item {{ $logGames->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $logGames->nextPageUrl() }}">
                                    <i class="la la-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
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
                                        <td>{{ $trx->userBank->account_number }}</td>
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

                            </tbody>
                        </table>

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

    <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel"
        aria-hidden="true">
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

    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{ route('backoffice.members.change-password', $user->id) }}" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ganti Password Pemain</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="new_password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" name="new_password" id="new_password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-primary">Ganti Password</button>
                    </div>
                </div>
            </form>
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
