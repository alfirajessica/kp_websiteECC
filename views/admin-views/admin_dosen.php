

<!-- row -->
<div class="row">
    <div class="col-md-12"> <!-- col-md-12 -->
        <div class="card">
            <div class="card-header">
                <strong class="card-title">List Dosen</strong>
            </div>

            <div class="card-body">  
                <div class="card-header">
                        <form>
                            <div class="alert alert-info" role="alert"> Gunakan form ini untuk menambah user dosen baru</div>
                            <div class="form-group"> <!-- form group row radio -->
                                <label for="">Nama</label>
                                <input type="text" name="" id="namadosen" class="form-control" placeholder="" aria-describedby="help_nama">
                              <small id="help_nama" class="form-text text-muted"></small>
                            </div>

                            <div class="form-group">
                                <label for="">username</label>
                                <div class="input-group mb-3">
                                <input type="text" name="" id="userdosen" class="form-control" placeholder="" aria-describedby="help_username"> 
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary" onclick="simpandosen()">Simpan</button>
                                    </div>
                                </div>
                              <small id="help_username" class="form-text text-muted"></small>
                            </div>
                                
                        </form>
                    </div>
                    <br>
                
                
                <div class="table-responsive">
                    <table id="table_lihatsemuadosen" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Dosen</th>
                                <th>Username</th>
                                <th>Status Akun </th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div> <!-- end of col-md-12 -->
</div> <!-- end of row -->

<!-- Modal konfirmasi aktif/nonaktifkan user dosen-->
<div class="modal fade" id="statusdosen_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    
    <div class="modal-body" >
        <div id="isi-modal"></div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </div>
    </div>
</div>
</div>

<!-- Modal lihat mahasiswa  -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" id="modal_lihatdaftarkelas" role="dialog" style="overflow-y:scroll;">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div id="userdosenecc" style="display:none"></div>
            <h5 class="modal-title">Daftar Kelas ECC pada dosen <i id="namadosenecc"> </i> <br>
            <p> Daftar kelas dibawah adalah daftar kelas berdasarkan periode</p>
            </h5>

            <h6 id="title_table"></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="">Periode</label>
                <div class="input-group mb-3">
                    <select name="select" id="periode" class="form-control"  aria-describedby="help_pilihperiode"></select>
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button" id="btn_simpanperiode" onclick="simpan_periode()" > <i class="menu-icon fa fa-search"></i> Cari</button>
                    </div>
                </div>
                <label id="help_pilihperiode" style="color:red;"></label>
            </div>
          <div class="table-responsive">
                <table id="table_kelasaktif" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr class="clickable-row">
                            <th>#</th>
                            <th>Level</th>
                            <th>Level/Kelas</th>
                            <th>Hari/Jam</th>
                            <th>Ruang/Kuota</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>   
          </div>
        </div>
      </div>
    </div>
    <!-- end of Modal atur dosen/jam/kuota kelas ecc  -->
    

<script>
function userdosen() {
    $("#userdosen").on({
	keydown: function(e) {
  	if (e.which === 32)
    	return false;
  },
  keyup: function(){
  	this.value = this.value.toUpperCase();
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
    
  }
});
    
}

//simpan dosen -- menambah dosen baru
function simpandosen(){
    var namadosen = $("#namadosen").val();
    var userdosen = $("#userdosen").val();

    $.post("../ajaxes/a_dosen.php",{
        jenis:"simpandosen_baru",
        getnamadosen : namadosen,
        getuserdosen : userdosen
    },
        function(data){
            alert("berhasil tambah user baru");
            $('#table_lihatsemuadosen').DataTable().ajax.reload(); //reload ajax datatable 
            $("#namadosen, #userdosen").val("");

    }); 
}

function simpan_periode() {
    var periode = $("#periode").val();
    var username = $("#userdosenecc").text();
    
    datatable_kelasaktif_dosen(username);
}


function nonaktifkan(username, status) {
    $.post("../ajaxes/a_dosen.php",{
        jenis:"update_statusdosen",
        getuserdosen : username,
        getstatusdosen : status
    },
    function(data){
        console.log(username, status);
        alert(data);
        $('#table_lihatsemuadosen').DataTable().ajax.reload(); //reload ajax datatable 
    }); 
}

