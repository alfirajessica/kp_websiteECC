<!DOCTYPE html>
<html>

<!-- head -->
<?php require_once("head.php");
$arr = unserialize($_SESSION["user"]);

$level = $arr->get_level();

?>
<?php include_once('scripts.php') ?>

<body>

    <?php require_once("sidenav.php"); ?>

    <!-- ini content -->
    <!-- container-fluid -->
    <div class="container-fluid mt-6">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <!-- col-md-12 -->
                <div class="card">
                    <?php
                    if ($level == "admin") {
                        require("admin-views/admin_nilai.php");
                    } else if ($level == "dosen") {
                        require("dosen-views/dosen_nilai.php");
                    }
                    ?>
                </div>
            </div> <!-- end of col-md-12 -->
        </div> <!-- end of row -->

        <!-- Footer -->
        <?php include_once('footer.php') ?>

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
                                <thead>
                                    <th>#NRP</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>UTS</th>
                                    <th>UAS</th>
                                    <th>N.Akhir</th>
                                </thead>
                                <tr>

                                </tr>
                                <tbody>


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
    </div><!-- container-fluid -->


</body>

<script>
<<<<<<< Updated upstream
    $(document).ready(function() {
        isikelas();
        periode();
        datatable_lihatsemuamahasiswa();
    });
=======
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
        //datatable_lihatsemuamahasiswa();
    });


   
>>>>>>> Stashed changes
</script>

</html>