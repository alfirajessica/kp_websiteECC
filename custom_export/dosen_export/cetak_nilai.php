<html>

<head>
	<title>Daftar Nilai Mahasiswa ECC</title>
</head>

<body>
	<style type="text/css">
		body {
			font-family: sans-serif;
		}

		table {
			margin: 20px auto;
			border-collapse: collapse;
		}

		table th,
		table td {
			border: 1px solid #3c3c3c;
			padding: 3px 8px;

		}

		a {
			background: blue;
			color: #fff;
			padding: 8px 10px;
			text-decoration: none;
			border-radius: 2px;
		}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	$tgl = date("Ymd_his");
	header("Content-Disposition: attachment; filename=" . $tgl . "_NilaiECC.xls");
	require_once "../../config/conn.php";
		
    $conn = getConn();
    $periode=$_REQUEST["periode"];
    $user=$_REQUEST["user"];
    $collevel1=""; $collevel2=""; $collevel3=""; $collevel4="";
    $kal1= ""; $kal2= ""; $kal3= ""; $kal4= "";

    $sqlperiode = "select * from periode where id_periode='$periode'";
    $result = $conn->query($sqlperiode);
    while($row = mysqli_fetch_array($result))
    {

    ?>
    <p> Dosen  </p>
        <table border="1" >
        <tr>
            <th colspan="8"> Daftar Nilai Mahasiswa ECC </th>    
            
        </tr>
        <tr>
            <th colspan="8">
                <?php 
                    $sqlceknama = "select * from user where username='$user'";
                    $result1 = $conn->query($sqlceknama);
                    while($row1 = mysqli_fetch_array($result1))
                    {
                        echo "Dosen : ".$row1["nama"];
                    }
                ?>
            </th>  
        </tr>
        <tr>
            <th colspan="8"> Periode <?php echo $row["semester"]." ".$row["thn_akademik_awal"]."/".$row["thn_akademik_akhir"]; ?></th>
        </tr>
		<tr>
            <th>Nrp</th>
			<th>Nama Mahasiswa</th>
            <th>Level</th>
            <th>Kelas</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>NA</th>
            <th>Grade</th>
		</tr>
        
    <?php
    }

    // //$sql1 = "SELECT m.nrp, m.nama_mhs, n.nilai_uts, n.nilai_akhir, n.grade, m.level_ecc
    // FROM mahasiswa m, nilai_mhs n,kelas_mhs km ,kelas k
    // WHERE k.id_kelas=km.id_kelas and m.nrp=km.nrp and n.id_nilai=km.id_nilai and km.id_periode=$periode" ;

        $sql1 = "SELECT * FROM nilai_mhs nm
        LEFT JOIN kelas_mhs km
        ON km.id_nilai = nm.id_nilai
        LEFT JOIN mahasiswa m
        ON m.nrp= km.nrp
        LEFT JOIN kelas k
        ON k.id_kelas = km.id_kelas
        LEFT JOIN user u
        ON u.username = k.dosen
        WHERE km.id_periode=$periode and k.dosen='$user'
        ORDER BY k.level_ecc asc, km.nrp asc" ;

        $result = $conn->query($sql1);
        $stat="";
        
		if ($result->num_rows > 0) {
			// output data of each row
			while ($row = $result->fetch_assoc()) {
				$namamhs = $row["nama_mhs"];
				$uts = $row["nilai_uts"];
				$uas = $row["nilai_uas"];
                $na = $row["nilai_akhir"];
                $grade = $row["grade"];
                $nrp = $row["nrp"];
                $level = $row["level_ecc"];
                $kls = $row["nama_kelas"];

                $namamhs = $row["nama_mhs"];
				$uts = $row["nilai_uts"];
				$uas = $row["nilai_uas"];
                $na = $row["nilai_akhir"];
                $grade = $row["grade"];
                $nrp = $row["nrp"];
                $level = $row["level_ecc"];
                $namakls = $row["nama_kelas"];
                
                $kal1 .= "
                <tr>
                    <td>$nrp</td>
                    <td>$namamhs</td>
                    <td>$level</td>
                    <td>$namakls</td>
                    <td>$uts</td>
                    <td>$uas</td>
                    <td>$na</td>
                    <td>$grade</td>
                </tr>"; 
                

                /*if ($level == "1") {
                    $collevel1="<tr><td colspan='7'>Level 1</td></tr>";
                    $kal1 .= "
                <tr>
                    <td>$kls</td>
                    <td>$nrp</td>
                    <td>$namamhs</td>
                    <td>$uts</td>
                    <td>$uas</td>
                    <td>$na</td>
                    <td>$grade</td>
                </tr>"; 
                    
                }
                elseif ($level == "2") {
                    $collevel2="<tr><td colspan='7'>Level 2</td></tr>";
                    $kal2 .= "
                <tr>
                    <td>$kls</td>
                    <td>$nrp</td>
                    <td>$namamhs</td>
                    <td>$uts</td>
                    <td>$uas</td>
                    <td>$na</td>
                    <td>$grade</td>
                </tr>";      
                }
                elseif ($level == "3") {
                    $collevel3="<tr><td colspan='7'>Level 3</td></tr>";
                    $kal3 .= "
                <tr>
                    <td>$kls</td>
                    <td>$nrp</td>
                    <td>$namamhs</td>
                    <td>$uts</td>
                    <td>$uas</td>
                    <td>$na</td>
                    <td>$grade</td>
                </tr>";      
                }
                elseif ($level == "4") {
                    $collevel4="<tr><td colspan='7'>Level 4</td></tr>";
                    $kal4 .= "
                <tr>
                    <td>$kls</td>
                    <td>$nrp</td>
                    <td>$namamhs</td>
                    <td>$uts</td>
                    <td>$uas</td>
                    <td>$na</td>
                    <td>$grade</td>
                </tr>";      
                }*/
                
			}
		} else {
			$kal1 = "";
        }
		//echo $collevel1.$kal1.$collevel2.$kal2.$collevel3.$kal3.$collevel4.$kal4;
        echo $kal1;
        ?>
	</table>
    
</body>
</html>