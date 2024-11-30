@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Activity Logs</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table dataTable">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Method</th>
                                    <th>Menu</th>
                                    <th>Action</th>
                                    <th>IP Address</th>
                                    <th>Browser</th>
                                    <th>Response Code</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $log)
                                    <tr>
                                        <td>{{ $log->user->username }}</td>
                                        <td>{{ $log->method }}</td>
                                        <td>{{ $log->menu }}</td>
                                        <td>{{ $log->action }}</td>
                                        <td>{{ $log->ip_address }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($log->browser, 20, '...') }}</td>
                                        <td>{{ $log->response_code }}</td>
                                        <td>
                                            <button class="btn btn-info btn-sm" onclick="showLogDetails({{ $log->id }})">View Details</button>
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

    <div class="modal fade" id="logDetailsModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logModalLabel">Log Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div id="logDetailsContent"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function showLogDetails(id) {
            $.get('/backoffice/activity-logs/' + id, function (data) {
                let detailsHtml = `
                    <p><strong>Action:</strong> ${data.action}</p>
                    <p><strong>Query Params:</strong> ${data.query_params ? data.query_params : 'N/A'}</p>
                    <p><strong>Request Body:</strong> ${data.request_body ? data.request_body : 'N/A'}</p>
                    <p><strong>Response Body:</strong> ${data.response_body ? data.response_body : 'N/A'}</p>
                    <p><strong>Raw JSON:</strong> ${data.raw_json ? data.raw_json : 'N/A'}</p>
                    <p><strong>Latency:</strong> ${data.latency} ms</p>
                    <p><strong>Failure:</strong> ${data.is_failed ? 'Yes' : 'No'}</p>
                    <p><strong>Location:</strong> Latitude: ${data.latitude}, Longitude: ${data.longitude}</p>
                `;
                $('#logDetailsContent').html(detailsHtml);
                $('#logDetailsModal').modal('show');
            });
        }
    </script>
@endsection
