<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $primaryKey = 'kode_gejala';
    public $incrementing = false;
    protected $table = 'gejala';
    protected $fillable = ['kode_gejala', 'nama_gejala', 'image', 'desc', 'pertanyaan'];
}
