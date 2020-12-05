<div class="card shadow"> <!-- card shadow -->
    <div class="card-header border-1 bg-dark">
        <div class="nav-wrapper">
            <!-- tabs -->
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Set the class</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>See class</a>
                </li>
            </ul>
            <!--end tabs -->
        </div>
    </div>

    <div class="card-body"> <!-- card body -->
        <!-- tab content -->
        <div class="tab-content" id="myTabContent">
            <!-- atur kelas -->
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                <div class="form-group">
                    <label for="">Select Period</label>
                    <div class="input-group mb-3">
                        <select name="select" id="periode" class="form-control"  aria-describedby="help_pilihperiode"></select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" id="btn_simpanperiode" onclick="simpan_periode()" >Search</button>
                        </div>
                    </div>
                    <label id="help_pilihperiode" style="color:red;"></label>
                </div>
                    
                <div class="card" id="cardform1" style="display:none">
                    <div class="card-header">
                        <form>
                            <div class="alert alert-info" role="alert"> Use this form to add new class</div>
                            <div class="form-group"> <!-- form group row radio -->
                                <label for="">Select Level</label>
                                <select disabled class="form-control" id="leveldipilih" aria-describedby="helpId" placeholder="" >
                                <option value="-1" disabled>Select Level</option>
                                <option>Level 1</option>
                                <option>Level 2</option>
                                <option>Level 3</option>
                                <option>Level 4</option>
                                </select>
                                <small id="help_level"></small>
                            </div>

                            <div class="form-group">
                                <label for="">Many classes will be opened</label>
                                <div class="input-group mb-3">
                                    <select disabled class="form-control" id="banyakkelas" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <option value="0">0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button disabled class="btn btn-success" type="button" id="btn_generate" onclick="generate()" >Generate Class</button>
                                    </div>
                                </div>
                                <small id="help_bykkelas"></small>
                            </div>
                                
                        </form>
                    </div>
                </div>

                <div class="card" id="cardform2" style="display:none">
                    <div class="card-body">
                        <div class="form-group text-right">
                            <button class="btn btn-outline-primary" type="button" onclick="aktifkan_allkelas()">Activate all class</button>
                        </div>

                        <div class="table-responsive">
                            <table id="table1" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Level</th>
                                    <th>Class Name</th>
                                    <th>Schedule</th>
                                    <th>Lecturer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> </tbody>
                            </table>
                        </div>
                    </div>
                </div>                
            </div>
            <!-- end of atur placement -->

            <!-- lihat hasil placement -->
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                <div class="form-group">
                    <label for="">Select Period</label>
                    <div class="input-group mb-3">
                        <select name="select" id="periode_lihatkelas"  class="form-control" > </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" onclick="btn_cari()">Search</button>
                        </div>
                    </div>
                </div>

                <div class="card" id="cardform3" style="display:none">
                    <div class="card-body">
                        <div class="form-group">
                        <button type="button" class="btn btn-secondary text-light" onclick="exportfile()">Export</button>
                        </div>
        
                        <div class="table-responsive">
                            <table id="table_kelasaktif" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Level</th>
                                        <th>Class</th>
                                        <th>Schedule</th>
                                        <th>Lecturer</th>
                                        <th>Action</th>
                                    </tr>
                                </tr>
                                </thead>
                                <tbody> </tbody>
                            </table>
                        </div>
                        <!-- end of tabel kelas yang tergenerate -->
                    </div>
                </div>
            </div> <!-- end of hasil placement -->
        </div> <!-- end of tab content -->
    </div> <!--end of card body -->
</div> <!--end of card shadow -->

