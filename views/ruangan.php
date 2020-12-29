
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
    <?php 
                    require("admin-views/admin_ruang.php");
                    ?>

      <!-- Footer -->
      <?php include_once('footer.php') ?>
      
    
    </div><!-- container-fluid -->
  
  
</body>
<?php include_once('scripts.php')?>
<script>
$(document).ready(function(){
    periode();
    datatable_lihatsemuaruang();
});    

function periode() {
        $.post("../ajaxes/a_periode.php",
        {
            jenis:"get_allperiode",
        },
        function(data){
            $("#periode").html(data);
        });
    }
</script>

</html>