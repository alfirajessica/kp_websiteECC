<?php
include '../config/conn.php';
require '../PHPExcel/Classes/PHPExcel.php';
require_once '../PHPExcel/Classes/PHPExcel/IOFactory.php';
session_start();

if ($_POST["jenis"] == "uts") {
    $conn = getConn();
    $uploadfile = $_FILES['file']['tmp_name'];
    $periode = $_POST["periode"];
    $kelas = $_POST["kelas"];
    $objExcel = PHPExcel_IOFactory::load($uploadfile);

    //get data from excel
    foreach ($objExcel->getWorksheetIterator() as $worksheet) {
        $highestrow = $worksheet->getHighestRow();

        for ($row = 0; $row <= $highestrow; $row++) {
            if ($row > 1) {
                $idnilai = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                $nrp = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                $nama = ucwords($worksheet->getCellByColumnAndRow(2, $row)->getValue());
                $nilaiuts = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                $nilaiuas = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                $nilaiakhir = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                $grade = $worksheet->getCellByColumnAndRow(6, $row)->getValue();

                if ($nrp != '') {

                    $sql = "select * from nilai where nrp='$nrp' and id_periode='$periode' and id_kelas='$kelas' ";
                    $res = $conn->query($sql);
                    $rom = $res->fetch_assoc();
                    $idnilai = $rom["id_nilai"];
                    if ($idnilai != "") {
                        $update = "update nilai set nilai_uts='$nilaiuts', nilai_uas='$nilaiuas', nilai_akhir='$nilaiakhir', grade='$grade' where id_nilai='$idnilai' ";
                        $updateres = mysqli_query($conn, $update);
                    } 
                }
            } else {
                // ini berati headernya di $row=1 
            }
        }
    }
    echo "success-hasil:$idnilai";
} 
// else if ($_POST["jenis"] == "uas") {
//     $conn = getConn();
//     $uploadfile = $_FILES['file']['tmp_name'];
//     $objExcel = PHPExcel_IOFactory::load($uploadfile);

//     //get data from excel
//     foreach ($objExcel->getWorksheetIterator() as $worksheet) {
//         $highestrow = $worksheet->getHighestRow();

//         for ($row = 0; $row <= $highestrow; $row++) {
//             if ($row > 1) {
//                 $idnilai = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
//                 $nrp = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
//                 $nama = ucwords($worksheet->getCellByColumnAndRow(2, $row)->getValue());
//                 $nilai = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                
//                 echo "$nilai";
//                 if ($idnilai!="") {
//                     $update = "update nilai set nilai_uas='$nilai' where id_nilai='$idnilai' ";
//                     $updateres = mysqli_query($conn, $update);
//                 }

//             } else {
//                 // ini berati headernya di $row=1 
//             }
//         }
//     }
   
// }
else if ($_POST["jenis"]=="update") {
  $idnilai=$_POST["idnilai"];
  $uas=$_POST["uas"];
  $uts=$_POST["uts"];
  $na=$_POST["na"];
  $grade=$_POST["grade"];

  $conn=getConn();
$cumgrade="";
if ($na<=44) {
    $cumgrade="E";
}else if ($na<=55) {
    $cumgrade="D";
}else if ($na<=62) {
    $cumgrade="C";
}else if ($na<=69) {
    $cumgrade="C+";
}else if ($na<=74) {
    $cumgrade="B";
}else if ($na<=79) {
    $cumgrade="B+";
}else {
    $cumgrade="A";
}

  $grade=$cumgrade;

  $update = "update nilai set nilai_uas='$uas',nilai_uts='$uts',nilai_akhir='$na',grade='$cumgrade' where id_nilai='$idnilai' ";
  $updateres = mysqli_query($conn, $update);

  echo $updateres;

}

//get level in admin
if ($_POST["jenis"]=="getadminlevel") {
    $conn=getConn();
    $kal="";
    $kal.="<option value='-1'>-Pilih Level- </option>";
    $periode=$_POST["periode"];
    $stmt=$conn->prepare("select * from kelas where id_periode='$periode' group by level_ecc");
    $stmt->execute();
    $res=$stmt->get_result();
   
    if ($res->num_rows>0) {
        
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
            $kal.="<option value='$idkelas' >ECC $level - Kelas $namakelas </option>";
        }
    }else{
        $kal.="<option value='-1' >~ Tidak ada kelas di periode ini ~</option>";
    }
   
    echo $kal;
}
