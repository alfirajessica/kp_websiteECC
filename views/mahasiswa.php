<!DOCTYPE html>
<html>

<!-- head -->
<?php require_once("head.php"); 
$arr=unserialize($_SESSION["user"]); 
        
$level = $arr->get_level();

?>
<style>
td.details-control {
    background: url('../images/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.details td.details-control {
    background: url('../images/details_close.png') no-repeat center center;
}
</style>
<body>
  
<?php require_once("sidenav.php"); ?>

    <!-- ini content -->
    <!-- container-fluid -->
    <div class="container-fluid mt--6">
        <!-- row -->
        <div class="row">
            <div class="col-md-12"> <!-- col-md-12 -->
                <div class="card">
                    <?php 
                    if($level == "admin")
                    { 
                        require("admin-views/admin_mhs.php"); 
                    }
                    else if ($level == "dosen") 
                    {
                        require("dosen-views/dosen_mhs.php");
                    }
                    ?>
                </div>
            </div> <!-- end of col-md-12 -->
        </div> <!-- end of row -->

      <!-- Footer -->
      <?php include_once('footer.php') ?>
  
    </div><!-- container-fluid -->

    <!-- Modal untuk lihat mahasiswa berdasarkan kelas yg dipilih  -->
    <div class="modal fade" id="Modal_listmhs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="title_namakelas"></h5>
            <!-- <h6 id="title_idkelas"></h6>
            <h6 id="title_table"></h6> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form role="form">
          <div class="table-responsive">
                <table id="table_listmhs" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Kelas</th>
                            <th>Jadwal</th>
                            <th>Dosen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            </form>
            
          </div>
          <div class="modal-footer">
            <button id="btn_updatekelas" type="button" class="btn btn-primary" onclick="()" >Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end of Modal untuk lihat mahasiswa berdasarkan kelas yg dipilih -->

  
  
</body>
<?php include_once('scripts.php')?>
<script>
    
$(document).ready(function(){
    set_periode();
    periode();
    cekfileimport();
      
   });    

  
  function periode() {
        $.post("../ajaxes/a_periode.php",
        {
            jenis:"get_allperiode",
        },
        function(data){
            $("#periode").html(data); //di atur kelas
            $("#periode_lihatkelas").html(data); //dilihat kelas
        });
    }

    function set_periode() {
      var date = new Date();
      var month = date.getMonth();
        $.post("../ajaxes/a_periode.php",
        {
            jenis:"set_periodedb",
            getmonth:month,
        },
        function(data){
            console.log(data);
        });
    }

    $("#file1").change(function() {
        var files = $('#file1')[0].files[0];
        $("#lbl_file1").html(files.name);
    });

    
</script>

