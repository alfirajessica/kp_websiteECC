
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
  
    </div><!-- container-fluid -->
  
  
</body>
<?php include_once('scripts.php')?>


<script>
  $(document).ready(function(){

      periode();
      set_periode();
      datatable_lihatkelas();
      //kelas_blmaktif();
    // pilihperiode();
      get_dosen();
   });    

  
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

    // function simpankelas() {
      
    // }

    
</script>

</html>