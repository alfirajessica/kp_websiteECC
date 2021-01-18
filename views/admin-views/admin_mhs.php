<div class="card shadow"> <!-- card shadow -->
    <div class="card-header border-1 bg-dark text-white">
        <div class="nav-wrapper">
            <!-- tabs -->
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Atur Perwalian ECC</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Lihat Data Perwalian ECC</a>
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
    
                <!-- form atur mahasiswa -->
                <form role="form">

                    <div class="form-group">
                        <label for="">Periode Perwalian</label>
                        <div class="input-group mb-3">
                        <select name="select" id="periode" class="form-control"  aria-describedby="help_pilihperiode">                                  
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" id="btn_simpanperiode" onclick="simpan_periode()" ><i class="menu-icon fa fa-search"></i> Cari</button>
                        </div>
                        </div>
                        <small id="help_pilihperiode" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                        <label> Gunakan template ini untuk mengimport data hasil perwalian </label>
                        <button type="button" class="btn btn-success text-light" onclick="window.location.href='../custom_export/Perwalian_ecc.xlsx'" target="_blank">Download Templete</button>
                    </div>
                    
                    <div class="card" id="cardform1" style="display:none">
                        <div class="card-body">
                            <div class="default-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">Masukkan data manual</a>
                                            <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Import File</a>
                                            
                                        </div>
                                    </nav>
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                        <form>
                                            
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label text-right">NRP</label>
                                                    <div class="col-sm-10">
                                                    <input type="number" id="addnrp" class="form-control" placeholder="Masukkan NRP mahasiswa" aria-describedby="help_nrp">
                                                    <small id="help_nrp" class="form-text text-muted"></small>
                                                    </div>
                                            </div>
                
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label text-right">Nama</label>
                                                    <div class="col-sm-10">
                                                    <input type="text" id="addnama" class="form-control" placeholder="Masukkan nama mahasiswa" aria-describedby="help_nama">
                                                    <small id="help_nama" class="form-text text-muted"></small>
                                                    </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label text-right">Pilih Level</label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control" name="" onchange="lvlchange2()" id="level_manual" aria-describedby="helpId" placeholder="">
                                
                                                        </select>
                                                        <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                                                    </div>

                                                    <label for="staticEmail" class="col-sm-2 col-form-label text-right">Pilih Kelas/Hari</label>
                                                    <div class="col-sm-4">
                                                    <select class="form-control" name="" id="kelas_manual" aria-describedby="helpId" placeholder="">
                                                            
                                                        </select>
                                                        <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                                                    </div>
                                            </div>
                                                                                    
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary btn-block" onclick="addtempmahasiswa()">Masukkan Mahasiswa Ini</button>
                                            </div>
                                        </form>    
                                        
                                        </div>
                                        <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                        <form>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-2 col-form-label text-right">File</label>
                                                <div class="custom-file col-sm-10"> 
                                                <input type="file" class="custom-file-input form-control" name="uploadfile" id="file1">
                                                <label class="custom-file-label" id="lbl_file1">Pilih file ...</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="button" href="#table_tempmhs" onclick="importfileada()" id="btnimportada" value="Import File" class="btn btn-primary form-control">
                                                <input aria-describedby="help_file" type="button" href="#table_tempmhs"  onclick="importfilenone()" id="btnimportnone" value="Import File" class="btn btn-primary form-control">
                                                <small id="help_file"></small>
                                            </div>
                                        </form>
                                        </div>
                                    </div>

                                </div>  
                        </div>
                </div>

                </form>
                <!-- end of form atur mahasiswa -->

                <div class="card" id="cardform2" style="display:none">
                    
                    <div class="card-body">
                    
                    <div class="form-group">
                        <label for="">Filter berdasarkan Level</label>
                            <select class="form-control" name="" onchange="lvlchange()" id="filter1_level" aria-describedby="helpId" placeholder="">
                                <!-- <option>ECC Level 1 - Kelas A</option>
                        <option>ECC Level 1 - Kelas B</option> -->
                            </select>
                    </div>

                    <div class="form-group text-right">
                        <button class="btn btn-outline-primary" type="button" onclick="simpan_importmhs()">Simpan Perwalian ECC</button>
                    </div>
        
                    <div class="table-responsive">
                        <table id="table_pwecc" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#Nrp</th>
                                    <th>Nama</th>
                                    <th>Level</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Ruang</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- end of tabel kelas yang tergenerate -->
                    </div>
                </div>

            </div>
            <!-- end of atur kelas -->

            <!-- lihat perwalian ecc -->
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                <div class="form-group">
                    <label for="">Periode</label>
                    <div class="input-group mb-3">
                        <select name="select" id="periode_lihatkelas"  class="form-control" aria-describedby="help_pilihperiode">                                  
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" onclick="btn_cariperiode()"><i class="menu-icon fa fa-search"></i> Cari</button>
                        </div>
                    </div>
                </div>

                <div class="card" id="cardform3" style="display:none">
                    <div class="card-body">
                        <div class="form-group">
                            <button type="button" class="btn btn-success text-light" onclick="exportfile()">Cetak Perwalian</button>
                        </div>
                        <div class="form-group">
                            <label for="">Filter berdasarkan Level</label>
                                <select class="form-control" name="" onchange="lvlchange()" id="filter2_level" aria-describedby="helpId" placeholder="">
                                    
                                </select>
                        </div>

                        <div class="table-responsive">
                            <table id="table_klsmhs" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th style="display:none">Id</th>
                                        <th>#Nrp</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Level/Kelas</th>
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

                
            </div> <!-- end of lihat kelas -->
        </div> <!-- end of tab content -->
    </div> <!--end of card body -->
