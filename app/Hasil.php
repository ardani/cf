<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $primaryKey = 'id_hasil';
    protected $table = 'penyakit';
    protected $fillable = ['nama_penyakit', 'nilai'];
}
