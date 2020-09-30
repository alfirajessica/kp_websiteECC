
<!DOCTYPE html>
<html>

<!-- head -->
<?php require_once("head.php"); 
$arr=unserialize($_SESSION["user"]); 
        
$level = $arr->get_level();

?>

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
                    { require("admin-views/admin_kelas.php"); }
                    else if ($level == "dosen") {
                    require("dosen-views/dosen_kelas.php");
                    }
                    ?>
                </div>
            </div> <!-- end of col-md-12 -->
        </div> <!-- end of row -->

      <!-- Footer -->
      <?php include_once('footer.php') ?>

      <!-- Modal atur dosen/jam/kuota kelas ecc  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Atur Dosen/Jam/Kuota kelas ini</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form">
              <div class="form-group">
                <label for="">Pilih Dosen</label>
                <select class="form-control" name="" id="">
                  <option>a</option>
                  <option>b</option>
                  <option>c</option>
                </select>
              </div>

              <div class="form-group">
                <label for="">Pilih Hari</label>
                <select class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                  <option>Senin</option>
                  <option>Selasa</option>
                  <option>Rabu</option>
                  <option>Kamis</option>
                  <option>Jumat</option>
                </select>
                <small id="helpId" class="form-text text-muted">Help text</small>
              </div>

              <div class="form-group">
                <label for="example-time-input" class="form-control-label">Jam Awal</label>
                <input class="form-control" type="time" value="10:30:00" id="example-time-input">
                <small id="helpId" class="form-text text-muted">Help text</small>
              </div>

              <div class="form-group">
                <label for="example-time-input" class="form-control-label">Jam Akhir</label>
                <input class="form-control" type="time" value="10:30:00" id="example-time-input">
                <small id="helpId" class="form-text text-muted">Help text</small>
              </div>

              <div class="form-group">
                <label for="">Kuota</label>
                <input type="number"
                  class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">Help text</small>
              </div>

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
<?php include_once('scripts.php')?>


<script>

  function periode() {
        $.post("../ajaxes/a_periode.php",
        {
            jenis:"get_allperiode",
        },
        function(data){
            $("#periode").html(data); //di atur kelas
            $("#periode_all").html(data); //dilihat kelas
        });
    }

    $(document).ready(function(){

      periode();
      datatable_lihatkelas();
   });    
</script>

</html>