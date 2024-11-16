<?php

class User {
  public $name;
  public $password;
  public $email;

  public function __construct($name, $email, $password) {
    $this->name = $name;
    $this->password = $password;
    $this->email = $email;
  }

  public function copy_with($updates) {
    $name = $updates['name'] ?? $this->name;
    $email = $updates['email'] ?? $this->email;
    $password = $updates['password'] ?? $this->password;
    return new User($name, $email, $password);
}
}