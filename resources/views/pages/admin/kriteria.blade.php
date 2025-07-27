@extends('layouts.app')

@section('content')
    @push('vendor-css')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
        <!-- Row Group CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />
        <!-- Form Validation -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />
    @endpush
    @push('vendor-js')
        <!-- Vendors JS -->
        <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
        <!-- Flat Picker -->
        <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
        <script src="{{ asset('assets/pages/kriteria.js') }}"></script>
    @endpush
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>Table Kriteria</h5>
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-kriteria">Tambah</button>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Kriteria</th>
                        <th>Deskripsi</th>
                        <th>Bobot</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($kriteria as $k)
                        <tr>
                            <td>{{ $k->nama_kriteria }}</td>
                            <td>{{ $k->deskripsi }}</td>
                            <td>{{ $k->bobot }}</td>
                            <td>
                                <div>
                                    <a href="javascript:void(0)" data-id="{{ $k->id_kriteria }}"
                                        class="btn btn-warning btn-sm edit-record">Edit</a>
                                    <a href="javascript:void(0)" data-id="{{ $k->id_kriteria }}"
                                        class="btn btn-danger btn-sm delete-kriteria">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
    @include('partials.kriteria.edit')
    @include('partials.kriteria.create')
@endsection
