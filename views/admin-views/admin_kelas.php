<div class="card shadow"> <!-- card shadow -->
    <div class="card-header border-1">
        <div class="nav-wrapper">
            <!-- tabs -->
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Atur Kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Lihat Kelas</a>
                </li>
            </ul>
            <!--end tabs -->
        </div>
    </div>


    <div class="card-body"> <!-- card body -->
        <!-- tab content -->
        <div class="tab-content" id="myTabContent">
            <!-- atur kelas -->
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
    
                <!-- form tambah kelas -->
                <form role="form">
                    <div class="form-group">
                        <label for="">Periode</label>
                        <select name="select" id="periode" class="form-control"  aria-describedby="help_pilihperiode">                                  
                        </select>
                        <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="form-group">
                        <label for="">Level</label>
                        <select class="form-control" name="" id="leveldipilih" aria-describedby="helpId" placeholder="">
                        <option value="-1">pilih level</option>
                        <option>Level 1</option>
                        <option>Level 2</option>
                        <option>Level 3</option>
                        <option>Level 4</option>
                        </select>
                        <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="form-group">
                    <label for="">Banyak Kelas akan dibuka</label>
                        <div class="input-group mb-3">
                        <select class="form-control" id="banyakkelas" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" id="button-addon2" onclick="generate()" >Generate kelas</button>
                        </div>
                        </div>
                        <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>
                </form>
                <!-- end of form tambah kelas -->

                <div class="form-group text-right">
                    <a name="" id="" class="btn btn-primary" href="#" role="button">Aktifkan Semua kelas</a>
                </div>
        

                <!-- tabel kelas yang tergenerate per hari-->
                <div class="table-responsive">
            
                <table class="table" id="table1">
                    <thead>
                    <tr>
                        <th style="display:none"> Id kelas </th>
                        <th scope="col" class="sort" data-sort="name">Nama Kelas</th>
                        <th scope="col" class="sort" data-sort="budget">Dosen/Hari/Jam/kuota</th>
                        <th scope="col" class="sort" data-sort="budget">Status</th>
                        <th scope="col" class="sort" data-sort="budget">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <tbody>

                </table>
                </div>
                <!-- end of tabel kelas yang tergenerate -->

            </div>
            <!-- end of atur kelas -->

            <!-- lihat kelas -->
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                <div class="form-group">
                    <label for="">Pilih Periode</label>
                    <div class="input-group mb-3">
                        <select name="select" id="periode_all"  class="form-control" aria-describedby="help_pilihperiode">                                  
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" id="button-addon2">Cari</button>
                        </div>
                    </div>
                    <small id="helpId" class="form-text text-muted">Help text</small>

                    
                </div>

                <div class="table-responsive">
                    <table id="table_lihatkelas" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Nama Kelas</th>
                                <th>Dosen/Jam/Hari</th>
                                <th>Mahasiswa Terdaftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

                <!-- <div class="table-responsive">
                    <table class="table" >
                        <thead>
                            <tr>
                            <th scope="col" class="sort" data-sort="name">Nama Kelas</th>
                            <th scope="col" class="sort" data-sort="budget">Dosen/Jam/Hari</th>
                            <th scope="col" class="sort" data-sort="budget">Mahasiswa Terdaftar</th>
                            <th scope="col" class="sort" data-sort="budget">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td scope="col" class="sort" data-sort="name">Kelas A</td>
                            <td scope="col" class="sort" data-sort="budget">
                                Dosen : A / Hari : Senin / Jam : 06.30
                            </td>
                            <td scope="col" class="sort" data-sort="name">0</td>
                            <td scope="col" class="sort" data-sort="budget">
                                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#exampleModal">Lihat List Mahasiswa</button>
                            </td>
                            </tr>
                            <tr>
                            <td scope="col" class="sort" data-sort="name">Kelas B</td>
                            <td scope="col" class="sort" data-sort="budget">
                                Dosen : A / Hari : Senin / Jam : 06.30
                            </td>
                            <td scope="col" class="sort" data-sort="name">18</td>
                            <td scope="col" class="sort" data-sort="budget">
                                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#exampleModal">Lihat List Mahasiswa</button>
                            </td>
                            </tr>
                        <tbody>
                    </table>
                </div> -->
                <!-- end of tabel kelas yang tergenerate -->
            </div> <!-- end of lihat kelas -->
        </div> <!-- end of tab content -->
    </div> <!--end of card body -->
</div> <!--end of card shadow -->

