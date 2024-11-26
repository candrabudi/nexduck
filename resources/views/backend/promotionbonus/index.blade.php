<!-- resources/views/promotion/index.blade.php -->

@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Promosi Bonus</h4>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#promotionModal"
                        data-action="add">Tambah Bonus</button>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="promotionsTable" class="table table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Judul</th>
                                    <th>Min Deposit</th>
                                    <th>Max Deposit</th>
                                    <th>Max Withdraw</th>
                                    <th>Turn Over</th>
                                    <th>Bonus (%)</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($promotionDetails as $pd)
                                    <tr>
                                        <td>{{ $pd->id }}</td>
                                        <td>{{ $pd->promotion->title }}</td>
                                        <td>{{ $pd->min_deposit }}</td>
                                        <td>{{ $pd->max_deposit }}</td>
                                        <td>{{ $pd->max_withdraw }}</td>
                                        <td>{{ $pd->turn_over }}</td>
                                        <td>{{ $pd->percentage_bonus }}%</td>
                                        <td>
                                            <span
                                                class="badge rounded-pill bg-{{ $pd->promotion->status == 1 ? 'success' : 'danger' }}">
                                                {{ $pd->promotion->status == 1 ? 'Aktif' : 'Tidak Aktif' }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#promotionModal" data-action="edit"
                                                data-id="{{ $pd->id }}" data-promotion_id="{{ $pd->promotion_id }}"
                                                data-min_deposit="{{ $pd->min_deposit }}"
                                                data-max_deposit="{{ $pd->max_deposit }}"
                                                data-max_withdraw="{{ $pd->max_withdraw }}"
                                                data-turn_over="{{ $pd->turn_over }}"
                                                data-percentage_bonus="{{ $pd->percentage_bonus }}">
                                                Edit
                                            </button>

                                            <!-- Delete Button -->
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deletePromotionModal" data-id="{{ $pd->id }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="promotionModal" tabindex="-1" aria-labelledby="promotionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="promotionForm" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="promotionModalLabel">Tambah Promosi Bonus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="promotion_id" id="promotion_id">
                        
                        <div class="mb-3">
                            <label for="promotion_id" class="form-label">Pilih Promosi</label>
                            <select name="promotion_id" id="" class="form-control">
                                <option value="">Pilih Promosi</option>
                                @foreach ($promotions as $promotion)
                                    <option value="{{ $promotion->id }}"> {{ $promotion->title }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="min_deposit" class="form-label">Min Deposit</label>
                            <input type="number" class="form-control" name="min_deposit" id="min_deposit" required>
                        </div>
                        <div class="mb-3">
                            <label for="max_deposit" class="form-label">Max Deposit</label>
                            <input type="number" class="form-control" name="max_deposit" id="max_deposit" required>
                        </div>
                        <div class="mb-3">
                            <label for="max_withdraw" class="form-label">Max Withdraw</label>
                            <input type="number" class="form-control" name="max_withdraw" id="max_withdraw" required>
                        </div>
                        <div class="mb-3">
                            <label for="turn_over" class="form-label">Turn Over</label>
                            <input type="number" class="form-control" name="turn_over" id="turn_over" required>
                        </div>
                        <div class="mb-3">
                            <label for="percentage_bonus" class="form-label">Percentage Bonus</label>
                            <input type="number" class="form-control" name="percentage_bonus" id="percentage_bonus"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="savePromotionBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deletePromotionModal" tabindex="-1" aria-labelledby="deletePromotionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletePromotionModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus promosi ini?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST" action="#">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Add/Edit Promotion Modal
        $('#promotionModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');

            if (action === 'edit') {
                var id = button.data('id');
                var promotion_id = button.data('promotion_id');
                var min_deposit = button.data('min_deposit');
                var max_deposit = button.data('max_deposit');
                var max_withdraw = button.data('max_withdraw');
                var turn_over = button.data('turn_over');
                var percentage_bonus = button.data('percentage_bonus');

                $('#promotion_id').val(id);
                $('#min_deposit').val(min_deposit);
                $('#max_deposit').val(max_deposit);
                $('#max_withdraw').val(max_withdraw);
                $('#turn_over').val(turn_over);
                $('#percentage_bonus').val(percentage_bonus);

                $('#promotionForm').attr('action', '/promotion-details/' + id);
                $('#promotionModalLabel').text('Edit Promosi Bonus');
                $('#savePromotionBtn').text('Update');
            } else {
                $('#promotionForm').attr('action', '/promotion-details');
                $('#promotionModalLabel').text('Tambah Promosi Bonus');
                $('#savePromotionBtn').text('Save');
            }
        });

        // Delete Promotion Modal
        $('#deletePromotionModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var promotionId = button.data('id');
            var deleteUrl = '/promotion-details/' + promotionId;

            $('#deleteForm').attr('action', deleteUrl);
        });
    </script>
@endsection
