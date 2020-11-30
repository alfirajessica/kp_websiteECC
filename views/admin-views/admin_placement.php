<div class="card shadow"> <!-- card shadow -->
    <div class="card-header border-1">
        <div class="nav-wrapper">
            <!-- tabs -->
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Atur Placement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Lihat Hasil Placement</a>
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
                    <label for="">Periode</label>
                    <div class="input-group mb-3">
                        <select name="select" id="periode" class="form-control"  aria-describedby="help_pilihperiode"></select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" id="btn_simpanperiode" onclick="simpan_periode()" >Simpan</button>
                        </div>
                    </div>
                    <label id="help_pilihperiode" style="color:red;"></label>
                </div>
                    
                <!-- <div class="form-group">
                    <a style="color:blue; display:none;" data-toggle="modal" data-target="#modallevelnone" id="formaturstandard"> + Atur Standar nilai Periode ini </a>
                </div> -->
                    
                <div class="form-group">
                    <label> Silakan gunakan template ini sebelum melakukan import </label>
                    <button type="button" class="btn btn-success text-light" onclick="window.location.href='../custom_export/nilaitest.xlsx'" target="_blank">Download Templete</button>
                </div>

                <div class="card" id="cardform1" style="display:none">
                    <div class="card-header">
                        <form>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label text-right">Pilih file</label>
                                <div class="custom-file col-sm-10"> 
                                    <input type="file" class="custom-file-input form-control" name="uploadfile" id="file1">
                                    <label class="custom-file-label" id="lbl_file1">Pilih file ...</label>
                                </div>
                            </div>
                                
                            <div class="form-group">
                                <input type="button" href="#table_tempmhs" onclick="importfileada()" id="btnimportada" value="*Import File Excel" class="btn btn-primary form-control">
                                <input aria-describedby="help_file" type="button" href="#table_tempmhs"  onclick="importfilenone()" id="btnimportnone" value="*Import File Excel" class="btn btn-primary form-control">
                                <small id="help_file" class="text-muted"></small>
                            </div>
                            <hr>
                                
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label text-right">NRP</label>
                                    <div class="col-sm-10">
                                    <input type="number" id="addnrp" class="form-control" placeholder="Masukan Nrp" aria-describedby="help_nrp">
                                    <small id="help_nrp" class="form-text text-muted"></small>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label text-right">Nama</label>
                                    <div class="col-sm-10">
                                    <input type="text" id="addnama" class="form-control" placeholder="Masukan Nama" aria-describedby="help_nama">
                                    <small id="help_nama" class="form-text text-muted"></small>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label text-right">Nilai</label>
                                    <div class="col-sm-10">
                                    <input type="number" id="addnilai" class="form-control" placeholder="Masukan Nilai placement" aria-describedby="help_nilai">
                                    <small id="help_nilai" class="form-text text-muted"></small>
                                    </div>
                            </div>
                            <div class="form-group row"> <!-- form group row radio -->
                                <label for="staticEmail" class="col-sm-2 col-form-label text-right"></label>
                                
                                <div class="col-sm-10" id="radio1">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="radio_level1" value="1" name="customRadioInline1" class="custom-control-input">
                                        <label class="custom-control-label" for="radio_level1">Level 1</label>
                                    </div>
                                        
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="radio_level2" value="2" name="customRadioInline1" class="custom-control-input">
                                        <label class="custom-control-label" for="radio_level2">Level 2</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="radio_level3" value="3" name="customRadioInline1" class="custom-control-input">
                                        <label class="custom-control-label" for="radio_level3">Level 3</label>
                                    </div>
                                        
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="radio_level4" value="4" name="customRadioInline1" class="custom-control-input">
                                        <label class="custom-control-label" for="radio_level4">Level 4</label>
                                    </div>

                                    <label style="color:red;" id="labelwarning1"></label>
                                </div>
                                    
                            </div> <!-- end of form group row radio -->
                            <div class="form-group">
                                <button type="button" class="btn btn-primary btn-block" onclick="addtempmahasiswa()">Masukkan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card" id="cardform2" style="display:none">
                    <div class="card-body">
                        
                        <div class="form-group text-right">
                            <button type="button" class="btn btn-primary text-light" onclick="tempatkanmhs()">*Tempatkan  Mahasiswa</button>
                        </div>

                        <div class="table-responsive">
                            <table id="table_tempmhs" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#NRP</th>
                                    <th>Nama</th>
                                    <th>Nilai</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
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
                    <label for="">Pilih Periode</label>
                    <div class="input-group mb-3">
                        <select name="select" id="periode_lihatkelas"  class="form-control" > </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" onclick="btn_cariperiode()">Cari</button>
                        </div>
                    </div>
                    <label id="help_pilihperiode2" style="color:red;"></label>
                    
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-success text-light" onclick="exportfile()">Export</button>
                </div>
     
                <div class="table-responsive">
                    <table id="table_mhspt" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <tr>
                                <th>#NRP</th>
                                <th>Nama</th>
                                <th>Nilai</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </tr>
                        </thead>
                        <tbody> </tbody>
                    </table>
                </div>
                <!-- end of tabel kelas yang tergenerate -->
            </div> <!-- end of hasil placement -->
        </div> <!-- end of tab content -->
    </div> <!--end of card body -->
