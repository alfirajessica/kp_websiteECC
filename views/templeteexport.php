<html>

<head>
	<title>Templete Nilai Placement</title>
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
	header("Content-Disposition: attachment; filename=Templete nilai placement.xls");
	require_once "../config/conn.php";
	?>

	<table>
		<tr>
			<th>Nrp</th>
			<th>Nama Mahasiswa</th>
			<th>Nilai Placement</th>
			<th>Level</th>
		</tr>
		<?php
		$kal="";
		for ($i=0; $i <30; $i++) { 
			$kal.="<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>";
		}
		echo $kal;
		?>






	</table>
	
</body>

</html>