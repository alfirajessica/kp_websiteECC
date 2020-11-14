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
                $nama = ucwords($worksheet->getCellByColumnAndRow(1, $row)->getValue());
                $nilai = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                $level = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                
                if ($nrp != '') {
                    //$insertqry = "INSERT INTO `temp_mahasiswa`(`nrp`, `nama_mahasiswa`, `nilai_placement`,`level`) VALUES ('$nrp','$nama','$nilai','-')";

                    $insertqry = "INSERT INTO mahasiswa(id_periode,nrp,nama_mhs,nilai_placement,placement_level,now_level,status_mhs) VALUES ('$periode','$nrp','$nama','$nilai','$level','0','0')";
                    $insertres = mysqli_query($conn, $insertqry);

                    // $updateqry = "update mahasiswa set nama_mhs='$nama', nilai_placement='$nilai', placement_level='0' where nrp='$nrp' ";
                    // $updateres = mysqli_query($conn, $updateqry);
                }
            } else {
                // ini berati headernya di $row=1 
            }
        }
    }
     echo "success";
?>
