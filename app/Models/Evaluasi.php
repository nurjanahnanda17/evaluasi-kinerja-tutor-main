<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    public $incrementing = true;
    protected $primaryKey = 'id_evaluasi';
    protected $table = 'evaluasi';

    protected  $fillable  = ['id_evaluasi', 'id_user', 'id_tutor', 'total_nilai'];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class, 'id_tutor');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function evaluasiDetail()
    {
        return $this->hasMany(EvaluasiDetail::class, 'id_evaluasi', 'id_evaluasi');
    }
}
