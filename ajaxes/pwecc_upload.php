<?php
include '../config/conn.php';
require '../PHPExcel/Classes/PHPExcel.php';
require_once '../PHPExcel/Classes/PHPExcel/IOFactory.php';
session_start();

    $conn = getConn();
    $ket="";
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
                $level = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                $hari = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                $jam_mulai = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                $ruang = strtolower($worksheet->getCellByColumnAndRow(5, $row)->getValue());

                $snama = ucwords($nama);
                $sruang = ucwords($ruang);

                if ($nrp != '') {

                    $insertqry = "INSERT INTO tempkelas_mhs(id_periode,nrp,nama_mhs,level_ecc,hari,jam_mulai,ruang_kode) VALUES ('$periode','$nrp','$snama','$level','$hari','$jam_mulai','$sruang')";
                    $insertres = mysqli_query($conn, $insertqry);

                    $insertqry2 = "INSERT INTO mahasiswa(id_periode,nrp,nama_mhs,nilai_placement,placement_level,now_level,status_mhs) VALUES ('1','$nrp','$snama','0','0','0','1')";
                    $insertres2 = mysqli_query($conn, $insertqry2);


                }
            } else {
                echo "gagal import";
                // ini berati headernya di $row=1 
            }
        }
    }
     echo "success";
?>
