@extends('backend.layouts.app')

@section('content')
    <!-- Filter Section -->
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
                            <label class="form-label">Username</label>
                            <input type="text" name="search" class="form-control" placeholder="Username"
                                value="{{ request()->get('search') }}">
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mt-3 mt-md-0 p-2">
                            <label class="form-label">Status</label>
                            <div class="dropdown bootstrap-select form-control default-select h-auto wide">
                                <select class="form-control default-select h-auto wide" name="status">
                                    <option value="">Semua Status</option>
                                    <option value="pending" {{ request()->get('status') == 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="approved" {{ request()->get('status') == 'approved' ? 'selected' : '' }}>
                                        Approved</option>
                                    <option value="rejected" {{ request()->get('status') == 'rejected' ? 'selected' : '' }}>
                                        Rejected</option>
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

    <!-- Transactions Table Section -->
    <div class="filter cm-content-box box-primary">
        <div class="content-title SlideToolHeader">
            <div class="cpa">
                <i class="fa-solid fa-file-lines me-1"></i>Transaksi Deposit
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
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Account Number</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="transactions-table">
                            <!-- Transaction rows will be loaded via AJAX -->
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

    <!-- Edit Status Modal -->
    <div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStatusModalLabel">Edit Transaction Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-status-form">
                        <input type="hidden" id="transaction-id" name="transaction_id">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save-status-btn">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Function to load deposit transactions using AJAX
        function loadTransactions(page = 1) {
            var formData = $('#search-form').serialize() + '&page=' + page;

            $.ajax({
                url: '{{ route('backoffice.transactions.deposit.loadData') }}',
                method: 'GET',
                data: formData,
                success: function(response) {
                    var tableHtml = '';
                    response.transactions.forEach(function(transaction, index) {
                        var statusBadge = transaction.status == 'approved' ?
                            '<span class="badge bg-success">Approved</span>' :
                            transaction.status == 'rejected' ?
                            '<span class="badge bg-danger">Rejected</span>' :
                            '<span class="badge bg-warning">Pending</span>';

                        // Check if status is 'pending' to show the "Edit Status" button
                        var editButton = '';
                        if (transaction.status === 'pending') {
                            editButton = `
                        <button class="btn btn-warning btn-sm edit-status-btn" data-id="${transaction.id}" data-status="${transaction.status}">Edit Status</button>
                    `;
                        }else{
                            editButton = '<span class="badge bg-danger">Sudah Update</span>';
                        }

                        tableHtml += ` 
                    <tr>
                        <td>${index + 1}</td>
                        <td>${transaction.user.username}</td>
                        <td>${transaction.user_bank.account_name}</td>
                        <td>${transaction.user_bank.account_number}</td>
                        <td>${statusBadge}</td>
                        <td>${transaction.created_at}</td>
                        <td>${editButton}</td>
                    </tr>
                `;
                    });

                    $('#transactions-table').html(tableHtml);

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
                }
            });
        }


        $(document).ready(function() {
            loadTransactions();

            // Handle page change
            $('#pagination-links').on('click', '.page-link', function() {
                var page = $(this).data('page');
                loadTransactions(page);
            });

            // Handle Edit Status button click
            $(document).on('click', '.edit-status-btn', function() {
                var transactionId = $(this).data('id');
                var currentStatus = $(this).data('status');
                $('#transaction-id').val(transactionId);
                $('#status').val(currentStatus);
                $('#editStatusModal').modal('show');
            });

            // Handle save status change
            $('#save-status-btn').click(function() {
                var formData = $('#edit-status-form').serialize(); // Serialize form data

                $.ajax({
                    url: '{{ route('backoffice.transactions.deposit.updateStatus') }}', // Route to handle the update
                    method: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Add CSRF token to headers
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#editStatusModal').modal(
                                'hide'); // Hide the modal if update is successful
                            loadTransactions(); // Reload transactions after update
                        } else {
                            alert('Error updating status');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' +
                            error); // Handle any error that occurs during the request
                    }
                });
            });

            // Prevent form submission and trigger AJAX request on filter button click
            $('#search-form').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission
                loadTransactions(); // Trigger the load function to apply filters
            });

        });
    </script>
@endsection
