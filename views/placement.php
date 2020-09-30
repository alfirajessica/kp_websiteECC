
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
        <div class="row"> <!-- row -->
            <!-- aturan pakai -->
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Social traffic</h3>
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
                        <h5 class="card-title">
                            <div class="alert alert-default" role="alert">
                            <strong>Standar nilai ECC per level</strong> This is a default alert—check it out!
                            </div>
                        </h5>
                        
                        <div class="card-text">
                            <table class="table table-borderless table-sm text-right">
                                <tbody>
                                    <tr>
                                        <th scope="row">Level 1 : </th>
                                        <td class="text-left">
                                            <input type="number" class="form-control-sm" name="" id="" aria-describedby="helpId" placeholder=""> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Level 2 : </th>
                                        <td class="text-left">
                                            <input type="number" class="form-control-sm" name="" id="" aria-describedby="helpId" placeholder=""> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Level 3 : </th>
                                        <td class="text-left">
                                            <input type="number" class="form-control-sm" name="" id="" aria-describedby="helpId" placeholder=""> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Level 4 : </th>
                                        <td class="text-left">
                                            <input type="number" class="form-control-sm" name="" id="" aria-describedby="helpId" placeholder=""> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"></th>
                                        <td class="text-left">
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
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
            <div class="col-md-12"> <!-- col-md-12 -->
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">List Barang</strong>
                    </div>
                    <div class="card-body">                           
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end of col-md-12 -->
        </div> <!-- end of row -->

      
      <!-- Footer -->
      <?php include_once('footer.php') ?>
      
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