<?php
include '../config/conn.php';
require '../PHPExcel/Classes/PHPExcel.php';
require_once '../PHPExcel/Classes/PHPExcel/IOFactory.php';
session_start();

    $conn = getConn();
    $periode = $_POST["idperiode"];
    $uploadfile = $_FILES['file']['tmp_name'];
    $objExcel = PHPExcel_IOFactory::load($uploadfile);
    //turncate tokopedia
    //$turncateqry = "TRUNCATE temp_mahasiswa";
    $turncateres = mysqli_query($conn, $turncateqry);

    //get data from excel
    foreach ($objExcel->getWorksheetIterator() as $worksheet) {
        $highestrow = $worksheet->getHighestRow();

        for ($row = 0; $row <= $highestrow; $row++) {
            if ($row >1) {
                $nrp = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                $nama = strtolower($worksheet->getCellByColumnAndRow(1, $row)->getValue());
                $nilai = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                $level = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                
                $snama = ucwords($nama);
                if ($nrp != '') {
                     $insertmhs = "INSERT INTO mahasiswa(id_periode,nrp,nama_mhs,status_mhs) VALUES ('$periode','$nrp','$snama','0')";
                     $insertres = mysqli_query($conn, $insertmhs);

                     $insertpt = "INSERT INTO placement(id_ptest,id_periode,nrp,nilai_ptest,ptest_level,status_kembar) VALUES (null,'$periode','$nrp','$nilai','$level','0')";
                     $insertres = mysqli_query($conn, $insertpt);

                    // $insertpt = "INSERT INTO temp_placement(id_periode,nrp,nama_mhs,nilai_ptest,ptest_level) VALUES ('$periode','$nrp','$nama','$nilai','$level')";
                    // $insertres = mysqli_query($conn, $insertpt);
                    
                }
            } else {
                // ini berati headernya di $row=1 
            }
        }
    }
     echo "success";
?>