</div> <!--end of card shadow -->

<!-- Modal atur pindah kelas  -->
<div class="modal fade" id="modal_pindahkelas_level" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="title_namakelas"></h5>
            <h6 id="title_idkelas"></h6>
            <h6 id="title_table" ></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="close_btn()">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form role="form">
                    <label id="statustable" style="display:none" ></label>
                    <label id="idklsmhs" style="display:none"></label>
                    <table class="table table-borderless table-md text-right">
                        <tbody>
                            <tr>
                                <td scope="row">NRP : </td>
                                <td class="text-left" id="crnrp"></td>
                            </tr>
                            <tr>
                                <td scope="row">Nama Mahasiswa : </td>
                                <td class="text-left" id="crnama"></td>
                            </tr>
                            <tr>
                                <td scope="row">Level : </td>
                                <td>
                                <select name="select" onchange="lvlchange2()" id="level_modalubah" class="form-control"  aria-describedby="help_pilihperiode">                                  
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">Kelas/Hari/Ruang/Jam : </td>
                                <td>
                                <select name="select" id="levelkls_select" class="form-control"  aria-describedby="help_pilihperiode">                                  
                                </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
          </div>
          <div class="modal-footer">
            <label id="update_warning"> </label>
            <button id="btn_updatekelas" type="button" class="btn btn-primary" onclick="updateini()" >Simpan</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end of Modal atur pindah kelas  -->

<script>
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
        $('#cardform1, #cardform2, #formaturstandard').show();
        //$("#cardform3").show();
        datatable_tempkelas_mhs();
        isilevel(periode);
        
    }
    
}

//---------- filter berdasarkan level-------------//
function isilevel(periode) {
    $.post("../ajaxes/a_kelas.php", {
            jenis: "get_level_perwalian",
            periode:periode,
    },
    function(data) {
        console.log(data);
        $("#level_manual, #level_modalubah").html(data);
        
    });

    $.post("../ajaxes/a_kelas.php", {
            jenis: "get_level_placement",
            periode:periode,
    },
    function(data) {
        $("#filter1_level, #filter2_level").html(data);
        datatable_tempkelas_mhs();
        datatable_table_klsmhs();
    });
}

function lvlchange2(){
    var level_manual = $("#level_manual").val();
    var periode = $("#periode").val();
    //isikelas
    $.post("../ajaxes/a_klsmhs.php", {
        jenis: "get_kelas_perwalian_manual",
        periode:periode,
        level_manual:level_manual,
    },
    function(data) {
        console.log(data);
        $("#kelas_manual").html(data);
        
    });

    var id_klsmhs = $("#level_modalubah").text();

    //var level_modalubah = $("#level_modalubah").val();
    //fill the ecc level class/day/room/time
    $.post("../ajaxes/a_klsmhs.php",
    {
        jenis:"get_levelkls_mhs", 
       // level:level_modalubah,
        id_klsmhs :id_klsmhs,
        
    },
    function(data){
        $("#levelkls_select").html(data);
    });
}

function lvlchange(){
    datatable_tempkelas_mhs();
    datatable_table_klsmhs();
}

