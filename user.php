<?php

$action = $_POST['action'];

if($action == "create_user"){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $user = new User($name, $email, $password);

  echo json_encode(["user"=> $user->name,
   "email" => User::validateEmail($user->email),
   "password" => User::validatePassword($user->password)]);
}elseif($action == "update_user") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $user = new User($name, $email, $password);
  $updates = json_decode($_POST['updates'], true);
  $newUser = $user->copy_with($updates);
  echo json_encode(["newUser" => ["user"=> $newUser->name,
  "email" => User::validateEmail($newUser->email),
  "password" => User::validatePassword($newUser->password)]]);
}



class User {
  public $name;
  public $password;
  public $email;

  public function __construct($name, $email, $password) {
    $this->name = $name;
    $this->password = $password;
    $this->email = $email;
  }

  public static function validatePassword($password){
    if(strlen($password) < 12){
      return false;
    }

    $hasUppercase = false;
    $hasLowercase = false;
    $hasSpecialChar = false;

    for($i = 0; $i < strlen($password); $i++){
      $char = $password[$i];
      if(ctype_upper($char)){
          $hasUppercase = true;
      }elseif(ctype_lower($char)){
          $hasLowercase = true;
      }elseif(!($char >= '0' && $char <= '9') && !($char >= 'A' && $char <= 'Z') && !($char >= 'a' && $char <= 'z')){ 
          $hasSpecialChar = true;
      }
    }

    return $hasUppercase && $hasLowercase && $hasSpecialChar;
  }


  public static function validateEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL) != false;
  }

  public function copy_with($updates) {
    $name = $updates['name'] ?? $this->name;
    $email = $updates['email'] ?? $this->email;
    $password = $updates['password'] ?? $this->password;
    return new User($name, $email, $password);
}
}