</div> <!--end of card shadow -->

<!-- Modal atur standar nilai -->
<div class="modal fade" id="modallevelnone" tabindex="-1" role="dialog" aria-labelledby="modallevelnone" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Standar Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">    
                <form>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label text-right">Level 1</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="level1" aria-describedby="help_nilailevel1" placeholder="Masukan Level 1">
                            <small id="help_nilailevel1" class="form-text text-muted"></small>
                            </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label text-right">Level 2</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="level2" aria-describedby="help_nilailevel2" placeholder="Masukan Level 2">
                            <small id="help_nilailevel2" class="form-text text-muted"></small>
                            </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label text-right">Level 3</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="level3" aria-describedby="help_nilailevel3" placeholder="Masukan Level 3">
                            <small id="help_nilailevel3" class="form-text text-muted"></small>
                            </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label text-right">Level 4</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="level4" aria-describedby="help_nilailevel4" placeholder="Masukan Level 4">
                            <small id="help_nilailevel4" class="form-text text-muted"></small>
                            </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="tetapkan_standarnilai()" data-dismiss="modal"> Tetapkan</button>
            </div>
        </div>
    </div>
</div>
<!--end of Modal atur standar nilai -->

<!-- Modal ubah nilai  -->
<div class="modal fade" id="isinilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="close_btn()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form">
                    <label id="statustable" style="display:none" ></label>
                    <label id="idptest" style="display:none"></label>
                    <table class="table table-borderless table-md text-right">
                        <tbody>
                            <tr>
                                <td scope="row">NRP : </td>
                                <td class="text-left" id="crnrp"></td>
                            </tr>
                            <tr>
                                <td scope="row">Nama : </td>
                                <td class="text-left" id="crnama"></td>
                            </tr>
                            <tr>
                                <td scope="row">Nilai PT : </td>
                                <td class="text-left">
                                    <input min=0 type="number" class="form-control-sm" name="" id="crnilaiplacement" aria-describedby="helpId" placeholder="">
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">Level : </td>
                                <td class="text-left" id="modalnilai">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="modalradio_level1" value="1" name="modalRadioInline1" class="custom-control-input">
                                        <label class="custom-control-label" for="modalradio_level1">Level 1</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control">
                                        <input type="radio" id="modalradio_level2" value="2" name="modalRadioInline1" class="custom-control-input">
                                        <label class="custom-control-label" for="modalradio_level2">Level 2</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control">
                                        <input type="radio" id="modalradio_level3" value="3" name="modalRadioInline1" class="custom-control-input">
                                        <label class="custom-control-label" for="modalradio_level3">Level 3</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="modalradio_level4" value="4" name="modalRadioInline1" class="custom-control-input">
                                        <label class="custom-control-label" for="modalradio_level4">Level 4</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <label id="update_warning"> </label>
                <button id="btn_update" type="button" class="btn btn-primary" onclick="update()">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
