<?php
require_once "../config/conn.php";
$conn=getConn();

if($_POST["jenis"]=="cek_dataditable_mahasiswa"){
    $idperiode = $_POST["idperiode"];
    $ket = "";

    $sql1 = "select * from tempkelas_mhs where id_periode='$idperiode'";
    $result = $conn->query($sql1);
    while ($row = $result->fetch_assoc()) {
        $nrp = $row["nrp"];
        $level = $row["level_ecc"];
        $hari = $row["hari"];
        $ruang = $row["ruang_kode"];

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

        $sqlinsert = "INSERT INTO kelas_mhs(id_klsmhs,id_periode,nrp,id_kelas,id_nilai,status_klsmhs) VALUES (null,'$idperiode','$nrp','$idkelas','0','1')";
        if ($conn->query($sqlinsert)) {
            $ket = "Berhasil Aktifkan semua kelas mahasiswa";
        }else {
            $ket = "Gagal Aktifkan!";
        }

        //delete table tempkelas_mhs
        $deltempkls = "delete from tempkelas_mhs where id_periode='$idperiode'";
        if ($conn->query($deltempkls)) {
            $ket = "Berhasil Aktifkan semua kelas mahasiswa";
        }else {
            $ket = "Gagal Aktifkan!";
        }

        

    }
    
    
    echo $ket;
    $conn->close();

}


?>