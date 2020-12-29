<!DOCTYPE html>
<html>

<!-- head -->
<?php require_once "head_login.php"; ?>

<body style="overflow: hidden;">
  
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-dark py-7 py-lg-7 pt-lg-3">
      <div class="container">
        <div class="header-body text-center mb-4">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-8">
              <h1 class="text-white">Sistem Informasi ECC </h1>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5" style="overflow: hidden">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card mb-0" >
            
            <div class="card-body px-lg-5 py-lg-5">
              
              <form role="form">
              
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input class="form-control" id="te_username" placeholder="Username" type="email">
                    
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" id="te_password" type="password">
                    <span class="input-group-text" id="i_eye" style="display:block;" onclick="show()"><i class="fa fa-eye"></i></span>
                    <span class="input-group-text" id="i_slash" style="display:none;" onclick="hide()" ><i class="fa fa-eye-slash"></i></span>
                  </div>
                </div>
                <div class="text-center">
                <a onclick="forgot()" ><small>Lupa password?</small></a>
                </div>
                
                <div>
                  <button type="button" class="btn btn-outline-primary btn-block my-4" onclick="login()">LOGIN</button>
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
<?php include_once('scripts.php')?>


<script>
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

  function login(){
    var user=$("#te_username").val();
    var pass=$("#te_password").val();

    var input={
      u:user,
      p:pass
    };
    
    $.post("../ajaxes/a_login.php", {
        kind: "login",
        input:JSON.stringify(input)
    }, function(data) {
        var arr=JSON.parse(data);
        if (arr.status=="1") {
          window.location.href=arr.link;
        }else{
          alert(arr.data);
        }
        console.log(data);
    });

    

  }

  function forgot() {
    window.location.href="forgot.php";
    // $.post("../ajaxes/a_login.php", {
    //     kind: "forgot",
    // }, function(data) {
    //     console.log(data);
    // });
  }

</script>

</html>