<?php
require_once "../config/conn.php";
$conn=getConn();

if($_POST["jenis"]=="update_akun_nama"){
    $username = $_POST["user"];
    $nama = $_POST["nama"];

    $sql = "update user set nama='$nama' where username='$username'";
    if ($conn->query($sql)) {
    echo "berhasil";
    }else{
    echo "gagal";
    }
    $conn->close();
}




?>