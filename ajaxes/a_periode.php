<?php
require_once "../config/conn.php";
$conn=getConn();

if($_POST["jenis"]=="get_allperiode"){
    $conn=getConn();
    $sql1="select * from periode";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $idperiode=$row1["id_periode"];
            $semester=$row1["semester"];
            $thn_akademik=$row1["thn_akademik"];
            
            $kal.="<option value='$idperiode'>$semester - $thn_akademik</option>";
        }
    }else{
        $kal="<option value='-1'>..</option>";
    }
    echo $kal;
    $conn->close();
    
}

?>