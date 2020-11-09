<?php
require_once "../../config/conn.php";
$connect=getConn();

$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
$limit = $_POST['length']; // Ambil data limit per page
$start = $_POST['start']; // Ambil data start
$idperiode = $_POST["idperiode"];
$idkelas = $_POST["idkelas"];

$sql = mysqli_query($connect, "select distinct m.nrp,m.nama_mhs,n.nilai_uts,n.nilai_uas,n.nilai_akhir from nilai n,mahasiswa m,kelas k,periode p where m.nrp=n.nrp and m.id_periode=p.id_periode and k.id_periode=p.id_periode and p.id_periode='$idperiode' and k.id_kelas='$idkelas'"); // Query untuk menghitung seluruh data kelas
$sql_count = mysqli_num_rows($sql); // Hitung data yg ada pada query $sql

$query = "select distinct m.nrp as nrp,m.nama_mhs as nama,n.nilai_uts as uts,n.nilai_uas as uas ,n.nilai_akhir as na from nilai n,mahasiswa m,kelas k,periode p where m.nrp=n.nrp and m.id_periode=p.id_periode and k.id_periode=p.id_periode and p.id_periode='$idperiode' and k.id_kelas='$idkelas'";

$order_field = $_POST['order'][0]['column']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
$order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;

$sql_data = mysqli_query($connect, $query.$order." LIMIT ".$limit." OFFSET ".$start); // Query untuk data yang akan di tampilkan
$sql_filter = mysqli_query($connect, $query); // Query untuk count jumlah data sesuai dengan filter pada textbox pencarian
$sql_filter_count = mysqli_num_rows($sql_filter); // Hitung data yg ada pada query $sql_filter

$data = mysqli_fetch_all($sql_data, MYSQLI_ASSOC); // Untuk mengambil data hasil query menjadi array
$callback = array(
    'draw'=>$_POST['draw'], // Ini dari datatablenya
    'recordsTotal'=>$sql_count,
    'recordsFiltered'=>$sql_filter_count,
    'data'=>$data
);

header('Content-Type: application/json');
echo json_encode($callback); // Convert array $callback ke json
?>