//----------end of filter berdasarkan level-------------//

function addtempmahasiswa() {
    var periode = $("#periode").val();
    var nrp = $("#addnrp").val();
    var nama = $("#addnama").val();
    var idkls = $("#kelas_manual").val();

    $.post("../ajaxes/a_klsmhs.php", {
        jenis: "addtempmhs",
        periode:periode,
        nrp:nrp,
        nama:nama,
        idkelas:idkls,
    },
    function(data) {
        alert(data);
        datatable_tempkelas_mhs();
        
    });

    
}


function cekfileimport() {
        $.post(
            "../ajaxes/a_placement.php", {
                jenis: "cekdata"
            },
            function(data) {
                // alert(data);
                if (data == "ada") {
                    $("#btnimportnone").css("display", "none");
                    $("#btnimpotada").css("display", "block");
                } else {
                    $("#btnimportnone").css("display", "block");
                    $("#btnimportada").css("display", "none");
                }
            }
        );
    }


function importfileada() {
    var periode = $("#periode").val();
    var fd = new FormData();
    var files = $('#file1')[0].files[0];
    fd.append('file', files);
    fd.append("idperiode",periode);
    if (files != undefined) {
        var arr =
            $.ajax({
                url: '../ajaxes/pwecc_upload.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.includes("success")) {
                        alert("Berhasil import file!");
                        $("#lbl_file1").html("Pilih File ...");
                        $('#table_pwecc').DataTable().ajax.reload(); //reload ajax datatable 
                        window.location.href="#table_pwecc";
                        console.log(response);
                        

                    } else {
                        console.log(response);
                        //alert(response);
                    }
                },
            });

    } else {
        $("#help_file").text("Pastikan telah memilih file!").css("color","red");
    }
    //updatelevel();
}

function importfilenone() {
    var periode = $("#periode").val();
    var fd = new FormData();
    var files = $('#file1')[0].files[0];
    fd.append('file', files);
    fd.append("idperiode",periode);
    if (files != undefined) {
    var arr =
        $.ajax({
            url: '../ajaxes/pwecc_upload.php',
            type: 'post',
            data:fd,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.includes("success")) {
                    $("#btnimport").css("display", "none");
                    $("#import").css("display", "block");

                    $("#btnimportnone").css("display", "none");
                    $("#btnimportada").css("display", "block");

                    alert("Berhasil Import file ");
                    $("#lbl_file1").html("Pilih File ...");
                    $('#table_pwecc').DataTable().ajax.reload(); //reload ajax datatable 
                    window.location.href="#table_pwecc";
                   // console.log(response);
                    

                } else {
                    console.log(response);
                }
            },
        }); 
    } else { $("#help_file").text("Pastikan telah memilih file!").css("color","red"); }
    //updatelevel();
}

function datatable_tempkelas_mhs() {
    var periode = $("#periode").val();
    var level = $("#filter1_level").val();
    var table= "";
    table = $('#table_pwecc').DataTable( 
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
                "url":"../datatables/admin-datatable/mahasiswa-mhskls.php",
                "type":"POST",
                "data":{"periode":periode, "level":level},
            },
            "deferRender":true,
            "aLengthMenu":[[10,20,50],[10,20,50]], //combobox limit
            "columns":[
            
            {"data":"nrp"},
            {"data":"nama_mhs"},
            {"data":"level_ecc",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    return "Level "+row.level_ecc;
                }
            },
            {"data":"hari"},
            {"data":"jam_mulai",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    if (row.jam_mulai == '06:30' || row.jam_mulai == '06.30') //kelas aktif
                    {
                        return "06:30 - 08:00";
                    }
                    else if (row.jam_mulai == '15:30' || row.jam_mulai == '06.30') //kelas aktif
                    {
                        return "15:30 - 17:00";
                    }
                }
            },
            {"data":"ruang_kode"},
            ],
        
            
    }) 
    //end of datatble list barang
}

function jmdatakembarpt() {
    var periode = $("#periode").val();
    $.post(
        "../ajaxes/a_klsmhs.php", {
            jenis: "jmdatakembarpt",
            idperiode:periode,
        },
        function(data) {
            // console.log(data);
            // $("#jmdatakembarpt").text(data);
            $('#table_klsmhs').DataTable().ajax.reload(); //reload ajax datatable 
        }
    );
}


