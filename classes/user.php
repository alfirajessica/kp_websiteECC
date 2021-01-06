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

  function getnama($username){
    $conn=getConn();
    $stmt = $conn->prepare("select username,nama,level,status from user where username=?");
    $stmt->bind_param('s', $username);

    $stmt->execute();
    $result = $stmt->get_result();
$name="";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //cara membuat dan membaca
            $name = $row["nama"];
           
        }
    }

    return $name;

  }

  function set_nama($nm){
    $this->nama = $nm;
  }

  
  function get_level() {
    return $this->level;
  }

  
  
}

?>

 