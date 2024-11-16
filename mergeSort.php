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


function merging($left, $right){
  $i = 0;
  $j = 0;
  $sortedArray = [];
  
  
  while($i < count($left) && $j < count($right)){
    if($left[$i] > $right[$j]){
      $result[] = $right[$j];
      $j++;
    }else {
      $result[] = $left[$i];
      $i++;
    }
  }


  while ($i < count($left)) {
    $result[] = $left[$i++];
    $i++;
  }

  while ($j < count($right)) {
      $result[] = $right[$j++];
      $j++;
  }


  return $sortedArray;
}


echo json_encode(["sorted" => mergeSort($array)]);