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
                            <table class="table table-borderless table-md text-right" id="example">
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
    datatable_lihatsemuamahasiswa();
    periode();




    function datatable_lihatsemuamahasiswa() {
        //datatable list barang
        var idperiode=$("#periode").val();
        var idkelas=$("#kelas").val();
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
                "url": "../datatables/dosen-datatable/kelas_aktifdt.php",
                "type": "POST",
                "idperiode":idperiode,
                "idkelas":idkelas,
            },
            "deferRender": true,
            "aLengthMenu": [
                [10, 20, 50],
                [10, 20, 50]
            ], //combobox limit
            "columns": [{
                    "data": "id_kelas"
                }
                // {
                //     "data": "nrp"
                // },
                // {
                //     "data": "nama"
                // },
                // {
                //     "data": "uts",
                // },
                // {
                //     "data": "uas",
                // }, 
                // {
                //     "data": "na",
                // }

            ],
        });
    }
</script>

</html>