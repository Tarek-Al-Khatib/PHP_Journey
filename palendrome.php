<?php

$word = json_decode($_POST['word']);
function checkPalendrome($word) {
  $length = strlen($word);
  for($i = 0; $i < $length / 2; $i++){
    if(strtolower($word[$i]) !== strtolower($word[$length - $i - 1])){
      return false;
    }
  }

  return true;
}


echo json_encode(["palendrome" => checkPalendrome($word)]);