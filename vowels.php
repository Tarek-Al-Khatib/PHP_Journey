<?php

$array = json_decode($_POST['array'], true);


class Node {
  public $value;
  public $next;

    public function __construct($value) {
      $this->value = $value;
      $this->next = null;
  }
}


class LinkedList {
  public $head;

  public function __construct(){
    $this->head = null;
  }

  public function add($value) {
    $newNode = new Node($value);
    if($this->head == null){
        $this->head = $newNode;
    }else{
        $current = $this->head;
        while($current->next !== null){
            $current = $current->next;
        }
        $current->next = $newNode;
    }
}
}

 function countingVowels($str){
  $vowels = ['a', 'e', 'i', 'o', 'u'];
  $count = 0;
  foreach(str_split(strtolower($str)) as $char){
      if (in_array($char, $vowels)) {
          $count++;
      }
  }
  return $count;
}

