@extends('backend.layouts.app')

@section('content')
    <div class="filter cm-content-box box-primary">
        <div class="content-title SlideToolHeader">
            <div class="cpa">
                <i class="fa-sharp fa-solid fa-filter me-2"></i>Filter
            </div>
            <div class="tools">
                <a href="javascript:void(0);" class="handle expand"><i class="fal fa-angle-down"></i></a>
            </div>
        </div>
        <div class="cm-content-body form excerpt">
            <div class="card-body">
                <div class="row g-3">
                    <form action="javascript:void(0);" method="GET" id="search-form"
                        class="d-flex flex-wrap align-items-end w-100">
                        <div class="col-12 col-md-4 col-lg-3 p-2">
                            <label class="form-label">Nama Game</label>
                            <input type="text" name="search" class="form-control" placeholder="Nama Game"
                                value="{{ request()->get('search') }}">
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mt-3 mt-md-0 p-2">
                            <label class="form-label">Provider</label>
                            <div class="dropdown bootstrap-select form-control default-select h-auto wide">
                                <select class="form-control default-select h-auto wide" name="provider">
                                    @foreach ($providers as $provider)
                                        <option value="{{ $provider->id }}"
                                            {{ request()->get('provider') == $provider->id ? 'selected' : '' }}>
                                            {{ $provider->provider_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mt-3 mt-md-0 p-2">
                            <button class="btn btn-primary w-100" title="Click here to Search" type="submit">
                                <i class="fa fa-filter me-1"></i>Filter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="filter cm-content-box box-primary">
        <div class="content-title SlideToolHeader">
            <div class="cpa">
                <i class="fa-solid fa-file-lines me-1"></i>Data Game
            </div>
            <div class="tools">
                <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
            </div>
        </div>
        <div class="cm-content-body form excerpt">
            <div class="card-body pb-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Game Name</th>
                                <th>Provider</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="games-table">
                            <!-- Game rows will be loaded via AJAX -->
                        </tbody>
                    </table>
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <small class="me-3" id="pagination-info"></small>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination mb-2 mb-sm-0" id="pagination-links"></ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('backoffice/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backoffice/vendor/chartist/css/chartist.min.css') }}">
    <link href="{{ asset('backoffice/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backoffice/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backoffice/vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css') }}"
        rel="stylesheet">
    <link class="main-css" href="{{ asset('backoffice/css/style.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script>
        // Function to load data using AJAX
        function loadGames(page = 1) {
            var formData = $('#search-form').serialize() + '&page=' + page;

            $.ajax({
                url: '{{ route('backoffice.games.loadData') }}',
                method: 'GET',
                data: formData,
                success: function(response) {
                    var tableHtml = '';
                    response.games.forEach(function(game, index) {
                        var statusBadge = game.game_status == 1 ?
                            '<span class="badge bg-success">Active</span>' :
                            '<span class="badge bg-danger">Inactive</span>';

                        tableHtml += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${game.game_name}</td>
                                <td>${game.provider.provider_name}</td>
                                <td>${statusBadge}</td>
                                <td>${game.created_at}</td>
                                <td class="text-nowrap">
                                    <a href="javascript:void(0);" class="btn btn-warning btn-sm content-icon">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm content-icon">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        `;
                    });
                    $('#games-table').html(tableHtml);

                    var paginationInfo =
                        `Page ${response.pagination.current_page} of ${response.pagination.last_page}, showing ${response.pagination.per_page} records out of ${response.pagination.total} total`;
                    $('#pagination-info').text(paginationInfo);

                    var paginationHtml = '';
                    var currentPage = response.pagination.current_page;
                    var lastPage = response.pagination.last_page;

                    paginationHtml += `
                        <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                            <a class="page-link" href="javascript:void(0);" data-page="1"><i class="fa-solid fa-angle-left"></i></a>
                        </li>
                        <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                            <a class="page-link" href="javascript:void(0);" data-page="${currentPage - 1}"><i class="fa-solid fa-angle-left"></i></a>
                        </li>
                    `;

                    for (let i = 1; i <= 5 && i <= lastPage; i++) {
                        paginationHtml += `
                            <li class="page-item ${i === currentPage ? 'active' : ''}">
                                <a href="javascript:void(0);" class="page-link" data-page="${i}">${i}</a>
                            </li>
                        `;
                    }

                    if (currentPage > 5 && currentPage < lastPage - 5) {
                        paginationHtml += `
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        `;
                    }

                    for (let i = Math.max(lastPage - 4, 6); i <= lastPage; i++) {
                        paginationHtml += `
                            <li class="page-item ${i === currentPage ? 'active' : ''}">
                                <a href="javascript:void(0);" class="page-link" data-page="${i}">${i}</a>
                            </li>
                        `;
                    }

                    paginationHtml += `
                        <li class="page-item ${currentPage === lastPage ? 'disabled' : ''}">
                            <a class="page-link" href="javascript:void(0);" data-page="${currentPage + 1}"><i class="fa-solid fa-angle-right"></i></a>
                        </li>
                        <li class="page-item ${currentPage === lastPage ? 'disabled' : ''}">
                            <a class="page-link" href="javascript:void(0);" data-page="${lastPage}"><i class="fa-solid fa-angle-right"></i></a>
                        </li>
                    `;

                    $('#pagination-links').html(paginationHtml);
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error);
                }
            });
        }

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).data('page');
            loadGames(page);
        });

        loadGames();

        $('#search-form').on('submit', function(e) {
            e.preventDefault();
            loadGames();
        });
    </script>
@endsection