function simpan_importmhs() {
    var periode = $("#periode").val();
    $.post("../ajaxes/a_klsmhs.php",
    {
        idperiode:periode,
        jenis:"cek_dataditable_mahasiswa",

    },
    function(data){
        alert(data);
        $('#table_pwecc').DataTable().ajax.reload(); //reload ajax datatable 
        //jmdatakembarpt();
    });
}

//lihat mahasiswa dan kelasnya
function btn_cariperiode() {
    console.log("button cari");
    var periode = $("#periode_lihatkelas").val();
    $("#cardform3").show();
    console.log(periode);
    if (periode == "-1") {
        $("#help_pilihperiode2").text("Make sure you have selected the period");
    }
    else{
        $("#help_pilihperiode2").text("");
        isilevel(periode);
        //datatable_table_klsmhs();
        
    }
}

function format ( d ) {
        // `d` is the original data object for the row
        var jenis_kelamin = "";
        var btn="";
        var ket1 = "pindahkelas";
        var ket2 = "pindahlevel";
        var status = d.status_klsmhs;
        var kembar = d.status_kembar;
        if (status == 1) {
            status = "Aktif";
            if (kembar == 1) {
                btn = '<td>'+   
                '<small>**Silakan hapus mahasiswa ini karena data sebelumnya sudah ada</small><br>' +
                '</td>';  //gak kepakai
            }
            else{
                btn = '<td>'+ 
                    '<button onclick="load(\'' + d.id_klsmhs + '\',\'' + ket1 + '\')" type="submit" class="btn btn-warning btn-md" data-toggle="modal" data-target="#modal_pindahkelas_level">Ubah </button> <br>' + 
                    '<small>*Gunakan tombol "Ubah" untuk pindah kelas </small><br>'+
                '</td>';
            }
        }
        else{
            status = "Tidak Aktif";
        }
        
            $tampil = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px; width:100%;">'+
            
            '<tr>'+
                '<td>Level/Kelas</td>'+
                '<td>'+d.level_ecc + '/' + d.nama_kelas +'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Hari/Jam/Ruang</td>'+
                '<td>'+d.hari + '/ ' + d.jam_awal + '-' + d.jam_akhir + '/ ' + d.nama_ruang +'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Status</td>'+
                '<td> <label>' + status+' </label> </td>' +
            '</tr>'+
            '<tr>'+
                '<td></td>'+
                btn +
            
            '</tr>'+
        '</table>';
        
        return $tampil;
    }


