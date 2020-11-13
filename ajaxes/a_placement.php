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

    $sql = "select * from mahasiswa where id_periode='$periode'";
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


        $sql1 = "update mahasiswa set placement_level=$placement where nrp='$nrp'";
        $result1 = $conn->query($sql1);
    }
} 

else if ($_POST["jenis"] == "selectednrp") {
    $nrp = $_POST["id"];
    $conn = getConn();
    $sql = "select * from temp_mahasiswa where nrp='$nrp'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $nrp = $row["nrp"];
        $nama = $row["nama_mahasiswa"];
        $nilai = $row["nilai_placement"];
        $level = $row["level"];
        $arr = array(
            "nama" => $nama,
            "nilaiplacement" => $nilai
        );
    }
    echo json_encode($arr);
} else if ($_POST["jenis"] == "update") {
    $nrp = $_POST["id"];
    $nilai = $_POST["nilai"];
    $level = $_POST["level"];
    $conn = getConn();

    $sql0 = "update mahasiswa set nilai_placement='$nilai', placement_level='$level' where nrp='$nrp'";
    $result0 = $conn->query($sql0);
    if ($result0) {
        echo "Berhasil update !";
    }
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
else if ($_POST["jenis"] == "loadsel") {
    $kal = "";
    $nrp = $_POST["nrp"];
    $conn = getConn();
    $stmt = $conn->prepare("select * from mahasiswa where nrp=? ");
    $stmt->bind_param("s", $nrp);
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

    $snama= ucwords($nama);
    $sql = "INSERT INTO mahasiswa(id_periode,nrp,nama_mhs,nilai_placement,placement_level,start_level,now_level,status_mhs) VALUES ('$periode','$nrp','$snama','$nilai','$level','0','0','0')";

    if ($conn->query($sql)) {
        echo "Berhasil insert !";
    }else {
        echo "Gagal insert !";
    }
    
    //updatelevel();
}else if($_POST["jenis"]=="cekdata"){
    $conn = getConn();
    $stmt = $conn->prepare("select count(nrp) as jum from temp_mahasiswa");
    $res=$stmt->execute();
    $res1=$stmt->get_result();
    $row=$res1->fetch_assoc();
    $conn->close();
    if ($row["jum"]>0) {
      echo "ada";
    }
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
    $nrp = $_POST["nrp"];
    $ket="";

    //delete kelas dengan idkelas tsb
    $sql = "delete from mahasiswa where nrp='$nrp'";
    if ($conn->query($sql)) {
        $ket= "berhasil hapus";
    }else {
        $ket= "gagal hapus";
    }

    echo $ket;
    $conn->close();
}

if($_POST["jenis"]=="mshpindah_level"){
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
}

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

    //cek dulu apakah semua kelas sudah terisi datanya
    $sqlcek = "select * from mahasiswa where id_periode='$idperiode' and nilai_placement='0'";
    $query = mysqli_query($conn,$sqlcek); // get the data from the db
    $result = array();
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) { // fetches a result row as an associative array

        $result ["nrp"] = $row['nrp'];
        
    }
    
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($result); // return value of $result

}

if($_POST["jenis"]=="aktifkan_allmhs"){
    $idperiode = $_POST["idperiode"];
    $ket="";
    //cek dulu apakah mahasiswa pernah dipindahkan levelnya
    //kalau start_level 0 berarti gkpernah dilakukan pindah level, jadi start_level sama dgn placement_level
    $sql = "select * from mahasiswa where id_periode='$idperiode'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $ket="";
        $nrp = $row["nrp"];
        $ptlevel = $row["placement_level"];

        $sql1 = "update mahasiswa set start_level='$ptlevel', status_mhs='1' where nrp='$nrp'";
    
        if ($conn->query($sql1)) {
            // $sql2 = "update mahasiswa set status_mhs='1' where id_periode='$idperiode'";
            // if ($conn->query($sql2)) {
            //     $ket = "berhasil menempatkan semua daftar mahasiswa placement semester ".$idperiode." ";
            // }else {
            //     $ket = "Gagal menempatkan mahasiswa";
            // }
            $ket = "berhasil menempatkan semua daftar mahasiswa placement ";

        }else {
            $ket = "Gagal menempatkan mahasiswa";
        }    
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

?>