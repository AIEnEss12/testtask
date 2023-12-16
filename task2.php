<?php

function maxDeliveries($boxes, $n) {
    // Сортируем массив весов коробок для удобства
    sort($boxes);

    $left = 0; // Индекс самой левой коробки
    $right = count($boxes) - 1; // Индекс самой правой коробки
    $deliveries = 0; // Количество выездов

    while ($left <= $right) {
        // Если сумма весов коробок равна N, увеличиваем количество выездов и двигаем указатели
        if ($boxes[$left] + $boxes[$right] === $n) {
            $deliveries++;
            $left++;
            $right--;
        } else {
            // Если сумма весов коробок не равна N, уменьшаем вес правой коробки
            $right--;
        }
    }

    return $deliveries;
}

$boxes1 = [1, 2, 1, 5, 1, 3, 5, 2, 5, 5];
$n1 = 6;
var_dump("максимальное количество выездов курьера, 1: " . maxDeliveries($boxes1, $n1));

$boxes2 = [2, 4, 3, 6, 1];
$n2 = 5;
var_dump( "максимальное количество выездов курьера, 2: " . maxDeliveries($boxes2, $n2));
