@extends('backend.layouts.app')

@section('content')
    <div class="col-xl-12 col-xxl-8 bst-seller">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive active-projects style-1 ItemsCheckboxSec shorting">
                    <div class="tbl-caption">
                        <h4 class="heading mb-0">Promosi</h4>
                        <div>
                            <a class="btn btn-primary btn-sm me-2" href="{{ route('backoffice.promotions.create') }}">+ Tambah Promosi</a>
                        </div>
                    </div>
                    @if ($promotions->isEmpty())
                        <div class="p-4">
                            <p class="text-center">Tidak ada promosi.</p>
                        </div>
                    @else
                        <table id="promotions-tbl" class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check custom-checkbox ms-0">
                                            <input type="checkbox" class="form-check-input checkAllInput"
                                                id="checkAllPromotions">
                                            <label class="form-check-label" for="checkAllPromotions"></label>
                                        </div>
                                    </th>
                                    <th>Promotion Title</th>
                                    <th>Slug</th>
                                    <th>Type</th>
                                    <th>Provider Category</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($promotions as $promotion)
                                    <tr>
                                        <td>
                                            <div class="form-check custom-checkbox">
                                                <input type="checkbox" class="form-check-input"
                                                    id="customCheckBox{{ $promotion->id }}">
                                                <label class="form-check-label"
                                                    for="customCheckBox{{ $promotion->id }}"></label>
                                            </div>
                                        </td>
                                        <td><span>{{ $promotion->title }}</span></td>
                                        <td><span>{{ $promotion->slug }}</span></td>
                                        <td><span>{{ $promotion->type }}</span></td>
                                        <td><span>{{ $promotion->provider_category }}</span></td>
                                        <td>
                                            @if ($promotion->status == 1)
                                                <span class="badge badge-success light border-0">Active</span>
                                            @else
                                                <span class="badge badge-danger light border-0">Inactive</span>
                                            @endif
                                        </td>
                                        <td><span>{{ $promotion->start_date }}</span></td>
                                        <td><span>{{ $promotion->end_date }}</span></td>
                                        <td>
                                            <a href="{{ route('backoffice.promotions.edit') }}?id={{ $promotion->id }}"
                                                class="btn btn-primary btn-sm">Edit</a>

                                            <!-- SweetAlert for delete confirmation -->
                                            <form action="{{ route('backoffice.promotions.destroy', $promotion->id) }}"
                                                method="POST" class="d-inline" id="deleteForm{{ $promotion->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                    data-id="{{ $promotion->id }}">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('backoffice/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backoffice/vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('backoffice/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- Style css -->
    <link class="main-css" href="{{ asset('backoffice/css/style.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('backoffice/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/chart-js/chart.bundle.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/apexchart/apexchart.js') }}"></script>

    <script src="{{ asset('backoffice/vendor/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('backoffice/js/dashboard/dashboard-2.js') }}"></script>

    <script src="{{ asset('backoffice/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backoffice/vendor/datatables/js/jszip.min.js') }}"></script>
    <script src="{{ asset('backoffice/js/plugins-init/datatables.init.js') }}"></script>

    <script src="{{ asset('backoffice/js/custom.min.js') }}"></script>
    <script src="{{ asset('backoffice/js/deznav-init.js') }}"></script>
    <script src="{{ asset('backoffice/js/demo.js') }}"></script>
    <script src="{{ asset('backoffice/js/styleSwitcher.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll('.delete-btn').forEach(function(button) {
            button.addEventListener('click', function() {
                const promotionId = button.getAttribute('data-id');
                const form = document.getElementById('deleteForm' + promotionId);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
            });
        @endif
    </script>
@endsection
