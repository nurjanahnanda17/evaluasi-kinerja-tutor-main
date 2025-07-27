@extends('layouts.app')

@section('content')
    <div class="col-md-12 col-lg-12">
        <div class="card text-center mb-3">
            <div class="card-body">
                <h5 class="card-title">Berhasil!</h5>
                <p class="card-text">Selamat evaluasi berhasil disimpan</p>
                <a href="{{ route('warga.index') }}" class="btn btn-success">Isi Evaluasi Lagi</a>
            </div>
        </div>
    </div>
@endsection
