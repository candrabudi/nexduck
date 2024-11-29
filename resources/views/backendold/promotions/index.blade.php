@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Promosi</h4>
                    <a href="{{ route('backoffice.promotions.create') }}" class="btn btn-success">Tambah Promosi</a>
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
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Berakhir</th>
                                    <th>Tipe</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($promotions as $promotion)
                                    <tr>
                                        <td>{{ $promotion->id }}</td>
                                        <td>{{ $promotion->title }}</td>
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
                                            <a href="{{ route('backoffice.promotions.edit', $promotion->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('backoffice.promotions.destroy', $promotion->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this promotion?')">
                                                    Delete
                                                </button>
                                            </form>
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
