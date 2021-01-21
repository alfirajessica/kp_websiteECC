
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
          <div class="card-body">
            <h2> Selamat Datang, Admin</h2> <br>
            <h4> Silakan Pilih Menu pada kanan layar </h4>
            <h4> Terima Kasih :) </h4>
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
</script>
</html>