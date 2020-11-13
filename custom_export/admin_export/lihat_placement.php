<html>

<head>
	<title>Daftar Kelas</title>
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
	header("Content-Disposition: attachment; filename=" . $tgl . "_daftarkelas.xls");
	require_once "../../config/conn.php";
		
    $conn = getConn();
    $periode=$_REQUEST["periode"];
    $collevel1=""; $collevel2=""; $collevel3=""; $collevel4="";
    $kal1= ""; $kal2= ""; $kal3= ""; $kal4= "";

    $sqlperiode = "select * from periode where id_periode='$periode'";
    $result = $conn->query($sqlperiode);
    while($row = mysqli_fetch_array($result))
    {

    ?>

        <table border="1" >
        <tr>
            <th colspan="7"> Daftar Kelas ECC </th>      
        </tr>
        <tr>
            <th colspan="7"> Periode <?php echo $row["semester"]." ".$row["thn_akademik_awal"]."/".$row["thn_akademik_akhir"]; ?></th>
        </tr>
		<tr>
			<th>#</th>
			<th>Nama Kelas</th>
			<th>Hari</th>
            <th>Jam</th>
            <th>Ruang</th>
            <th>Kuota</th>
            <th>Dosen</th>
		</tr>
        
    <?php
    }
        $sql1 = "SELECT * FROM kelas k
        LEFT JOIN user u
        ON k.dosen = u.username
        LEFT JOIN ruang_kelas rk
        ON k.id_ruangkelas=rk.id_ruangkelas
        WHERE k.id_periode=$periode and k.status_kelas='1'";

        $result = $conn->query($sql1);
        $stat="";
        

		if ($result->num_rows > 0) {
			// output data of each row
			while ($row = $result->fetch_assoc()) {
				$level = $row["level_ecc"];
				$nama_kelas = $row["nama_kelas"];
				$hari = $row["hari"];
                $jam_awal = $row["jam_awal"];
                $jam_akhir = $row["jam_akhir"];
                $ruang = $row["nama_ruang"];
                $kuota = $row["kuota"];
                $dosen = $row["nama"];

                if ($level == "Level 1") {
                    $collevel1="<tr><td colspan='7'>Level 1</td></tr>";
                    $kal1 .= "
                <tr>
                    <td>-</td>
                    <td>$nama_kelas</td>
                    <td>$hari</td>
                    <td>$jam_awal - $jam_akhir</td>
                    <td>$ruang</td>
                    <td>$kuota</td>
                    <td>$dosen</td>
                </tr>"; 
                    
                }
                elseif ($level == "Level 2") {
                    $collevel2="<tr><td colspan='7'>Level 2</td></tr>";
                    $kal2 .= "
                <tr>
                    <td>-</td>
                    <td>$nama_kelas</td>
                    <td>$hari</td>
                    <td>$jam_awal - $jam_akhir</td>
                    <td>$ruang</td>
                    <td>$kuota</td>
                    <td>$dosen</td>
                </tr>";      
                }
                elseif ($level == "Level 3") {
                    $collevel3="<tr><td colspan='7'>Level 3</td></tr>";
                    $kal3 .= "
                <tr>
                    <td>-</td>
                    <td>$nama_kelas</td>
                    <td>$hari</td>
                    <td>$jam_awal - $jam_akhir</td>
                    <td>$ruang</td>
                    <td>$kuota</td>
                    <td>$dosen</td>
                </tr>";      
                }
                elseif ($level == "Level 4") {
                    $collevel4="<tr><td colspan='7'>Level 4</td></tr>";
                    $kal4 .= "
                <tr>
                    <td>-</td>
                    <td>$nama_kelas</td>
                    <td>$hari</td>
                    <td>$jam_awal - $jam_akhir</td>
                    <td>$ruang</td>
                    <td>$kuota</td>
                    <td>$dosen</td>
                </tr>";      
                }
                
			}
		} else {
			$kal1 = "";
        }
		echo $collevel1.$kal1.$collevel2.$kal2.$collevel3.$kal3.$collevel4.$kal4;
		?>
	</table>
</body>
</html>