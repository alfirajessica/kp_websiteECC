<?php
require_once "../config/conn.php";
$conn=getConn();

if($_POST["jenis"]=="get_detail_mhs"){
    $nrp = $_POST["nrp"];

    $sqlcek = "select * from mahasiswa where nrp='$nrp'";
    $query = mysqli_query($conn,$sqlcek); // get the data from the db
    $result = array();
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) { // fetches a result row as an associative array
        $result ["nama_mhs"] = $row['nama_mhs'];
        $result ["status_mhs"] = $row['status_mhs'];
    }
    
    $conn->close();
    header('Content-Type: application/json');
    echo json_encode($result); // return value of $result
}

?>