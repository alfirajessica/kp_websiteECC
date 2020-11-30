<?php
session_start();
require_once "../config/conn.php";
require_once "../classes/user.php";


if($_POST["jenis"]=="get_kelasdos"){
    $conn=getConn();
    $kal="";
    $arr=unserialize($_SESSION["user"]);
    $dosen= $arr->get_u();
    $periode=$_POST["periode"];
    $stmt=$conn->prepare("select * from kelas where dosen='$dosen' and id_periode='$periode' ");
    $stmt->execute();
    $res=$stmt->get_result();
    if ($res->num_rows>0) {
        while($row=$res->fetch_assoc()){
            $level=$row["level_ecc"];
            $idkelas=$row["id_kelas"];
            $namakelas=$row["nama_kelas"];
            $kal.="<option value='$idkelas' >ECC $level - Kelas $namakelas </option>";
        }
    }else{
        $kal.="<option value='-1' >~Pilih kelas yang ada~ </option>";
    }
   
    echo $kal;
}else if($_POST["jenis"]=="getinfo"){
    $nrp=$_POST["nrp"];
    $kelas=$_POST["kelas"];
    $conn=getConn();
    $stmt=$conn->prepare("select * from kelas_mhs km,mahasiswa m,nilai n where n.id_nilai=km.id_nilai and km.nrp=m.nrp and m.nrp='$nrp' and km.id_kelas='$kelas' ");
    $stmt->execute();
    $res=$stmt->get_result();
    $row=$res->fetch_assoc();
    echo json_encode($row);
}else if($_POST["jenis"]=="downloadtemplete"){
    $sql="select * from kelas_mhs km,mahasiswa m,nilai n where n.id_nilai=km.id_nilai and km.nrp=m.nrp and m.nrp='$nrp' and km.id_kelas='$kelas'";
}

?>