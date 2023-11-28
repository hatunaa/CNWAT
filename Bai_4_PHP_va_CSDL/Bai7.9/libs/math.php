<?php
function minArray($array)
{
    return min($array);
}

function maxArray($array)
{
    return max($array);
}

function sumArray($array)
{
    return array_sum($array);
}

function averageArray($array)
{
    return sumArray($array) / count($array);
}

function sumMatrix($array1, $array2, $n, $m)
{
    for ($row = 0; $row < $n; $row++) {
        for ($col = 0; $col < $m; $col++) {
            $arrSum[$row][$col] = $array1[$row][$col] + $array2[$row][$col];
        }
    }
    return $arrSum;
}

function subMatrix($array1, $array2, $n, $m)
{
    for ($row = 0; $row < $n; $row++) {
        for ($col = 0; $col < $m; $col++) {
            $arrMinus[$row][$col] = $array1[$row][$col] - $array2[$row][$col];
        }
    }
    return $arrMinus;
}

function mulMatrix($array1, $array2, $n, $m)
{
    for ($row = 0; $row < $n; $row++) {
        for ($col = 0; $col < $m; $col++) {
            $arrMultiply[$row][$col] = 0;
            for ($k = 0; $k < $m; $k++) {
                $arrMultiply[$row][$col] = $arrMultiply[$row][$col] + $array1[$row][$k] * $array2[$k][$col];
            }
        }
    }
    return $arrMultiply;
}
