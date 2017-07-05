<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $primaryKey = 'key';
    protected $table = 'setting';
    protected $fillable = ['key', 'value'];
}
