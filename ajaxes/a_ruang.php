<?php
require_once "../config/conn.php";
$conn=getConn();

if ($_POST["jenis"]=="get_allruang") {
    $sql1="select * from ruang_kelas where status_ruang=1 order by nama_ruang asc";
    $result1 = $conn->query($sql1);
    $kal="<option value='-1' >pilih ruang</option>";
    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $idruang=$row1["id_ruangkelas"];
            $namaruang=$row1["nama_ruang"];
            $kal.="<option value='$idruang'>$namaruang</option>";
        }
    }else{
        $kal="<option value='-1'>..</option>";
    }
    echo $kal;
    $conn->close();
}

if($_POST["jenis"]=="cek_ruang"){
    $namaruang = strtoupper($_POST["namaruang"]);
    $sqlcek = "select * from ruang_kelas where nama_ruang='$namaruang'";
    $query = mysqli_query($conn,$sqlcek); // get the data from the db
    $result = array();
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) { // fetches a result row as an associative array

        $result ["nama_ruang"] = $row['nama_ruang'];
        
    }
    
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($result); // return value of $result
}

if($_POST["jenis"]=="simpan_ruang"){
    $namaruang = strtoupper($_POST["namaruang"]);
    $status="1";
    $nama="";
    $sql="insert into ruang_kelas (id_ruangkelas,nama_ruang, status_ruang) values (null,'$namaruang','$status')";
            if ($conn->query($sql)) {
                echo "berhasil tambah kelas";
            }else {
                echo "gagal";
            }
    $conn->close();
}


if($_POST["jenis"]=="get_detail_ruang"){
    $id_ruangkelas = $_POST["id_ruangkelas"];
    $sqlcek = "select * from ruang_kelas where id_ruangkelas='$id_ruangkelas'";
    $query = mysqli_query($conn,$sqlcek); // get the data from the db
    $result = array();
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) { // fetches a result row as an associative array

        $result ["id_ruangkelas"] = $row['id_ruangkelas'];
        $result ["nama_ruang"] = $row['nama_ruang'];
        $result ["status_ruang"] = $row['status_ruang'];
        
    }
    
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($result); // return value of $result
}

if($_POST["jenis"]=="update_ruang"){
    $id_ruangkelas = $_POST["id_ruangkelas"];
    $namaruang = $_POST["namaruang"];
    $statusruang=$_POST["statusruang"];
    
    $sql = "update ruang_kelas set nama_ruang='$namaruang', status_ruang='$statusruang' where id_ruangkelas='$id_ruangkelas'";
    if ($conn->query($sql)) {
        echo "berhasil ubah ruangan";
    }else {
        echo "gagal";
    }
    $conn->close();

    
}



?>