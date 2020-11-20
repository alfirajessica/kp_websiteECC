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
                $nrp = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                $nama = ucwords($worksheet->getCellByColumnAndRow(1, $row)->getValue());
                $nilai = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

                if ($nrp != '') {

                    $sql = "select * from nilai where nrp='$nrp' and id_periode='$periode' and id_kelas='$kelas' ";
                    $res = $conn->query($sql);
                    $rom = $res->fetch_assoc();
                    $idnilai = $rom["id_nilai"];
                    if ($idnilai != "") {
                        $update = "update nilai set nilai_uts='$nilai' where id_nilai='$idnilai' ";
                        $updateres = mysqli_query($conn, $update);
                    } else {
                        $insert = "INSERT INTO `nilai`(`id_nilai`, `nrp`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `grade`, `id_periode`, `id_kelas`) VALUES ('0','$nrp','$nilai','','','','$periode','$kelas') ";
                        $insertres = mysqli_query($conn, $insert);
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

    $periode = $_POST["periode"];
    $kelas = $_POST["kelas"];

    //get data from excel
    foreach ($objExcel->getWorksheetIterator() as $worksheet) {
        $highestrow = $worksheet->getHighestRow();

        for ($row = 0; $row <= $highestrow; $row++) {
            if ($row > 1) {
                $nrp = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                $nama = ucwords($worksheet->getCellByColumnAndRow(1, $row)->getValue());
                $nilai = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

                $sql = "select * from nilai where nrp='$nrp' and id_periode='$periode' and id_kelas='$kelas' ";
                $res = $conn->query($sql);
                $rom = $res->fetch_assoc();
                $idnilai = $rom["id_nilai"];
                
                if ($idnilai!="") {
                    $update = "update nilai set nilai_uas='$nilai' where id_nilai='$idnilai' ";
                    $updateres = mysqli_query($conn, $update);
                }else{
                    $insert = "INSERT INTO `nilai`(`id_nilai`, `nrp`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `grade`, `id_periode`, `id_kelas`) VALUES ('0','$nrp','','$nilai','','','$periode','$kelas') ";
                    $insertres = mysqli_query($conn, $insert);
                }

               
            } else {
                // ini berati headernya di $row=1 
            }
        }
    }
    echo "success";
}
