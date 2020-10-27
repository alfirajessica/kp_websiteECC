<div class="card shadow"> <!-- card shadow -->
    <div class="card-header border-1">
        <div class="nav-wrapper">
            <!-- tabs -->
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Atur Kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Lihat Kelas</a>
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
    
                <!-- form tambah kelas -->
                <form role="form">

                    <div class="form-group">
                        <label for="">Periode</label>
                        <div class="input-group mb-3">
                        <select name="select" id="periode" class="form-control"  aria-describedby="help_pilihperiode">                                  
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" id="btn_simpanperiode" onclick="simpan_periode()" >Simpan</button>
                        </div>
                        </div>
                        <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>
                    
                    

                    <div class="form-group">
                        <label for="">Level</label>
                        <select disabled class="form-control" id="leveldipilih" aria-describedby="helpId" placeholder="" >
                        <option value="-1">pilih level</option>
                        <option>Level 1</option>
                        <option>Level 2</option>
                        <option>Level 3</option>
                        <option>Level 4</option>
                        </select>
                        <small id="help_level" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="form-group">
                    <label for="">Banyak Kelas akan dibuka</label>
                        <div class="input-group mb-3">
                        <select disabled class="form-control" id="banyakkelas" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <option value="0">0</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <div class="input-group-append">
                            <button disabled class="btn btn-outline-primary" type="button" id="btn_generate" onclick="generate()" >Generate kelas</button>
                        </div>
                        </div>
                        <small id="help_bykkelas" class="form-text text-muted">Help text</small>
                    </div>

                </form>
                <!-- end of form tambah kelas -->

                <div class="form-group text-right">
                    <button class="btn btn-outline-primary" type="button" onclick="aktifkan_allkelas()">Aktifkan semua kelas</button>
                </div>
        
                <div class="table-responsive">
                    <table id="table1" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Level</th>
                                <th>Kelas</th>
                                <th>Jadwal</th>
                                <th>Dosen</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- end of tabel kelas yang tergenerate -->

            </div>
            <!-- end of atur kelas -->

            <!-- lihat kelas -->
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                <div class="form-group">
                    <label for="">Pilih Periode</label>
                    <div class="input-group mb-3">
                        <select name="select" id="periode_all"  class="form-control" aria-describedby="help_pilihperiode">                                  
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" id="button-addon2">Cari</button>
                        </div>
                    </div>
                    <small id="helpId" class="form-text text-muted">Help text</small>

                    
                </div>

                <div class="table-responsive">
                    <table id="table_lihatkelas" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Nama Kelas</th>
                                <th>Dosen/Jam/Hari</th>
                                <th>Mahasiswa Terdaftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

                
            </div> <!-- end of lihat kelas -->
        </div> <!-- end of tab content -->
    </div> <!--end of card body -->
</div> <!--end of card shadow -->

<!-- Modal atur dosen/jam/kuota kelas ecc  -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="title_namakelas"></h5>
            <h6  id="title_idkelas"></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form role="form">
                <table class="table table-borderless table-md text-right">
                    <tbody>
                        <tr>
                            <td scope="row">Pilih Dosen : </td>
                            <td class="text-left">
                              <select class="form-control" name="" id="all_dosen" aria-describedby="help_alldosen">
                              
                              </select>
                              <small id="help_alldosen" class="form-text text-muted"></small>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Pilih Hari : </td>
                            <td class="text-left">
                            <select class="form-control" name="" id="pilihhari" aria-describedby="help_pilihhari" placeholder="">
                                <option value="-1">pilih hari</option>
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
                            <td scope="row">Pilih Ruang : </td>
                            <td class="text-left">
                              <select class="form-control" name="" id="all_ruang" aria-describedby="help_allruang">
                              
                              </select>
                              <small id="help_allruang" class="form-text text-muted"></small>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Jam Awal : </td>
                            <td class="text-left">
                            <input class="form-control" type="time" value="06:30" id="jamawal">
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Jam Akhir : </td>
                            <td class="text-left">
                            <input class="form-control" type="time" value="08:00" id="jamakhir">
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Kuota : </td>
                            <td class="text-left">
                                <input type="number" class="form-control-sm" name="" id="kuota" aria-describedby="help_kuota" placeholder=""> 
                                <small id="help_kuota" class="form-text text-muted"></small>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </form>
            
          </div>
          <div class="modal-footer">
            <button id="btn_updatekelas" type="button" class="btn btn-primary" onclick="updatekelasini()" >Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end of Modal atur dosen/jam/kuota kelas ecc  -->

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
    //cek kelas yang belum diaktifkan pada periode tsb
    datatable_kelasnonaktif();

    //disabled button simpan dan select periode
    $("#btn_simpanperiode").prop('disabled', true);
    $("#periode").prop('disabled', true);
    
    //enabled level dan generate
    $("#leveldipilih").prop('disabled', false);
    $("#banyakkelas").prop('disabled', false);
    $("#btn_generate").prop('disabled', false);
}

