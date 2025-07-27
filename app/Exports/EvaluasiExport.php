<?php

namespace App\Exports;

use App\Models\Evaluasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EvaluasiExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Evaluasi::with(['user', 'tutor'])->get();
    }

    public function headings(): array
    {
        return [
            'Nama Warga',
            'Nama Tutor',
            'Nomor Induk',
            'Total Nilai',
            'Tanggal Evaluasi',
        ];
    }


    public function map($evaluasi): array
    {
        return [
            $evaluasi->user->nama,
            $evaluasi->tutor->nama_tutor,
            $evaluasi->tutor->nomor_induk,
            number_format($evaluasi->total_nilai, 2),
            $evaluasi->created_at->format('d/m/Y'),
        ];
    }
}