<!-- Modal atur dosen/jam/kuota kelas ecc  -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="title_namakelas"></h5>
            <h6 id="title_idkelas"></h6>
            <h6 id="title_table"></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="close_btn()">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form role="form">
          <table class="table table-borderless table-md text-right">
                    <tbody>
                        <tr>
                            <td scope="row">Lecturer : </td>
                            <td class="text-left">
                              <select class="form-control" name="" id="all_dosen" aria-describedby="help_alldosen">
                              
                              </select>
                              <small id="help_alldosen" class="form-text text-muted"></small>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Day : </td>
                            <td class="text-left">
                            <select class="form-control" name="" id="pilihhari" aria-describedby="help_pilihhari" placeholder="">
                                <option value="-1" disabled>Select Day</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                            </select>
                            <small id="help_pilihhari" class="form-text text-muted"></small>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Room : </td>
                            <td class="text-left">
                              <select class="form-control" name="" id="all_ruang" aria-describedby="help_allruang" >
                              
                              </select>
                              <small id="help_allruang" class="form-text text-muted"></small>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Start at : </td>
                            <td class="text-left">
                            <input class="form-control" type="time" value="06:30" id="jamawal">
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">End at : </td>
                            <td class="text-left">
                            <input class="form-control" type="time" value="08:00" id="jamakhir">
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Quota : </td>
                            <td class="text-left">
                                <input type="number" min="0" max="1000" class="form-control-sm" name="" id="kuota" aria-describedby="help_kuota" placeholder="" onchange="kuota_onchange(this.value)"> 
                                <small id="help_kuota" class="form-text text-muted"></small>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </form>
            
          </div>
          <div class="modal-footer">
            <label id="update_warning"> </label>
            <button id="btn_updatekelas" type="button" class="btn btn-primary" onclick="updatekelasini()" >Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end of Modal atur dosen/jam/kuota kelas ecc  -->

    <!-- Modal lihat mahasiswa  -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" id="modal_lihatmhs" role="dialog" style="overflow-y:scroll;">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="namakelas"></h5>
            <h6 id="title_idkelas"></h6>
            <h6 id="title_table"></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="close_btn()">
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
                            <th>Student Name</th>
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

<style>
  .warning{
    color:red;
  }
</style>

<script>
function get_dosen() 
{
    $.post("../ajaxes/a_dosen.php",
    {
        jenis:"get_alldosen",
    },
    function(data){
        $("#all_dosen").html(data); //di atur kelas
    });
}

function get_ruang() 
{
    $.post("../ajaxes/a_ruang.php",
    {
        jenis:"get_allruang",
    },
    function(data){
        $("#all_ruang").html(data); //di atur kelas
    });
}

//saat menekan tombol simpan periode
function  simpan_periode() {
    var periode = $("#periode").val();
    console.log(periode);
    if (periode == "-1") {
        $("#help_pilihperiode").text("Pilih periode terlebih dahulu");
        $("#help_pilihperiode").css("style","color:red");
    }
    else{
        $("#help_pilihperiode").text("");
        //cek kelas yang belum diaktifkan pada periode tsb
        $('#cardform1, #cardform2').show();
        datatable_kelasnonaktif();

        //disabled button simpan dan select periode
        $("#btn_simpanperiode").prop('disabled', true);
        $("#periode").prop('disabled', true);

        //enabled level dan generate
        $("#leveldipilih").prop('disabled', false);
        $("#banyakkelas").prop('disabled', false);
        $("#btn_generate").prop('disabled', false);
    }
    
}

function  resetformgen() {
    var bykkelas = $("#banyakkelas").val("-1");
    var level_sel = $("#leveldipilih").val("-1");
}

function generate() {
    var periode = $("#periode").val();
    var bykkelas = $("#banyakkelas").val();
    var level_sel = $("#leveldipilih").val();

    //cek apakah level telah dipilih dan byk kelasnya
    if (level_sel == "-1") {
        $("#help_level").text("level belum dipilih").css("color","red");
        
    }
    else if (bykkelas == "0"){
        $("#help_bykkelas").text("banyak kelas belum dipilih").css("color","red");
    }
    else if(level_sel != "-1" && bykkelas != "0")
    {
        $("#help_bykkelas, #help_level").text("");
        $.post("../ajaxes/a_kelas.php",
        {
            idperiode:periode,
            level:level_sel,
            jenis:"cek_kelas",
        },
        function(data){
            //get nama kelas terakhir dari level tsb
            var namakelas = data["nama_kelas"];
            
            console.log(namakelas + " - ");
            if (namakelas == null) {
                namakelas="";
            }
            
            $.post("../ajaxes/a_kelas.php",
            {
                idperiode:periode,
                level:level_sel,
                bykkelas:bykkelas,
                namakelas:namakelas,
                jenis:"insert_kelasdb",
            },
            function(data){
                alert(data);
                resetformgen();
                $('#table1').DataTable().ajax.reload(); //reload ajax datatable 
            });
        });
    }
}

