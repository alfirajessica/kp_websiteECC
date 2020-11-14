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
	header("Content-Disposition: attachment; filename=" . $tgl . "_hasilplacement.xls");
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

        <table>
        <thead>
        <tr> 
            <?php 
                for ($i=1; $i <= 4; $i++) { 
                    ?> 
                        <th colspan="5"> Hasil ECC Level <?php echo $i;?></th> 
                        <th colspan="2"></th>
                    
                <?php } ?>
        </tr>
        <tr> 
            <?php 
                for ($i=1; $i <= 4; $i++) { 
                    ?> 
                        <th colspan="5"> Periode <?php echo $row["semester"]." ".$row["thn_akademik_awal"]."/".$row["thn_akademik_akhir"]; ?></th> <th colspan="2"></th>
                    
                <?php } ?>
        </tr>
            
		<tr>
            <th>#</th>
            <th>Nrp</th>
            <th>Nama Mahasiswa</th>
            <th>Nilai Placement</th>
            <th>Level Placement</th>
            <th colspan="2"></th>

            <th>#</th>
            <th>Nrp</th>
            <th>Nama Mahasiswa</th>
            <th>Nilai Placement</th>
            <th>Level Placement</th>
            <th colspan="2"></th>

            <th>#</th>
            <th>Nrp</th>
            <th>Nama Mahasiswa</th>
            <th>Nilai Placement</th>
            <th>Level Placement</th>
            <th colspan="2"></th>

            <th>#</th>
            <th>Nrp</th>
            <th>Nama Mahasiswa</th>
            <th>Nilai Placement</th>
            <th>Level Placement</th>
           
		</tr>
        </thead>
        <tbody>
        
        
        
    <?php
    }
        $sql1 = "SELECT * FROM mahasiswa WHERE id_periode='$periode' and status_mhs='1' ORDER by nrp asc, placement_level asc";

        $result = $conn->query($sql1);
        $stat="";

		if ($result->num_rows > 0) {
			// output data of each row
			while ($row = $result->fetch_assoc()) {
				$nrp = $row["nrp"];
				$nama_mhs = $row["nama_mhs"];
				$nilai_placement = $row["nilai_placement"];
                $placement_level = $row["placement_level"];
                $now_level = $row["now_level"];
            
                if ($placement_level == "1") {
                    $collevel1="<tr><td colspan='6'>Level 1</td></tr>";
                    $kal1 .= "<tr>
                    <td>-</td>
                    <td>$nrp</td>
                    <td>$nama_mhs</td>
                    <td>$nilai_placement</td>
                    <td>$placement_level</td>
                    <td colspan='2'></td></tr>";
                    
                }

                else if ($placement_level == "2") {
                    $collevel2="<tr><td colspan='6'>Level 2</td></tr>";
                    $kal2 .="<tr>
                    <td>-</td>
                    <td>$nrp</td>
                    <td>$nama_mhs</td>
                    <td>$nilai_placement</td>
                    <td>$placement_level</td>
                    <td colspan='2'></td></tr>";
                    
                }

                else if ($placement_level == "3") {
                    $collevel3="<tr><td colspan='6'>Level 3</td></tr>";
                    $kal3 .=
                    "<tr><td>-</td>
                    <td>$nrp</td>
                    <td>$nama_mhs</td>
                    <td>$nilai_placement</td>
                    <td>$placement_level</td>
                    <td colspan='2'></td></tr>";
            
                }

                else if ($placement_level == "4") { 
                    $collevel4="<tr><td colspan='6'>Level 4</td></tr>";
                    $kal4 .="</tr>
                    <td>-</td>
                    <td>$nrp</td>
                    <td>$nama_mhs</td>
                    <td>$nilai_placement</td>
                    <td>$placement_level</td></tr>
                ";
                
                }
                ?>
                
                
            
            <?php }
        }

                    
			
        else 
        {
			$kal1 = "----";
        }
		echo $collevel1.$kal1.$collevel2.$kal2.$collevel3.$kal3.$collevel4.$kal4;
		?>
        
    </tbody>
	</table>

    
</body>
</html>