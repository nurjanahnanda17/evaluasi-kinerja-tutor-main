@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Detail Evaluasi</h3>
        <p><strong>Warga Belajar:</strong> {{ $evaluasi->user->nama }}</p>
        <p><strong>Tutor:</strong> {{ $evaluasi->tutor->nama_tutor }} ({{ $evaluasi->tutor->nomor_induk }})</p>
        <p><strong>Total Nilai:</strong> {{ number_format($evaluasi->total_nilai, 2) }}</p>

        <hr>
        <h5>Nilai per Kriteria:</h5>
        <ul>
            @foreach ($evaluasi->evaluasiDetail as $d)
                <li>
                    <strong>{{ $d->kriteria->nama_kriteria }}</strong> (Bobot: {{ $d->kriteria->bobot }}%)<br>
                    Nilai: {{ $d->nilai }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
