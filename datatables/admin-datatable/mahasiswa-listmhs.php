<?php
require_once "../../config/conn.php";
$connect=getConn();

$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
$limit = $_POST['length']; // Ambil data limit per page
$start = $_POST['start']; // Ambil data start
$idperiode = $_POST["periode"];
$level = $_POST["level"];

$sql = mysqli_query($connect, "SELECT nrp FROM kelas_mhs where id_periode='$idperiode'"); // Query untuk menghitung seluruh data kelas
$sql_count = mysqli_num_rows($sql); // Hitung data yg ada pada query $sql

if ($level == "all") {
    $query = "SELECT * FROM kelas_mhs k
LEFT JOIN mahasiswa m
ON k.nrp = m.nrp
LEFT JOIN kelas ks
ON k.id_kelas=ks.id_kelas
LEFT JOIN user u
ON u.username = ks.dosen
LEFT JOIN ruang_kelas rk
ON rk.id_ruangkelas = ks.id_ruangkelas
WHERE k.id_periode='$idperiode' and (k.nrp LIKE '%".$search."%' OR m.nama_mhs LIKE '%".$search."%')";

}else{
    $query = "SELECT * FROM kelas_mhs k
LEFT JOIN mahasiswa m
ON k.nrp = m.nrp
LEFT JOIN kelas ks
ON k.id_kelas=ks.id_kelas
LEFT JOIN user u
ON u.username = ks.dosen
LEFT JOIN ruang_kelas rk
ON rk.id_ruangkelas = ks.id_ruangkelas
WHERE k.id_periode='$idperiode' and ks.level_ecc='$level' and (k.nrp LIKE '%".$search."%' OR m.nama_mhs LIKE '%".$search."%')";

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
