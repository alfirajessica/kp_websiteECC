<?php
require_once "../config/conn.php";
$conn=getConn();

if($_POST["jenis"]=="cek_dataditable_mahasiswa"){
    $idperiode = $_POST["idperiode"];
    $ket = "";
    $kets="";
    $kode="";

    //select dari hasil tampungan sementara
    $sql1 = "select * from tempkelas_mhs where id_periode='$idperiode'";
    $result = $conn->query($sql1);
    while ($row = $result->fetch_assoc()) {
        $nrp = $row["nrp"];
        $level = $row["level_ecc"];
        $hari = $row["hari"];
        $ruang = $row["ruang_kode"];
        $nama = $row["nama_mhs"];

        //select id ruang kelas apakah sesuai dengan kelas yang tersedia
        $sql2 = "select id_ruangkelas from ruang_kelas where nama_ruang='$ruang'";
        $result2 = $conn->query($sql2);
        while ($row2 = $result2->fetch_assoc()) {
            $idruang = $row2["id_ruangkelas"];
        }

        //select id kelas pada level, hari dan id ruang kelas yang sesuai di excelnya
        $sql3 = "select * from kelas where level_ecc='$level' and hari='$hari' and id_ruangkelas='$idruang'";
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

        //insert ke kelas_mhs
        $sqlinsert = "INSERT INTO kelas_mhs(id_klsmhs,id_periode,nrp,id_kelas,id_kelas_sblm,id_nilai,status_klsmhs,status_kembar) VALUES (null,'$idperiode','$nrp','$idkelas','0','0','1','0')";
        if ($conn->query($sqlinsert)) {
            $ket = "Berhasil Aktifkan semua kelas mahasiswa";

            //select kelas_mhsnya
            $sql4 = "select * from kelas_mhs where id_periode='$idperiode'";
            $result4 = $conn->query($sql4);
            while ($row4 = $result4->fetch_assoc()) {
                $idklsmhs = $row4["id_klsmhs"];
            }

            $sqlinsnilai = "INSERT INTO nilai_mhs(id_nilai,id_klsmhs,nilai_uts,nilai_uas,nilai_akhir,grade) VALUES (null,'$idklsmhs','0','0','0','-')";
            if ($conn->query($sqlinsnilai)) {
                $kode=1;

                updidnilai_diklsmhs($idklsmhs);
                jmdatakembar($idperiode);

                //delete table tempkelas_mhs
                $deltempkls = "delete from tempkelas_mhs where id_periode='$idperiode'";
                if ($conn->query($deltempkls)) {
                    $ket = "Success to activate all student";
                    }else {
                        $ket = "Failed to activate";
                    } 
                }
            else{$kode=0;}
            
        }else {
            $ket = "Gagal Aktifkan!";
        }

        

        

        
        //updidnilai_diklsmhs($idperiode);

        /*$sqlinsnilai = "INSERT INTO nilai(id_nilai,id_periode,nrp,id_kelas,nilai_uts,nilai_uas,nilai_akhir,grade) VALUES (null,'$idperiode','$nrp','$idkelas','0','0','0','-')";
        if ($conn->query($sqlinsnilai)) {
            //$ket = "Berhasil masukkan ke nilai";
            updidnilai_diklsmhs($idperiode);
            //delete table tempkelas_mhs
            $deltempkls = "delete from tempkelas_mhs where id_periode='$idperiode'";
            if ($conn->query($deltempkls)) {
                $ket = "Success to activate all student";
            }else {
                $ket = "Failed to activate";
            }
        }else {
            $ket = "Failed to activate";
        }*/

        
        
    }
    //updidnilai_diklsmhs($idperiode); 
    echo $ket;
    $conn->close();

}

function updidnilai_diklsmhs($idklsmhs){
    $conn=getConn();
    $kode="";
    $sql1 = "select * from nilai_mhs where id_klsmhs='$idklsmhs'"; //origin
    $result1 = $conn->query($sql1);
    while ($row1 = $result1->fetch_assoc()) {
        $idnilai = $row1["id_nilai"];

        $sqlup = "update kelas_mhs set id_nilai='$idnilai' where id_klsmhs='$idklsmhs'";
        if ($conn->query($sqlup)) {
            $kode=1;
        }else {
            $kode=0;
        }

    }

}

function jmdatakembar($idperiode){
    $ket=array();
    $conn=getConn();
    $sql = "SELECT id_klsmhs, id_periode, nrp, COUNT( nrp ) x
    FROM kelas_mhs
    WHERE id_periode='$idperiode'
    GROUP BY nrp
    HAVING x >1";

    if ($result = mysqli_query($conn, $sql)) {
        
        for ($set = array (); $row = $result->fetch_assoc(); $set[] = $row['id_klsmhs']);
        //print_r($set);

        
        for ($i=0; $i <count($set) ; $i++) { 
            $sql2 = "update kelas_mhs set status_kembar='1' where id_klsmhs='$set[$i]' and id_periode='$idperiode'";
            if ($conn->query($sql2)) {
                $ket = "berhasil ubah status placement";
            }else {
                $ket = "gagal ubah status placement";
            }
        }
    }
    
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

    
    $sql = "select * from kelas_mhs where id_klsmhs='$id_klsmhs'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $idkelas = $row["id_kelas"];
    }

    $sql1 = "select * from kelas where id_kelas='$idkelas'";
    $query = mysqli_query($conn,$sql1); // get the data from the db
    $result2 = array();
    while ($row2 = $query->fetch_array(MYSQLI_ASSOC)) { // fetches a result row as an associative array
        $result2["level_ecc"] = $row2["level_ecc"];
        $result2["id_kelas"] = $row2["id_kelas"];
    }
    
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($result2); // return value of $result
}

