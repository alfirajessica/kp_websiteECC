<?php
session_start();
include '../config/conn.php';
$conn = getConn();

//save ke standard_nilaipt
if ($_POST["jenis"] == "setstandard") {
    $conn = getConn();

    $periode =intval($_POST["periode"]);
    $lev1 = intval($_POST["lev1"]);
    $lev2 = intval($_POST["lev2"]);
    $lev3 = intval($_POST["lev3"]);
    $lev4 = intval($_POST["lev4"]);

    $turncateqry = "TRUNCATE standard_nilaipt";
    $turnres = mysqli_query($conn, $turncateqry);
    $insertqry = "INSERT INTO standard_nilaipt(id_periode,level1,level2,level3,level4) VALUES ($periode,$lev1,$lev2,$lev3,$lev4)";
    $insertres = mysqli_query($conn, $insertqry);

    $sql = "select * from temp_placement where id_periode='$periode'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $nilai = intval($row["nilai_placement"]);
        $nrp = intval($row["nrp"]);

        $placement = "";
        if ($nilai == 0) {
            $placement = 0;
        } else if ($nilai <= $lev1) {
            $placement = 1;
        } else if ($nilai <= $lev2) {
            $placement = 2;
        } else if ($nilai <= $lev3) {
            $placement = 3;
        } else {
            $placement = 4;
        }


        $sql1 = "update temp_placement set ptest_level=$placement where nrp='$nrp'";
        $result1 = $conn->query($sql1);
    }
} 


 else if ($_POST["jenis"] == "update") {
    $id_ptest = $_POST["id_ptest"];
    $nilai = $_POST["nilai"];
    $level = $_POST["level"];
    $periode = $_POST["periode"];
    $nama = $_POST["nama"];
    $nrp = $_POST['nrp'];
    $conn = getConn();
    $ket="";

    //udpate di placement jika mengubah nilai dan level
    $sql = "update placement set nilai_ptest='$nilai', ptest_level='$level', id_periode='$periode' where id_ptest='$id_ptest'";
    if ($conn->query($sql)) {
        $ket= "1"; //berhasil
    }else {
        $ket= "0"; //gagal
    }

    //update di mahasiswa jika mengubah nama
    $sqlmhs = "update mahasiswa set nama_mhs='$nama' where nrp='$nrp'";
    if ($conn->query($sqlmhs)) {
        $ket= "1"; //berhasil
    }else {
        $ket= "0"; //gagal
    }

    ///------------- untuk yang id periodenya tidak diketahui--------------------//
    //karena dia update periode mahasiswa yang periodenya tidak diketahui,
    //maka ia update otomoatis mahasiswa sekaligus
    $sqlupmhs = "update mahasiswa set id_periode='$periode' where nrp='$nrp' and id_periode='1'";
    if ($conn->query($sqlupmhs)) {
        $ket= "1"; //berhasil
    }else {
        $ket= "0"; //gagal
    }


    echo $ket;
    // updatelevel();
} else if ($_POST["jenis"] == "insertmhs") {
    $periode = $_POST["periode"];
    $conn = getConn();
    $sql = "select * from mahasiswa";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $nrp = $row["nrp"];
        $nama = $row["nama_mahasiswa"];
        $level = $row["placement_level"];
        $nilai = $row["nilai_placement"];

        if ($level!="0") {
            //$sql1 = "INSERT INTO mahasiswa(id_periode,nrp,nama_mhs,nilai_placement,placement_level,start_level,now_level,status_mhs) VALUES ('$periode','$nrp','$nama','$nilai','0','0','0','1')";
            //$result1 = $conn->query($sql1);
    
            $sql2 = "update mahasiswa set status_mhs='1' where nrp=$nrp";
            $result2 = $conn->query($sql2);

            // $sql3="delete from temp_mahasiswa where nrp='$nrp'";
            // $result3 = $conn->query($sql3);

        }

       
    }

    echo "Berhasil";
}
else if ($_POST["jenis"] == "loadmhs") {
    $kal = "";
    //$id_ptest = $_POST["id_ptest"];
    $nrp = $_POST["nrp"];
    $conn = getConn();
     $stmt = $conn->prepare("select * from mahasiswa WHERE nrp=?");
     $stmt->bind_param("s", $nrp);
     $stmt->execute();
     $result = $stmt->get_result();
     $row = $result->fetch_assoc();
     echo json_encode($row);

}
else if ($_POST["jenis"] == "loadplacement") {
    $kal = "";
    $id_ptest = $_POST["id_ptest"];
    //$nrp = $_POST["nrp"];
    $conn = getConn();
     $stmt = $conn->prepare("select * from placement WHERE id_ptest=?");
     $stmt->bind_param("s", $id_ptest);
     $stmt->execute();
     $result = $stmt->get_result();
     $row = $result->fetch_assoc();
     echo json_encode($row);
} else if ($_POST["jenis"] == "addtempmhs") {
    $periode = $_POST["periode"];
    $nrp = $_POST["nrp"];
    $nama = strtolower($_POST["nama"]);
    $nilai = $_POST["nilai"];
    $level = $_POST["level"];
    $conn = getConn();

    $snama = ucwords($nama);
    $sqlmhs = "INSERT INTO mahasiswa(id_periode,nrp,nama_mhs,status_mhs) VALUES ('$periode','$nrp','$snama','0')";
    if ($conn->query($sqlmhs)) {
        $sqlmhstp = "INSERT INTO placement(id_ptest,id_periode,nrp,nilai_ptest,ptest_level) VALUES (null,'$periode','$nrp','$nilai','$level')";
        if ($conn->query($sqlmhstp)) {
            echo "Berhasil";
        }else {
            echo "Gagal insert !";
        }
    }else {
        echo "Gagal insert !";
    }
    
    
    //updatelevel();
}else if($_POST["jenis"]=="cekdata"){
    $conn = getConn();
    $stmt = $conn->prepare("select count(nrp) as jum from temp_placement");
    $res=$stmt->execute();
    $res1=$stmt->get_result();
    $row=$res1->fetch_assoc();
    $conn->close();
    if ($row["jum"]>0) {
      echo "ada";
    }
}

