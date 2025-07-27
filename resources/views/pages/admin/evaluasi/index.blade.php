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
            <h5>Daftar Hasil Evaluasi</h5>
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
                        <th>Warga Belajar</th>
                        <th>Tutor</th>
                        <th>Nilai Akhir</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($evaluasi as $e)
                        <tr>
                            <td>{{ $e->user->nama }}</td>
                            <td>{{ $e->tutor->nama_tutor }}</td>
                            <td><strong>{{ number_format($e->total_nilai, 2) }}</strong></td>
                            <td>{{ $e->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('admin.evaluasi.show', $e->id_evaluasi) }}"
                                    class="btn btn-sm btn-info">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
