<?php
      function getConn(){
        $conn=new mysqli("localhost","root","","db_eccistts");
        if($conn->connect_error){
            die("Connection failed : ").$conn->connect_error;
        }
        return $conn;
    }
?>