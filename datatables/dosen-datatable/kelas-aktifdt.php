<?php
require_once "../../config/conn.php";
$connect=getConn();

$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
$limit = $_POST['length']; // Ambil data limit per page
$start = $_POST['start']; // Ambil data start
$idperiode = $_POST["idperiode"];
$dosen = $_POST["username"];
$level = $_POST["level"];

$sql = mysqli_query($connect, "SELECT id_kelas FROM kelas where status_kelas=1"); // Query untuk menghitung seluruh data kelas
$sql_count = mysqli_num_rows($sql); // Hitung data yg ada pada query $sql

if ($level == "all") {
    $query = "SELECT * FROM kelas k
LEFT JOIN user u
ON k.dosen = u.username
LEFT JOIN ruang_kelas rk
ON k.id_ruangkelas=rk.id_ruangkelas
WHERE (k.level_ecc LIKE '%".$search."%' OR k.nama_kelas LIKE '%".$search."%' OR k.hari LIKE '%".$search."%' OR k.jam_awal LIKE '%".$search."%' OR k.dosen LIKE '%".$search."%' OR k.kuota LIKE '%".$search."%' OR k.status_kelas LIKE '%".$search."%' OR u.nama LIKE '%".$search."%' OR rk.nama_ruang LIKE '%".$search."%') and k.id_periode='$idperiode' and k.dosen='$dosen' and k.status_kelas='1'";

}else{
    $query = "SELECT * FROM kelas k
LEFT JOIN user u
ON k.dosen = u.username
LEFT JOIN ruang_kelas rk
ON k.id_ruangkelas=rk.id_ruangkelas
WHERE k.level_ecc='$level' and (k.level_ecc LIKE '%".$search."%' OR k.nama_kelas LIKE '%".$search."%' OR k.hari LIKE '%".$search."%' OR k.jam_awal LIKE '%".$search."%' OR k.dosen LIKE '%".$search."%' OR k.kuota LIKE '%".$search."%' OR k.status_kelas LIKE '%".$search."%' OR u.nama LIKE '%".$search."%' OR rk.nama_ruang LIKE '%".$search."%') and k.id_periode='$idperiode' and k.dosen='$dosen' and k.status_kelas='1'";

}

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