<!-- end of Modal input/ubah nilai  -->


<script>

function simpan_periode() {
    //cek apa periode terpilih atau belum
    var periode = $("#periode").val();
    console.log(periode);
    
    if (periode == "-1") {
        $("#help_pilihperiode").text("Pilih periode terlebih dahulu");
       // $("#help_pilihperiode").css("style","color:red");
    }
    else
    {
        $("#help_pilihperiode").text("");
        $('#cardform1, #cardform2, #formaturstandard').show();
        datatable_lihatsemuamahasiswa();
        jmdatakembarpt();

        //cek apakah pada periode tersebut sudah ada standar nilai placementnya dan masukkan ke dalam modal
        $.post("../ajaxes/a_placement.php", {
                jenis: "cek_periode",
                idperiode:periode,
            },
            function(data) {
                console.log("ada");
                $("#level1").val(data["level1"]);
                $("#level2").val(data["level2"]);
                $("#level3").val(data["level3"]);
                $("#level4").val(data["level4"]);
            });
    }
    
}

//standar nilai pada modal
/*function tetapkan_standarnilai() {

    var periode = $("#periode").val();
    var lev1 = $("#level1").val();
    var lev2 = $("#level2").val();
    var lev3 = $("#level3").val();
    var lev4 = $("#level4").val();

    if (lev1 == "") {
        $("#help_level1").text("Masukan nilai standar level 1!");
    } else if (lev2 == "") {
        $("#help_level2").text("Masukan nilai standar level 2!");
    } else if (lev3 == "") {
        $("#help_level3").text("Masukan nilai standar level 3!");
    } else if (lev4 == "") {
        $("#help_level4").text("Masukan nilai standar level 4!");
    } else {
        $("#help_level1, #help_level2, #help_level3, #help_level4").text("");
        $.post("../ajaxes/a_placement.php", {
                jenis: "setstandard",
                periode:periode,
                lev1: lev1,
                lev2: lev2,
                lev3: lev3,
                lev4: lev4
            },
            function(data) {
                $('#table_tempmhs').DataTable().ajax.reload(); //reload ajax datatable 
                $("#import").css("display", "none");

                $("#file1").val("");
                $("#btnimportnone").css("display", "none");
                $("#btnimpotada").css("display", "block");

            });
        }
       
}*/

function importfileada() {
    var periode = $("#periode").val();
    var fd = new FormData();
    var files = $('#file1')[0].files[0];
    fd.append('file', files);
    fd.append("idperiode",periode);
    if (files != undefined) {
        var arr =
            $.ajax({
                url: '../ajaxes/ptest_upload.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.includes("success")) {
                        alert("Berhasil importfileada data !");
                        $("#lbl_file1").html("Pilih File ...");
                        $('#table_tempmhs').DataTable().ajax.reload(); //reload ajax datatable 
                        window.location.href="#table_tempmhs";
                        jmdatakembarpt();
                        
                    } else {
                        console.log(response);
                        alert(response);
                    }
                },
            });

    } else {
        $("#help_file").text("Pilih file excel dahulu !");
    }
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
            url: '../ajaxes/ptest_upload.php',
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

                    alert("Berhasil Importfile none data ! "+ periode);
                    $("#lbl_file1").html("Pilih File ...");
                    $('#table_tempmhs').DataTable().ajax.reload(); //reload ajax datatable 
                    window.location.href="#table_tempmhs";
                    jmdatakembarpt();
                    
                } else {
                    console.log(response);
                }
            },
        }); 
    } else { $("#help_file").text("Pilih file excel dahulu !"); }
    
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

