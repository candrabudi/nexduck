@extends('backend.layouts.app')

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card profile-overview">
                <div class="card-body d-flex">
                    <div class="clearfix">
                        <div class="d-inline-block position-relative me-sm-4 me-3 mb-3 mb-lg-0">
                            <img src="https://cdn-icons-png.flaticon.com/512/4202/4202843.png" alt="" class="rounded-4 profile-avatar">
                            <span class="fa fa-circle border border-3 border-white text-success position-absolute bottom-0 end-0 rounded-circle"></span>
                        </div>
                    </div>
                    <div class="clearfix d-xl-flex flex-grow-1">
                        <div class="clearfix pe-md-5">
                            <h3 class="fw-semibold mb-1">{{ $network->member->full_name }}</h3>
                            <ul class="d-flex flex-wrap fs-6 align-items-center">
                                <li class="me-3 d-inline-flex align-items-center">
                                    <i class="fas fa-envelope me-2"></i>
                                    {{ $network->user->email }}
                                </li>
                                <li class="me-3 d-inline-flex align-items-center">
                                    <i class="fas fa-phone me-2"></i>
                                    {{ $network->member->phone_number }}
                                </li>
                            </ul>
                            <div class="mt-3">
                                <h6 class="fw-bold">Bank Details</h6>
                                <ul class="fs-6">
                                    <li><strong>Bank:</strong> {{ $network->memberBank->bank->bank_name }}</li>
                                    <li><strong>Nama Rekening:</strong> {{ $network->memberBank->account_name }}</li>
                                    <li><strong>Nomor Rekening:</strong> {{ $network->memberBank->account_number }}</li>
                                </ul>
                            </div>
                            
                            <div class="d-md-flex d-none flex-wrap">
                                <div class="border outline-dashed rounded p-2 d-flex align-items-center me-3 mt-3">
                                    <div class="avatar avatar-md style-1 bg-primary-light text-primary rounded d-flex align-items-center justify-content-center">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 1V23" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M17 5H9.5C8.57174 5 7.6815 5.36875 7.02513 6.02513C6.36875 6.6815 6 7.57174 6 8.5C6 9.42826 6.36875 10.3185 7.02513 10.9749C7.6815 11.6313 8.57174 12 9.5 12H14.5C15.4283 12 16.3185 12.3687 16.9749 13.0251C17.6313 13.6815 18 14.5717 18 15.5C18 16.4283 17.6313 17.3185 16.9749 17.9749C16.3185 18.6313 15.4283 19 14.5 19H6" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <div class="clearfix ms-2">
                                        <h3 class="mb-0 fw-semibold lh-1">coming soon</h3>
                                        <span class="fs-14">Total Transaksi</span>
                                    </div>
                                </div>
                                <div class="border outline-dashed rounded p-2 d-flex align-items-center me-3 mt-3">
                                    <div class="avatar avatar-md style-1 bg-primary-light text-primary rounded d-flex align-items-center justify-content-center">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M9 11C11.2091 11 13 9.20914 13 7C13 4.79086 11.2091 3 9 3C6.79086 3 5 4.79086 5 7C5 9.20914 6.79086 11 9 11Z" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <div class="clearfix ms-2">
                                        <h3 class="mb-0 fw-semibold lh-1">{{ count($userNetworks) }}</h3>
                                        <span class="fs-14">Total Referral</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Data User Referral </h6>
                </div>
                <div class="card-body">
                    <!-- Tabel Data -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Nominal</th>
                                <th>Total Transaksi</th>
                                <th>Tanggal Daftar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userNetworks as $user)    
                                <tr>
                                    <td>{{ $user->user->username }}</td>
                                    <td>{{ $user->member->full_name }}</td>
                                    <td>{{ $user->user->email }}</td>
                                    <td>{{ $user->transactionDeposit ? $user->transactionDeposit->amount : 0 }}</td>
                                    <td>{{ count($user->transactionDeposits) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
@endsection

@section('scripts')
   
@endsection
