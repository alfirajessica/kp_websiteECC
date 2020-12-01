<?php
require_once "../config/conn.php";
$conn=getConn();

if($_POST["jenis"]=="cek_dataditable_mahasiswa"){
    $idperiode = $_POST["idperiode"];
    $ket = "";
    $kets="";
    $kode="";

    $sql1 = "select * from tempkelas_mhs where id_periode='$idperiode'";
    $result = $conn->query($sql1);
    while ($row = $result->fetch_assoc()) {
        $nrp = $row["nrp"];
        $level = $row["level_ecc"];
        $hari = $row["hari"];
        $ruang = $row["ruang_kode"];
        $nama = $row["nama_mhs"];

        $sql2 = "select id_ruangkelas from ruang_kelas where nama_ruang='$ruang'";
        $result2 = $conn->query($sql2);
        while ($row2 = $result2->fetch_assoc()) {
            $idruang = $row2["id_ruangkelas"];
        }

        $sql3 = "select * from kelas where level_ecc='Level $level' and hari='$hari' and id_ruangkelas='$idruang'";
        $result3 = $conn->query($sql3);
        while ($row3 = $result3->fetch_assoc()) {
            $idkelas = $row3["id_kelas"];
        }

        //insert ke mahasiswa - plcement - kelas_mhs
        $insertmhs = "INSERT INTO mahasiswa(id_periode,nrp,nama_mhs,status_mhs) VALUES ('1','$nrp','$nama','1')";
        if ($conn->query($insertmhs)) {
            $insertpt = "INSERT INTO placement(id_ptest,id_periode,nrp,nilai_ptest,ptest_level,status_kembar) VALUES (null,'1','$nrp','0','0','0')";
            if ($conn->query($insertpt)) {
                $kode =1;
            }else {
                $kode = 0;
            }
        }else {
            $kode = 0;
        }

        $sqlinsert = "INSERT INTO kelas_mhs(id_klsmhs,id_periode,nrp,id_kelas,id_nilai,status_klsmhs,status_kembar) VALUES (null,'$idperiode','$nrp','$idkelas','0','1','0')";
        if ($conn->query($sqlinsert)) {
            $ket = "Berhasil Aktifkan semua kelas mahasiswa";
        }else {
            $ket = "Gagal Aktifkan!";
        }

        $sqlinsnilai = "INSERT INTO nilai(id_nilai,id_periode,nrp,id_kelas,nilai_uts,nilai_uas,nilai_akhir,grade) VALUES (null,'$idperiode','$nrp','$idkelas','0','0','0','-')";
        if ($conn->query($sqlinsnilai)) {
            $kets = "Berhasil masukkan ke nilai";
        }else {
            $kets = "Gagal masukkan ke nilai";
        }

        //delete table tempkelas_mhs
        $deltempkls = "delete from tempkelas_mhs where id_periode='$idperiode'";
        if ($conn->query($deltempkls)) {
            $ket = "Berhasil Aktifkan semua kelas mahasiswa";
        }else {
            $ket = "Gagal Aktifkan!";
        }

        
    }
    
    
    
    echo $kets;
    $conn->close();

}

if($_POST["jenis"]=="jmdatakembarpt"){
    $idperiode=$_POST["idperiode"];
    $ket=array();
    
    $sql = "SELECT id_klsmhs, id_periode, nrp, COUNT( nrp ) x
    FROM kelas_mhs
    WHERE id_periode='$idperiode'
    GROUP BY nrp
    HAVING x >1";

    if ($result = mysqli_query($conn, $sql)) {
        
        for ($set = array (); $row = $result->fetch_assoc(); $set[] = $row['id_klsmhs']);
        print_r($set);

        
        for ($i=0; $i <count($set) ; $i++) { 
            $sql2 = "update kelas_mhs set status_kembar='1' where id_klsmhs='$set[$i]' and id_periode='$idperiode'";
            if ($conn->query($sql2)) {
                $ket = "berhasil ubah status placement";
            }else {
                $ket = "gagal ubah status placement";
            }
        }
    }
    //echo $ket;
    $conn->close();

}


if($_POST["jenis"]=="cek_datamodal_untuknama"){
    $id_klsmhs = $_POST['id_klsmhs'];

    $sql = "select * from kelas_mhs where id_klsmhs='$id_klsmhs'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $nrp = $row["nrp"];
        $idkelas = $row["id_kelas"];
    }

    $sql1 = "select * from mahasiswa where nrp='$nrp'";
    $query = mysqli_query($conn,$sql1); // get the data from the db
    $result2 = array();
    while ($row2 = $query->fetch_array(MYSQLI_ASSOC)) { // fetches a result row as an associative array
        $result2["nrp"] = $row2["nrp"];
        $result2 ["nama_mhs"] = $row2['nama_mhs'];
    }
    
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($result2); // return value of $result
}

