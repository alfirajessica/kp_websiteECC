<?php
require_once "../config/conn.php";
$conn=getConn();

if($_POST["jenis"]=="simpandosen_baru"){
    $namadosen = $_POST["getnamadosen"];
    $userdosen = $_POST["getuserdosen"];
    $passdosen = $_POST["getpassdosen"];
    $level = "dosen";


    $sql = "insert into user (username,password,nama,level,status) values ('$userdosen','$passdosen','$namadosen','$level',1)";
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
    // $sql1 = "select * from user where username='$username'";
    // $result=$conn->query($sql1);

    // if($result->num_rows>0){
    //     while ($row=$result->fetch_assoc()){
    //         $status =$row['status'];
            
    //     }
        
        
    // }

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


?>