function datatable_lihatsemuadosen() {
        //datatable list barang
        var table= "";
        table = $('#table_lihatsemuadosen').DataTable( 
        {
            destroy:true,
            "responsive":true,
            "processing":true,
            "language": {
                "paginate": {
                    "first":      "First",
                    "last":       "Last",
                    "next":       "Next",
                    "previous":   "Previous"
                },
            },
            "serverSide":true,
            "ordering":true, //set true agar bisa di sorting
             "order":[[0, 'asc']], //default sortingnya berdasarkan kolom, field ke 0 paling pertama
             "ajax":{
                 "url":"../datatables/admin-datatable/dosenall_dt.php",
                 "type":"POST"
             },
             "deferRender":true,
             "aLengthMenu":[[10,20,50],[10,20,50]], //combobox limit
             "columns":[
                
                 {"data":"nama"},
                 {"data":"username"},
                 {"data":"status",
                    "searchable": false,
                    "orderable":false,
                    "render": function (data, type, row) {  
                        if (row.status == 1) //dosen aktif
                        {
                            return "<label class='text-success font-weight-bold'>Aktif</label> ";
                        }
                        else if (row.status == 0) //dosen tdk aktif
                        {
                            return "<label class='text-danger font-weight-bold'>Tidak Aktif</label> ";
                        }
                       
                    }
                },
                {"data":"status",
                    "searchable": false,
                    "orderable":false,
                    "render": function (data, type, row) {  
                        var username = row.username;
                        var status = row.status;
                        var nama = row.nama;
                        var btn="";
                        if (row.status == '1') //dosen aktif
                        {
                            btn =  "<button class='btn btn-danger btn-sm' onclick=\"nonaktifkan(\'"+username+"\',\'"+status+"\')\" >Non-aktifkan</button>";  
                        }
                        else if (row.status == '0') //dosen tdk aktif
                        {
                            btn = "<button class='btn btn-danger btn-sm' onclick=\"nonaktifkan(\'"+username+"\',\'"+status+"\')\">Aktifkan</button>";
                        }
                       
                        return "<button onclick=\"lihatdaftar_kelas(\'"+username+"\',\'"+nama+"\')\" type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#modal_lihatdaftarkelas'>Lihat Daftar kelas</button> " + btn;
                    },
                    "target":-1,
                },
                
             ],
        });     
}

function lihatdaftar_kelas(username,nama) {
    $("#namadosenecc").text(nama);
    $("#userdosenecc").text(username);
    datatable_kelasaktif_dosen(username);
    //melihat daftar kelas yang menggunakan ruangan tsb
}

function datatable_kelasaktif_dosen(username) {
    var periode = $("#periode").val();
    //datatable list barang
    var table= "";
    var groupColumn = 1;
    table = $('#table_kelasaktif').DataTable( 
    {
            destroy:true,
            "responsive":true,
            "processing":true,
            "language": {
                "paginate": {
                "first":      "First",
                "last":       "Last",
                "next":       "Next",
                "previous":   "Previous"
                },
            },
            "serverSide":true,
            "ordering":true, //set true agar bisa di sorting
            "ajax":{
                "url":"../datatables/admin-datatable/dosen-kelasaktif.php",
                "type":"POST",
                "data":{"username":username, "periode":periode},
            },
            "deferRender":true,
            "aLengthMenu":[[10,20,50],[10,20,50]], //combobox limit
            "order": [[1, 'asc']],
            "columnDefs": [
                { "visible": false, "targets": groupColumn }
            ],
            "columns":[
            {"data":"id_kelas",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    return "#";
                    
                }
            },
            {"data":"level_ecc"},
            {"data":"nama_kelas",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    return row.level_ecc + "/" + row.nama_kelas;
                    
                }},
            {"data":"hari",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    var hari = row.hari;
                    var jam_awal = row.jam_awal;
                    var jam_akhir = row.jam_akhir;
                    
                    // if (hari == "") {
                    //     hari = "<label class='text-danger'> Not Filled </label>";
                    // }
                    // if (jam_awal == null) {
                    //     jam_awal = "<label class='text-danger'> Not Filled </label>";
                    // }
                    // if (ruang == null) {
                    //     ruang = "<label class='text-danger'> Not Filled </label>";
                    // }
                    // else if (ruang !=0) {
                    //     ruang = row.nama_ruang;
                    // }
                    // if (kuota == 0) 
                    // {
                    //     kuota = "<label class='text-danger'> Not Filled </label>";
                    // }
                    return hari + "<br> Jam : " + jam_awal + "-" + jam_akhir;

                   
                }
            },
            {"data":"kuota",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    
                    var ruang = row.nama_ruang;
                    var kuota = row.kuota;

                    return ruang + "/ " + kuota;

                   
                }
            },
            ],
            "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="6"> Level '+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    }) 
    //end of datatble list barang
}


</script>