@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul Promosi</th>
                    <th>Username</th>
                    <th>Nominal Deposit</th>
                    <th>Nominal Bonus</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($claimPromotions as $bonus)
                    <tr>
                        <td>{{ $bonus->id }}</td>
                        <td>{{ $bonus->promotion->title }}</td>
                        <td>{{ $bonus->user->username }}</td>
                        <td>{{ $bonus->nominal_deposit }}</td>
                        <td>{{ $bonus->nominal_bonus }}</td>
                        <td>
                            @if ($bonus->status == 0)
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#updateStatusModal" onclick="editTransaction({{ $bonus->id }}, {{ $bonus->status }})">Ubah
                                    Status</button>
                            @else
                                <button class="btn btn-sm btn-secondary btn-sm" disabled>Sudah Update</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal for updating status -->
    <div class="modal fade" id="updateStatusModal" tabindex="-1" aria-labelledby="updateStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStatusModalLabel">Update Status Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updateStatusForm" method="POST" action="{{ route('backoffice.transaction.bonus.updateStatus') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="claimId" name="claim_id">
                        <div class="mb-3">
                            <label for="bonus_status" class="form-label">Status</label>
                            <select id="bonus_status" name="bonus_status" class="form-select">
                                <option value="0">Pending</option>
                                <option value="1">Approved</option>
                                <option value="2">Rejected</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function editTransaction(id, status) {
            // Set the claim ID in the hidden input
            document.getElementById('claimId').value = id;
            
            // Set the current status in the dropdown
            document.getElementById('status').value = status;
        }

        // Optional: handle form submission with AJAX if you want to prevent page reload
        document.getElementById('updateStatusForm').addEventListener('submit', function(event) {
            event.preventDefault();

            let form = this;
            let formData = new FormData(form);

            fetch(form.action, {
                method: form.method,
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Close modal
                    var modal = bootstrap.Modal.getInstance(document.getElementById('updateStatusModal'));
                    modal.hide();

                    // Optionally, reload the table or update the row status
                    alert('Status updated successfully!');
                    location.reload();  // Reload page to reflect status update
                } else {
                    alert('Failed to update status.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('There was an error updating the status.');
            });
        });
    </script>
@endsection
