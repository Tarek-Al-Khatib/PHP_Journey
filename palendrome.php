<?php

$word = json_decode($_POST['word']);


function checkPalendrome($word) {
  $length = strlen($word);
  for($i = 0; $i < $length / 2; $i++){
    if($word[$i] != $word[$length - $i - 1]){
      return false;
    }
  }

  return true;
}