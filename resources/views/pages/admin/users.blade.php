@extends('layouts.app')

@section('content')
    @push('vendor-css')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    @endpush
    @push('vendor-js')
        <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
        <script src="{{ asset('assets/pages/users.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    @endpush
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>Table Warga Belajar</h5>
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-user">Tambah</button>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <div>
                                    <a class="btn btn-warning btn-sm edit-user" data-id="{{ $user->id_user }}"
                                        href="javascript:void(0)"><i class="ti ti-pencil me-2 "></i>
                                        Edit</a>
                                    <a class="btn btn-danger btn-sm delete-record" data-id="{{ $user->id_user }}"
                                        href="javascript:void(0)"><i class="ti ti-trash me-2 "></i>
                                        Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
    @include('partials.edit-user')
    @include('partials.modal-users')
@endsection
