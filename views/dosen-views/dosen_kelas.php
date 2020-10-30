<?php require_once("head.php"); 
$arr=unserialize($_SESSION["user"]); 
        
$username = $arr->get_u();

?>

<div class="card-body">
    <div class="form-group">
        <label for="">Pilih Periode</label>
        <div class="input-group mb-3">
            <select name="select" id="periode_lihatkelas" class="form-control"  aria-describedby="help_pilihperiode"></select>
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="button" onclick="btn_cari()">Cari</button>
            </div>
        </div>
        <small id="helpId" class="form-text text-muted">Help text</small>
    </div>

    <div class="table-responsive">
        <table id="table_kelasdosen" class="table table-striped table-bordered" width="100%">
            <thead>
                <tr>
                    <th>Level</th>
                    <th>Kelas</th>
                    <th>Jadwal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    </div>
    <!-- end of tabel kelas yang tergenerate -->
</div>

<script>
var username= "<?php echo $username;?>";
function  btn_cari() {
   // $('#table_kelasdosen').DataTable().ajax.reload(); //reload ajax datatable
    datatable_kelasdosen();
}

function datatable_kelasdosen() {
    var periode = $("#periode_lihatkelas").val();
    console.log(username);
    //datatable list barang
    var table= "";
    table = $('#table_kelasdosen').DataTable( 
    {
        destroy:true,
            dom: 'Bfrtip',
            "buttons": [ 'copy', 'excel', 'pdf' ],
            "processing":true,
            "language": {
            "lengthMenu": "Tampilkan _MENU_ data per Halaman",
            "zeroRecords": "Maaf Data yang dicari tidak ada",
            "info": "Tampilkan data _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada data",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search":"Cari",
            "paginate": {
                "first":      "Pertama",
                "last":       "terakhir",
                "next":       "Selanjutnya",
                "previous":   "Sebelumnya"
                },
            },
            "serverSide":true,
            "ordering":true, //set true agar bisa di sorting
            "ajax":{
                "url":"../datatables/dosen-datatable/kelas_aktifdt.php",
                "type":"POST",
                "data":{"idperiode":periode, 
                        "username":username},
            },
            "deferRender":true,
            "aLengthMenu":[[10,20,50],[10,20,50]], //combobox limit
            "columns":[
            
            {"data":"level_ecc"},
            {"data":"nama_kelas"},
            {"data":"hari",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    var hari = row.hari;
                    var jam_awal = row.jam_awal;
                    var jam_akhir = row.jam_akhir;
                    var ruang = row.id_ruangkelas;
                    var kuota = row.kuota;

                    if (hari == "") {
                        hari = "<label class='text-danger'> Belum terisi </label>";
                    }
                    if (jam_awal == null) {
                        jam_awal = "<label class='text-danger'> Belum terisi </label>";
                    }
                    if (ruang == null) {
                        ruang = "<label class='text-danger'> Belum terisi </label>";
                    }
                    else if (ruang !=0) {
                        ruang = row.nama_ruang;
                    }
                    if (kuota == 0) 
                    {
                        kuota = "<label class='text-danger'> Belum terisi </label>";
                    }
                    return "Hari : " + hari + "<br> Jam : " + jam_awal + "-" + jam_akhir + "<br> Ruang : " + ruang + "<br> Kuota : " + kuota;

                   
                }
            },
            {"data":"status_kelas",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    var idkelas = row.id_kelas;
                    var table = "#table_kelasaktif";

                    return "<button onclick=\"lihat_mahasiswa(\'"+idkelas+"\')\" type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#exampleModal'>Lihat Mahasiswa</button>";
                    
                    
                }
            },
            
            ],
    }) 
    //end of datatble list barang
}

</script>