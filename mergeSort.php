<?php

$array = json_decode($_POST['array'], true);

function mergeSort($array) {
    if(count($array) <= 1){
        return $array;
    }

    $mid = floor(count($array) / 2);

    $left = mergeSort(array_slice($array, 0, $mid));
    $right = mergeSort(array_slice($array, $mid));

    return merging($left, $right);
}

function merging($left, $right){
    $i = 0;
    $j = 0;
    $sortedArray = []; 

    while($i < count($left) && $j < count($right)){
        if($left[$i] <= $right[$j]){
            $sortedArray[] = $left[$i];
            $i++;
        }else{
            $sortedArray[] = $right[$j];
            $j++;
        }
    }

    while($i < count($left)){
        $sortedArray[] = $left[$i];
        $i++;
    }

    while($j < count($right)){
        $sortedArray[] = $right[$j];
        $j++;
    }

    return $sortedArray;
}

echo json_encode(["sorted" => mergeSort($array)]);
