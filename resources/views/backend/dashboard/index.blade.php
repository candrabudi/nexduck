@extends('backend.layouts.app')
@section('titleHeader', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-xl-6">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="any-card">
                        <div class="c-con">
                            <h4 class="heading mb-0">Selamat <strong>Hanu!!</strong><img src="images/crm/party-popper.png"
                                    alt=""></h4>
                            <span>Penjual Terbaik Minggu Ini</span>
                            <p class="mt-3">Lorem Ipsum adalah teks dummy yang biasa digunakan dalam industri percetakan
                                dan penyusunan tata letak. 😎</p>

                            <a href="app-profile-1.html" class="btn btn-primary btn-sm">Lihat Profil</a>
                        </div>
                        <img src="images/analytics/developer_male.png" class="harry-img" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6">
            <div class="card bg-primary">
                <div class="card-header border-0">
                    <h4 class="heading mb-0 text-white">Transaksi Hari Ini 😎</h4>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <!-- Box untuk User -->
                        <div class="col-xl-4 col-sm-4 col-6">
                            <div class="card ov-card">
                                <div class="card-body">
                                    <div class="ana-box">
                                        <div class="anta-data">
                                            <h5>Total Withdraw</h5>
                                            <span>@totalUser</span>
                                            <h3>+120</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-xl-4 col-sm-4 col-6">
                            <div class="card ov-card">
                                <div class="card-body">
                                    <div class="ana-box">
                                        <div class="anta-data">
                                            <h5>Total Deposit</h5>
                                            <span>@totalDeposit</span>
                                            <h3>Rp 1,200,000</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-4 col-6">
                            <div class="card ov-card">
                                <div class="card-body">
                                    <div class="ana-box">
                                        <div class="anta-data">
                                            <h5>Total Coin</h5>
                                            <span>@totalWithdraw</span>
                                            <h3>Rp 800,000</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card bg-primary-light analytics-card">
                <div class="card-body mt-xl-4 mt-0 pb-1">
                    <div class="row align-items-center">
                        <div class="col-xl-2">
                            <h3 class="mb-3">Analisis Transaksi</h3>
                            <p class="mb-0 text-primary pb-4">Statistik transaksi untuk<br> periode 1 bulan terakhir.</p>
                        </div>
                        <div class="col-xl-10">
                            <div class="row">
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary rounded-circle">
                                                        <i class="fa-solid fa-users text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>User</h5>
                                                    <span>@totalUser</span>
                                                    <h3>+120</h3> <!-- Tambahkan data sesuai dengan total user -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Box untuk Deposit -->
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary rounded-circle">
                                                        <i class="fa-solid fa-arrow-down text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>Deposit</h5>
                                                    <span>@totalDeposit</span>
                                                    <h3>Rp 1,200,000</h3>
                                                    <!-- Tambahkan data sesuai dengan total deposit -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Box untuk Withdraw -->
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary rounded-circle">
                                                        <i class="fa-solid fa-arrow-up text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>Withdraw</h5>
                                                    <span>@totalWithdraw</span>
                                                    <h3>Rp 800,000</h3> <!-- Tambahkan data sesuai dengan total withdraw -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Box untuk Total Transaksi -->
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary rounded-circle">
                                                        <i class="fa-solid fa-credit-card text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>Total Transaksi</h5>
                                                    <span>@totalTransaction</span>
                                                    <h3>Rp 2,000,000</h3>
                                                    <!-- Tambahkan data sesuai dengan total transaksi -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Box untuk Total Claim Promosi -->
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary rounded-circle">
                                                        <i class="fa-solid fa-gift text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>Claim Promosi</h5>
                                                    <span>@totalClaim</span>
                                                    <h3>+150</h3> <!-- Tambahkan data sesuai dengan total claim promosi -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Box untuk Total User Banned -->
                                <div class="col-xl-2 col-sm-4 col-6">
                                    <div class="card ov-card">
                                        <div class="card-body">
                                            <div class="ana-box">
                                                <div class="ic-n-bx">
                                                    <div class="icon-box bg-primary rounded-circle">
                                                        <i class="fa-solid fa-ban text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="anta-data">
                                                    <h5>User Banned</h5>
                                                    <span>@totalBanned</span>
                                                    <h3>+12</h3> <!-- Tambahkan data sesuai dengan total user banned -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-12">
            <div class="card">
                <div class="card-header border-0">
                    <h4 class="heading mb-0">Reports Of Earning</h4>
                </div>
                <div class="card-body py-0">
                    <div class="row align-items-center">
                        <!-- Chart for Deposit and Withdraw Comparison in Last 7 Days -->
                        <div class="col-xl-12 custome-tooltip">
                            <div id="comparisonChart" class="chartBar"></div>
                            <!-- Chart Bar for Deposit and Withdraw per day -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-xxl-6 col-md-6">
            <div class="card">
                <div class="card-header border-0">
                    <div>
                        <h4 class="heading mb-0">Data Login Pemain</h4>
                        <span>25 Terakhir login</span>
                    </div>	
                </div>
                <div class="card-body p-0 pb-3">
                    <ul class="country-sale dz-scroll">
                        <li class="d-flex">
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                              <div class="ms-2">
                                <h6 class="mb-0">Username 01</h6>
                                <small>Jakarta, Indonesia</small>
                              </div>
                                <span class="badge badge-primary  border-0 ms-2">192.1.1.0</span>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                              <div class="ms-2">
                                <h6 class="mb-0">Username 01</h6>
                                <small>Jakarta, Indonesia</small>
                              </div>
                                <span class="badge badge-primary  border-0 ms-2">192.1.1.0</span>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                              <div class="ms-2">
                                <h6 class="mb-0">Username 01</h6>
                                <small>Jakarta, Indonesia</small>
                              </div>
                                <span class="badge badge-primary  border-0 ms-2">192.1.1.0</span>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                              <div class="ms-2">
                                <h6 class="mb-0">Username 01</h6>
                                <small>Jakarta, Indonesia</small>
                              </div>
                                <span class="badge badge-primary  border-0 ms-2">192.1.1.0</span>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                              <div class="ms-2">
                                <h6 class="mb-0">Username 01</h6>
                                <small>Jakarta, Indonesia</small>
                              </div>
                                <span class="badge badge-primary  border-0 ms-2">192.1.1.0</span>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                              <div class="ms-2">
                                <h6 class="mb-0">Username 01</h6>
                                <small>Jakarta, Indonesia</small>
                              </div>
                                <span class="badge badge-primary  border-0 ms-2">192.1.1.0</span>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                              <div class="ms-2">
                                <h6 class="mb-0">Username 01</h6>
                                <small>Jakarta, Indonesia</small>
                              </div>
                                <span class="badge badge-primary  border-0 ms-2">192.1.1.0</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        
        <div class="col-xl-3 col-xxl-6 col-md-6">
            <div class="card">
                <div class="card-header border-0">
                    <div>
                        <h4 class="heading mb-0">Terakhir Game yang Dimainkan</h4>
                        <span>25 Permain Terakhir</span>
                    </div>	
                </div>
                <div class="card-body p-0 pb-3">
                    <ul class="country-sale dz-scroll">
                        <li class="d-flex">
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                              <div class="ms-2">
                                <h6 class="mb-0">Username 01</h6>
                                <small>PGSOFT</small>
                              </div>
                                <span class="badge badge-success  border-0 ms-2">Mahjong Ways</span>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                              <div class="ms-2">
                                <h6 class="mb-0">Username 01</h6>
                                <small>PGSOFT</small>
                              </div>
                                <span class="badge badge-success  border-0 ms-2">Mahjong Ways</span>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                              <div class="ms-2">
                                <h6 class="mb-0">Username 01</h6>
                                <small>PGSOFT</small>
                              </div>
                                <span class="badge badge-success  border-0 ms-2">Mahjong Ways</span>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                              <div class="ms-2">
                                <h6 class="mb-0">Username 01</h6>
                                <small>PGSOFT</small>
                              </div>
                                <span class="badge badge-success  border-0 ms-2">Mahjong Ways</span>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                              <div class="ms-2">
                                <h6 class="mb-0">Username 01</h6>
                                <small>PGSOFT</small>
                              </div>
                                <span class="badge badge-success  border-0 ms-2">Mahjong Ways</span>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                              <div class="ms-2">
                                <h6 class="mb-0">Username 01</h6>
                                <small>PGSOFT</small>
                              </div>
                                <span class="badge badge-success  border-0 ms-2">Mahjong Ways</span>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                              <div class="ms-2">
                                <h6 class="mb-0">Username 01</h6>
                                <small>PGSOFT</small>
                              </div>
                                <span class="badge badge-success  border-0 ms-2">Mahjong Ways</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <link href="{{ asset('backoffice/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backoffice/vendor/swiper/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backoffice/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backoffice/vendor/datatables/css/buttons.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backoffice/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}"
        rel="stylesheet">
    <!-- Style css -->
    <link class="main-css" href="{{ asset('backoffice/css/style.css') }}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/4.1.0/apexcharts.min.js"
        integrity="sha512-pX8wly6uaNHjO2Idm8xpq7Fu52iU/F3IK2rS8vTUlw7138ZsDCgfljwotyOpQxycTqK4MryB4Pv7ArDmzx7sPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('backoffice/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/chart-js/chart.bundle.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>


    <!-- Vectormap -->
    <script src="{{ asset('backoffice/js/custom.min.js') }}"></script>
    <script src="{{ asset('backoffice/js/deznav-init.js') }}"></script>
    <script src="{{ asset('backoffice/js/demo.js') }}"></script>
    <script src="{{ asset('backoffice/js/styleSwitcher.js') }}"></script>


    <script>
        // Example data for 7 days (replace with real data as needed)
        let depositData = [1000, 2000, 1500, 1200, 1300, 1100, 1400];  // Deposit amounts for the last 7 days
        let withdrawData = [500, 700, 600, 400, 650, 500, 550];       // Withdrawal amounts for the same period
    
        let labels = ['2024-11-22', '2024-11-23', '2024-11-24', '2024-11-25', '2024-11-26', '2024-11-27', '2024-11-28']; // Labels for the days
    
        // Chart options
        var options = {
            chart: {
                type: 'bar', // Bar chart
                height: 350,
                stacked: true, // Stack bars on top of each other
                toolbar: {
                    show: false // Hide toolbar
                }
            },
            series: [
                {
                    name: 'Deposit (Rp)',
                    data: depositData, // Deposit data
                    color: '#007bff' // Blue color for Deposit
                },
                {
                    name: 'Withdraw (Rp)',
                    data: withdrawData, // Withdraw data
                    color: '#dc3545' // Red color for Withdraw
                }
            ],
            xaxis: {
                categories: labels, // Date labels
                labels: {
                    rotate: -45, // Rotate labels for better readability
                    style: {
                        colors: '#6c757d',
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                title: {
                    text: 'Amount (Rp)',
                    style: {
                        fontSize: '14px',
                        fontWeight: 'bold'
                    }
                },
                labels: {
                    formatter: function(value) {
                        return 'Rp ' + value.toLocaleString(); // Format Y-axis values
                    }
                },
                min: 0, // Start from 0
            },
            tooltip: {
                shared: true, // Shared tooltip
                intersect: false, // Avoid intersect issue
                y: {
                    formatter: function(value) {
                        return 'Rp ' + value.toLocaleString(); // Format tooltip values
                    }
                }
            },
            responsive: [
                {
                    breakpoint: 768, // When screen width is less than 768px
                    options: {
                        chart: {
                            height: 350
                        },
                        xaxis: {
                            labels: {
                                rotate: 0 // No rotation on smaller screens
                            }
                        }
                    }
                }
            ]
        };
    
        // Render the chart
        var chart = new ApexCharts(document.querySelector("#comparisonChart"), options);
        chart.render();
    </script>
@endsection
