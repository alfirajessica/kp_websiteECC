<style>
    .navbar-nav .nav-item .nav-link {
    color: red;
}
.navbar-nav .nav-item.active .nav-link,
.navbar-nav .nav-item:hover .nav-link {
    color: pink;
}
}
     
</style>


<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <!-- <a class="navbar-brand" href="./"><img src="../images/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="../images/logo2.png" alt="Logo"></a> -->

            <a class="navbar-brand" href="./">ECC</a>
            <a class="navbar-brand hidden" href="./">ECC</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" id="dashboard" href="dashboard.php" onclick="dipilih(this.id)"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">Fitur</h3><!-- /.menu-title -->
                <li id="place">
                    <a id="placement" href="placement.php" onclick="dipilih(this.id)"> <i class="menu-icon fa fa-laptop"></i>Placement</a>
                </li>
                <li>
                    <a href="kelas.php"> <i class="menu-icon fa fa-laptop"></i>Kelas</a>
                </li>
                <li>
                    <a href="mahasiswa.php"> <i class="menu-icon fa fa-laptop"></i>Perwalian ECC</a>
                </li>
                <li>
                    <a href="nilai.php"> <i class="menu-icon fa fa-laptop"></i>Nilai</a>
                </li>
                <li>
                    <a href="dosen.php"> <i class="menu-icon fa fa-laptop"></i>Dosen ECC</a>
                </li>
                <li>
                    <a href="ruangan.php"> <i class="menu-icon fa fa-laptop"></i>Ruang ECC</a>
                </li>
                <li>
                    <a href="transkrip.php"> <i class="menu-icon fa fa-laptop"></i>Transkrip ECC</a>
                </li>
                
                <!-- <li>
                    <a href="Splacement.php"> <i class="menu-icon fa fa-laptop"></i>Splacement</a>
                </li> -->
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<script>
function dipilih(clicked_id) {
    console.log(clicked_id);
    $("#place").addClass("active");
}

</script>