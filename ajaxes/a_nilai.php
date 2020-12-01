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
                $nilai = $worksheet->getCellByColumnAndRow(3, $row)->getValue();

                if ($nrp != '') {

                    $sql = "select * from nilai where nrp='$nrp' and id_periode='$periode' and id_kelas='$kelas' ";
                    $res = $conn->query($sql);
                    $rom = $res->fetch_assoc();
                    $idnilai = $rom["id_nilai"];
                    if ($idnilai != "") {
                        $update = "update nilai set nilai_uts='$nilai' where id_nilai='$idnilai' ";
                        $updateres = mysqli_query($conn, $update);
                    } 
                }
            } else {
                // ini berati headernya di $row=1 
            }
        }
    }
    echo "success-hasil:$idnilai";
} else if ($_POST["jenis"] == "uas") {
    $conn = getConn();
    $uploadfile = $_FILES['file']['tmp_name'];
    $objExcel = PHPExcel_IOFactory::load($uploadfile);

    //get data from excel
    foreach ($objExcel->getWorksheetIterator() as $worksheet) {
        $highestrow = $worksheet->getHighestRow();

        for ($row = 0; $row <= $highestrow; $row++) {
            if ($row > 1) {
                $idnilai = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                $nrp = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                $nama = ucwords($worksheet->getCellByColumnAndRow(2, $row)->getValue());
                $nilai = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                
                echo "$nilai";
                if ($idnilai!="") {
                    $update = "update nilai set nilai_uas='$nilai' where id_nilai='$idnilai' ";
                    $updateres = mysqli_query($conn, $update);
                }

            } else {
                // ini berati headernya di $row=1 
            }
        }
    }
   
}else if ($_POST["jenis"]=="update") {
  $idnilai=$_POST["idnilai"];
  $uas=$_POST["uas"];
  $uts=$_POST["uts"];
  $na=$_POST["na"];
  $grade=$_POST["grade"];

  $conn=getConn();

  $update = "update nilai set nilai_uas='$uas',nilai_uts='$uts',nilai_akhir='$na',grade='$grade' where id_nilai='$idnilai' ";
  $updateres = mysqli_query($conn, $update);

  echo $updateres;

}
