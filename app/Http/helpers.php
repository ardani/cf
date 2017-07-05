<?php
use Illuminate\Support\Facades\DB;
function autonumber($table, $column, $prefix='', $width = 2) {
    $result = DB::table($table)->select($column)->orderBy($column, 'DESC')->take(1)->first();
    $no = ($result) ? intval(str_replace($prefix, '', $result->{$column})) + 1 : 1;
    $number = $prefix.str_pad($no, $width, '0', STR_PAD_LEFT);
    return $number;
}