function hapus_kelas(idkelas,level,idperiode) {
    console.log(idkelas+" - " + level + " - " + idperiode);

    //delete
    $.post("../ajaxes/a_kelas.php",
    {
        idkelas:idkelas,
        jenis:"hapus_kelas",
    },
    function(data){
        console.log(data);
        $('#table1').DataTable().ajax.reload(); //reload ajax datatable 
        upd_kelas2(idperiode,level);
    });
    
}

function upd_kelas2(idperiode,level) {
    //generate ulang nama kelas 
    $.post("../ajaxes/a_kelas.php",
    {
        idperiode:idperiode,
        level:level,
        jenis:"upd_kelas2",
    },
    function(data){
        console.log(data);
        $('#table1').DataTable().ajax.reload(); //reload ajax datatable 
        
    });  
}

function atur_kelas(idkelas, table) {
        
    $.post("../ajaxes/a_kelas.php",
    {
        idkelas:idkelas,
        jenis:"get_detail_aturkelas",
    },
    function(data){
        $("#title_namakelas").html("Atur kelas " + data);
        $("#title_idkelas").val(idkelas);
        $("#title_table").val(table);
        $("#kuota").val(0);
        $('#table1').DataTable().ajax.reload(); //reload ajax datatable 
    });
    
}

function kuota_onchange(kuota) {
    console.log(kuota);
    if (kuota < 0) {
        $("#help_kuota").html("kuota tidak boleh kecil dari 0");
    }
    else if (kuota == 0) {
        $("#help_kuota").html("kuota belum terisi");
    }
    else if (kuota > 0){
        $("#help_kuota").html("");
    }
}

function resetmodal() {
    $("#title_idkelas").val("");
    $("#title_table").val("");
    $("#kuota").val("0");
    $("#all_dosen").val("-1");
    $("#pilihhari").val("-1");
    $("#all_ruang").val("-1");
    $("#update_warning").text("");

}
function updatekelasini() {
    var idkelas = $("#title_idkelas").val();
    var table = $("#title_table").val();
    var kuota =  $("#kuota").val();
    var dosen = $("#all_dosen").val();
    var hari = $("#pilihhari").val();
    var ruang = $("#all_ruang").val();
    console.log(kuota + " - " + $("#all_dosen").val());
    console.log(table);
    
    //pengecekan dosen terpilih atau tidak
    if (dosen == "-1" ) {
        $("#help_alldosen").html("Dosen ECC belum dipilih"); 
    }
    else if (dosen != "-1"){
        $("#help_alldosen").html("");
    }

    //pengecekkan hari terpilih atau tidak
    if (hari == "-1" ) {
        $("#help_pilihhari").html("Hari belum dipilih"); 
    }
    else if (hari != "-1"){
        $("#help_pilihhari").html("");
    }

    //pengecekkan ruang terpilih atau tidak
    if (ruang == "-1" ) {
        $("#help_allruang").html("Ruang belum dipilih"); 
    }
    else if (ruang != "-1"){
        $("#help_allruang").html("");
    }
    
    if (kuota <= 0) {
        $("#help_kuota").html("kuota tidak boleh kecil dari 1");
    }
    

    //jika semua terisi
    if (kuota > 0 && dosen != "-1" && hari != "-1" && ruang != "-1") {
          
        $("#help_kuota, #help_alldosen, #help_allruang, #help_pilihhari").html("");
       
        $.post("../ajaxes/a_kelas.php",
        {
            idkelas:idkelas,
            dosen : $("#all_dosen").val(),
            hari: $("#pilihhari").val(),
            ruang:$("#all_ruang").val(),
            jam_awal : $("#jamawal").val(),
            jam_akhir : $("#jamakhir").val(),
            kuota : $("#kuota").val(),
            jenis:"update_kelas",

        },
        function(data){
            console.log(data);
            if (data == "1") {
                $(table).DataTable().ajax.reload(); //reload ajax datatable 
                $("#update_warning").text("Success to change the class schedule").css("color","blue");
                
                
            }
            else if(data == "0"){
                $("#update_warning").text("Failed to change the class schedule").css("color","red");
            }
            
        });
    }
}

