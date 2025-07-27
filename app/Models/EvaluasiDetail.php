<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluasiDetail extends Model
{
    public $incrementing = true;
    protected $primaryKey = 'id_evl_dtl';
    protected $table = 'evaluasi_detail';

    protected  $fillable = ['id_evl_dtl', 'id_evaluasi', 'id_kriteria', 'nilai'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }

    public function evaluasi()
    {
        return $this->belongsTo(Evaluasi::class, 'id_evaluasi');
    }
}
