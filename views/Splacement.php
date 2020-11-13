<!DOCTYPE html>
<html>

<!-- head -->
<?php require_once("head.php");
$arr = unserialize($_SESSION["user"]);
$level = $arr->get_level();
?>

<body>

    <?php require_once("sidenav.php"); ?>

    <!-- ini content -->
    <!-- container-fluid -->
    <div class="container-fluid mt--6">
        <div class="row">
            
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <form>
                                <div class="form-group">
                                    <label> Silakan gunakan template ini sebelum melakukan import </label>
                                    <button type="button" class="btn btn-success text-light" onclick="window.location.href='../PHPExcel/nilaitest.xlsx'" target="_blank">Download Templete</button>
                                </div>

                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control" name="uploadfile" id="file1">
                                        <label class="custom-file-label" id="lbl_file1">Pilih file ...</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">dengan menekan tombol import file excel anda memasukan data ke dalam data mahasiswa sementara dan data sebelumnya akan dihapus seluruhnya</label>
                                    <input type="button" data-toggle="modal" data-target="#modallevelada" href="#example" onclick="importfileada()" id="btnimportada" value="*Import File Excel" class="btn btn-primary form-control">
                                    <input aria-describedby="help_file" type="button" data-toggle="modal" data-target="#modallevelnone" href="#example"  onclick="importfilenone()" id="btnimportnone" value="*Import File Excel" class="btn btn-primary form-control">
                                    <small id="help_file" class="text-muted"></small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- end of standar nilai ecc -->

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <form role="form">
                            
                                <table class="table table-borderless table-md text-right">
                                    <tbody>
                                        <tr>
                                            <td scope="row">Nrp : </td>
                                            <td class="text-left">
                                                <input type="number" id="addnrp" class="form-control" placeholder="Masukan Nrp" aria-describedby="help_nrp">
                                                <small id="help_nrp" class="form-text text-muted"></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Nama : </td>
                                            <td class="text-left">
                                                <input type="text" id="addnama" class="form-control" placeholder="Masukan Nama" aria-describedby="help_nama">
                                                <small id="help_nama" class="form-text text-muted"></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Nilai placement : </td>
                                            <td class="text-left">
                                                <input type="number" id="addnilai" class="form-control" placeholder="Masukan Nilai placement" aria-describedby="help_nilai">
                                                <small id="help_nilai" class="form-text text-muted"></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td> <button type="button" class="btn btn-primary" onclick="addtempmahasiswa()">Masukan</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- end of standar nilai ecc -->

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
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="row align-items-center">
                                        <div class="alert alert-warning" role="alert">
                                            Standar nilai ECC per-level
                                        </div>
                                        <form>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Level 1 :</label>
                                                <input type="text" class="form-control" id="level1" aria-describedby="emailHelp" placeholder="Masukan Level 1">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Level 2 :</label>
                                                <input type="text" class="form-control" id="level2" aria-describedby="emailHelp" placeholder="Masukan Level 2">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Level 3 :</label>
                                                <input type="text" class="form-control" id="level3" aria-describedby="emailHelp" placeholder="Masukan Level 3">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Level 4 :</label>
                                                <input type="text" class="form-control" id="level4" aria-describedby="emailHelp" placeholder="Masukan Level 4">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="tetapkan()" data-dismiss="modal"> Tetapkan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end of row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <!-- col-md-12 -->
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Mahasiswa</strong>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                          <label for=""></label>
                          <select class='form-control' id="periode"></select>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-success text-light" onclick="exportfile()">Export</    button>
                            <button type="button" class="btn btn-primary text-light" onclick="insertfile()">*Tempatkan  Mahasiswa</button>
                            <label>* dengan menekan tombol ini anda setuju menghapus data sementara mahasiswa untuk     dimasukan ke dalam data mahasiswa permanent pastikan data sementara sudah benar</label>
                        </div>
                    
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#NRP</th>
                                        <th>Nama</th>
                                        <th>Nilai</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="datanya">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end of col-md-12 -->
        </div> <!-- end of row -->

        <!-- Modal ubah nilai  -->
        <div class="modal fade" id="isinilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h3>Periode/</h3>
                        <p for="">Kelas</p>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form">
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
                                        <td scope="row">Nilai Placement : </td>
                                        <td class="text-left">
                                            <input min=0 type="number" class="form-control-sm" name="" id="crnilaiplacement" aria-describedby="helpId" placeholder="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Peringkat : </td>
                                        <td class="text-left" id="cperingkat">A/B/C/D</td>
                                    </tr>

                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="update()">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of Modal atur dosen/jam/kuota kelas ecc  -->


        <!-- Footer -->
        <?php include_once('footer.php') ?>

    </div><!-- container-fluid -->


