<?php
require_once "../config/conn.php";
$conn=getConn();

if($_POST["jenis"]=="cek_dataditable_mahasiswa"){
    $idperiode = $_POST["idperiode"];
    $ket = "";
    
    //$sql = 
    $sql1 = "select * from tempkelas_mhs where id_periode='$idperiode'";
    if ($result = mysqli_query($conn, $sql1)) {
        //simpan semua id kelas pada $set
        for ($setnrp = array (); $row = $result->fetch_assoc(); $setnrp[] = $row['nrp']);
        print_r($setnrp);

        for ($setlevel = array (); $row = $result->fetch_assoc(); $setlevel[] = $row['level_ecc']);
        for ($sethari = array (); $row = $result->fetch_assoc(); $sethari[] = $row['hari']);
        for ($setruang = array (); $row = $result->fetch_assoc(); $setruang[] = $row['ruang_kode']);
        
        for ($i=0; $i <count($setnrp) ; $i++) { 
            
            $sql = "INSERT INTO kelas_mhs(id_periode,nrp,id_kelas,id_nilai,status_klsmhs) VALUES ('$idperiode','$setnrp[$i]','0','0','1')";

            if ($conn->query($sql)) {
                $ket = "Berhasil insert ke tabel!";
            }else {
                $ket = "Gagal insert !";
            }

            //get ruangnya dulu
            $sqlruang = "select * from ruang_kelas where nama_ruang='$setruang[$i]'";
            if ($result = mysqli_query($conn, $sqlruang)) {
                for ($setidruang = array (); $row = $result->fetch_assoc(); $setidruang[] = $row['id_ruangkelas']);

                $sqlkelas = "select * from kelas where level_ecc='Level $setlevel[$i]', hari='$sethari[$i]', id_ruangkelas='$setidruang[$i]', id_periode='$idperiode[$i]'";
                if ($result = mysqli_query($conn, $sqlkelas)) {
                    for ($setidkelas = array (); $row = $result->fetch_assoc(); $setidkelas[] = $row['id_kelas']);

                    $sqlupdate = "update kelas_mhs set id_kelas='$setidkelas[$i]' where nrp='$setnrp[$i]'";

                if ($conn->query($sqlupdate)) {
                    $ket = "Berhasil update tabel !";
                }else {
                    $ket = "Gagal insert !";
                }
                }

            }

        }
        
    }

    
    echo $ket;
    $conn->close();

}


?>