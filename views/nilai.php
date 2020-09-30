
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
                    { require("admin-views/admin_nilai.php"); }
                    else if ($level == "dosen") {
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
                <table class="table table-borderless table-sm text-right">
                    <tbody>
                        <tr>
                            <th scope="row">NRP : </th>
                            <td class="text-left">217180382</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama : </th>
                            <td class="text-left">Alfira Jessica</td>
                        </tr>
                        <tr>
                            <th scope="row">Jurusan : </th>
                            <td class="text-left">S1-Sistem Informasi Bisnis</td>
                        </tr>
                        <tr>
                            <th scope="row">Nilai UTS : </th>
                            <td class="text-left">
                                <input type="number" class="form-control-sm" name="" id="" aria-describedby="helpId" placeholder=""> 
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Nilai UAS : </th>
                            <td class="text-left">
                                <input type="number" class="form-control-sm" name="" id="" aria-describedby="helpId" placeholder=""> 
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Nilai Akhir : </th>
                            <td class="text-left">
                                <input type="number" class="form-control-sm" name="" id="" aria-describedby="helpId" placeholder=""> 
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Peringkat : </th>
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
            $("#periode").html(data);
            });
    }

    $(document).ready(function(){

      periode();
   });    
</script>

</html>