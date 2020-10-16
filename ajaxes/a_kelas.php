<?php
require_once "../config/conn.php";
$conn=getConn();

if($_POST["jenis"]=="kelas_blmaktif"){
    $idperiode = $_POST["idperiode"];
    $kal="";
    $sql="select * from kelas where status_kelas='0'";
    $result1 = $conn->query($sql);
    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $idperiode=$row1["id_periode"];
            $idkelas = $row1["id_kelas"];
            $level = $row1["level_ecc"];
            $namakelas = $row1["nama_kelas"];
            $hari = $row1["hari"];
            $jam = $row1["jam"];
            $kuota = $row1["kuota"];
            $dosen = $row1["dosen"];
            $status = $row1["status_kelas"];
            
            $detailkelas = "Dosen : $dosen <br> Hari : $hari <br> Jam : $jam <br> Kuota : $kuota ";
            
            if ($dosen != "-") {
                $btn_aksi1 = "<button type='button' class='btn btn-default btn-sm' data-toggle='modal' data-target='#exampleModal'>Ubah Dosen/Hari/Jam/kuota</button>";
            }
            else if ($dosen == "-") {
                $btn_aksi1 = "<button type='button' class='btn btn-default btn-sm' data-toggle='modal' data-target='#exampleModal'>Atur Dosen/Hari/Jam/kuota</button>";
            }
            $btn_aksi2 = "<button type='button' class='btn btn-danger btn-sm' >Hapus</button>";

            $status = "Belum Aktif";
            $table = "<tr><td>".$level." - ".$namakelas."</td> <td> ".$detailkelas." </td> <td> ".$status." </td> <td> ".$btn_aksi1." ".$btn_aksi2."</td> </tr>";

            $kal.=$table;
        }
    }else{
        $kal="...";
    }
    echo $kal;
    $conn->close();
}

if($_POST["jenis"]=="insert_kelasdb"){

    // id periode, id_kelas, level ecc, nama kelas, hari, jam, kuota, dosen, status kelas
    $idperiode = $_POST["idperiode"];
    $level = $_POST["level"];
    $namakelas = $_POST["namakls"];
    $statuskelas = 0;

    $sql = "insert into kelas(id_periode,id_kelas,level_ecc,nama_kelas,hari,jam,kuota,dosen,status_kelas) values ($idperiode,null,'$level','$namakelas','-','-',0,'-','$statuskelas')";
    if ($conn->query($sql)) {
        echo "berhasil tambah kelas";
    }else {
        echo "gagal";
    }

}

if($_POST["jenis"]=="update_kelas"){

    // id periode, id_kelas, level ecc, nama kelas, hari, jam, kuota, dosen, status kelas
    $dosen = $_POST["dosen"];
    $hari = $_POST["hari"];
    $jamawal = $_POST["jam_awal"];
    $jamakhir = $_POST["jam_akhir"];
    $kuota = $_POST["kuota"];

    $sql = "insert into kelas(id_periode,id_kelas,level_ecc,nama_kelas,hari,jam,kuota,dosen,status_kelas) values ($idperiode,null,'$level','$namakelas','-','-',0,'-','$statuskelas')";
    if ($conn->query($sql)) {
        echo "berhasil tambah kelas";
    }else {
        echo "gagal";
    }

}
?>