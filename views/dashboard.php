
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
    <!-- Page content -->
    <div class="container-fluid mt--6">
      
      <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <?php 
              if($level == "admin")
                { require("admin-views/admin_dashboard.php"); }
              else if ($level == "dosen") {
                require("dosen-views/dosen_dashboard.php");
              }
            ?>
          </div>
        </div>
        
      </div>

      
      <!-- Footer -->
      <?php include_once('footer.php') ?>
      
    </div>
  </div>
  
  
</body>
<!-- Argon Scripts -->
<?php include_once('scripts.php')?>
<script>
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

    $(document).ready(function(){
    set_periode();
    });    
</script>
</html>