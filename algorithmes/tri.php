<?php


function sortBySelectionTest()
{
    $test_array = array(3, 0, 2, 5, -1, 4, 1);
    echo "sortBySelection : Original Array :\n";
    echo implode(', ', $test_array);
    echo "\n sortBySelection  : Sorted Array :\n";
    echo implode(', ', sortBySelection($test_array));
}

function sortBySelection($arrayToSort)
{
    $sizeOfTheArray = count($arrayToSort);
    //1) look for min value in T[0...n - 1]
    for ($i = 0; $i < $sizeOfTheArray - 1; $i++) {
        $min = $i;

        for ($j = $i + 1; $j < $sizeOfTheArray; $j++) {
            if ($arrayToSort[$j] < $arrayToSort[$min]) {
                $min = $j;
            }
        }

//        switch tab value with first element
        $temp = $arrayToSort[$i];
        $arrayToSort[$i] = $arrayToSort[$min];
        $arrayToSort[$min] = $temp;
    }
    return $arrayToSort;
}


function insertionSortTest()
{
    $test_array = array(3, 0, 2, 5, -1, 4, 1);
    echo "insertionSort, Original Array :\n";
    echo implode(', ', $test_array);
    echo "\ninsertionSort, Sorted Array :\n";
    echo implode(', ', insertionSort($test_array));
}

function insertionSort($arrayToSort)
{
    $sizeOfTheArray = count($arrayToSort);
    for ($i = 0; $i < $sizeOfTheArray; $i++) {

        echo "i = $i : " . implode(', ', $arrayToSort) . "\n";

        $val = $arrayToSort[$i];
        $j = $i - 1;

        while ($j >= 0 && $arrayToSort[$j] > $val) {
            $arrayToSort[$j + 1] = $arrayToSort[$j];
            $j--;
        }

        $arrayToSort[$j + 1] = $val;

    }
    return $arrayToSort;
}

function mergeSortTest()
{
    $test_array = array(3, 0, 2, 5, -1, 4, 1);
    echo "insertionSort, Original Array :\n";
    echo implode(', ', $test_array);
    echo "\ninsertionSort, Sorted Array :\n";
    echo implode(', ', mergeSort($test_array));
}

function mergeSort($arrayToSort)
{
    $sizeOfTheArray = count($arrayToSort);
    // if only one value, return tab
    if ($sizeOfTheArray == 1) {
        return $arrayToSort;
    }

    // else cut array in two parts and recursive calls
    $left = array_slice($arrayToSort, 0, $sizeOfTheArray / 2);
    $right = array_slice($arrayToSort, $sizeOfTheArray / 2);

    // recursive call
    $left = mergeSort($left);
    $right = mergeSort($right);

    // return merge tabs
    return merge($left, $right);
}

function merge($left, $right)
{
    $res = [];
    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] > $right[0]) {
            $res[] = $right[0];
            $right = array_slice($right, 1);
        } else {
            $res[] = $left[0];
            $left = array_slice($left, 1);
        }
    }
    while (count($left) > 0) {
        $res[] = $left[0];
        $left = array_slice($left, 1);
    }
    while (count($right) > 0) {
        $res[] = $right[0];
        $right = array_slice($right, 1);
    }
    return $res;
}

mergeSortTest();
die;


function quick_sort($arrayToSort)
{
    $loe = $gt = array();
    if (count($arrayToSort) < 2) {
        return $arrayToSort;
    }

    $pivot_key = key($arrayToSort);
    $pivot = array_shift($arrayToSort);

    foreach ($arrayToSort as $val) {
        if ($val <= $pivot) {
            $loe[] = $val;
        } elseif ($val > $pivot) {
            $gt[] = $val;
        }
    }

    return array_merge(quick_sort($loe), array($pivot_key => $pivot), quick_sort($gt));
}

$arrayToSort = array(3, 0, 2, 5, -1, 4, 1);
echo 'Original Array : ' . implode(',', $arrayToSort) . '\n';
$arrayToSort = quick_sort($arrayToSort);
echo 'Sorted Array : ' . implode(',', $arrayToSort);