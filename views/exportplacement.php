<html>

<head>
	<title>Daftar Nilai Placement</title>
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
	header("Content-Disposition: attachment; filename=" . $tgl . "_nilaiplacement.xls");
	require_once "../config/conn.php";
	?>

	<center>
		<h5>Daftar Placement Mahasiswa Tanggal <?php echo date("d M Y h:i:s");  ?></h5>
	</center>

	<table border="1" >
		<tr>
			<th></th>
			<th>Nrp</th>
			<th>Nama Mahasiswa</th>
			<th>Nilai Placement</th>
			<th>Level</th>
		</tr>
		<?php
		$conn = getConn();
		$kal = "";
		$sql = "select * from temp_mahasiswa";
		$i=1;
		$result = $conn->query($sql);
		$stat="";
		if ($result->num_rows > 0) {
			// output data of each row
			while ($row = $result->fetch_assoc()) {

				$nrp = $row["nrp"];
				$nama = $row["nama_mahasiswa"];
				$nilai = $row["nilai_placement"];
				$level = $row["level"];
	
				
				$kal .= "<tr>
				   <td>$i</td>
				  <td>$nrp</td>
				  <td>$nama</td>
				  <td>$nilai</td>
				  <td>$level</td>
				  </tr>"; 
				  $i++;
			}
		} else {
			$kal = "";
		}
		echo $kal;
		?>






	</table>
</body>

</html>