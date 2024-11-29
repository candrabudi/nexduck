@php
    use App\Helpers\AesEncryptionHelper;
    $encryptedUserId = AesEncryptionHelper::encryptUserId(auth()->user()->id);
@endphp
@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Data Game</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th width="50">#</th>
                                    <th>Kode Game</th>
                                    <th>Nama Game</th>
                                    <th>Provider</th>
                                    <th>Kategori</th>
                                    <th width="50">Status</th>
                                    <th width="50">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($games as $gm)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $gm->game_code }}</td>
                                        <td>{{ $gm->game_name }}</td>
                                        <td>{{ $gm->provider->provider_name }}</td>
                                        <td>{{ $gm->category->category_name }}</td>
                                        <td>
                                            <span class="badge rounded-pill bg-{{ $gm->game_status == 1 ? 'success' : 'danger' }} float-end">{{ $gm->game_status == 1 ? 'On' : 'Off' }}</span>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input game-status-toggle" data-game-id="{{ $gm->id }}" {{ $gm->game_status == 1 ? 'checked' : '' }}>
                                            </div>
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
@endsection
@section('scripts')
        <script>
            $(document).on('change', '.game-status-toggle', function() {
                const gameId = $(this).data('game-id');
                const status = $(this).prop('checked') ? 1 : 0;

                $.ajax({
                    url: '{{ route('backoffice.updateGameStatus', $encryptedUserId) }}', // Route for updating game status
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        game_id: gameId,
                        status: status
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function() {
                        toastr.error('Something went wrong!');
                    }
                });
            });
        </script>
    @endsection