<!-- Modal atur dosen/jam/kuota kelas ecc  -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Atur Dosen/Jam/Kuota kelas ini</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form role="form">
                <table class="table table-borderless table-md text-right">
                    <tbody>
                        <tr>
                            <td scope="row">Pilih Dosen : </td>
                            <td class="text-left">
                              <select class="form-control" name="" id="all_dosen">
                              
                              </select>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Pilih Hari : </td>
                            <td class="text-left">
                            <select class="form-control" name="" id="pilihhari" aria-describedby="helpId" placeholder="">
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                            </select>
                            
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Jam Awal : </td>
                            <td class="text-left">
                            <input class="form-control" type="time" value="10:30:00" id="jamawal">
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Jam Akhir : </td>
                            <td class="text-left">
                            <input class="form-control" type="time" value="10:30:00" id="jamakhir">
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Kuota : </td>
                            <td class="text-left">
                                <input type="number" class="form-control-sm" name="" id="kuota" aria-describedby="helpId" placeholder=""> 
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </form>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="updatekelasini()">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end of Modal atur dosen/jam/kuota kelas ecc  -->
<script >
    
    //Generate banyak kelas yang akan dibuka per-levelnya
    function kelas_blmaktif() {
        //$("#table1 body").empty();
        var periode = document.getElementById('periode');
        $.post("../ajaxes/a_kelas.php",
            {
                idperiode:periode.value,
                jenis:"kelas_blmaktif",
            },
            function(data){
               console.log(data);
               $("#table1").append(data);
            });
    }

    // function pilihperiode() {
        
    //     kelas_blmaktif();
    // }
    
    function generate() {
       // kelas_blmaktif();
        var periode = document.getElementById('periode');
        var sel = document.getElementById('banyakkelas');
        var level_sel = document.getElementById('leveldipilih');
        var char = ['A','B','C','D','E','F'];

        console.log(periode.value + level_sel.value);
        if (periode.value == "-1") {
            alert("anda belum pilih periode!");
        }
        else if(level_sel.value == "-1"){
            alert("anda belum pilih level");
        }
        else if (periode.value != "-1" && level_sel.value != "-1") {
            var detailkelas = "Dosen : - <br> Hari : - <br> Jam : - <br> Kuota : 0 ";
        var statuskelas = "Belum Aktif";
        var btn_aksi1 = "<button type='button' class='btn btn-default btn-sm' data-toggle='modal' data-target='#exampleModal'>Atur Dosen/Hari/Jam/kuota</button>";
        var btn_aksi2 = "<button type='button' class='btn btn-danger btn-sm' >Hapus</button>";
        for (var i = 0; i < sel.value; i += 1) {
            var nama_kelas = level_sel.value + " - " + char[i];
            
            $("#table1").append(" <tr><td></td><td>" + nama_kelas + "</td> <td>" + detailkelas +" </td> <td>"+ statuskelas +"</td> <td>" + btn_aksi1 + btn_aksi2 +"</td> </tr>");

            //yang dimasukkan ke db :
            // id periode, id_kelas, level ecc, nama kelas, hari, jam, kuota, dosen, status kelas
            $.post("../ajaxes/a_kelas.php",
            {
                idperiode:periode.value,
                level:level_sel.value,
                namakls:char[i],
                jenis:"insert_kelasdb",
            },
            function(data){
                console.log(data);
            });
        }  
        }
        
    }

    function datatable_lihatkelas() {
        //datatable list barang
        var table= "";
        table = $('#table_lihatkelas').DataTable( 
        {
            dom: 'Bfrtip', 
             "processing":true,
             "serverSide":true,
             "bInfo" : false,
             dom:"<'myfilter'f><'mylength'l>t",
             "pagingType": "numbers",
             "ordering":true, //set true agar bisa di sorting
             "order":[[0, 'asc']], //default sortingnya berdasarkan kolom, field ke 0 paling pertama
             "ajax":{
                 "url":"../datatables/admin-datatable/kelas_dt.php",
                 "type":"POST"
             },
             "deferRender":true,
             "aLengthMenu":[[10,20,50],[10,20,50]], //combobox limit
             "columns":[
                
                 {"data":"nama_kelas"},
                 {"data":"hari"},
                 {"data":"dosen"},
                 {"data":"status_kelas",
                    "searchable": false,
                    "orderable":false,
                    "render": function (data, type, row) {  
                        if (row.status_kelas == '1') //kelas aktif
                        {
                            return "<button type='button' class='btn btn-default btn-sm' data-toggle='modal' data-target='#exampleModal'>Lihat List Mahasiswa</button>";
                        }
                        else if (row.status_kelas == '0') //kelas tdk aktif
                        {
                            return "<button type='button' class='btn btn-default btn-sm' data-toggle='modal' data-target='#exampleModal'>Lihat List Mahasiswa</button>";
                        }
                       
                    }
                },
             ],
        }) 
        //end of datatble list barang
    }

    function get_dosen() {
        $.post("../ajaxes/a_dosen.php",
        {
            jenis:"get_alldosen",
        },
        function(data){
            $("#all_dosen").html(data); //di atur kelas
        });
    }

    function updatekelasini() {
       //get id kelas
       


        /*$.post("../ajaxes/a_kelas.php",
        {
            dosen : document.getElementById('all_dosen').value,
            hari: document.getElementById('pilihhari').value,
            jam_awal : document.getElementById('jamawal').value,
            jam_akhir : document.getElementById('jamakhir').value,
            kuota : document.getElementById('kuota').value,
            jenis:"update_kelas",

        },
        function(data){
            $("#all_dosen").html(data); //di atur kelas
        });*/
    }
    
</script>
