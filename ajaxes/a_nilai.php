<?php
include '../config/conn.php';
require '../PHPExcel/Classes/PHPExcel.php';
require_once '../PHPExcel/Classes/PHPExcel/IOFactory.php';
session_start();

if($_POST["jenis"]=="uts"){
    $conn = getConn();
    $uploadfile = $_FILES['file']['tmp_name'];
    $objExcel = PHPExcel_IOFactory::load($uploadfile);
    
    $turncateres = mysqli_query($conn, $turncateqry);

    //get data from excel
    foreach ($objExcel->getWorksheetIterator() as $worksheet) {
        $highestrow = $worksheet->getHighestRow();

        for ($row = 0; $row <= $highestrow; $row++) {
            if ($row >1) {
                $nrp = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                $nama = ucwords($worksheet->getCellByColumnAndRow(1, $row)->getValue());
                $nilai = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                
                if ($nrp != '') {
                    
                    $insert = "INSERT INTO `nilai`(`id_nilai`, `nrp`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `grade`) VALUES ('0','$nrp','$nilai','','','') ";

                    $insertres = mysqli_query($conn, $insert);
                }
            } else {
                // ini berati headernya di $row=1 
            }
        }
    }
     echo "success";
}else if($_POST["jenis"]=="uas"){
    $conn = getConn();
    $uploadfile = $_FILES['file']['tmp_name'];
    $objExcel = PHPExcel_IOFactory::load($uploadfile);
    
    $turncateres = mysqli_query($conn, $turncateqry);

    //get data from excel
    foreach ($objExcel->getWorksheetIterator() as $worksheet) {
        $highestrow = $worksheet->getHighestRow();

        for ($row = 0; $row <= $highestrow; $row++) {
            if ($row >1) {
                $nrp = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                $nama = ucwords($worksheet->getCellByColumnAndRow(1, $row)->getValue());
                $nilai = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                
                if ($nrp != '') {
                    
                    $insert = "INSERT INTO `nilai`(`id_nilai`, `nrp`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `grade`) VALUES ('0','$nrp','','$nilai','','') ";

                    $insertres = mysqli_query($conn, $insert);
                }
            } else {
                // ini berati headernya di $row=1 
            }
        }
    }
     echo "success";
}
    
?>
