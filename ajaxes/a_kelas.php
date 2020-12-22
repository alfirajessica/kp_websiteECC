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
    $sql="select * from kelas where id_periode='$idperiode' and level_ecc='$level' order by nama_kelas asc";
    $query = mysqli_query($conn,$sql); // get the data from the db
    $result = array();
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) { // fetches a result row as an associative array

        $result ["level_ecc"] = $row['level_ecc'];
        $result ["nama_kelas"] = $row['nama_kelas'];
        $result ["hari"] = $row['hari'];
        
    }
    
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($result); // return value of $result

    
}

if($_POST["jenis"]=="insert_kelasdb"){

    // id periode, id_kelas, level ecc, nama kelas, hari, jam, kuota, dosen, status kelas
    $idperiode = $_POST["idperiode"];
    $level = $_POST["level"];
    $bykkelas = $_POST["bykkelas"];
    $namakelas = $_POST["namakelas"];
    
    $ket="";
    $jam_awal = "06:30";
    $jam_akhir = "08:00";
    $statuskelas = 0;

    $chars = ['A','B','C','D','E','F','G','H','I','J'];

    for ($i=0; $i < $bykkelas ; $i++) { 
        if ($namakelas == "") 
        {
            $kar = $chars[$i];
        }

        else if ($namakelas != null) 
        {
            $indexkar = array_search("$namakelas",$chars);
            $kar = $chars[$indexkar+$i+1];
        }

        $sql = "insert into kelas(id_periode,id_kelas,level_ecc,nama_kelas,hari,jam_awal,jam_akhir,kuota,dosen,status_kelas,id_ruangkelas) values ($idperiode,null,'$level','$kar','','$jam_awal','$jam_akhir',0,'-','$statuskelas',0)";
        if ($conn->query($sql)) {
            $ket = "Berhasil mengenerate kelas ".$level."";
        }else {
            $ket = "Gagal mengenerate kelas ".$level."";
        }


    }

    echo $ket;
    $conn->close();

    
}

if($_POST["jenis"]=="hapus_kelas"){
    $idkelas=$_POST["idkelas"];
    $ket="";

    //delete kelas dengan idkelas tsb
    $sql = "delete from kelas where id_kelas='$idkelas'";
    if ($conn->query($sql)) {
        $ket= "Berhasil hapus kelas ini";
    }else {
        $ket= "Gagal hapus kelas ini";
    }

    echo $ket;
    $conn->close();
    
}

if($_POST["jenis"]=="upd_kelas2"){
    $idperiode = $_POST["idperiode"];
    $level = $_POST["level"];
    $ket="";
    $chars = ['A','B','C','D','E','F','G','H','I','J'];
    
    $query = "select id_kelas from kelas where id_periode='$idperiode' and level_ecc='$level'";
    if ($result = mysqli_query($conn, $query)) {
        //simpan semua id kelas pada $set
        for ($set = array (); $row = $result->fetch_assoc(); $set[] = $row['id_kelas']);
        //print_r($set);

        //update nama kelas -- generate ulang 
        for ($i=0; $i <count($set) ; $i++) { 
        
            $kar = $chars[$i];
            $sql = "update kelas set nama_kelas='$kar' where id_periode='$idperiode' and level_ecc='$level' and id_kelas=$set[$i]";
            if ($conn->query($sql)) {
                $ket = "berhasil ubah semua kelas";
            }else {
                $ket = "gagal ubah semua kelas";
            }
        }
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
    $sql="select * from kelas where id_kelas='$idkelas'";
    $query = mysqli_query($conn,$sql); // get the data from the db
    $result = array();
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) { // fetches a result row as an associative array

        $result ["level_ecc"] = $row['level_ecc'];
        $result ["nama_kelas"] = $row['nama_kelas'];
        $result ["hari"] = $row['hari'];
        $result ["jam_awal"] = $row['jam_awal'];
        $result ["jam_akhir"] = $row['jam_akhir'];
        $result ["kuota"] = $row['kuota'];
        $result ["dosen"] = $row['dosen'];
        $result ["id_ruangkelas"] = $row['id_ruangkelas'];
    }
    
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($result); // return value of $result

}



if($_POST["jenis"]=="update_kelas"){

    // id periode, id_kelas, level ecc, nama kelas, hari, jam, kuota, dosen, status kelas
    $idkelas = $_POST["idkelas"];
    $dosen = $_POST["dosen"];
    $hari = $_POST["hari"];
    $ruang = $_POST["ruang"];
    $jamawal = $_POST["jam_awal"];
    $jamakhir = $_POST["jam_akhir"];
    $kuota = $_POST["kuota"];
    $ket="";

    $sql = "update kelas set hari='$hari', jam_awal='$jamawal', jam_akhir='$jamakhir', kuota='$kuota', dosen='$dosen', id_ruangkelas='$ruang' where id_kelas='$idkelas'";
    
    if ($conn->query($sql)) {
        $ket= "1"; //berhasil
    }else {
        $ket= "0"; //gagal
    }

    echo $ket;
    $conn->close();
}

