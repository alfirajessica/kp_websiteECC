<!DOCTYPE html>
<html>

<!-- head -->
<?php require_once "head_login.php"; ?>

<body style="overflow: hidden; background-color:DarkSlateGray;">

    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header py-7 py-lg-7 pt-lg-3" style="background-color:DarkSlateGray;">
            <div class="container">
                <div class="header-body text-center mb-4">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">Lupa Password </h1>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-secondary" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5" style="overflow: hidden">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card border-0 mb-0" style="background-color:WhiteSmoke;">

                        <div class="card-body px-lg-5 py-lg-5">

                            <form role="form">

                                <!-- <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input class="form-control" id="te_username" placeholder="Masukan Email" type="email">
                                        <label class='text-secondary' for="">dengan memasukan alamat email anda akan mereset password sesuai link yang dikirim</label>
                                    </div>
                                </div> -->

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input class="form-control" id="te_user" placeholder="Masukan Username" onkeyup='finduser()' type="text">

                                    </div>
                                    <label id="info_user" class='text-danger'></label>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input class="form-control" id="te_pass" placeholder="Masukan  Password" type="password">

                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input class="form-control" id="te_cpass" placeholder="Masukan Konfirmasi Password" type="password">

                                    </div>
                                </div>

                        </div>

                        <div class="text-center">
                            <a href="login.php"><small> Masuk !</small></a>
                        </div>



                        <div class="text-center">
                            <button type="button" class="btn btn-primary my-4" onclick="kirim()">Kirim</button>
                        </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>


</body>
<!-- Argon Scripts -->
<?php include_once('scripts.php') ?>


<script>
    function kirim() {
        if ($("#te_pass").val() == $("#te_cpass").val()) {
            $.post("../ajaxes/a_login.php", {
                kind: "forgot",
                email: $("#te_user").val(),
                pass: $("#te_pass").val()
            }, function(data) {
                console.log(data);
                if (data==1) {
                    alert("Berhasil ganti password di lupa password");
                }else{
                    alert("Gagal");
                }
            });
        } else {
            alert("Password dan Konfirmasi password harus sama !");
        }

    }

    function finduser() {
        $.post("../ajaxes/a_login.php", {
            kind: "finduser",
            email: $("#te_user").val()
        }, function(data) {
            if (data == 0) {
                $("#info_user").html("Akun tidak ditemukan");
            } else {
                $("#info_user").html("");
            }
        });
    }
</script>

</html>