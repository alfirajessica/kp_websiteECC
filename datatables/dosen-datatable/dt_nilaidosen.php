<?php
include_once "../../config/conn.php";
$connect=getConn();

$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
$limit = $_POST['length']; // Ambil data limit per page
$start = $_POST['start']; // Ambil data start

$periode=$_POST["periode"];
$level=$_POST["level"];
$kelas=$_POST["kelas"];


$sql = mysqli_query($connect, "SELECT nrp FROM mahasiswa "); // Query untuk menghitung seluruh data siswa
$sql_count = mysqli_num_rows($sql); // Hitung data yg ada pada query $sql

if ($kelas=="all") {
 $query = "SELECT distinct n.nilai_uts as uts,n.nilai_uas as uas,n.nilai_akhir as na,m.nama_mhs as nama,m.nrp as nrp,n.id_nilai as id_nilai, n.grade as grade 
 FROM mahasiswa m, nilai_mhs n,kelas_mhs km ,kelas k
 WHERE k.id_kelas=km.id_kelas and k.level_ecc='$level' and m.nrp=km.nrp and n.id_nilai=km.id_nilai and km.id_periode='$periode' and (m.nama_mhs like '%$search%' or m.nrp like '%$search%' )";

}else{
$query = "SELECT distinct n.nilai_uts as uts,n.nilai_uas as uas,n.nilai_akhir as na,m.nama_mhs as nama,m.nrp as nrp,n.id_nilai as id_nilai, n.grade as grade 
FROM mahasiswa m, nilai_mhs n,kelas_mhs km 
WHERE m.nrp=km.nrp and n.id_nilai=km.id_nilai and km.id_kelas='$kelas' and (m.nama_mhs like '%$search%' or m.nrp like '%$search%' )";

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
