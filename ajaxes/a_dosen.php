<?php
require_once "../config/conn.php";
$conn=getConn();

if($_POST["jenis"]=="simpandosen_baru"){
    $namadosen = strtolower($_POST["getnamadosen"]);
    $userdosen = $_POST["getuserdosen"];
    $passdosen = $_POST["getuserdosen"];
    $level = "dosen";

    $passdosen=sha1($passdosen);
    $snamadosen = ucwords($namadosen);
    $sql = "insert into user (username,password,nama,level,status) values ('$userdosen','$passdosen','$snamadosen','$level',1)";
    if ($conn->query($sql)) {
        echo "berhasil tambah dosen baru";
    }else {
        echo "gagal";
    }
    $conn->close();
}

if($_POST["jenis"]=="update_statusdosen"){
    $username = $_POST["getuserdosen"];
    $status = $_POST["getstatusdosen"];

    $tempStatus="";
   
    if ($status == 1) {
        $tempStatus = 0;
    }
    else if ($status == 0) {
        $tempStatus = 1;
    }

    $sql = "update user set status=$tempStatus where username='$username'";
    if ($conn->query($sql)) {
    echo "berhasil";
    }else{
    echo "gagal";
    }
    $conn->close();
}


if($_POST["jenis"]=="get_alldosen"){
    $conn=getConn();
    $sql1="select * from user where level='dosen' and status=1";
    $result1 = $conn->query($sql1);
    $kal="<option value='-1' disabled>Select lecturer</option>";
    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $username=$row1["username"];
            $nama=$row1["nama"];
            $kal.="<option value='$username'>$nama</option>";
        }
    }else{
        $kal="<option value='-1'>..</option>";
    }
    echo $kal;
    $conn->close();
    
}


?>