//nambah satu2
function addtempmahasiswa() {
    var periode = $("#periode").val();
    var nrp = $("#addnrp").val();
    var nama = $("#addnama").val();
    var nilai = $("#addnilai").val();
    var radio_val="";

    var result = $("#radio1 input:radio:checked").get();
    var columns = $.map(result, function(element) {
        radio_val = $(element).attr("value");
    });
    console.log(radio_val);

    if (nrp == "" || nama == "" || nilai == "" || radio_val == null) {
        $("#labelwarning1").text("Pastikan semua data terisi");
        
    }
    else{
        $.post("../ajaxes/a_placement.php",
        {
            jenis:"selectednrp",
            nrp: nrp,
        },
        function(data){
           // console.log(data["nrp"]);
            var ceknrp = data["nrp"];
            if (ceknrp == null) {
                //console.log("blm ada");
                $.post( "../ajaxes/a_placement.php", {
                    jenis: "addtempmhs",
                    periode:periode,
                    nrp: nrp,
                    nama: nama,
                    nilai: nilai,
                    level:radio_val,
                },
                function(data) {
                    if (data.includes("Berhasil")) {
                        $('#table_tempmhs').DataTable().ajax.reload(); //reload ajax datatable 
                        alert("Berhasil menambahkan mahasiswa " + nrp);
                        reset();
                        
                    }
                    
                });
            }
            else{
                alert("Mahasiswa dengan nrp " + nrp + " telah terdaftar sebelumnya");
            }
        reset();
        });
    }
    
}

function resetmodal() {
    $("#update_warning").text("");
}

function reset() {
    $("#addnrp").val("");
    $("#addnama").val("");
    $("#addnilai").val("");
    $("#labelwarning1").text("");
   
}
    
