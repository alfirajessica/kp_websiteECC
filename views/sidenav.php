
<?php $arr=unserialize($_SESSION["user"]); 
        
        $level = $arr->get_level();

        if($level == "admin")
                { require("admin-views/admin_sidenav.php"); }
              else if ($level == "dosen") {
                require("dosen-views/dosen_sidenav.php");
              }
?>
<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
        <div class="header-menu">
            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                        <img class="user-avatar rounded-circle" alt="User Avatar" src="../images/admin.jpg">
                    </span>
                    <div class="media-body  ml-2  d-none d-lg-block">
                        <span class="mb-0 text-sm  font-weight-bold"> <?php $arr=unserialize($_SESSION["user"]); echo $arr->get_nama();?></span>
                    </div>
                    </div>
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="akun.php"><i class="fa fa-cog"></i> Pengaturan Akun</a>
                        <a class="nav-link" href="login.php"><i class="fa fa-power-off"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- /header -->

<script>
function dipilih(clicked_id) {
    console.log(clicked_id);
}
</script>