function generate() {
    var periode = $("#periode").val();
    var bykkelas = $("#banyakkelas").val();
    var level_sel = $("#leveldipilih").val();

    //cek apakah level telah dipilih dan byk kelasnya
    if (level_sel == "-1") {
        $("#help_level").text("level belum dipilih");
        
    }
    else if (bykkelas == "0"){
        $("#help_bykkelas").text("banyak kelas belum dipilih");
    }
    else if(level_sel != "-1" && bykkelas != "0")
    {
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
                console.log(data);
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

function atur_kelas(idkelas) {
        
    $.post("../ajaxes/a_kelas.php",
    {
        idkelas:idkelas,
        jenis:"get_detail_aturkelas",
    },
    function(data){
        $("#title_namakelas").html("Atur kelas " + data);
        $("#title_idkelas").val(idkelas);
        $("#kuota").val(0);
        $('#table1').DataTable().ajax.reload(); //reload ajax datatable 
    });
    
}

function updatekelasini() {
    var idkelas = $("#title_idkelas").val();
    var kuota =  $("#kuota").val();
    var dosen = $("#all_dosen").val();
    var hari = $("#pilihhari").val();
    var ruang = $("#all_ruang").val();
    console.log(kuota + " - " + $("#all_dosen").val());
    
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
    
    //pengecekkan kuota terisi atau tidak
    if (kuota == 0) {
        $("#help_kuota").html("kuota belum terisi");
    }
    else if (kuota != 0){
        $("#help_kuota").html("");
    }

    //jika semua terisi
    if (kuota != 0 && dosen != "-1" && hari != "-1" && ruang != "-1") {
          
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
            $('#table1').DataTable().ajax.reload(); //reload ajax datatable 
            $("#btn_updatekelas").attr("data-dismiss", "modal"); 
        });
        
    
        
    }
    
}

/*function get_nama_dosen(dosen_) {
        console.log(dosen_);
        $.post("../ajaxes/a_kelas.php",
        {
            username:dosen_,
           // idkelas:idkelas_,
            jenis:"get_nama_dosen",

        },
        function(data){
            console.log(data);
            dosen_ = data;
           //get_nama_dosen(dosen_);
            $('#table1').DataTable({
                data:dosen_
            });
        });
}*/

function aktifkan_allkelas() {
    var periode = $("#periode").val();
    $.post("../ajaxes/a_kelas.php",
        {
            idperiode:periode,
            jenis:"aktifkan_allkelas",

        },
        function(data){
            console.log(data);
            
        });
}




function datatable_kelasnonaktif() {
    var periode = $("#periode").val();
    //datatable list barang
    var table= "";
    table = $('#table1').DataTable( 
    {
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
                "url":"../datatables/admin-datatable/kelas_nonaktifdt.php",
                "type":"POST",
                "data":{"idperiode":periode},
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
            {"data":"dosen",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    if (row.dosen == '-') //kelas aktif
                    {
                        return "<p class='text-danger'> Belum terisi </p>";
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
                    if (row.status_kelas == '1') //kelas aktif
                    {
                        return "Aktif";
                    }
                    else if (row.status_kelas == '0') //kelas tdk aktif
                    {
                        return "Belum Aktif";
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
                    if (row.dosen == "-") //kelas aktif
                    {
                        return "<button onclick=\"atur_kelas(\'"+idkelas+"\')\" type='button' class='btn btn-default btn-sm' data-toggle='modal' data-target='#exampleModal'>Atur Jadwal</button>" + "<button onclick=\"hapus_kelas(\'"+idkelas+"\',\'"+level+"\',\'"+idperiode+"\')\" type='button' class='btn btn-danger btn-sm' >Hapus</button>";
                    }
                    else if (row.dosen != "-") //kelas tdk aktif
                    {
                        return "<button onclick=\"ubah_kelas(\'"+idkelas+"\')\" type='button' class='btn btn-default btn-sm' data-toggle='modal' data-target='#exampleModal'>Ubah Jadwal</button>" + "<button onclick=\"hapus_kelas(\'"+idkelas+"\',\'"+level+"\',\'"+idperiode+"\')\" type='button' class='btn btn-danger btn-sm' >Hapus</button>";
                    }
                    
                }
            },

            ],
    }) 
    //end of datatble list barang
}

</script>