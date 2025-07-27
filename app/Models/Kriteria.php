<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    public $incrementing = true;
    protected $primaryKey = 'id_kriteria';
    protected $table = 'kriteria';

    protected $fillable = ['id_kriteria', 'nama_kriteria', 'deskripsi', 'bobot'];

    public function evaluasiDetail()
    {
        return $this->hasMany(EvaluasiDetail::class, 'id_kriteria', 'id_kriteria');
    }
}
