<?php

/**
 * @param array $numbers
 * @return mixed
 */
function findLargest(array $numbers)
{
    return max($numbers);
}

function closestToZeroTest()
{
    echo closestToZero([0]) . "\n"; // 0
    echo closestToZero([-273]) . "\n"; // -273
    echo closestToZero([-10, -10]) . "\n"; // -10
    echo closestToZero([-9, 8, 2, -5, 7]) . "\n"; // 2
    echo closestToZero([42, -5, 12, 21, 5, 24]) . "\n"; // 5
    echo closestToZero([42, 5, 12, 21, -5, 24]) . "\n"; // 5
    echo closestToZero([-5, -4, -2, 12, -40, 4, 2, 18, 11, 5]) . "\n"; // 2
}

/**
 * @param array $arrayOfInts
 * @return int
 */
function closestToZero(array $arrayOfInts): int
{
    $closest = null;
    foreach ($arrayOfInts as $item) {

        if ($item === 0) {
            return 0;
        }
        if ($closest === null) {
            $closest = $item;
        } elseif (abs($closest) > abs($item)) {
            $closest = $item;
        } elseif (abs($closest) === abs($item) && $closest !== $item) {
            $closest = abs($item);
        }
    }

    return $closest;
}

function binarySearchTest()
{
    $primes = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97];
    $valueToSearch = 23;
    if (binarySearch($primes, $valueToSearch, 0, count($primes)) == true) {
        echo $valueToSearch . " Exists" . "\n";
    } else {
        echo $valueToSearch . " Doesnt Exist" . "\n";
    }
}

/**
 * @param array $sortArray
 * @param int $searchValue
 * @param int $start
 * @param int $end
 * @return bool
 */
function binarySearch(array $sortArray, int $searchValue, int $start, int $end)
{
    if ($end < $start) {
        return false;
    }
    /*
     * @var int $mid
     */
    $mid = intval(($end + $start) / 2);
    if ($sortArray[$mid] == $searchValue) {
        return true;
    } elseif ($sortArray[$mid] > $searchValue) {

        // call binarySearch on [start, mid - 1]
        return binarySearch($sortArray, $searchValue, $start, $mid - 1);
    } else {
        // call binarySearch on [mid + 1, end]
        return binarySearch($sortArray, $searchValue, $mid + 1, $end);
    }
}
