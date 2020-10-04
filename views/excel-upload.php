<?php
include '../config/conn.php';
require 'PHPExcel/Classes/PHPExcel.php';
require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
session_start();

    $conn = getConn();
    $uploadfile = $_FILES['file']['tmp_name'];
    $objExcel = PHPExcel_IOFactory::load($uploadfile);
    //turncate tokopedia
    $turncateqry = "TRUNCATE temp_mahasiswa";
    $turncateres = mysqli_query($conn, $turncateqry);

    //get data from excel
    foreach ($objExcel->getWorksheetIterator() as $worksheet) {
        $highestrow = $worksheet->getHighestRow();

        for ($row = 0; $row <= $highestrow; $row++) {
            if ($row >1) {
                $nrp = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                $nilai = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                
                if ($nrp != '') {
                    $insertqry = "INSERT INTO `temp_mahasiswa`(`nrp`, `nama_mahasiswa`, `nilai_placement`,`level`) VALUES ('$nrp','$nama','$nilai','0')";
                    $insertres = mysqli_query($conn, $insertqry);
                }
            } else {
                // ini berati headernya di $row=1 
            }
        }
    }
     echo "success";
?>
