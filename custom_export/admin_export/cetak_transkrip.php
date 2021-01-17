<html>

<head>
	<title>Transkrip ECC</title>
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
	header("Content-Disposition: attachment; filename=" . $tgl . "_TranskripECC.xls");
	require_once "../../config/conn.php";
		
    $conn = getConn();
    $nrp=$_REQUEST["nrp"];
    $collevel1=""; $collevel2=""; $collevel3=""; $collevel4="";
    $kal1= ""; $kal2= ""; $kal3= ""; $kal4= "";

    $sqlperiode = "select * from mahasiswa where nrp='$nrp'";
    $result = $conn->query($sqlperiode);
    while($row = mysqli_fetch_array($result))
    {

    ?>

        <table border="1" >
        <tr>
            <th colspan="4"> TRANSKRIP ECC </th>      
        </tr>
        <tr> </tr>
        <tr>
            <td> Nrp </td>
            <td colspan="3"> : <?php echo $row["nrp"] ?> </td>
            
        </tr>
        <tr>
            <td> Nama </td>
            <td colspan="3"> : <?php echo $row["nama_mhs"] ?> </td>
            
        </tr>
        <tr></tr>
		<tr>
			<th>#Kode</th>
			<th>Semester</th>
			<th>Level/Kelas</th>
            <th>Grade</th>
		</tr>
        
    <?php
    }

    // //$sql1 = "SELECT m.nrp, m.nama_mhs, n.nilai_uts, n.nilai_akhir, n.grade, m.level_ecc
    // FROM mahasiswa m, nilai_mhs n,kelas_mhs km ,kelas k
    // WHERE k.id_kelas=km.id_kelas and m.nrp=km.nrp and n.id_nilai=km.id_nilai and km.id_periode=$periode" ;

        $sql1 = "SELECT distinct km.id_klsmhs as id, p.semester as semester, p.thn_akademik_awal as t_awal, p.thn_akademik_akhir as t_akhir, k.level_ecc as levelecc, k.nama_kelas as namakls, n.grade as grade 
        FROM mahasiswa m, nilai_mhs n,kelas_mhs km ,kelas k, periode p
        WHERE k.id_kelas=km.id_kelas and m.nrp=km.nrp and n.id_nilai=km.id_nilai and k.id_periode=p.id_periode and km.nrp='$nrp'";

        $result = $conn->query($sql1);
        $stat="";
        
		if ($result->num_rows > 0) {
			// output data of each row
			while ($row = $result->fetch_assoc()) {
                $kode = $row["id"];
                $semester = $row["semester"];
                $t_awal = $row["t_awal"];
                $t_akhir = $row["t_akhir"];
                $level = $row["levelecc"];
                $namakls = $row["namakls"];
                $grade = $row["grade"];
                
                
                $kal1 .= "
                <tr>
                    <td>#$kode</td>
                    <td>$semester - $t_awal/$t_akhir</td>
                    <td>ECC Level $level/ $namakls</td>
                    <td>$grade</td>
                </tr>"; 
                
			}
		} else {
			$kal1 = "";
        }
		echo $kal1;
		?>
	</table>
    
</body>
</html>