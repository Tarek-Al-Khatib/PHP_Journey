<?php

$array = json_decode($_POST['array'], true);


function mergeSort($array){

  if(count($array) <= 1){
    return $array;
  }
  $length = count($array);
  $mid = $length / 2;

  $left = mergeSort(array_slice($array, 0, $mid - 1));
  $right = mergeSort(array_slice($array, $mid));

  return merging($left, $right);
}