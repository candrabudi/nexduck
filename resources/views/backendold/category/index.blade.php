@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Data Kategori</h4>

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
                                    <th width="120">Kategori</th>
                                    <th>Gambar</th>
                                    <th width="50">Status</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($categories as $ct)     
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $ct->category_name }}</td>
                                        <td>
                                            <img src="{{ $ct->category_icon }}" alt="" width="120">
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill bg-{{ $ct->category_status == 1 ? 'success' : 'danger' }} float-end">{{ $ct->category_status == 1 ? 'On' : 'Off' }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@endsection
