<?php require_once("head.php"); 
$arr=unserialize($_SESSION["user"]); 
$username = $arr->get_u();
?>

<div class="card-body">
    <div class="form-group">
        <label for="">Periode</label>
        <div class="input-group mb-3">
            <select name="select" id="periode_lihatkelas" class="form-control"  aria-describedby="help_pilihperiode"></select>
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="button" onclick="btn_cari()"><i class="menu-icon fa fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
    </div>

    <div class="card" id="cardform2" style="display:none">
        <div class="card-body">
        <div class="form-group">
            <label for="">Filter Level</label>
            <select class="form-control" name="" onchange="lvlchange()" id="filter1_level" aria-describedby="helpId" placeholder="">
            </select>
        </div>

        <div class="table-responsive">
            <table id="table_kelasdosen" class="table table-striped table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Level</th>
                        <th>Level/Kelas</th>
                        <th>Jadwal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        </div>
    </div>
    <!-- end of tabel kelas yang tergenerate -->
</div>

<!-- Modal lihat mahasiswa  -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" id="modal_lihatmhs" role="dialog" style="overflow-y:scroll;">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Daftar Mahasiswa pada <i id="namakelas"> </i> <br>
            <p id="details"> </p>
            </h5>
            
            <!-- <h6 id="title_idkelas"></h6>
            <h6 id="title_table"></h6> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          
          <div class="table-responsive">
                <table id="table_lihatmhs" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr class="clickable-row">
                            <th>#</th>
                            <th>#nrp</th>
                            <th>Nama Mahasiswa</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>   
          </div>
        </div>
      </div>
    </div>
    <!-- end of Modal atur dosen/jam/kuota kelas ecc  -->

<script>
var username= "<?php echo $username;?>";
function  btn_cari() {
   // $('#table_kelasdosen').DataTable().ajax.reload(); //reload ajax datatable
   var periode = $("#periode_lihatkelas").val();
   // datatable_kelasdosen();
    $("#cardform2").show();
    isilevel(periode);
}

//---------- filter berdasarkan level-------------//
function isilevel(periode) {
    $.post("../ajaxes/a_kelas.php", {
            jenis: "get_level_placement",
            periode:periode,
        },
        function(data) {
            console.log(data);
            $("#filter1_level").html(data);
            datatable_kelasdosen();
        });
}

function lvlchange(){
    datatable_kelasdosen();
}
//----------end of filter berdasarkan level-------------//


function datatable_kelasdosen() {
    var periode = $("#periode_lihatkelas").val();
    var level = $("#filter1_level").val();
    console.log(username);
    //datatable list barang
    var table= "";
    var groupColumn = 1;
    table = $('#table_kelasdosen').DataTable( 
    {
        destroy:true,
            "processing":true,
            "language": {
                "paginate": {
                "first":      "First",
                "last":       "Last",
                "next":       "Next",
                "previous":   "Previous"
                },
            },
            "serverSide":true,
            "ordering":true, //set true agar bisa di sorting
            "ajax":{
                "url":"../datatables/dosen-datatable/kelas-aktifdt.php",
                "type":"POST",
                "data":{"idperiode":periode, 
                        "username":username,
                        "level":level},
            },
            "deferRender":true,
            "aLengthMenu":[[10,20,50],[10,20,50]], //combobox limit
            "columnDefs": [
                { "visible": false, "targets": groupColumn}
            ],
            "columns":[
            {"data":"id_kelas",
                "visible":true,
                "render": function (data, type, row) {  
                    return "#";
                }
            },
            {"data":"level_ecc",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    return "Level " + row.level_ecc;
                }
            },
            {"data":"nama_kelas",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    return  row.level_ecc+"/"+row.nama_kelas;
                }},
            {"data":"hari",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    var hari = row.hari;
                    var jam_awal = row.jam_awal;
                    var jam_akhir = row.jam_akhir;
                    var ruang = row.nama_ruang;
                    var kuota = row.kuota;

                    // if (hari == "") {
                    //     hari = "<label class='text-danger'> Belum terisi </label>";
                    // }
                    // if (jam_awal == null) {
                    //     jam_awal = "<label class='text-danger'> Belum terisi </label>";
                    // }
                    // if (ruang == null) {
                    //     ruang = "<label class='text-danger'> Belum terisi </label>";
                    // }
                    // else if (ruang !=0) {
                    //     ruang = row.nama_ruang;
                    // }
                    // if (kuota == 0) 
                    // {
                    //     kuota = "<label class='text-danger'> Belum terisi </label>";
                    // }
                    return "Hari : " + hari + "<br> Jam : " + jam_awal + "-" + jam_akhir + "<br> Ruang : " + ruang + "<br> Kuota : " + kuota;

                   
                }
            },
            {"data":"status_kelas",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    var idkelas = row.id_kelas;
                    var kelas = row.level_ecc + "/" + row.nama_kelas;
                    var detail = "Jadwal : " + row.hari + "/" + row.nama_ruang + "/" + row.jam_awal+ "-" + row.jam_akhir + "<br> Dosen : " + row.nama;
                    var table = "#table_kelasaktif";

                    return "<button onclick=\"lihat_mahasiswa(\'"+idkelas+"\',\'"+kelas+"\',\'"+detail+"\')\" type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#modal_lihatmhs'>List Mahasiswa </button>";
                    
                    
                }
            },
            
            ],
            "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5"> Level '+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
            
    }) 
    //end of datatble list barang
}

function lihat_mahasiswa(idkelas,kelas,detail) {
 console.log("lihat mahasiswa");
 datatable_table_lihatmhs(idkelas);
 $("#namakelas").html(kelas);
 $("#details").html(detail);
}

function datatable_table_lihatmhs(idkelas) {
    console.log(idkelas);
    var periode = $("#periode_lihatkelas").val();
    //datatable list barang
    var table= "";
    var groupColumn = 1;
    table = $('#table_lihatmhs').DataTable( 
    {
            destroy:true,
            "responsive":true,
            "processing":true,
            "language": {
                "paginate": {
                "first":      "First",
                "last":       "Last",
                "next":       "Next",
                "previous":   "Previous"
                },
            },
            "serverSide":true,
            "ordering":true, //set true agar bisa di sorting
            "ajax":{
                "url":"../datatables/admin-datatable/kelas-listmhs.php",
                "type":"POST",
                "data":{"idkelas":idkelas},
            },
            "deferRender":true,
            "aLengthMenu":[[10,20,50],[10,20,50]], //combobox limit
            "order": [[0, 'asc']],
            
            "columns":[
                {"data":"id_klsmhs",
                "visible":false,
            },
            {"data":"nrp"},
            {"data":"nama_mhs"},
            ],
            
    }) 
    //end of datatble list barang
}


</script>