<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Pengetahuan extends Model
{
    protected $primaryKey = 'kode_pengetahuan';
    protected $table = 'basis_pengetahuan';
    protected $fillable = ['kode_penyakit', 'kode_gejala', 'mb', 'md'];

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'kode_gejala');
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'kode_penyakit');
    }
}
