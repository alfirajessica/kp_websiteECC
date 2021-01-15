<?php
require_once "../../config/conn.php";
$connect=getConn();

$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
$limit = $_POST['length']; // Ambil data limit per page
$start = $_POST['start']; // Ambil data start
$nrp = $_POST["nrp"];

$sql = mysqli_query($connect, "SELECT nrp FROM mahasiswa"); 
$sql_count = mysqli_num_rows($sql); // Hitung data yg ada pada query $sql

$query = "SELECT distinct km.id_klsmhs as id, p.semester as semester, p.thn_akademik_awal as t_awal, p.thn_akademik_akhir as t_akhir, k.level_ecc as levelecc, k.nama_kelas as namakls, n.grade as grade 
     FROM mahasiswa m, nilai_mhs n,kelas_mhs km ,kelas k, periode p
     WHERE k.id_kelas=km.id_kelas and m.nrp=km.nrp and n.id_nilai=km.id_nilai and k.id_periode=p.id_periode and km.nrp='$nrp'";

// $query = "SELECT * FROM kelas_mhs km
// LEFT JOIN kelas k
// ON k.id_kelas=km.id_kelas
// LEFT JOIN periode p
// ON k.id_periode = p.id_periode
// LEFT JOIN nilai_mhs n
// ON n.id_klsmhs=km.id_klsmhs
// WHERE km.nrp='$nrp'";


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