</body>
<?php include_once('scripts.php') ?>

<script>
    function periode() {
        $.post("../ajaxes/a_periode.php", {
                jenis: "get_allperiode",
            },
            function(data) {
                $("#periode").html(data);
            });
    }

    $(document).ready(function() {
        periode();
        datatable_lihatsemuamahasiswa();

    });

    $("#file1").change(function() {
        var files = $('#file1')[0].files[0];
        $("#lbl_file1").html(files.name);
    });


    function tetapkan() {

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
                    lev1: lev1,
                    lev2: lev2,
                    lev3: lev3,
                    lev4: lev4
                },
                function(data) {
                    $('#example').DataTable().ajax.reload(); //reload ajax datatable 
                    $("#import").css("display", "none");

                    $("#file1").val("");
                    $("#btnimportnone").css("display", "none");
                    $("#btnimpotada").css("display", "block");

                });
        }
    }

    function standarnilaicek() {
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
    

    standarnilaicek()

    function importfilenone() {
        console.log("none");
        var fd = new FormData();
        var files = $('#file1')[0].files[0];
        fd.append('file', files);
        if (files != undefined) {
            var arr =
                $.ajax({
                    url: '../ajaxes/excel-upload.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.includes("success")) {
                            $("#btnimport").css("display", "none");
                            $("#import").css("display", "block");

                            $("#btnimportnone").css("display", "none");
                           $("#btnimportada").css("display", "block");

                           alert("Berhasil Import data !");
                            $("#lbl_file1").html("Pilih File ...");
                            window.location.href="#example";

                        } else {
                            console.log(response);
                        }
                    },
                });

        } else {
            $("#help_file").text("Pilih file excel dahulu !");
            //alert("Pilih file excel dahulu !");
        }
        updatelevel();
    }


    function importfileada() {
        console.log("ada");
        var fd = new FormData();
        var files = $('#file1')[0].files[0];
        fd.append('file', files);
        if (files != undefined) {
            var arr =
                $.ajax({
                    url: '../ajaxes/excel-upload.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.includes("success")) {
                            alert("Berhasil import data !");
                            $("#lbl_file1").html("Pilih File ...");
                            window.location.href="#example";
                        } else {
                            console.log(response);
                            alert(response);
                        }
                    },
                });

        } else {
            $("#help_file").text("Pilih file excel dahulu !");
            //alert("Pilih file excel dahulu !");
        }
        updatelevel();
    }


    function importfile() {

        var fd = new FormData();
        var files = $('#file1')[0].files[0];
        fd.append('file', files);
        if (files != undefined) {
            var arr =
                $.ajax({
                    url: '../ajaxes/excel-upload.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.includes("success")) {
                            alert(response);
                            $("#btnimport").css("display", "none");
                            $("#import").css("display", "block");
                        } else {
                            console.log(response);
                        }
                    },
                });

        } else {
            alert("Pilih file excel dahulu !");
        }
    }

    //reloadtable();

    // function reloadtable() {
    //     $.post("../ajaxes/a_placement.php", {
    //             jenis: "getdata",
    //         },
    //         function(data) {
    //             $("#datanya").html(data);
    //         });

    // }

    function exportfile() {
        window.location.href = "exportplacement.php";
    }

    function editnilai(params) {
        $.post("../ajaxes/a_placement.php", {
                jenis: "selectednrp",
                id: params
            },
            function(data) {
                var arr = JSON.parse(data);
                $("#crnrp").html(params);
                $("#crnama").html(arr.nama);
                $("#crnilaiplacement").html(arr.nilaiplacement);
            });


    }

    function update() {

        var nrp = $("#crnrp").html();
        var nilai = $("#crnilaiplacement").val();
        $.post("../ajaxes/a_placement.php", {
                jenis: "update",
                id: nrp,
                nilai: nilai,
            },
            function(data) {
                alert(data);
                $('#example').DataTable().ajax.reload(); //reload ajax datatab
                $('#isinilai').modal('hide');
            });
    }




    function insertfile() {

        if ($("#periode").val() > 0) {
            $.post("../ajaxes/a_placement.php", {
                    jenis: "insertmhs",
                    periode: $("#periode").val()
                },
                function(data) {
                    alert("Berhasil memasukan mahasiswa !");
                    $('#example').DataTable().ajax.reload(); //reload ajax datatable 
                });
        } else {
            alert("Pilih Periode dahulu !");
        }

    }

    $.post("../ajaxes/a_placement.php", {
            jenis: "getperiode"
        },
        function(data) {
            $("#periode").html(data);
        });

    function datatable_lihatsemuamahasiswa() {
        //datatable list barang
        var table = "";
        table = $('#example').DataTable({
            dom: 'Bfrtip',
            "processing": true,
            "serverSide": true,
            "bInfo": false,
            dom: "<'myfilter'f><'mylength'l>t",
            "pagingType": "numbers",
            "ordering": true, //set true agar bisa di sorting
            "order": [
                [0, 'asc']
            ], //default sortingnya berdasarkan kolom, field ke 0 paling pertama
            "ajax": {
                "url": "../datatables/admin-datatable/temp-mahasiswa_dt.php",
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [
                [10, 20, 50],
                [10, 20, 50]
            ], //combobox limit
            "columns": [

                {
                    "data": "nrp"
                },
                {
                    "data": "nama_mahasiswa"
                },
                {
                    "data": "nilai_placement",
                },
                {
                    "data": "level",
                }, {
                    "data": "status",
                    "render": function(data, type, row) {
                        if (parseInt(row.nilai_placement) == 0) //nilai masih 0
                        {
                            return "<button class='btn btn-primary rounded' data-toggle='modal' data-target='#isinilai' onclick=\"loadmhs('" + row.nrp + "')\"  >Input Nilai</button>";
                        } else if (parseInt(row.nilai_placement) > 0) //ubah nilai lebih dari 0
                        {
                            return "<button class='btn btn-warning rounded' data-toggle='modal' data-target='#isinilai' onclick=\"loadmhs('" + row.nrp + "')\"  >Ubah Nilai</button>";
                        }

                    }
                }

            ],
        });
    }

    function loadmhs(nrp) {
        $.post(
            "../ajaxes/a_placement.php", {
                jenis: "loadsel",
                nrp: nrp
            },
            function(data) {
                var arr = JSON.parse(data);
                $("#crnrp").html(arr.nrp);
                $("#crnama").html(arr.nama_mahasiswa);
                $("#crnilaiplacement").val(arr.nilai_placement);
                $("#cperingkat").html(arr.level);
            }
        );
    }

    //nambah satu2
    function addtempmahasiswa() {
        var nrp = $("#addnrp").val();
        var nama = $("#addnama").val();
        var nilai = $("#addnilai").val();

        $.post(
            "../ajaxes/a_placement.php", {
                jenis: "addtempmhs",
                nrp: nrp,
                nama: nama,
                nilai: nilai
            },
            function(data) {
                if (data.includes("Berhasil")) {
                    $("#addnrp").val("");
                    $("#addnama").val("");
                    $("#addnilai").val("");
                    $('#example').DataTable().ajax.reload(); //reload ajax datatable 
                }
                alert(data);
            }

        );
    }
    
    function updatelevel() {
        $.post(
            "../ajaxes/a_placement.php", {
                jenis: "updatelevel",
            },
            function(data) {
               console.log(data);
               $('#example').DataTable().ajax.reload(); //reload ajax datatable 
            }

        );

    }
</script>


</html>