function datatable_lihatsemuamahasiswa() {
    
    //datatable list barang
    var periode = $("#periode").val();
    var table = "";
    table = $('#table_tempmhs').DataTable({
        destroy:true,
        "responsive":true,
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
        "order": [[1, 'asc']], //default sortingnya berdasarkan kolom, field ke 0 paling pertama
        "ajax": {
            "url": "../datatables/admin-datatable/temp-mahasiswa_dt.php",
            "type": "POST",
            "data":{"periode":periode},
        },
        "deferRender": true,
        "aLengthMenu": [
            [10, 20, 50],
            [10, 20, 50]
        ], //combobox limit
        "columns": [
            { "data": "nrp"},
            { "data": "nama_mhs" },
            { "data": "nilai_ptest" },
            { "data":"ptest_level",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    if (row.ptest_level == '0') //kelas aktif
                    {
                        return "<label class='text-danger'> Belum Ada level </label>";
                    }
                    else if (row.ptest_level != 0) {
                        return "<label> Level " + row.ptest_level + " </label>";
                    }
                    
                }
            },          
            {
                "data": "nilai_ptest",
                "render": function(data, type, row) {
                    var nrp = row.nrp;
                    var id_ptest = row.id_ptest;
                    var table = "#table_tempmhs";
                    var btn1="";
                    var btn2="";

                    if (row.nilai_ptest == '0') {
                        
                        if (row.status_kembar == 1) {
                            btn1 = "<button class='btn btn-primary rounded btn-sm' data-toggle='modal' data-target='#isinilai' disabled onclick=\"loadmhs(\'"+id_ptest+"\',\'"+nrp+"\',\'"+table+"\')\" >Input Nilai</button>";
                        }
                        else{
                            btn1 = "<button class='btn btn-primary rounded btn-sm' data-toggle='modal' data-target='#isinilai' onclick=\"loadmhs(\'"+id_ptest+"\',\'"+nrp+"\',\'"+table+"\')\" >Input Nilai</button>";
                            
                        }

                        return btn1 + " <button onclick=\"hapus_mhs(\'"+id_ptest+"\',\'"+nrp+"\',\'"+table+"\')\" type='button' class='btn btn-danger btn-sm' ?Hapus</button>";
                    }
                    else{
                        if (row.status_kembar == 1) {
                            btn2 = "<button class='btn btn-warning rounded btn-sm' data-toggle='modal' data-target='#isinilai' disabled onclick=\"loadmhs(\'"+id_ptest+"\',\'"+nrp+"\',\'"+table+"\')\" >Ubah</button>"

                            
                        }else{
                            btn2 = "<button class='btn btn-warning rounded btn-sm' data-toggle='modal' data-target='#isinilai' onclick=\"loadmhs(\'"+id_ptest+"\',\'"+nrp+"\',\'"+table+"\')\" >Ubah</button>"
                        }
                        return btn2  + " <button onclick=\"hapus_mhs(\'"+id_ptest+"\',\'"+nrp+"\',\'"+table+"\')\" type='button' class='btn btn-danger btn-sm' >Hapus</button>";
                        
                    }
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
}

function loadmhs(id_ptest, nrp, table) {
    $("#idptest").text(id_ptest);
    $.post(
        "../ajaxes/a_placement.php", {
            jenis: "loadmhs",
            nrp:nrp
        },
        function(data) {
            
            var arr = JSON.parse(data);
            $("#crnrp, #cnrp").html(arr.nrp);
            $("#crnama").html(arr.nama_mhs);

            $.post(
                "../ajaxes/a_placement.php", {
                    jenis: "loadplacement",
                    id_ptest:id_ptest
                },
                function(data) {
                    var arr = JSON.parse(data);
                    $("#crnilaiplacement").val(arr.nilai_ptest);
                    $("#cperingkat").html(arr.ptest_level);
                    $("#clevelsblmny").html("Level Hasil Placement : " + arr.ptest_level);
                    $("#statustable").text(table);
                    var level_radio = arr.ptest_level;
                    $("input[name=modalRadioInline1][value='"+level_radio+"']").prop("checked",true);
                });
            
        }
    );
}

//button simpan perubahn nilai pada modal atur nilai
function update() {
var nrp = $("#crnrp").html();
var nilai = $("#crnilaiplacement").val();
var table = $("#statustable").text();
var idptest = $("#idptest").text();
var radio_val="";

var result = $("#modalnilai input:radio:checked").get();
var columns = $.map(result, function(element) {
    radio_val = $(element).attr("value");
});
console.log(nilai);
console.log(radio_val);
if (nilai == 0 || radio_val == "") {
    console.log("kosong");
    $("#update_warning").text("Pastikan semua data terisi").css("color","red");
    //$("#update_warning").css("color","red");
    //style="color:red"
}
else{
    $.post("../ajaxes/a_placement.php", {
            jenis: "update",
            id_ptest: idptest,
            nilai: nilai,
            level:radio_val,
        },
        function(data) {
            console.log(data);
            if (data == 1) {
                $(table).DataTable().ajax.reload(); //reload ajax datata
                $("#update_warning").text("Berhasil mengubah").css("color","blue");
            }
            else{
                $("#update_warning").text("Pastikan semua data terisi").css("color","red");
            }
            
        });
    
    }
}

function close_btn() {
    resetmodal();
}


function hapus_mhs(id_ptest, nrp, table) {
    var periode = $("#periode").val();
    $.post("../ajaxes/a_placement.php", {
        jenis: "hapus_mhs",
        id_ptest: id_ptest,
        nrp:nrp,
        id_periode:periode
        
    },
    function(data) {
        alert(data);
        $('#table_tempmhs').DataTable().ajax.reload(); //reload ajax datatab
        jmdatakembarpt();
    });
   // updatelevel();
}

function pindah(nrp) {
    loadmhs(nrp,table);
}

/*function pindahlevel() {
    var nrp = $("#cnrp").html();
    var levelbaru = $("#pindahlevel").val();
    console.log(nrp);
    $.post(
        "../ajaxes/a_placement.php", {
            jenis: "mshpindah_level",
            nrp: nrp,
            levelbaru:levelbaru,
        },
        function(data) {
            alert(data);
            $('#table_tempmhs, #table_mhspt').DataTable().ajax.reload(); //reload ajax datatab
        }
    );
}*/


/*function updatelevel() {
    var periode = $("#periode").val();
    $.post(
        "../ajaxes/a_placement.php", {
            jenis: "updatelevel",
            periode:periode,
        },
        function(data) {
            console.log(data);
            $('#table_tempmhs').DataTable().ajax.reload(); //reload ajax datatable 
        }
    );
}*/

function jmdatakembarpt() {
    var periode = $("#periode").val();
    $.post(
        "../ajaxes/a_placement.php", {
            jenis: "jmdatakembarpt",
            idperiode:periode,
        },
        function(data) {
            // console.log(data);
            // $("#jmdatakembarpt").text(data);
            $('#table_tempmhs').DataTable().ajax.reload(); //reload ajax datatable 
        }
    );
}

function tempatkanmhs() {
    var periode = $("#periode").val();
    $.post("../ajaxes/a_placement.php",
    {
        idperiode:periode,
        jenis:"cek_dataterisi",

    },
    function(data){
        console.log(data["id_ptest"]);
        var cek=data["id_ptest"];

        if (cek != null) //ada yg belum terisi
        {
            alert("Anda belum dapat menempatkan semua mahasiswa! Pastikan semua data terisi")
        }
        else if (cek == null) //terisi semua
        {
            console.log("-+-");
            
            $.post("../ajaxes/a_placement.php",
            {
                idperiode:periode,
                jenis:"aktifkan_allmhs",
            },
            function(data){
                console.log(data);
                $('#table_tempmhs').DataTable().ajax.reload(); //reload ajax datatable 
            });
            
        }
    });
}


//lihat hasil placement keseluruhan

function  btn_cariperiode() {
    console.log("button cari");
    var periode = $("#periode_lihatkelas").val();
    console.log(periode);
    if (periode == "-1") {
        $("#help_pilihperiode2").text("pilih periode terlebih dahulu");
    }
    else{
        $("#help_pilihperiode2").text("");
        datatable_ptmhs_periodeini();
    }
}

function exportfile() {
    var periode = $("#periode_lihatkelas").val();
    window.location.href = "../custom_export/admin_export/lihat_placement.php?periode="+periode+"";
}

function nonaktikfkan_mhs(nrp) {
    $.post("../ajaxes/a_placement.php",
    {
        nrp:nrp,
        jenis:"nonaktifkan_mhs",
    },
    function(data){
        alert(data);
        $('#table_mhspt').DataTable().ajax.reload(); //reload ajax datatable
        
    });
    
}


function datatable_ptmhs_periodeini() {
    //datatable list barang
    var periode = $("#periode_lihatkelas").val();
    var table = "";
    table = $('#table_mhspt').DataTable({
        destroy:true,
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
        "order": [[1, 'asc']], //default sortingnya berdasarkan kolom, field ke 0 paling pertama
        "ajax": {
            "url": "../datatables/admin-datatable/placement_mhsaktif.php",
            "type": "POST",
            "data":{"periode":periode},
        },
        "deferRender": true,
        "aLengthMenu": [
            [10, 20, 50],
            [10, 20, 50]
        ], //combobox limit
        "columns": [
            { "data": "nrp"},
            { "data": "nama_mhs" },
            { "data": "nilai_ptest" },
            { "data":"ptest_level",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    if (row.ptest_level == '0') //kelas aktif
                    {
                        return "<label class='text-danger'> Belum Ada level </label>";
                    }
                    else if (row.ptest_level != 0) {
                        return "<label> Level " + row.ptest_level + " </label>";
                    }
                    
                }
            },          
            {
                "data": "nilai_ptest",
                "render": function(data, type, row) {
                    var nrp = row.nrp;
                    var id_ptest = row.id_ptest;
                    var table = "#table_mhspt";
                    
                    return "<button class='btn btn-warning rounded btn-sm' data-toggle='modal' data-target='#isinilai' onclick=\"loadmhs(\'"+id_ptest+"\',\'"+nrp+"\',\'"+table+"\')\" >Ubah</button>";
                }
            },
            
        ],
        
    });
}



</script>