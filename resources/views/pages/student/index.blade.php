@extends('layouts.app')
@section('content')
    @push('vendor-css')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    @endpush
    @push('vendor-js')
        <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
        <script src="{{ asset('assets/pages/input-evaluasi.js') }}"></script>
    @endpush
    <div class="container">
        <div class="card p-4">
            <h4 class="mb-4">Form Evaluasi Kinerja Tutor</h4>

            <form id="formulisEvaluasi" method="POST">
                @csrf

                <!-- Informasi -->
                <div class="mb-4">
                    <strong>Nama Tutor:</strong>
                    <select name="id_tutor" class="form-control" required>
                        <option value="">-- Pilih Tutor --</option>
                        @foreach ($tutors as $tutor)
                            <option value="{{ $tutor->id_tutor }}">{{ $tutor->nama_tutor }} - {{ $tutor->nomor_induk }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Kelompok Pertanyaan -->
                @foreach ($kriteria as $index => $k)
                    <div class="mb-4 border-bottom pb-3">
                        <h6 class="fw-bold">{{ $index + 1 }}. {{ $k->nama_kriteria }} ({{ $k->bobot }}%)</h6>
                        <p class="text-muted">{!! nl2br(e($k->deskripsi)) !!}</p>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="nilai[{{ $k->id_kriteria }}]"
                                value="1" required>
                            <label class="form-check-label">Kurang</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="nilai[{{ $k->id_kriteria }}]"
                                value="2">
                            <label class="form-check-label">Cukup</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="nilai[{{ $k->id_kriteria }}]"
                                value="3">
                            <label class="form-check-label">Baik</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="nilai[{{ $k->id_kriteria }}]"
                                value="4">
                            <label class="form-check-label">Sangat Baik</label>
                        </div>
                    </div>
                @endforeach

                <!-- Pertanyaan Essay Opsional -->
                <div class="mb-4">
                    <label for="komentar">Apa komentar atau saran Anda terhadap tutor ini?</label>
                    <textarea name="komentar" class="form-control" rows="3" placeholder="Tulis jawaban Anda di sini..."></textarea>
                </div>

                <!-- Tombol Submit -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
