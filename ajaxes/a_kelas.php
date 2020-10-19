<?php
require_once "../config/conn.php";
$conn=getConn();

/*if($_POST["jenis"]=="kelas_blmaktif"){
    $idperiode = $_POST["idperiode"];
    $kal="";
    $detailkelas="";
    $sql="select * from kelas where status_kelas='0' and id_periode='$idperiode' order by level_ecc ASC, nama_kelas ASC";
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
            
            if ($dosen != "-") {

                //select dosennya
                $sqldosen = "select * from user where username='$dosen'";
                $resultdosen = $conn->query($sqldosen);
                if ($resultdosen->num_rows > 0) {
                    while ($rowdosen = $resultdosen->fetch_assoc()) {
                        $username = $rowdosen["username"];
                        $namadosen = $rowdosen["nama"];
                        
                        $detailkelas = "Dosen : $namadosen <br> Hari : $hari <br> Jam : $jam <br> Kuota : $kuota ";
                    }
                }

                $btn_aksi1 = "<button onclick='ubah_kelas(".$idkelas.")' type='button' class='btn btn-default btn-sm' data-toggle='modal' data-target='#exampleModal'>Ubah Dosen/Hari/Jam/kuota</button>";
            }
            else if ($dosen == "-") {
                $dosen = "<p class='text-danger'> kosong </p>";
                $hari = "<p class='text-danger'> Belum terisi </p>";
                $jam ="<p class='text-danger'> Belum terisi </p>";
                $kuota = "<p class='text-danger'> 0 </p>";
                $detailkelas = "Dosen : ".$dosen."  Hari : ".$hari." Jam : ".$jam."  Kuota : ".$kuota."";
                
                
                $btn_aksi1 = "<button onclick='atur_kelas(".$idkelas.")' type='button' class='btn btn-default btn-sm' data-toggle='modal' data-target='#exampleModal'>Atur Dosen/Hari/Jam/kuota</button>";
            }
            $btn_aksi2 = "<button onclick='hapus_kelas(".$idkelas.")' type='button' class='btn btn-danger btn-sm' >Hapus</button>";

            $status = "Belum Aktif";
            $table = "<tr><td style='display:none'>".$idkelas."</td><td>".$level." - ".$namakelas."</td> <td> ".$detailkelas." </td> <td> ".$status." </td> <td> ".$btn_aksi1." ".$btn_aksi2."</td> </tr>";

            $kal.=$table;
        }
    }
    echo $kal;
    $conn->close();
}*/
if($_POST["jenis"]=="get_nama_dosen"){
    $username = $_POST["username"];
    $nama="";
    $sqldosen = "select * from user where username='$username'";
    $resultdosen = $conn->query($sqldosen);
    if ($resultdosen->num_rows > 0) {
        while ($rowdosen = $resultdosen->fetch_assoc()) {
           // $username = $rowdosen["username"];
            $namadosen = $rowdosen["nama"];
            
            //$detailkelas = "Dosen : $namadosen <br> Hari : $hari <br> Jam : $jam <br> Kuota : $kuota ";
        }
        $nama = $namadosen;
    }
    echo $nama;
    $conn->close();
}


if($_POST["jenis"]=="cek_kelas"){
    $idperiode = $_POST["idperiode"];
    $level = $_POST["level"];
    $kal="";
    $sql="select * from kelas where id_periode='$idperiode' and level_ecc='$level'";
    $result1 = $conn->query($sql);
    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $idperiode=$row1["id_periode"];
            $idkelas = $row1["id_kelas"];
            $level = $row1["level_ecc"];
            $namakelas = $row1["nama_kelas"];
        }
        if ($namakelas != " ") {
            $kal=$namakelas;
        }
        else if ($namakelas == " ") {
            $kal = "";
        }
        
    }
    echo $kal;
    $conn->close();


}

if($_POST["jenis"]=="insert_kelasdb"){

    // id periode, id_kelas, level ecc, nama kelas, hari, jam, kuota, dosen, status kelas
    $idperiode = $_POST["idperiode"];
    $level = $_POST["level"];
    $namakelas = $_POST["namakls"];
    $hari = $_POST["hari"];
    $jam = "06:30";
    $statuskelas = 0;

    $sql = "insert into kelas(id_periode,id_kelas,level_ecc,nama_kelas,hari,jam,kuota,dosen,status_kelas) values ($idperiode,null,'$level','$namakelas','$hari','$jam',0,null,'$statuskelas')";
    if ($conn->query($sql)) {
        echo "berhasil tambah kelas";
    }else {
        echo "gagal";
    }
    $conn->close();
}

if($_POST["jenis"]=="hapus_kelas"){
    $idkelas=$_POST["idkelas"];
    $sql = "delete from kelas where id_kelas='$idkelas'";
    if ($conn->query($sql)) {
        echo "berhasil hapus";
    }else {
        echo "gagal";
    }
    $conn->close();
}

if($_POST["jenis"]=="get_detail_aturkelas"){
    $idkelas=$_POST["idkelas"];
    $kal="";
    $sql = "select * from kelas where id_kelas='$idkelas'";
    $result1 = $conn->query($sql);
    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $idperiode=$row1["id_periode"];
            $level = $row1["level_ecc"];
            $namakelas = $row1["nama_kelas"];
        }
        $kal=$level." - ".$namakelas;
    }
    echo $kal;
    $conn->close();
}

if($_POST["jenis"]=="get_detail_ubahkelas"){
    $idkelas=$_POST["idkelas"];
    $kal="";
    $sql = "select * from kelas where id_kelas='$idkelas'";
    $query = mysqli_query($conn,$sql); // get the data from the db
    $result = array();
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) { // fetches a result row as an associative array

        $result ["level_ecc"] = $row['level_ecc'];
        $result ["nama_kelas"] = $row['nama_kelas'];
        $result ["dosen"] = $row['dosen'];
        $result ["hari"] = $row['hari'];
        $result ["jam"] = $row['jam'];
        $result ["kuota"] = $row['kuota'];
        
    }
    
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($result); // return value of $result
    
  //  $conn->close();
}



if($_POST["jenis"]=="update_kelas"){

    // id periode, id_kelas, level ecc, nama kelas, hari, jam, kuota, dosen, status kelas
    $idkelas = $_POST["idkelas"];
    $dosen = $_POST["dosen"];
    $hari = $_POST["hari"];
    $jamawal = $_POST["jam_awal"];
    $jamakhir = $_POST["jam_akhir"];
    $kuota = $_POST["kuota"];

    $sql = "update kelas set hari='$hari', jam='$jamawal', kuota='$kuota', dosen='$dosen' where id_kelas='$idkelas'";
    
    if ($conn->query($sql)) {
        echo "berhasil ubah kelas";
    }else {
        echo "gagal";
    }
    $conn->close();
}
?>