if ($_POST["jenis"]=="get_levelkls_mhs") {
    $id_klsmhs = $_POST['id_klsmhs'];
    //$ket = $_POST["ket"];

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

    $sql2="select * from kelas where id_periode='$id_periode' and level_ecc='$level' and status_kelas='1'";
        $result2 = $conn->query($sql2);
        $kal="<option value='-1' >pilih Level/kelas</option>";
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $id_kelas=$row2["id_kelas"];
                $namakelas=$row2["nama_kelas"];
                $level = $row2["level_ecc"];
                $hari = $row2["hari"];
                $jamawal = $row2["jam_awal"];
                $idruang = $row2["id_ruangkelas"];

                $sql3 = "select * from ruang_kelas where id_ruangkelas='$idruang'";
                $result3 = $conn->query($sql3);
                if ($result2->num_rows > 0) {
                    while ($row3 = $result3->fetch_assoc()) {
                        $namaruang = $row3["nama_ruang"];
                    }
                }

                $kal.="<option value='$id_kelas'>$namakelas/$hari/$namaruang/$jamawal</option>";
            }
        }else{
            $kal="<option value='-1'>..</option>";
        }

    
    echo $kal;
    $conn->close();
}


if($_POST["jenis"]=="nonaktifkan_klsmhs"){
    $idklsmhs = $_POST['idklsmhs'];
    $ket="";
    $sql = "update kelas_mhs set status_klsmhs='0' where id_klsmhs='$idklsmhs'";
    
    if ($conn->query($sql)) {
        $ket= "Berhasil menonaktifkan mahasiswa ini"; //berhasil
    }else {
        $ket= "Gagal menonaktifkan mahasiswa ini"; //gagal
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
    $id_nilai = $_POST["id_nilai"];
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

    $sqldelnilai = "delete from nilai_mhs where id_nilai='$id_nilai'";
    if ($conn->query($sqldelnilai)) {
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
    $kelassel = $_POST["kelassel"]; //idkelas baru

    $nrp = $_POST["nrp"];
    $ket="";

    $sqlselklslama = "select id_kelas from kelas_mhs where id_klsmhs='$idklsmhs'";
    $result = $conn->query($sqlselklslama);
    while ($row = $result->fetch_assoc()) {
        $idkelas = $row["id_kelas"];

        $sqlup = "update kelas_mhs set id_kelas='$kelassel', id_kelas_sblm='$idkelas' where id_klsmhs='$idklsmhs'";
        if ($conn->query($sqlup)) {
            $ket="berhasil update";
        }else {
            $ket = "gagal update";
        }
    }

    
    echo $ket;
    $conn->close();
}

if ($_POST["jenis"]=="get_kelas_perwalian_manual") {
    $conn=getConn();
    $kal="";
    $periode=$_POST["periode"];
    $level = $_POST["level_manual"];

    $kal.="<option value='-1'>-Pilih kelas- </option>";
    $periode=$_POST["periode"];
    $stmt=$conn->prepare("select * from kelas k, ruang_kelas rk where k.id_periode='$periode' and k.level_ecc='$level' and k.status_kelas='1' and k.id_ruangkelas=rk.id_ruangkelas");
    $stmt->execute();
    $res=$stmt->get_result();
   
    if ($res->num_rows>0) {
        while($row=$res->fetch_assoc()){ 
            $ruang = $row["nama_ruang"];
            $idkelas=$row["id_kelas"];
            $namakelas=$row["nama_kelas"];
            $hari = $row["hari"];
            $jamawal = $row["jam_awal"];
            $jamakhir = $row["jam_akhir"];

            $kal.="<option value='$idkelas' >$namakelas/$hari/$ruang - $jamawal s/d $jamakhir </option>";
        }
    }else{
        $kal.="<option value='-1' >~Tidak level di periode ini~ </option>";
    }
   
    echo $kal;

}

if ($_POST["jenis"]=="addtempmhs") {
    $periode = $_POST["periode"];
    $nrp = $_POST["nrp"];
    $nama = strtolower($_POST["nama"]);
    $idkelas=$_POST["idkelas"];
    $ket="";
    $conn = getConn();

    //insert ke table temp dulu
    $snama = ucwords($nama);

    $selkelas = "select * from kelas k, ruang_kelas rk where k.id_periode='$periode' and k.id_kelas='$idkelas' and k.id_ruangkelas=rk.id_ruangkelas";
    $result = $conn->query($selkelas);
    while ($row = $result->fetch_assoc()) {
        $level = $row["level_ecc"];
        $hari = $row["hari"];
        $jam = $row["jam_awal"];
        $ruang = $row["nama_ruang"];
    }

    $sqlmhs = "INSERT INTO tempkelas_mhs(id_periode,nrp,nama_mhs,level_ecc,hari,jam_mulai,ruang_kode) VALUES ('$periode','$nrp','$snama','$level','$hari','$jam','$ruang')";
    if ($conn->query($sqlmhs)) {
        $ket = "Berhasil menambah mahasiswa perwalian";
    }else {
        $ket = "Gagal insert !";
    }

    echo $ket;
    $conn->close();
}
?>