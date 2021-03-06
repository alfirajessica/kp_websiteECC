<!DOCTYPE html>
<html>

<!-- head -->

<?php 
require_once("head.php");
require_once "../config/conn.php";
$arr = unserialize($_SESSION["user"]);

$username = $arr->get_u();
$nama = $arr->getnama($username);

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
                <h4 class="mb-0">Pengaturan Akun</h4>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="default-tab">
              <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">Profil</a>
                      <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Ubah Password</a>
                      
                  </div>
              </nav>
              <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                  <form>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label text-right">Nama</label>
                            <div class="col-sm-10">
                            <input type="text" id="input-nama" class="form-control" value="<?php echo $nama; ?>">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label text-right">Username</label>
                            <div class="col-sm-10">
                            <input type="text" id="input-username" class="form-control" disabled value=<?php echo $username; ?>>
                            </div>
                    </div>
                    <div class="form-group text-right">
                      <button class="btn btn-outline-primary" type="button" onclick="simpan()">Simpan Perubahan</button>
                    </div>
                  </form>
              </div>
              <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                <form>
                  <div class="alert alert-warning" role="alert">
                    <strong>Perhatian! </strong> Isi jika Anda ingin mengubah password
                  </div>

                  <div class="form-group row">
                      <label for="staticEmail" class="col-sm-3 col-form-label text-right">Password Baru</label>
                          <div class="col-sm-9">
                            <div class="input-group input-group-merge input-group-alternative">
                              <input class="form-control" placeholder="Password" id="te_password" type="password">
                                <span class="input-group-text" id="i_eye" style="display:block;" onclick="show()"><i class="fa fa-eye"></i></span>
                                <span class="input-group-text" id="i_slash" style="display:none;" onclick="hide()"><i class="fa fa-eye-slash"></i></span>
                            </div>
                          </div>
                  </div>

                  <div class="form-group row">
                      <label for="staticEmail" class="col-sm-3 col-form-label text-right">Konfirmasi Password Baru</label>
                          <div class="col-sm-9">
                            <div class="input-group input-group-merge input-group-alternative">
                              <input class="form-control" placeholder="Konfirmasi Password" id="te_cpassword" type="password">
                              <span class="input-group-text" id="i_eye" style="display:block;" onclick="show()"><i class="fa fa-eye"></i></span>
                              <span class="input-group-text" id="i_slash" style="display:none;" onclick="hide()"><i class="fa fa-eye-slash"></i></span>
                            </div>
                          </div>
                  </div>

                  <div class="form-group text-right">
                    <button type="button" class="btn btn-outline-primary" onclick="gantipass()">Simpan Password</button>
                    </div>
                </form>
              </div>
            </div><!-- end of default-tab -->

            <!-- <form>

              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Nama</label>
                      <input type="text" id="input-nama" class="form-control" value="<?php echo $nama; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Username</label>
                      <input type="text" id="input-username" class="form-control" disabled value=<?php echo $username; ?>>
                    </div>
                  </div>
                  <div class="alert alert-warning" role="alert">
                    <strong>Isi jika Anda ingin mengubah password</strong>
                  </div>
                  <div class="col-lg-8">
                    <div class="form-group">
                      <div class="input-group input-group-merge input-group-alternative">
                        <input class="form-control" placeholder="Password" id="te_password" type="password">
                        <span class="input-group-text" id="i_eye" style="display:block;" onclick="show()"><i class="fa fa-eye"></i></span>
                        <span class="input-group-text" id="i_slash" style="display:none;" onclick="hide()"><i class="fa fa-eye-slash"></i></span>

                      </div>
                      <div class="input-group input-group-merge input-group-alternative">
                        <input class="form-control" placeholder="Confirm Password" id="te_cpassword" type="password">
                        <span class="input-group-text" id="i_eye" style="display:block;" onclick="show()"><i class="fa fa-eye"></i></span>
                        <span class="input-group-text" id="i_slash" style="display:none;" onclick="hide()"><i class="fa fa-eye-slash"></i></span>

                      </div>
                      <button type="button" class="btn btn-outline-primary" onclick="gantipass()">Ubah Password</button>
                    </div>

                  </div>

                </div>
                <div class="form-group text-right">
                  <button class="btn btn-outline-primary" type="button" onclick="simpan()">Simpan</button>
                </div>
              </div>
            </form> -->
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
          <button id="btn_updatekelas" type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end of Modal untuk lihat mahasiswa berdasarkan kelas yg dipilih -->

</body>
<!-- Argon Scripts -->
<?php include_once('scripts.php') ?>

</html>
<script>
  var username = "<?php echo $username; ?>";
  var nama = "<?php echo $nama; ?>";
  $(document).ready(function() {


  });


  function show() {
    $("#te_password").attr("type", "text");
    $("#i_eye").attr("style", "display:none");
    $("#i_slash").attr("style", "display:block");
  }

  function hide() {
    $("#te_password").attr("type", "password");
    $("#i_eye").attr("style", "display:block");
    $("#i_slash").attr("style", "display:none");
  }

  function simpan() {
    var nama = $("#input-nama").val();
    var user = $("#input-username").val();

    $.post("../ajaxes/a_user.php", {
        user: user,
        nama: nama,
        jenis: "update_akun_nama",
      },
      function(data) {
        console.log(data);
        $("#input-nama").val(nama);
        $("#input-username").val(user);
        window.location.reload();
      });

  }


  function gantipass() {
    var password = $("#te_password").val();
    var cpassword = $("#te_cpassword").val();

    if (password == cpassword) {
      $.post("../ajaxes/a_login.php", {
          kind: "ganti_password",
          password: password
        },
        function(data) {
          console.log(data);
          if (data == "Berhasil") {
            $("#te_password").val("");
            $("#te_cpassword").val("");
          }
        });
    } else {
      alert("Password dan Konfirmasi password harus sama !");
    }

  }
</script>