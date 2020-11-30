<html>

<head>
    <title>Export Barang</title>
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
    header("Content-Disposition: attachment; filename=" . $tgl . "_templete.xls");
    require_once "../config/conn.php";
    ?>


    <table border='1'>
        <tr>
            <th>IDNILAI</th>
            <th>NRP</th>
            <th>NAMA</th>
            <th>NILAI(UTS/UAS)</th>
        </tr>
        <?php
        $kelas = $_GET["kelas"];
        $kal="";
        $conn = getConn();
        $stmt = $conn->prepare("select * from kelas_mhs km,mahasiswa m,nilai n where n.id_nilai=km.id_nilai and km.nrp=m.nrp and km.id_kelas='$kelas' ");
        $stmt->execute();
        $res = $stmt->get_result();
        while ($row = $res->fetch_assoc()) {
            $nrp=$row["nrp"];
            $idnilai=$row["id_nilai"];
            $nama=$row["nama_mhs"];
            $kal.="
            <tr>
                <td><strong>$idnilai</strong></td>
                <td>$nrp</td>
                <td>$nama</td>
                <td></td>
            </tr>
            ";
        }
        echo $kal;
        ?>
 
    </table>



</body>

</html>