function datatable_table_klsmhs() {
    //jmdatakembarpt();
    var periode = $("#periode_lihatkelas").val();
    var level = $("#filter2_level").val();
    var table= "";
    var groupColumn = 4;
    table = $('#table_klsmhs').DataTable( 
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
            "deferRender":true,
            "aLengthMenu":[[10,20,50],[10,20,50]], //combobox limit
            "order": [[3, 'asc']],
            "ajax":{
                "url":"../datatables/admin-datatable/mahasiswa-listmhs.php",
                "type":"POST",
                "data":{"periode":periode, "level":level},
            },
            "columns":[
            {
                "class":          "details-control",
                "orderable":      false,
                "data":           null,
                "defaultContent": ""
            },
            {"data":"id_klsmhs",
                "visible": false,
                "render": function (data, type, row) {  
                    var id = row.id_klsmhs;
                    
                    return "#"+row.id_klsmhs;
                }
            },
            {"data":"nrp"},
            {"data":"nama_mhs"
            },

            {"data":"level_ecc",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    
                    return row.level_ecc + "/" + row.nama_kelas;
                    
                }
            },
            {"data":"status_klsmhs",
                "render": function (data, type, row) { 
                    var idklsmhs = row.id_klsmhs; 
                    var table = "#table_klsmhs";
                    var status = row.status_klsmhs;
                    
                    var btn="";
                    //var btn1="";
                    //var btnubah = "<button onclick=\"ubah_kelas(\'"+idklsmhs+"\',\'"+table+"\')\" type='button' class='btn btn-default btn-sm' data-toggle='modal' data-target='#exampleModal'>Ubah</button>";
                    if (status == 1) //status aktif
                    {
                        btn = "<button onclick=\"nonaktikfkan_klsmhs(\'"+idklsmhs+"\',\'"+table+"\')\" type='button' class='btn btn-danger btn-sm' >Nonaktifkan</button>";

                        if (row.status_kembar == 1) {
                        btn = "<button onclick=\"hapus_klsmhs(\'"+idklsmhs+"\',\'"+row.nrp+"\',\'"+row.id_nilai+"\')\" type='button' class='btn btn-danger btn-sm' >Hapus</button>";
                        }
                    }
                    else if (status == 0) //status nonaktif
                    {
                        btn = "<button onclick=\"aktikfkan_klsmhs(\'"+idklsmhs+"\',\'"+table+"\')\" type='button' class='btn btn-danger btn-sm' >Aktifkan</button>";
                    }
                    
                    return btn;
                    
                }
            },
            
            ],
            
            "rowCallback": function( row, data, index ) {
                if ( data.status_kembar == "1" )
                {
                    $('td', row).css('background-color', '#f0aaaa');
                }
            }
            
    });

    // Array to track the ids of the details displayed rows
    var detailRows = [];
    var dt = $('#table_klsmhs').DataTable();
    $('#table_klsmhs tbody').on( 'click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );
 
        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();
 
            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();
 
            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );

    // On each draw, loop over the `detailRows` array and show any child rows
    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );

    
    //end of datatble list barang
}

    //end of function detail di list customer

    function nonaktikfkan_klsmhs(idklsmhs,table) {
        $.post("../ajaxes/a_klsmhs.php",
        {
            idklsmhs:idklsmhs,
            jenis:"nonaktifkan_klsmhs",
        },
        function(data){
            alert(data);
            $(table).DataTable().ajax.reload(); //reload ajax datatable
            
        });
    }

    function aktikfkan_klsmhs(idklsmhs,table) {
        $.post("../ajaxes/a_klsmhs.php",
        {
            idklsmhs:idklsmhs,
            jenis:"aktifkan_klsmhs",
        },
        function(data){
            alert(data);
            $(table).DataTable().ajax.reload(); //reload ajax datatable
            
        });
    }

    function load(id_klsmhs,ket) {
        console.log(ket);
        $("#idklsmhs").text(id_klsmhs);

        //fill the ecc level class
        $.post("../ajaxes/a_klsmhs.php",
        {
            jenis:"get_levelkls_mhs", 
            id_klsmhs :id_klsmhs,
            
        },
        function(data){
            $("#levelkls_select").html(data);
        });

        //fill the data of the mahasiswa
        $.post("../ajaxes/a_klsmhs.php",
        {
            jenis:"cek_datamodal_untuknama", 
            id_klsmhs :id_klsmhs,
        },
        function(data){
            console.log(data["nama_mhs"]);
            $("#crnrp").html(data["nrp"]);
            $("#crnama").html(data["nama_mhs"]);
            
            //going to select his/her class in combobox
            $.post("../ajaxes/a_klsmhs.php",
            {
                jenis:"cek_datamodal_untukkelas", 
                id_klsmhs :id_klsmhs,
            },
            function(data){
                $("#level_modalubah").val(data["level_ecc"]);
                
                $("#levelkls_select").val(data["id_kelas"]);
            });
        });
    }

    function hapus_klsmhs(idklsmhs,nrp,id_nilai) {
        var periode = $("#periode_lihatkelas").val();
        $.post("../ajaxes/a_klsmhs.php",
        {
            jenis:"hapus_klsmhskembar", 
            id_klsmhs :idklsmhs,
            nrp:nrp,
            id_nilai:id_nilai,
            id_periode:periode,
        },
        function(data){
            console.log(data);
            $("#table_klsmhs").DataTable().ajax.reload(); //reload ajax datatable
        });
    }

    

    function updateini() {
        var idklsmhs = $("#idklsmhs").text();
        var nrp = $("#crnrp").val();
        var kelassel = $("#levelkls_select").val();
        

        $.post("../ajaxes/a_klsmhs.php",
        {
            jenis:"update_btnpindah", 
            idklsmhs:idklsmhs,
            kelassel:kelassel,
            nrp:nrp,
        },
        function(data){
            //var text = "Berhasil pindah ke "
            $("#update_warning").text("Berhasil menyimpan").css("color","blue");
            $("#table_klsmhs").DataTable().ajax.reload(); //reload ajax datatable
        });

    }

    function resetmodal() {
    $("#update_warning").text("");
}
function close_btn() {
    resetmodal();
}

function exportfile() {
    var periode = $("#periode_lihatkelas").val();
    window.location.href = "../custom_export/admin_export/cetak_perwalian.php?periode="+periode+"";
}




</script>