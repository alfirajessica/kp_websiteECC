<?php
session_start();
include '../config/conn.php';
if ($_POST["jenis"] == "setstandard") {
    $conn = getConn();

    $lev1 = intval($_POST["lev1"]);
    $lev2 = intval($_POST["lev2"]);
    $lev3 = intval($_POST["lev3"]);
    $lev4 = intval($_POST["lev4"]);

    $turncateqry = "TRUNCATE temp_nilaiplacement";
    $turnres = mysqli_query($conn, $turncateqry);
    $insertqry = "INSERT INTO `temp_nilaiplacement`(`level1`,`level2`,`level3`,`level4`) VALUES ('$lev1','$lev2','$lev3','$lev4')";
    $insertres = mysqli_query($conn, $insertqry);

    $sql = "select * from temp_mahasiswa";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $nilai = intval($row["nilai_placement"]);
        $nrp = intval($row["nrp"]);

        $placement = "0";
        if ($nilai <= $lev1) {
            $placement = "1";
        } else if ($nilai <= $lev2) {
            $placement = "2";
        } else if ($nilai <= $lev3) {
            $placement = "3";
        } else {
            $placement = "4";
        }

        $sql1 = "update temp_mahasiswa set level='$placement' where nrp='$nrp'";
        $result1 = $conn->query($sql1);
    }





} else if ($_POST["jenis"] == "getdata") {
   $kal="";
   $conn=getConn();
    $sql = "select * from temp_mahasiswa";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $nrp = $row["nrp"];
        $nama = $row["nama_mahasiswa"];
        $nilai = $row["nilai_placement"];
        $level = $row["level"];
        $kal.= " <tr>
        <td>$nrp</td>
        <td>$nama</td>
        <td>$nilai</td>
        <td>$level</td>
        <td>
            <button class='btn btn-icon btn-primary btn-sm' type='button' data-toggle='modal' onclick=\"editnilai('$nrp')\" data-target='#exampleModal'>
                <span class='btn-inner--icon'><i class='ni ni-fat-add'></i></span>
                <span class='btn-inner--text'>Input nilai</span>
            </button>
        </td>
    </tr>";
    }
    echo $kal;

}else if ($_POST["jenis"]=="selectednrp") {
    $nrp=$_POST["id"];
    $conn=getConn();
    $sql = "select * from temp_mahasiswa where nrp='$nrp'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $nrp = $row["nrp"];
        $nama = $row["nama_mahasiswa"];
        $nilai = $row["nilai_placement"];
        $level = $row["level"];
        $arr=array(
            "nama"=>$nama,
            "nilaiplacement"=>$nilai
        );
        
    }
    echo json_encode($arr);
}else if($_POST["jenis"]=="update"){
    $nrp=$_POST["id"];
    $nilai=$_POST["nilai"];
    $conn=getConn();

    $sql0 = "update temp_mahasiswa set nilai_placement='$nilai' where nrp='$nrp'";
    $result0 = $conn->query($sql0);
    if ($result0) {
        echo "Berhasil update !";
    }
    updatelevel();
}else if ($_POST["jenis"]=="insertmhs") {
    $periode=$_POST["periode"];
    $conn=getConn();
    $sql = "select * from temp_mahasiswa";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $nrp = $row["nrp"];
        $nama = $row["nama_mahasiswa"];
        $level = $row["level"];
        $nilai = $row["nilai_placement"];
        $status = "1";
        if ($level=="1") {
            $level="I";
        }else if ($level=="2") {
            $level="II";
        }else if ($level=="3") {
            $level="III";
        }else if ($level=="4") {
            $level="IV";
        }
        $sql1 = "INSERT INTO `mahasiswa`(`nrp`, `nama_mhs`, `current_level`, `nilai_placement`, `status_mhs`, `id_periode`) VALUES ('$nrp','$nama','$level','$nilai','$status','$periode')";
        $result1 = $conn->query($sql1);
    }
    $turncateqry = "TRUNCATE temp_mahasiswa";
    $turnres = mysqli_query($conn, $turncateqry);
    echo "Berhasil";
}else if ($_POST["jenis"]=="getperiode") {
    $kal="";
    $periode=$_POST["periode"];
    $conn=getConn();
    $sql = "select * from periode";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $idperiode = $row["id_periode"];
        $sem = $row["semester"];
        $awal = $row["thn_akademik_awal"];
        $akhir = $row["thn_akademik_akhir"];
        $kal.="<option value='$idperiode'>$sem $awal-$akhir</option>";
    }
    echo $kal;
}

function updatelevel(){
    $conn=getConn();
    $sqla = "select * from temp_nilaiplacement";
    $resulta = $conn->query($sqla);
    while ($rowa = $resulta->fetch_assoc()) {
        $lev1 = intval($rowa["level1"]);
        $lev2 = intval($rowa["level2"]);
        $lev3 = intval($rowa["level3"]);
        $lev4 = intval($rowa["level4"]);
    }
    if (!$resulta) {
        echo "nilai gagal";
    }

     $sql = "select * from temp_mahasiswa";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $nilai = intval($row["nilai_placement"]);
        $nrp = intval($row["nrp"]);

        $placement = "0";
        if ($nilai <= $lev1) {
            $placement = "1";
        } else if ($nilai <= $lev2) {
            $placement = "2";
        } else if ($nilai <= $lev3) {
            $placement = "3";
        } else {
            $placement = "4";
        }

        $sql1 = "update temp_mahasiswa set level='$placement' where nrp='$nrp'";
        $result1 = $conn->query($sql1);
    }

    if (!$result1) {
        echo "update level gagal";
    }
}

