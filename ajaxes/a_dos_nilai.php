<?php
session_start();
require_once "../config/conn.php";
require_once "../classes/user.php";
$conn=getConn();

if($_POST["jenis"]=="get_kelasdos"){
    $kal="";

    $arr=unserialize($_SESSION["user"]);
    $dosen= $arr->get_u();
    $stmt=$conn->prepare("select * from kelas where dosen='$dosen'");
    $stmt->execute();
    $res=$stmt->get_result();
    while($row=$res->fetch_assoc()){
        $level=$row["level_ecc"];
        $idkelas=$row["id_kelas"];
        $namakelas=$row["nama_kelas"];
        $kal.="<option val='$idkelas' >"."ECC $level - Kelas $namakelas </option>";
    }
    echo $kal;
}

?>