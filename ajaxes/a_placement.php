<?php
    session_start();
    include '../config/conn.php';
    if ($_POST["jenis"]=="setstandard") {
    $conn=getConn();

    $lev1=intval($_POST["lev1"]);
    $lev2=intval($_POST["lev2"]);
    $lev3=intval($_POST["lev3"]);
    $lev4=intval($_POST["lev4"]);

    $sql="select * from temp_mahasiswa";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
        $nilai=intval($row["nilai_placement"]);

        $placement="0";
        if ($nilai<=$lev1) {
            $placement="1";
        }else if ($nilai<=$lev2) {
            $placement="2";
        }else if ($nilai<=$lev3) {
            $placement="3";
        }else {
            $placement="4";
        }

        $sql1="update temp_mahasiswa set level='$placement'";
        $result1=$conn->query($sql1);
    }

        
    }
