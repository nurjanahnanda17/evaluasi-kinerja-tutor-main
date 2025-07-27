<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    public $incrementing = true;
    protected $primaryKey = 'id_tutor';
    protected $table = 'tutors';
    protected $fillable = ['id_tutor', 'nama_tutor', 'nomor_induk'];

    public function evaluasi()
    {
        return $this->hasMany(Evaluasi::class, 'id_tutor', 'id_tutor');
    }
}
