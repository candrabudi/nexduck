@php
    use App\Models\Setting;
    $setting = Setting::first();
@endphp

@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Promotions</h4>
                    <button class="btn btn-success" id="addPromotionBtn">Add Promotion</button>
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
                                    <th>Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($promotions as $promotion)
                                    <tr>
                                        <td>{{ $promotion->id }}</td>
                                        <td>{{ $promotion->name }}</td>
                                        <td>{{ $promotion->start_date }}</td>
                                        <td>{{ $promotion->end_date }}</td>
                                        <td>{{ ucfirst($promotion->type) }}</td>
                                        <td>
                                            <span
                                                class="badge rounded-pill bg-{{ $promotion->status == 1 ? 'success' : 'danger' }}">
                                                {{ $promotion->status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm"
                                                onclick="editPromotion({{ $promotion->id }})">Edit</button>
                                            <button class="btn btn-danger btn-sm"
                                                onclick="deletePromotion({{ $promotion->id }})">Delete</button>
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

    <div id="promotionModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="promotionForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Promotion Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="promotion_id" name="id">
                        <div class="form-group mt-3">
                            <label for="name">Promotion Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="description">Promotion Description</label>
                            <textarea class="form-control" id="classic-editor" name="description" required></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="end_date">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="type">Type</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="turnover">Turnover</option>
                                <option value="winover">Winover</option>
                                <option value="balance">Balance</option>
                            </select>
                        </div>

                        <!-- Conditionally show deposit fields -->
                        <div class="conditional-deposit-fields" style="display: none;">
                            <div class="form-group mt-3">
                                <label for="min_deposit">Min Deposit</label>
                                <input type="number" class="form-control" id="min_deposit" name="min_deposit">
                            </div>
                            <div class="form-group mt-3">
                                <label for="max_deposit">Max Deposit</label>
                                <input type="number" class="form-control" id="max_deposit" name="max_deposit">
                            </div>
                            <div class="form-group mt-3">
                                <label for="max_withdraw">Max Withdraw</label>
                                <input type="number" class="form-control" id="max_withdraw" name="max_withdraw">
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="status">Status</label>
                            <select class="form-control" id="promotion_status" name="promotion_status" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- CKEditor CDN -->
    <script src="{{ asset('backoffice/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <script>
        let editor;
        ClassicEditor
            .create(document.querySelector('#classic-editor'))
            .then(newEditor => {
                editor = newEditor; // Store the editor instance for later use
            })
            .catch(error => {
                console.error(error);
            });

        function setEditorData(content) {
            if (editor) {
                editor.setData(content); // Set the content in the editor
            }
        }

        $('#addPromotionBtn').click(function() {
            $('#promotionForm').trigger('reset');
            $('#promotion_id').val('');
            $('#promotionModal').modal('show');
            setEditorData(''); // Reset editor content when opening modal
            toggleDepositFields();
        });

        $('#promotionForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            formData.append('description', editor.getData()); // Get content from ClassicEditor
            let url = $('#promotion_id').val() ? 
                `/backoffice/promotions/{{ $setting->web_token }}update/${$('#promotion_id').val()}` :
                '/backoffice/promotions/store/{{ $setting->web_token }}';

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    }
                }
            });
        });

        function editPromotion(id) {
            $.get(`/backoffice/promotions/{{ $setting->web_token }}/edit/${id}`, function(response) {
                let promotion = response.promotion;
                $('#promotion_id').val(promotion.id);
                $('#name').val(promotion.name);
                setEditorData(promotion.description); // Set the editor content
                $('#start_date').val(promotion.start_date);
                $('#end_date').val(promotion.end_date);
                $('#type').val(promotion.type);
                $('#promotion_status').val(promotion.status);
                toggleDepositFields(promotion.claim_deposit); // Toggle deposit fields based on claim_deposit
                $('#promotionModal').modal('show');
            });
        }

        function deletePromotion(id) {
            if (confirm('Are you sure you want to delete this promotion?')) {
                $.ajax({
                    url: `/backoffice/promotions/{{ $setting->web_token }}/destroy/${id}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            location.reload();
                        }
                    }
                });
            }
        }

        // Function to toggle deposit fields
        function toggleDepositFields(claim_deposit = 0) {
            if (claim_deposit == 1) {
                $('.conditional-deposit-fields').show();
            } else {
                $('.conditional-deposit-fields').hide();
            }
        }
    </script>
@endsection
