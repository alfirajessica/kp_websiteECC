<!DOCTYPE html>
<html>

<!-- head -->
<?php require_once("head.php");
$arr = unserialize($_SESSION["user"]);

$level = $arr->get_level();

?>


<body>

    <?php require_once("sidenav.php"); ?>
    <!-- <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div> -->

    <!-- ini content -->
    <!-- container-fluid -->
    <div class="container-fluid mt--6">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <!-- col-md-12 -->
                <div class="card">
                    <?php
                    if ($level == "admin") {
                        require("admin-views/admin_placement.php");
                    }

                    ?>
                </div>
            </div> <!-- end of col-md-12 -->
        </div> <!-- end of row -->

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
                $("#periode_lihatkelas, #modal_setperiode").html(data); //dilihat kelas
            });
    }

    $(document).ready(function() {

      periode();
      cekfileimport();
     // jmdatakembarpt();
      
   });    

    $("#file1").change(function() {
        var files = $('#file1')[0].files[0];
        $("#lbl_file1").html(files.name);
    });
</script>

</html>