if($_POST["jenis"]=="selectednrp"){
    $nrp = $_POST["nrp"];
    
    $sql="select * from placement where nrp='$nrp'";
    $query = mysqli_query($conn,$sql); // get the data from the db
    $result = array();
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) { // fetches a result row as an associative array

        $result ["nrp"] = $row['nrp'];
        
    }
    
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($result); // return value of $result

    
}


if($_POST["jenis"]=="updatelevel"){
    $periode=$_POST["periode"];
    //updatelevel();

    $conn = getConn();
    $sqla = "select * from standard_nilaipt where id_periode='$periode'";
    $resulta = $conn->query($sqla);
    while ($rowa = $resulta->fetch_assoc()) {
        $lev1 = intval($rowa["level1"]);
        $lev2 = intval($rowa["level2"]);
        $lev3 = intval($rowa["level3"]);
        $lev4 = intval($rowa["level4"]);
    }
    if (!$resulta) {
        echo "nilai gagal";
    }

    $sql = "select * from mahasiswa where id_periode='$periode'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $nilai = intval($row["nilai_placement"]);
        $nrp = intval($row["nrp"]);

        $placement = "-";
        if ($nilai == 0) {
            $placement = 0;
        } else if ($nilai <= $lev1) {
            $placement = 1;
        } else if ($nilai <= $lev2) {
            $placement = 2;
        } else if ($nilai <= $lev3) {
            $placement = 3;
        } else {
            $placement = 4;
        }

        $sql1 = "update mahasiswa set placement_level='$placement' where nrp='$nrp'";
        //$result1 = $conn->query($sql1);
    
        if ($conn->query($sql1)) {
            echo "1 update level"; //berhasil
        }else {
            echo "0"; //gagal
        }    
    }
    $conn->close();
}

if($_POST["jenis"]=="hapus_mhs"){
    
    $id_ptest = $_POST["id_ptest"];
    $nrp = $_POST["nrp"];
    $idperiode = $_POST["id_periode"];
    $ket=""; 
    $kode="";

    //delete kelas dengan idkelas tsb
    $sql = "delete from placement where id_ptest='$id_ptest'";
    if ($conn->query($sql)) {
        $kode=1;
    }else {
        $kode = 0;
    }

    if ($kode == 1) {
        $sqlsel = "select * from placement where id_periode='$idperiode' and nrp='$nrp'";
        $result = $conn->query($sqlsel);
        while ($row = $result->fetch_assoc()) {
            $idptest = $row["id_ptest"];

            $sqlup = "update placement set status_kembar=0 where id_ptest='$idptest'";
            if ($conn->query($sqlup)) {
                $ket="Success to delete $nrp";
            }else {
                $ket = "Failed to delete $nrp";
            }
        
        }
    }

    echo $ket;
    $conn->close();
}

/*if($_POST["jenis"]=="mshpindah_level"){
    $nrp = $_POST["nrp"];
    $levelbaru = $_POST["levelbaru"];
    $ket="";

    //delete kelas dengan idkelas tsb
    $sql = "update mahasiswa set start_level='$levelbaru' where nrp='$nrp'";
    if ($conn->query($sql)) {
        $ket= "berhasil pindah".$levelbaru;
    }else {
        $ket= "gagal pindah";
    }

    echo $ket;
    $conn->close();
}*/

if($_POST["jenis"]=="cek_periode"){
    $idperiode = $_POST["idperiode"];

    $sql = "select * from standard_nilaipt where id_periode=$idperiode";
    $query = mysqli_query($conn,$sql); // get the data from the db
    $result = array();
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) { // fetches a result row as an associative array

        $result ["id_periode"] = $row['id_periode'];
        $result ["level1"] = $row['level1'];
        $result ["level2"] = $row['level2'];
        $result ["level3"] = $row['level3'];
        $result ["level4"] = $row['level4'];   
    }
    
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($result); // return value of $result
}

