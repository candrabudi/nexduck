@php
    use App\Models\User;
    use App\Models\Setting;
    $setting = Setting::first();
@endphp
@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Dashboard</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <div id="total-revenue-chart" data-colors='["--bs-primary"]'></div>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1">{{ $totalMembers }}</h4>
                            <p class="text-muted mb-0">Total Member</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <div id="orders-chart" data-colors='["--bs-success"]'></div>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1">Rp {{ number_format($totalTransactions, 0, ',', '.') }}</h4>
                            <p class="text-muted mb-0">Total Transaksi Sukses</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <div id="customers-chart" data-colors='["--bs-primary"]'></div>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1">Rp {{ number_format($totalDeposit, 0, ',', '.') }}</h4>
                            <p class="text-muted mb-0">Deposit Sukses</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <div id="growth-chart" data-colors='["--bs-warning"]'></div>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1">Rp {{ number_format($totalWithdraw, 0, ',', '.') }}</h4>
                            <p class="text-muted mb-0">Withdraw Sukses</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">

                        <div class="row mb-4">
                            <div class="col-md-4">
                                <select id="period-select" class="form-select">
                                    <option value="month">Bulan Ini</option>
                                    <option value="week">Minggu Ini</option>
                                    <option value="day">Hari Ini</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="chart" class="chart-container">
                                            <div id="loading" class="loading-spinner" style="display: none;">
                                                <i class="fa fa-spinner fa-spin"></i> Loading...
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <select id="period-select" class="form-control">
                            <option value="month">Bulan Ini</option>
                            <option value="last_month">Bulan Lalu</option>
                            <option value="today">Hari Ini</option>
                            <option value="yesterday">Kemarin</option>
                            <option value="last_week">1 Minggu Terakhir</option>
                            <option value="this_week">Minggu Ini</option>
                        </select>

                        <div id="pie-chart">
                            <div id="loading-pie" class="loading-spinner" style="display: none;">
                                <i class="fa fa-spinner fa-spin"></i> Loading...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('backoffice/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        // Fetch the transaction data for the chart
        function fetchChartData(period) {
            document.getElementById('loading').style.display = 'block'; // Show loading spinner
            fetch(`/backoffice/dashboard/get-transaction-data/{{ $setting->web_token }}?period=${period}`)
                .then(response => response.json())
                .then(data => {
                    renderChart(data);
                    document.getElementById('loading').style.display = 'none'; // Hide loading spinner
                })
                .catch(() => {
                    document.getElementById('loading').style.display = 'none'; // Hide loading spinner in case of error
                });
        }

        // Render the spline chart with transaction data
        function renderChart(data) {
            var options = {
                series: [{
                    name: 'Deposit',
                    data: data.deposit
                }, {
                    name: 'Withdraw',
                    data: data.withdraw
                }, {
                    name: 'Bonus',
                    data: data.bonus
                }, {
                    name: 'Rolling',
                    data: data.rolling
                }, {
                    name: 'Cashback',
                    data: data.cashback
                }],
                chart: {
                    height: 350,
                    type: 'line', // Set chart type to 'line' for spline chart
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 3, // Increase stroke width for better visibility
                    curve: 'smooth', // Ensure the smooth curve for spline
                },
                title: {
                    text: 'Pertumbuhan Transaksi',
                    align: 'left'
                },
                xaxis: {
                    categories: data.labels, // x-axis categories based on labels from API
                    title: {
                        text: 'Tanggal' // Title for the x-axis
                    }
                },
                yaxis: {
                    title: {
                        text: 'Jumlah (Rupiah)' // Title for the y-axis
                    },
                    labels: {
                        formatter: function(value) {
                            return 'Rp ' + value.toLocaleString(); // Format currency labels
                        }
                    }
                },
                grid: {
                    borderColor: '#f1f1f1',
                    strokeDashArray: 5,
                    position: 'back'
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    floating: true,
                    offsetY: -25
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        }

        // Initialize the chart with default period (e.g., month)
        fetchChartData('month'); // Fetch data for the current month
    </script>

    <script>
        // Fetch data for the pie chart
        function fetchTransactionData(period) {
            document.getElementById('loading-pie').style.display = 'block'; // Show loading spinner for pie chart
            fetch(`/backoffice/dashboard/transaction-summary/{{ $setting->web_token }}?period=${period}`)
                .then(response => response.json())
                .then(data => {
                    renderPieChart(data);
                    document.getElementById('loading-pie').style.display = 'none'; // Hide loading spinner
                })
                .catch(() => {
                    document.getElementById('loading-pie').style.display =
                        'none'; // Hide loading spinner in case of error
                });
        }

        // Render the pie chart with transaction data
        function renderPieChart(transactionData) {
            var options = {
                series: transactionData.data,
                chart: {
                    height: 350,
                    type: 'pie' // Set chart type to pie
                },
                labels: transactionData.labels,
                title: {
                    text: 'Perbandingan Jumlah Transaksi Berdasarkan Tipe',
                    align: 'center',
                    style: {
                        fontSize: '14px',
                        fontWeight: 'bold',
                        color: '#333'
                    }
                },
                colors: ['#00E396', '#FF4560', '#FEB019', '#775DD0', '#28C76F'],
                dataLabels: {
                    enabled: true,
                    style: {
                        fontSize: '14px',
                        fontWeight: '500',
                        colors: ['#fff'],
                    },
                    dropShadow: {
                        enabled: true,
                        top: 1,
                        left: 1,
                        blur: 1,
                        opacity: 0.8
                    }
                },
                legend: {
                    position: 'bottom'
                }
            };

            var chart = new ApexCharts(document.querySelector("#pie-chart"), options);
            chart.render();
        }

        // Event listener for period select dropdown to change period
        document.getElementById('period-select').addEventListener('change', function(event) {
            var selectedPeriod = event.target.value;
            fetchChartData(selectedPeriod);
            fetchTransactionData(selectedPeriod);
        });
        fetchTransactionData('month'); // Load initial data for the current month for pie chart
    </script>
@endsection
