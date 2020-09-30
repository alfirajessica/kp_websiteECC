<?php
class User {
  private $username;
  private $nama;
  private $level;

  function __construct($u,$nm,$lv) {
    $this->username = $u;
    $this->nama = $nm;
    $this->level = $lv;
  }

  function get_u() {
    return $this->username;
  }

  function get_nama() {
    return $this->nama;
  }

  
  function get_level() {
    return $this->level;
  }
  
}

?>

 