function close_btn() {
    resetmodal();
}

function aktifkan_allkelas() {
    var periode = $("#periode").val();
    $.post("../ajaxes/a_kelas.php",
    {
        idperiode:periode,
        jenis:"cek_dataterisi",

    },
    function(data){
        console.log(data["id_kelas"]);
        var cek=data["id_kelas"];

        if (cek != null) //ada yg belum terisi
        {
            alert("You can't activate all class! Make sure all class is filled")
        }
        else if (cek == null) //terisi semua
        {
            console.log("-+-");
            $.post("../ajaxes/a_kelas.php",
            {
                idperiode:periode,
                jenis:"aktifkan_allkelas",
            },
            function(data){
                alert(data);
                $('#table1').DataTable().ajax.reload(); //reload ajax datatable 
            });
        }
    });
}

function ubah_kelas(idkelas,table) {
    console.log("ubah kelas " + idkelas + " " + table);
    
    $.post("../ajaxes/a_kelas.php",
    {
        idkelas:idkelas,
        jenis:"get_detail_ubahkelas",
    },
    function(data){
        $("#title_namakelas").html(data["level_ecc"] + " - " + data["nama_kelas"]);
        $("#title_idkelas").val(idkelas);
        $("#title_table").val(table);
        $("#all_dosen").val(data["dosen"]);
        $("#all_ruang").val(data["id_ruangkelas"]);
        $("#pilihhari").val(data["hari"]);
        $("#jamawal").val(data["jam_awal"]);
        $("#jamakhir").val(data["jam_akhir"]);
        $("#kuota").val(data["kuota"]);
        $(table).DataTable().ajax.reload(); //reload ajax datatable 
        //$('#table_lihatkelas').DataTable().ajax.reload(); //reload ajax datatable 
    });
}

function lihat_mahasiswa(idkelas,kelas) {
 console.log("lihat mahasiswa");
 datatable_table_lihatmhs(idkelas);
 $("#namakelas").html(kelas);
}


