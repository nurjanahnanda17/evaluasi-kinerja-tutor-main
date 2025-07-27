@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Detail Evaluasi Tutor: {{ $tutor->nama_tutor }}</h3>

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Warga Belajar</th>
                    <th>Total Nilai</th>
                    <th>Tanggal</th>
                    <th>Detail Kriteria</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evaluasi as $i => $ev)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $ev->user->nama }}</td>
                        <td>{{ number_format($ev->total_nilai, 2) }}</td>
                        <td>{{ $ev->created_at->format('d/m/Y') }}</td>
                        <td>
                            <button class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#detailModal-{{ $ev->id_evaluasi }}">
                                Lihat Kriteria
                            </button>
                        </td>
                    </tr>

                    <!-- Modal Detail per Evaluasi -->
                @endforeach
            </tbody>
        </table>
        <div class="container mt-3">
            <a href="{{ route('kepala.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        {{-- modal --}}
        @foreach ($evaluasi as $i => $ev)
            <div class="modal fade" id="detailModal-{{ $ev->id_evaluasi }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Evaluasi #{{ $i + 1 }} oleh {{ $ev->user->nama }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kriteria</th>
                                        <th>Bobot</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ev->evaluasiDetail as $d)
                                        <tr>
                                            <td>{{ $d->kriteria->nama_kriteria }}</td>
                                            <td>{{ $d->kriteria->bobot }}%</td>
                                            <td>{{ $d->nilai }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p><strong>Total Nilai:</strong> {{ number_format($ev->total_nilai, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- end modal --}}
    </div>
@endsection