if($_POST["jenis"]=="cek_dataterisi"){
    
    $idperiode = $_POST["idperiode"];

    //cek dulu apakah semua kelas sudah terisi datanya
    $sqlcek = "select * from kelas where id_periode='$idperiode' and hari='' or kuota='0' or dosen='-' or id_ruangkelas='0'";
    $query = mysqli_query($conn,$sqlcek); // get the data from the db
    $result = array();
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) { // fetches a result row as an associative array

        $result ["id_kelas"] = $row['id_kelas'];
        $result ["nama_kelas"] = $row['nama_kelas'];
        $result ["hari"] = $row['hari'];
        $result ["jam_awal"] = $row['jam_awal'];
        $result ["jam_akhir"] = $row['jam_akhir'];
        $result ["kuota"] = $row['kuota'];
        $result ["dosen"] = $row['dosen'];
        $result ["id_ruangkelas"] = $row['id_ruangkelas'];
    }
    
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($result); // return value of $result

}
if($_POST["jenis"]=="aktifkan_allkelas"){
    $idperiode = $_POST["idperiode"];
    $ket="";
    $sql = "update kelas set status_kelas='1' where id_periode='$idperiode'";
    
    if ($conn->query($sql)) {
        $ket = "Berhasil mengaktifkan semua kelas"; //berhasil
    }else {
        $ket = "Gagal mengaktifkan semua kelas! Pastikan data semua kelas terisi"; //gagal
    }
    echo $ket;
    $conn->close();
}

if($_POST["jenis"]=="nonaktifkan_kls"){
    $idkelas = $_POST["idkelas"];
    $ket="";
    $sql = "update kelas set status_kelas='0' where id_kelas='$idkelas'";
    
    if ($conn->query($sql)) {
        $ket= "Berhasil menonaktifkan kelas ini"; //berhasil
    }else {
        $ket= "Gagagl menonaktifkan kelas ini"; //gagal
    }
    echo $ket;
    $conn->close();
}

if($_POST["jenis"]=="get_kelas"){
    $kal="";
    $conn=getConn();
    $idperiode=$_POST["idperiode"];
    $stmt=$conn->prepare("select * from kelas where  id_periode='$idperiode' and status_kelas='1'");
    $stmt->execute();
    $res=$stmt->get_result();
    if ($res->num_rows>0) {
        while($row=$res->fetch_assoc()){
            $level=$row["level_ecc"];
            $idkelas=$row["id_kelas"];
            $namakelas=$row["nama_kelas"];
            $kal.="<option value='$idkelas' >"."ECC $level - Kelas $namakelas </option>";
        }
    }else{
        $kal.="<option value='-1' >~ Tidak ada kelas di periode ini~</option>";
    }
   
    echo $kal;
}

if($_POST["jenis"]=="get_level_placement"){
    $conn=getConn();
    $kal="";
    
    $kal.="<option value='all' >Semua</option>";
    for ($i=1; $i < 5; $i++) { 
        $kal.="<option value='$i' >ECC Level $i </option>";
    }
    
    echo $kal;
}

if($_POST["jenis"]=="get_level_perwalian"){
    $conn=getConn();
    $kal="";
    
    for ($i=1; $i < 5; $i++) { 
        $kal.="<option value='$i' >ECC Level $i </option>";
    }
    
    echo $kal;
}



if ($_POST["jenis"]=="getadminlevel") {
    $conn=getConn();
    $kal="";
    $kal.="<option value='-1'>-Pilih Level- </option>";
    $periode=$_POST["periode"];
    $stmt=$conn->prepare("select * from kelas where id_periode='$periode' group by level_ecc");
    $stmt->execute();
    $res=$stmt->get_result();
   
    if ($res->num_rows>0) {
        $kal.="<option value='all' >All</option>";
        while($row=$res->fetch_assoc()){ 
            $level=$row["level_ecc"];
            $idkelas=$row["id_kelas"];
            $namakelas=$row["nama_kelas"];
            $kal.="<option value='$level' >ECC $level </option>";
        }
    }else{
        $kal.="<option value='-1' >~Tidak level di periode ini~ </option>";
    }
   
    echo $kal;
}else if($_POST["jenis"]=="getadminkelas"){
    $conn=getConn();
    $kal="";
    $periode=$_POST["periode"];
    $level=$_POST["level"];
    $stmt=$conn->prepare("select * from kelas where id_periode='$periode' and level_ecc='$level' ");
    $stmt->execute();
    $res=$stmt->get_result();
  
    if ($res->num_rows>0) {
        $kal.="<option value='all' >Semua</option>";
        while($row=$res->fetch_assoc()){
            $level=$row["level_ecc"];
            $idkelas=$row["id_kelas"];
            $namakelas=$row["nama_kelas"];
            $kal.="<option value='$idkelas' >Kelas $namakelas </option>";
        }
    }else{
        $kal.="<option value='-1' >~ Tidak ada kelas di periode ini ~</option>";
    }
   
    echo $kal;
}


?>