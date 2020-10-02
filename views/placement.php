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
            <!-- row -->
            <!-- aturan pakai -->
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">How To Use</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- aturan pakai -->

            <!-- standar nilai ecc -->
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-warning" role="alert">
                            Standar nilai ECC per-level
                        </div>


                        <div class="card-text">

                            <button class="btn btn-success text-light" onclick="window.location.href='templeteexport.php'" target="_blank">Download Templete</button>
                            <h3>Import</h3>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control" name="uploadfile" id="file1">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                <input type="button" onclick="importfile()" name="submit" value="Import File Excel" class="btn btn-primary form-control">

                            </div>
                            <br><br>
                            <table id="import" style="display:none;" class="table table-borderless table-sm text-right">
                                <tbody>
                                    <tr>
                                        <th scope="row">Level 1 : </th>
                                        <td class="text-left">
                                            <input type="number" class="form-control-sm" name="" id="level1" aria-describedby="helpId" placeholder="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Level 2 : </th>
                                        <td class="text-left">
                                            <input type="number" class="form-control-sm" name="" id="level2" aria-describedby="helpId" placeholder="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Level 3 : </th>
                                        <td class="text-left">
                                            <input type="number" class="form-control-sm" name="" id="level3" aria-describedby="helpId" placeholder="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Level 4 : </th>
                                        <td class="text-left">
                                            <input type="number" class="form-control-sm" name="" id="level4" aria-describedby="helpId" placeholder="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"></th>
                                        <td class="text-left">
                                            <a onclick="tetapkan()" class="btn btn-primary text-light">Tempatkan</a>
                                        </td>
                                    </tr>



                                </tbody>
                            </table>

                        </div>


                    </div>
                </div>
            </div> <!-- end of standar nilai ecc -->
        </div> <!-- end of row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <!-- col-md-12 -->
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">List Mahasiswa</strong>
                    </div>

                    <div class="card-body">
                      
                        <br>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#NRP</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Nilai Placement</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="datanya">
                                   
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-success text-light" onclick="exportfile()">Export</button>
                        </div>
                    </div>
                </div>
            </div> <!-- end of col-md-12 -->
        </div> <!-- end of row -->

        <!-- Modal atur/isi nilai placement  -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <input type="number" class="form-control-sm" name="" id="crnilaiplacement" aria-describedby="helpId" placeholder="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Peringkat : </td>
                                        <td class="text-left">A/B/C/D</td>
                                    </tr>

                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" onclick="update()">Simpan Perubahan</button>
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

    });



    function tetapkan() {
       
        var lev1 = $("#level1").val();
        var lev2 = $("#level2").val();
        var lev3 = $("#level3").val();
        var lev4 = $("#level4").val();

        if (lev1=="") {
            alert("Masukan nilai standar level 1 !");
        }else if (lev2=="") {
            alert("Masukan nilai standar level 2 !");
        }else if (lev3=="") {
            alert("Masukan nilai standar level 3 !");
        }else if (lev4=="") {
            alert("Masukan nilai standar level 4 !");
        }else {
            $.post("../ajaxes/a_placement.php", {
                jenis: "setstandard",
                lev1:lev1,
                lev2:lev2,
                lev3:lev3,
                lev4:lev4
            },
            function(data) {
                //alert(data);
            });

        }

       
    }

    function importfile() {

      
        var fd = new FormData();
        var files = $('#file1')[0].files[0];
        fd.append('file', files);
        if (files!=undefined) {
            var arr =
            $.ajax({
                url: 'excel-upload.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.includes("success")) {
                        $("#import").css("display","block");
                    } else {
                        console.log(response);
                    }
                },
            });
        }
     
        reloadtable();
    }
    reloadtable();
    function reloadtable() {
        $.post("../ajaxes/a_placement.php", {
                jenis: "getdata",
            },
            function(data) {
               $("#datanya").html(data);
            });

    }

    function exportfile() {
        window.location.href="exportplacement.php";
    }

    function editnilai(params) {
        $.post("../ajaxes/a_placement.php", {
                jenis: "selectednrp",
                id:params
            },
            function(data) {
                var arr=JSON.parse(data);
                $("#crnrp").html(params);
        $("#crnama").html(arr.nama);
        $("#crnilaiplacement").html(arr.nilaiplacement);
            });

       
    }

    function update() {
       
        var nrp=$("#crnrp").html();
        var nilai=$("#crnilaiplacement").val();
        $.post("../ajaxes/a_placement.php", {
                jenis: "update",
                id:nrp,
                nilai:nilai,
            },
            function(data) {
                alert(data);
                reloadtable();
                $('#exampleModal').modal('hide');
            });
    }

</script>


</html>