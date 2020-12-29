<?php
require_once "../config/conn.php";
$conn=getConn();

if ($_POST["jenis"]=="get_allruang") {
    $sql1="select * from ruang_kelas where status_ruang=1 order by nama_ruang asc";
    $result1 = $conn->query($sql1);
    $kal="<option value='-1' disabled >Select Room</option>";
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
    $ruang = strtoupper($_POST["ruang"]);
    $sqlcek = "select * from ruang_kelas where nama_ruang='$ruang'";
    $query = mysqli_query($conn,$sqlcek); // get the data from the db
    $result = array();
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) { // fetches a result row as an associative array
        $result ["nama_ruang"] = $row['nama_ruang'];
        $result ["id_ruangkelas"] = $row['id_ruangkelas'];
    }
    
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($result); // return value of $result
}

if($_POST["jenis"]=="simpan_ruang"){
    $ruang = strtoupper($_POST["ruang"]);
    $status="1";
    $nama="";
    $sql="insert into ruang_kelas (id_ruangkelas,nama_ruang, status_ruang) values (null,'$ruang','$status')";
            if ($conn->query($sql)) {
                echo "Berhasil tambah ruang kelas";
            }else {
                echo "Gagal tambah ruang kelas";
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

if($_POST["jenis"]=="update_namaruanglama"){
    $id_ruangkelas = $_POST["id_ruangkelas"];
    $ruang = $_POST["ruang"];
    
    
    $sql = "update ruang_kelas set nama_ruang='$ruang' where id_ruangkelas='$id_ruangkelas'";
    if ($conn->query($sql)) {
        echo "Berhasil ubah nama ruang";
    }else {
        echo "Gagal mengubah";
    }
    $conn->close();

    
}


if($_POST["jenis"]=="update_namaruangbaru"){
    $id_ruangkelas = $_POST["id_ruangkelas"];
    $ruang = $_POST["ruang"];
    
    
    $sql = "update ruang_kelas set nama_ruang='$ruang' where id_ruangkelas='$id_ruangkelas'";
    if ($conn->query($sql)) {
        echo "Berhasil ubah nama ruang";
    }else {
        echo "Gagal mengubah";
    }
    $conn->close();

    
}

?>