if($_POST["jenis"]=="cek_dataterisi"){
    
    $idperiode = $_POST["idperiode"];
    $sqlcek = "select * from placement where id_periode='$idperiode' and nilai_ptest='0' or status_kembar='1'";
    $query = mysqli_query($conn,$sqlcek); // get the data from the db
    $result = array();
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) { // fetches a result row as an associative array

        $result ["id_ptest"] = $row['id_ptest'];
        
    }
    
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($result); // return value of $result

}
if($_POST["jenis"]=="update_pt"){
    $idperiode = $_POST["idperiode"];
    $kode="";
    $ket="";
    $sqlsel1 = "select * from temp_placement where id_periode='$idperiode'";
    $result3 = $conn->query($sqlsel1);
    while ($row3 = $result3->fetch_assoc()) {
        $nrp3 = $row3["nrp"];
        $nama3 = $row3["nama_mhs"];
        $nilai3 = $row3["nilai_ptest"];
        $level3 = $row3["ptest_level"];

        $sqlins1 = "update placement set nilai_ptest='$nilai3', ptest_level='$level3' where nrp='$nrp3'";
        if ($conn->query($sqlins1)) {
            $ket = "berhasil update pt";
        }
        else{
            $ket = "gagal update pt"; //gagal
        } 
    }
    echo $ket;
    $conn->close();
}
if($_POST["jenis"]=="insert_pt"){
    $idperiode = $_POST["idperiode"];
    $kode="";
    $ket="";

    $sqlselpt = "select * from placement where id_periode='$idperiode'";
    $result2 = $conn->query($sqlselpt);
    while ($row2 = $result2->fetch_assoc()) {
        $nrp2 = $row3["nrp"];
        $nama2 = $row3["nama_mhs"];
        $nilai2 = $row3["nilai_ptest"];
        $level2 = $row3["ptest_level"];
        
        $sqlsel2 = "select * from temp_placement where id_periode='$idperiode' and nrp!='$nrp2'";
            $result4 = $conn->query($sqlsel2);
            while ($row4 = $result4->fetch_assoc()) {
                $nrp4 = $row4["nrp"];
                $nama4 = $row4["nama_mhs"];
                $nilai4 = $row4["nilai_ptest"];
                $level4 = $row4["ptest_level"];
    
                $sqlins2 = "INSERT INTO placement(id_ptest,id_periode,nrp,nilai_ptest,ptest_level) VALUES (null,'$idperiode','$nrp4','$nilai4','$level4')";
                if ($conn->query($sqlins2)) {
                    $ket = "isi";
                }
                else{
                    $ket = "gagal"; //gagal
                } 
            }
    
    }
    
    echo $ket;
    $conn->close();
}
if($_POST["jenis"]=="insert_mhs"){
    $idperiode = $_POST["idperiode"];
    $kode="";
    $ket="";
    $sql = "select id_ptest, count(nrp) from placement group by nrp HAVING COUNT(id_periode) > 1 and COUNT(nrp) > 1 ";
    if ($conn->query($sql)) {
        $sql2 = "delete from placement where count(nrp)>1 and id_periode='$idperiode'";
        if ($conn->query($sql2)) {
            $ket = "berhasil delete";
        }
        else{
            $Ket = "gagal delete";
        }
        
    }else{
        $ket = "gagal";
    }

    
    echo $ket;

    $conn->close();
}

if($_POST["jenis"]=="aktifkan_allmhs"){
    $idperiode = $_POST["idperiode"];

    $conn = getConn();
    $sqlupmhs = "update mahasiswa set status_mhs='1' where id_periode='$idperiode'";
    if ($conn->query($sqlupmhs)) {
        $ket = "Success to save this placement";
    }
    else{
        $ket = "Failed to save this placement";
    }   
    echo $ket;
    $conn->close();
}


if($_POST["jenis"]=="nonaktifkan_mhs"){
    $nrp = $_POST["nrp"];
    $sql = "update mahasiswa set status_mhs='0' where nrp='$nrp'";
    if ($conn->query($sql)) {
        $ket = "berhasil menonaktifkan mahasiswa ini";
    }else {
        $ket = "Gagal menempatkan mahasiswa";
    }
    echo $ket;
    $conn->close();

}

if($_POST["jenis"]=="jmdatakembarpt"){
    $idperiode=$_POST["idperiode"];
    $ket=array();
    
    $sql = "SELECT id_ptest, id_periode, nrp, COUNT( nrp ) x
    FROM placement
    WHERE id_periode='$idperiode'
    GROUP BY nrp
    HAVING x >1";

    if ($result = mysqli_query($conn, $sql)) {
        
        for ($set = array (); $row = $result->fetch_assoc(); $set[] = $row['id_ptest']);
        //print_r($set);
        
        for ($i=0; $i <count($set) ; $i++) { 
            $sql2 = "update placement set status_kembar='1' where id_ptest='$set[$i]' and id_periode='$idperiode'";
            if ($conn->query($sql2)) {
                $ket = "1";
            }else {
                $ket = "0";
            }
        }
    }
    
    echo $ket;
    $conn->close();

}


?>