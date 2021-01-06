<?php
require_once "../config/conn.php";
$conn=getConn();
session_start();
if($_POST["jenis"]=="update_akun_nama"){
    $username = $_POST["user"];
    $nama = $_POST["nama"];

    $sql = "update user set nama='$nama' where username='$username'";
    if ($conn->query($sql)) {
    echo "berhasil";
    }else{
    echo "gagal";
    }



    
}
if ($_POST["jenis"]=="ganti_password") {
    $password=$_POST["password"];
    $username=$_POST["username"];

    $sql = "update user set password='$password' where username='$username'";
    if ($conn->query($sql)) {
    echo "berhasil";
    }else{
    echo "gagal";
    }
}