if($_POST["jenis"]=="cek_datamodal_untukkelas"){
    $id_klsmhs = $_POST['id_klsmhs'];

    $sql1 = "select * from kelas_mhs where id_klsmhs='$id_klsmhs'";
    $query = mysqli_query($conn,$sql1); // get the data from the db
    $result2 = array();
    while ($row2 = $query->fetch_array(MYSQLI_ASSOC)) { // fetches a result row as an associative array
        $result2["id_kelas"] = $row2["id_kelas"];
    }
    
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($result2); // return value of $result
}

if ($_POST["jenis"]=="get_levelkls_mhs") {
    $id_klsmhs = $_POST['id_klsmhs'];
    $ket = $_POST["ket"];

    $sql = "select * from kelas_mhs where id_klsmhs='$id_klsmhs'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $nrp = $row["nrp"];
        $idkelas = $row["id_kelas"];
    }

    $sql1="select * from kelas where id_kelas='$idkelas'";
    $result1 = $conn->query($sql1);
    while ($row1 = $result1->fetch_assoc()) {
        $id_periode=$row1["id_periode"];
        $level = $row1["level_ecc"];
    }

    $sql2="select * from kelas where id_periode='$id_periode' and status_kelas='1'";
        $result2 = $conn->query($sql2);
        $kal="<option value='-1' >pilih Level/kelas</option>";
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $id_kelas=$row2["id_kelas"];
                $namakelas=$row2["nama_kelas"];
                $level = $row2["level_ecc"];

                $kal.="<option value='$id_kelas'>$level/$namakelas</option>";
            }
        }else{
            $kal="<option value='-1'>..</option>";
        }

    // if ($ket == "pindahkelas") {
    //     $sql2="select * from kelas where level_ecc='$level' and id_periode='$id_periode' and status_kelas='1'";
    //     $result2 = $conn->query($sql2);
    //     $kal="<option value='-1' >pilih Level/kelas</option>";
    //     if ($result2->num_rows > 0) {
    //         while ($row2 = $result2->fetch_assoc()) {
    //             $id_kelas=$row2["id_kelas"];
    //             $namakelas=$row2["nama_kelas"];
    //             $level = $row2["level_ecc"];

    //             $kal.="<option value='$id_kelas'>$level/$namakelas</option>";
    //         }
    //     }else{
    //         $kal="<option value='-1'>..</option>";
    //     }
    // }
    // else if ($ket == "pindahlevel")
    // {
        
    // }

    

    echo $kal;
    $conn->close();
}


if($_POST["jenis"]=="nonaktifkan_klsmhs"){
    $idklsmhs = $_POST['idklsmhs'];
    $ket="";
    $sql = "update kelas_mhs set status_klsmhs='0' where id_klsmhs='$idklsmhs'";
    
    if ($conn->query($sql)) {
        $ket= "1"; //berhasil
    }else {
        $ket= "0"; //gagal
    }
    echo $ket;
    $conn->close();

}

if($_POST["jenis"]=="aktifkan_klsmhs"){
    $idklsmhs = $_POST['idklsmhs'];
    $ket="";
    $sql = "update kelas_mhs set status_klsmhs='1' where id_klsmhs='$idklsmhs'";
    
    if ($conn->query($sql)) {
        $ket= "1"; //berhasil
    }else {
        $ket= "0"; //gagal
    }
    echo $ket;
    $conn->close();

}

if($_POST["jenis"]=="hapus_klsmhskembar"){
    $idklsmhs = $_POST['id_klsmhs'];
    $idperiode = $_POST["id_periode"];
    $nrp = $_POST["nrp"];
    $kode="";
    $ket="";
    //delete kelas dengan idkelas tsb
    $sql = "delete from kelas_mhs where id_klsmhs='$idklsmhs'";
    if ($conn->query($sql)) {
        $kode=1;
    }else {
        $kode = 0;
    }

    if ($kode == 1) {
        $sqlsel = "select * from kelas_mhs where id_periode='$idperiode' and nrp='$nrp'";
        $result = $conn->query($sqlsel);
        while ($row = $result->fetch_assoc()) {
            $id_klsmhs = $row["id_klsmhs"];

            $sqlup = "update kelas_mhs set status_kembar=0 where id_klsmhs='$id_klsmhs'";
            if ($conn->query($sqlup)) {
                $ket="berhasil update";
            }else {
                $ket = "gagal update";
            }
        
        }
    }

    echo $ket;
    $conn->close();
}

if($_POST["jenis"]=="update_btnpindah"){
    $idklsmhs = $_POST["idklsmhs"];
    $kelassel = $_POST["kelassel"];
    $nrp = $_POST["nrp"];
    $ket="";

    $sqlup = "update kelas_mhs set id_kelas='$kelassel' where id_klsmhs='$idklsmhs'";
    if ($conn->query($sqlup)) {
        $ket="berhasil update";
    }else {
        $ket = "gagal update";
    }
    echo $ket;
    $conn->close();
}

?>