function datatable_kelasnonaktif() {
    var periode = $("#periode").val();
    //datatable list barang
    var table= "";
    var groupColumn = 1;
    table = $('#table1').DataTable( 
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
                "url":"../datatables/admin-datatable/kelas-nonaktifdt.php",
                "type":"POST",
                "data":{"idperiode":periode},
            },
            "deferRender":true,
            "aLengthMenu":[[10,20,50],[10,20,50]], //combobox limit
            "columnDefs": [
                { "visible": false, "targets": groupColumn }
            ],
            "columns":[
            {"data":"id_kelas",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    return "#"+row.id_kelas;
                    
                }
            },
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
                        hari = "<label class='text-danger'> Not filled </label>";
                    }
                    if (jam_awal == null) {
                        jam_awal = "<label class='text-danger'> Not filled </label>";
                    }
                    if (ruang == null) {
                        ruang = "<label class='text-danger'> Not filled </label>";
                    }
                    else if (ruang !=0) {
                        ruang = row.nama_ruang;
                    }
                    if (kuota == 0) 
                    {
                        kuota = "<label class='text-danger'> Not filled </label>";
                    }
                    return "Day : " + hari + "<br> Time : " + jam_awal + "-" + jam_akhir + "<br> Room : " + ruang + "<br> Quota : " + kuota;

                   
                }
            },
            {"data":"dosen",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    if (row.dosen == '-') //kelas aktif
                    {
                        return "<p class='text-danger'> Not filled </p>";
                    }
                    else if (row.dosen != '-') //kelas tdk aktif
                    {
                        return row.nama;
                       
                    }
                    
                }
            },
            
            {"data":"dosen",
                "searchable": false,
                "orderable":false,
                "render": function (data, type, row) {  
                    var idkelas = row.id_kelas;
                    var level = row.level_ecc;
                    var idperiode = row.id_periode;
                    var table= "#table1";
                    var btn="";
                    if (row.dosen == "-") //
                    {
                        btn = "<button onclick=\"atur_kelas(\'"+idkelas+"\',\'"+table+"\')\" type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#exampleModal'>Set Class</button>";
                    }
                    else if (row.dosen != "-") //
                    {
                        btn = "<button onclick=\"ubah_kelas(\'"+idkelas+"\',\'"+table+"\')\" type='button' class='btn btn-default btn-sm' data-toggle='modal' data-target='#exampleModal'>Edit </button>";
                    }
                    return btn + " <button onclick=\"hapus_kelas(\'"+idkelas+"\',\'"+level+"\',\'"+idperiode+"\')\" type='button' class='btn btn-danger btn-sm' >Delete</button>";
                    
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
                        '<tr class="group"><td colspan="6">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    }) 
    //end of datatble list barang
}

//lihat kelas
function  btn_cari() {
    console.log("button cari");
    //cek kelas yang belum diaktifkan pada periode tsb
    $('#cardform3').show();
    datatable_kelasaktif();
}

function exportfile() {
    var periode = $("#periode_lihatkelas").val();
    window.location.href = "../custom_export/admin_export/lihat_kelas.php?periode="+periode+"";
}

function nonaktikfkan_kls(idkelas, table) {
    $.post("../ajaxes/a_kelas.php",
    {
        idkelas:idkelas,
        jenis:"nonaktifkan_kls",
    },
    function(data){
        alert(data);
        $(table).DataTable().ajax.reload(); //reload ajax datatable
        
    });
   // $('#table1').DataTable().ajax.reload(); //reload ajax datatable
}


function datatable_kelasaktif() {
    var periode = $("#periode_lihatkelas").val();
    //datatable list barang
    var table= "";
    var groupColumn = 1;
    table = $('#table_kelasaktif').DataTable( 
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
                "url":"../datatables/admin-datatable/kelas-aktifdt.php",
                "type":"POST",
                "data":{"idperiode":periode},
            },
            "deferRender":true,
            "aLengthMenu":[[10,20,50],[10,20,50]], //combobox limit
            "order": [[1, 'asc']],
            "columnDefs": [
                { "visible": false, "targets": groupColumn }
            ],
            "columns":[
            {"data":"id_kelas",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    return "#"+row.id_kelas;
                    
                }
            },
            {"data":"level_ecc"},
            {"data":"nama_kelas",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    return row.level_ecc + "/" + row.nama_kelas;
                    
                }},
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
                        hari = "<label class='text-danger'> Not Filled </label>";
                    }
                    if (jam_awal == null) {
                        jam_awal = "<label class='text-danger'> Not Filled </label>";
                    }
                    if (ruang == null) {
                        ruang = "<label class='text-danger'> Not Filled </label>";
                    }
                    else if (ruang !=0) {
                        ruang = row.nama_ruang;
                    }
                    if (kuota == 0) 
                    {
                        kuota = "<label class='text-danger'> Not Filled </label>";
                    }
                    return "Day : " + hari + "<br> Time : " + jam_awal + "-" + jam_akhir + "<br> Room : " + ruang + "<br> Quota : " + kuota;

                   
                }
            },
            {"data":"dosen",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    if (row.dosen == '-') //kelas aktif
                    {
                        return "<p class='text-danger'> Not Filled </p>";
                    }
                    else if (row.dosen != '-') //kelas tdk aktif
                    {
                        return row.nama;
                       
                    }
                    
                }
            },
            {"data":"status_kelas",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    var idkelas = row.id_kelas;
                    var kelas = row.level_ecc + "/" + row.nama_kelas;
                    var table = "#table_kelasaktif";

                    return "<button onclick=\"ubah_kelas(\'"+idkelas+"\',\'"+table+"\')\" type='button' class='btn btn-default btn-sm' data-toggle='modal' data-target='#exampleModal'>Edit </button>" + " <button onclick=\"lihat_mahasiswa(\'"+idkelas+"\',\'"+kelas+"\')\" type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#modal_lihatmhs'>Student List </button>" + " <button onclick=\"nonaktikfkan_kls(\'"+idkelas+"\',\'"+table+"\')\" type='button' class='btn btn-danger btn-sm' >Non Active</button>";
                    
                    
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
                        '<tr class="group"><td colspan="6">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    }) 
    //end of datatble list barang
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
            {"data":"id_klsmhs"},
            {"data":"nrp"},
            {"data":"nama_mhs"},
            ],
            
    }) 
    //end of datatble list barang
}


</script>

