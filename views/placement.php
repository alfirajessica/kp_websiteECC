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
                            <table class="table table-borderless table-sm text-right">
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
                            <div id="import" style="display:none;">
                            <h3>Import</h3>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control" name="uploadfile" id="file1">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                <input type="button" onclick="importfile()" name="submit" value="Import File Excel" class="btn btn-primary form-control">

                            </div>
                            </div>
                    

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
                        <button type="submit">Import</button>
                        <button type="submit">Export</button>
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
                                <tbody>
                                    <tr>
                                        <td>217180382</td>
                                        <td>Alfira Jessica</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>
                                            <button class="btn btn-icon btn-primary btn-sm" type="button" data-toggle="modal" data-target="#exampleModal">
                                                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                                <span class="btn-inner--text">Input nilai</span>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                                        <td class="text-left">217180382</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Nama : </td>
                                        <td class="text-left">Alfira Jessica</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Nilai Placement : </td>
                                        <td class="text-left">
                                            <input type="number" class="form-control-sm" name="" id="" aria-describedby="helpId" placeholder="">
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
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
        $.post("../ajaxes/a_placement.php", {
                jenis: "setstandard",
                lev1:lev1,
                lev2:lev2,
                lev3:lev3,
                lev4:lev4
            },
            function(data) {
                alert(data);
            });
        $("#import").css("display","block");
    }

    function importfile() {

      
        var fd = new FormData();
        var files = $('#file1')[0].files[0];
        fd.append('file', files);

        var arr =
            $.ajax({
                url: 'excel-upload.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response == "success") {
                        //window.location.href="";
                        alert(response);
                    } else {
                        console.log(response);
                    }
                },
            });
        reloadtable();
    }

    function relodtable() {
        // tampilkan temp_mahasiswa

    }
</script>


</html>