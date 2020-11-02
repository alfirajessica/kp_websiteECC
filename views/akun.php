
<!DOCTYPE html>
<html>

<!-- head -->

<?php require_once("head.php"); 
$arr=unserialize($_SESSION["user"]); 
$username = $arr->get_u();
$nama = $arr->get_nama();
?>


<body>
  
<?php require_once("sidenav.php"); ?>

    <!-- ini content -->
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row justify-content-md-center">
      
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">User information</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama</label>
                        <input type="text" id="input-nama" class="form-control" value=<?php echo $nama;?> >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name" >Username</label>
                        <input type="text" id="input-username" class="form-control" disabled value=<?php echo $username;?>>
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative">
                          <input class="form-control" placeholder="Password" id="te_password" type="password">
                          <span class="input-group-text" id="i_eye" style="display:block;" onclick="show()"><i class="fa fa-eye"></i></span>
                          <span class="input-group-text" id="i_slash" style="display:none;" onclick="hide()" ><i class="fa fa-eye-slash"></i></span>
                          <span class="input-text" ><a data-toggle='modal' data-target='#Modal_ubahpass'> Ubah Password </a></span>
                        </div>
                      </div>
                      
                    </div>
                    
                  </div>
                  <div class="form-group text-right">
                      <button class="btn btn-outline-primary" type="button" onclick="simpan()">Simpan</button>
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php include_once('footer.php') ?>
    </div>
  </div>

  
    <!-- Modal untuk lihat mahasiswa berdasarkan kelas yg dipilih  -->
    <div class="modal fade bd-example-modal-sm" id="Modal_ubahpass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
          <form role="form">
            <div class="form-group">
              <label for="">Password lama</label>
              <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="form-group">
              <label for="">Password Baru</label>
              <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Help text</small>
            </div>
          </div>
          <div class="modal-footer">
            <button id="btn_updatekelas" type="button" class="btn btn-primary" onclick="()" >Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end of Modal untuk lihat mahasiswa berdasarkan kelas yg dipilih -->

</body>
<!-- Argon Scripts -->
<?php include_once('scripts.php')?>
</html>
<script>
var username= "<?php echo $username;?>";
$(document).ready(function(){
  
      
   });    

   
   function show(){
    $("#te_password").attr("type","text");
    $("#i_eye").attr("style","display:none");
    $("#i_slash").attr("style","display:block");
  }

  function hide(){
    $("#te_password").attr("type","password");
    $("#i_eye").attr("style","display:block");
    $("#i_slash").attr("style","display:none");
  }

  function simpan() {
    var nama = $("#input-nama").val();
    var user = $("#input-username").val();

    $.post("../ajaxes/a_user.php",
     {
        user:user,
        nama:nama,
         jenis:"update_akun_nama",      
     },
     function(data){
        console.log(data);
        $("#input-nama").val(nama);
     });
    
  }

</script>