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
            $thn_akademik_awal=$row1["thn_akademik_awal"];
            $thn_akademik_akhir=$row1["thn_akademik_akhir"];
            $status = $row1["status_periode"];

            if ($status == "1") {
                $kal.="<option value='$idperiode' selected>$semester - $thn_akademik_awal/$thn_akademik_akhir</option>";
            }
            else{
                $kal.="<option value='$idperiode'>$semester - $thn_akademik_awal/$thn_akademik_akhir</option>";
            }
            
        }
    }else{
        $kal="<option value='-1'>..</option>";
    }
    echo $kal;
    $conn->close();
}


//set periode per semester dimulai dari Genap 2021/2022
//diset per 6 bulan 
else if($_POST["jenis"]=="set_periodedb"){
    $val="";
    $month = $_POST["getmonth"]; //index dimulai dari 0-january
    $sql1 = "select * from periode order by id_periode DESC LIMIT 1";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $idperiode=$row1["id_periode"];
            $semester=$row1["semester"];
            $thn_akademik_awal=$row1["thn_akademik_awal"];
            $thn_akademik_akhir=$row1["thn_akademik_akhir"];
            $val = $idperiode;
        }
        if ($month == 5 && $semester == "Genap") //jika bulan sekarang = juni dan semester genap
        {
            $thn_awal = $thn_akademik_awal;
            $thn_akhir = $thn_akademik_akhir;
            $semester = "Gasal";
            $sql2 = "insert into periode (id_periode,semester,thn_akademik_awal,thn_akademik_akhir,status_periode) values (null,'$semester',$thn_awal,$thn_akhir,'1')";

            if ($conn->query($sql2)) {
                echo "berhasil tambah semester gasal";
            }else {
                echo $thn_awal;
            }
        }
        else if ($month == 9 && $semester == "Gasal") //jika bulan sekarang desember dan semester ganjil
        {
            $thn_awal = $thn_akademik_awal+1;
            $thn_akhir = $thn_akademik_akhir+1;
            $semester = "Genap";
            $sql3 = "insert into periode (id_periode,semester,thn_akademik_awal,thn_akademik_akhir,status_periode) values (null,'$semester',$thn_awal,$thn_akhir,'1')";

            if ($conn->query($sql3)) {
                echo "berhasil tambah semester genap";
            }else {
                echo $thn_awal;
            }
        }
        

    }
    updatestatus_periode();
    echo $month;
    $conn->close();
}

function updatestatus_periode(){
    $ket="";
    $conn=getConn();
    $sql1 = "select * from periode order by id_periode DESC LIMIT 1";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $idperiode=$row1["id_periode"];

            $sqlup = "update periode set status_periode='0' where id_periode!='$idperiode'";
            if ($conn->query($sqlup)) {
             $ket = "berhasil";
            }else {
            $ket = "Gagal ";
            }    
        }
    }
    echo $ket;
    
}

?>