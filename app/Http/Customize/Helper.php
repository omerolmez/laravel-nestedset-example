<?php

function pr($arr)
{
    echo '<pre>';
    print_r($arr);
    exit;
}

function numberFormat($v)
{
    return number_format($v, 2, ',', '.');
}
