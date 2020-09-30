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
                        <label for="">Pilih Periode</label>
                        <select name="select" id="periode" class="form-control"  aria-describedby="help_pilihperiode">                                  
                        </select>
                        <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="form-group">
                        <label for="">Pilih Level</label>
                        <select class="form-control" name="" id="leveldipilih" aria-describedby="helpId" placeholder="">
                        <option>ECC Level 1</option>
                        <option>ECC Level 2</option>
                        <option>ECC Level 3</option>
                        <option>ECC Level 4</option>
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

                <!-- <div class="form-group text-right">
                    <a name="" id="" class="btn btn-primary" href="#" role="button">Simpan kelas</a>
                </div>
         -->

                <!-- tabel kelas yang tergenerate per hari-->
                <div class="table-responsive">
            
                <table class="table" id="table1">
                    <thead>
                    <tr>
                        <th scope="col" class="sort" data-sort="name">Nama Kelas</th>
                        <th scope="col" class="sort" data-sort="budget">Dosen/Hari/Jam/kuota</th>
                        <th scope="col" class="sort" data-sort="budget">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td scope="col" class="sort" data-sort="name">Kelas A</td>
                        <td scope="col" class="sort" data-sort="budget">
                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#exampleModal">Atur Dosen/Hari/Jam/kuota</button>
                        </td>
                        <td scope="col" class="sort" data-sort="name"></td>
                    </tr>
                    <tr>
                        <td scope="col" class="sort" data-sort="name">Kelas B</td>
                        <td scope="col" class="sort" data-sort="budget">
                        Dosen : A / Hari : Senin / Jam : 06.30 / Kuota : 30
                        </td>
                        <td scope="col" class="sort" data-sort="budget">
                            <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#exampleModal">Ubah Dosen/Hari/Jam/kuota</button>
                            <button type="button" class="btn btn-danger btn-sm" >Non-aktifkan</button>
                        </td>
                    </tr>
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
                        <select name="select" id="periode_all" class="form-control" aria-describedby="help_pilihperiode">                                  
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

<script >
    
    //Generate banyak kelas yang akan dibuka per-levelnya
    function generate() {
        var sel = document.getElementById('banyakkelas');
        var level_sel = document.getElementById('leveldipilih');
        var char = ['A','B','C','D','E','F'];

        console.log( level_sel.value + " - " + sel.value );
        var btn_aksi1 = "<button type='button' class='btn btn-default btn-sm' data-toggle='modal' data-target='#exampleModal'>Atur Dosen/Hari/Jam/kuota</button>";
         for (var i = 0; i < sel.value; i += 1) {
            var nama_kelas = level_sel.value + " - " + char[i];
            
             $("#table1").append(" <tr><td>" + nama_kelas + "</td> <td>" + btn_aksi1 + "</td> <td>" + i + "</td> </tr>");
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

    
</script>
