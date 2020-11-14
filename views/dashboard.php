
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