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
    $level=$_POST["level"];
    $stmt=$conn->prepare("select * from kelas where dosen='$dosen' and id_periode='$periode' and level_ecc='$level' ");
    $stmt->execute();
    $res=$stmt->get_result();
  
    if ($res->num_rows>0) {
        $kal.="<option value='all'  >Semua</option>";
        while($row=$res->fetch_assoc()){
            $level=$row["level_ecc"];
            $idkelas=$row["id_kelas"];
            $namakelas=$row["nama_kelas"];
            $kal.="<option value='$idkelas' >Kelas $namakelas </option>";
        }
    }else{
        $kal.="<option value='-1' >~ Tidak ada kelas di periode ini ~</option>";
    }
   
    echo $kal;
}else if($_POST["jenis"]=="get_leveldos"){
    $conn=getConn();
    $kal="";
    $kal.="<option value='-1'>-Pilih Level- </option>";
    $arr=unserialize($_SESSION["user"]);
    $dosen= $arr->get_u();
    $periode=$_POST["periode"];
    $stmt=$conn->prepare("select * from kelas where dosen='$dosen' and id_periode='$periode' group by level_ecc");
    $stmt->execute();
    $res=$stmt->get_result();
   
    if ($res->num_rows>0) {
        $kal.="<option value='all'>Semua</option>";
        while($row=$res->fetch_assoc()){
            
            $level=$row["level_ecc"];
            $idkelas=$row["id_kelas"];
            $namakelas=$row["nama_kelas"];
            $kal.="<option value='$level' >ECC $level </option>";
        }
    }else{
        $kal.="<option value='-1' >~Tidak level di periode ini~ </option>";
    }
   
    echo $kal;
}else if($_POST["jenis"]=="getinfo"){
    $idnilai=$_POST["idnilai"];
    
    $conn=getConn();
    $stmt=$conn->prepare("select * from nilai n,mahasiswa m where m.nrp=n.nrp and n.id_nilai='$idnilai' ");
    $stmt->execute();
    $res=$stmt->get_result();
    $row=$res->fetch_assoc();
    echo json_encode($row);
}else if($_POST["jenis"]=="downloadtemplete"){
    $sql="select * from kelas_mhs km,mahasiswa m,nilai n where n.id_nilai=km.id_nilai and km.nrp=m.nrp and m.nrp='$nrp' and km.id_kelas='$kelas'";
}

?>