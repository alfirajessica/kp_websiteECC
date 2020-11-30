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

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input class="form-control" id="te_username" placeholder="Masukan Email" type="email">
                                        <label class='text-secondary' for="">dengan memasukan alamat email anda akan mereset password sesuai link yang dikirim</label>
                                    </div>
                                </div>

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
        $.post("../ajaxes/a_login.php", {
            kind: "forgot",
            email:$("#te_username").val()
        }, function(data) {
            console.log(data);
        });
    }
</script>

</html>