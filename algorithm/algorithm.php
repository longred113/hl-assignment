<?php
function calculateTotal($arr) {
    return array_sum($arr);
}

function findMinMaxValues($arr) {
    $minValue = min($arr);
    $maxValue = max($arr);

    return ['MinValue' => $minValue, 'MaxValue' => $maxValue];
}

function findEvenElements($arr) {
    return array_filter($arr, function($value) {
        return $value % 2 == 0;
    });
}

function findOddElements($arr) {
    return array_filter($arr, function($value) {
        return $value % 2 != 0;
    });
}

function calculateMinMaxSums($arr) {
    $total = calculateTotal($arr);

    $minMaxValues = findMinMaxValues($arr);
    $minValue = $minMaxValues['MinValue'];
    $maxValue = $minMaxValues['MaxValue'];

    $evenElements = findEvenElements($arr);
    $oddElements = findOddElements($arr);

    $minSum = $total - $maxValue;
    $maxSum = $total - $minValue;

    return [
        'OriginalArray' => $arr,
        'Total' => $total,
        'MinValue' => $minValue,
        'MaxValue' => $maxValue,
        'EvenElements' => $evenElements,
        'OddElements' => $oddElements,
        'MinSum' => $minSum,
        'MaxSum' => $maxSum
    ];
}

$input = readline("Enter five positive integers separated by spaces: ");
$arr = explode(' ', $input);

$inputArray = array_map('intval', $arr);

$result = calculateMinMaxSums($inputArray);

foreach ($result as $key => $value) {
    if (is_array($value)) {
        echo "$key: " . implode(', ', $value) . PHP_EOL;
    } else {
        echo "$key: $value" . PHP_EOL;
    }
}
