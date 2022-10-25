<?php

use Carbon\Carbon;

function idr($value)
{
    $result = number_format($value, 0, ',', '.');
    return $result;
}

function rounded($value)
{
    $result = str_replace(".", "", $value);
    return $result;
}

function dateFormat($value){
    $result = Carbon::parse($value)->format('d/m/Y');
    return $result;
}