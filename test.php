<?php


function add($num1, $num2)
{
    $result = $num1 + $num2;

    if ($result > 10) {
        echo "YES";
        return;
    } else {
        "NO";
    }
}

add(5, 7);
