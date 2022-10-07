<?php
function idr($value)
{
    $result = number_format($value, 0, ',', '.');
    return $result;
}
