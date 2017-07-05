<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $primaryKey = 'kode_penyakit';
    protected $table = 'penyakit';
    public $incrementing = false;
    protected $fillable = ['kode_penyakit', 'desc', 'nama_penyakit', 'image', 'solusi'];

    public function pengetahuan()
    {
        return $this->hasMany(Pengetahuan::class, 'kode_penyakit');
    }
}
