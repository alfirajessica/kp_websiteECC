<?php
require_once "../config/conn.php";
$conn=getConn();

if($_POST["jenis"]=="get_allkelas"){
    $kal="";
    $stmt=$conn->prepare("select * from kelas");
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