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
    @endpush
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Rekap Evaluasi Tutor</h3>
            <div>
                <a href="{{ route('admin.export.evaluasi') }}" class="btn btn-success mb-3">
                    Export Excel
                </a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Peringkat</th>
                        <th>Tutor</th>
                        <th>Jumlah Evaluasi</th>
                        <th>Nilai Evaluasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($rekap as $i => $row)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $row->tutor->nama_tutor }}</td>
                            <td>{{ $row->jumlah }}</td>
                            <td>{{ number_format($row->vektor_v, 4) }}</td>
                            <td>
                                {{-- @dd($row->id_tutor) --}}
                                <a href="{{ route('kepala.show', $row->id_tutor) }}" class="btn btn-sm btn-info">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
