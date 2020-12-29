<!-- row -->
<div class="row">
    <div class="col-md-12"> <!-- col-md-12 -->
        <div class="card">
            <div class="card-header">
                <strong class="card-title">List Ruangan</strong>
            </div>

            <div class="card-body">  
                <div class="card-header">
                    <form>
                        <div class="alert alert-info" role="alert"> Gunakan form ini untuk menambah ruang kelas baru</div>
                        
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label text-right">Gedung</label>
                                <div class="col-sm-4">
                                    <input type="text" name="" id="namagedung" class="form-control">
                                    <small id="helpId" class="form-text text-muted">Masukkan Nama Gedung : B/U/L</small>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label text-right">Nomor Ruang</label>
                                <div class="col-sm-4">
                                    <input type="text" name="" id="nomorruang" class="form-control">
                                    
                                </div>
                        </div>

                        <small id="warning1"></small>
                        <button class="btn btn-primary btn-block" type="button" id="btn_generate" onclick="simpanruang()" >Simpan</button>
                            
                    </form>
                </div>
                <br>
        
                <div class="table-responsive">
                    <table id="table_lihatruangan" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Nama Ruang</th>
                                <th>Status Ruang</th>
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

<!-- Modal atur dosen/jam/kuota kelas ecc  -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
          <form role="form">
            
                <table class="table table-borderless table-md text-right">
                    <tbody>
                        <tr>
                            <td scope="row">Nama Ruang : </td>
                            <td class="text-left">
                            <input type="text" name="" id="namaruang_modal" class="form-control" placeholder="" aria-describedby="help_namaruang_modal" oninput="namaruang()">
                              <small id="help_namaruang_modal" class="form-text text-muted"></small>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Status : </td>
                            <td class="text-left">
                            <select class="form-control" name="" id="pilih_status" aria-describedby="helpId" placeholder="">
                                <option value="Aktif">Aktif</option>
                                <option value="Non-aktif">Non-aktif</option>
                            </select>
                            
                            </td>
                        </tr>
                        
                    </tbody>
                </table> 
            </form>
            
          </div>
          <div class="modal-footer">
            <button id="btn_updateruang" type="button" class="btn btn-primary" onclick="update_ruang()" >Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end of Modal atur dosen/jam/kuota kelas ecc  -->

    <!-- Modal lihat daftar kelas  -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" id="modal_lihatdaftarkelas" role="dialog" style="overflow-y:scroll;">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <div id="idruang" style="display:none"></div>
            <h5 class="modal-title">Daftar Kelas ECC pada ruang <i id="namaruangmodal"> </i> <br>
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
                            <th>Dosen</th>
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
    <!-- end of Modal lihat daftar kelas  -->
    
<script>
var statusbtnsimpan ="simpan";
//menghilangkan spasi saat input nama ruang
function namaruang() {
    $("#namaruang, #namaruang_modal").on({
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

function reset() {
    $("#namagedung, #nomorruang").val("");
}

function simpanruang() {
    console.log(statusbtnsimpan);
    var namagedung = $("#namagedung").val().toUpperCase();
    var nomorruang = $("#nomorruang").val();
    var statusruang = $("#statusruang").val();

    var ruang = namagedung + "-"+nomorruang;

    //cek ruangan ada apa tdk
    $.post("../ajaxes/a_ruang.php",
    {
        ruang:ruang,
        jenis:"cek_ruang",
    },
    function(data){
        console.log(data["nama_ruang"]);
        var id_ruangkelas = data["id_ruangkelas"];
        if (data["nama_ruang"] == ruang) {
            if (statusbtnsimpan == "simpan") {
                console.log("nama ruang : "+ data["nama_ruang"] +" telah ada");
                $("#warning1").html("nama ruang : "+data["nama_ruang"] +" telah ada").css("color","red");

            }
            else if (statusbtnsimpan == "ubah") {
                
                $.post("../ajaxes/a_ruang.php",
                {
                    id_ruangkelas:id_ruangkelas,
                    ruang:ruang,
                    jenis:"update_namaruanglama",
                },
                function(data){
                    alert(data);
                    reset();
                });
               // console.log("berhasil ubah");
                
            }
            
        }
        else if (data["nama_ruang"] != ruang) {
            if (statusbtnsimpan == "simpan") {
                $("#warning1").html("");
                $.post("../ajaxes/a_ruang.php",
                {
                    ruang:ruang,
                    jenis:"simpan_ruang",
                },
                function(data){
                    alert(data);
                    $('#table_lihatruangan').DataTable().ajax.reload(); //reload ajax datatable 
                    $("#namagedung, #nomorruang").val("");
                });
            }
            else if (statusbtnsimpan == "ubah") {
               // var id_ruangkelas = data["id_ruangkelas"];
                $.post("../ajaxes/a_ruang.php",
                {
                    id_ruangkelas:id_ruangkelas,
                    ruang:ruang,
                    jenis:"update_namaruangbaru",
                },
                function(data){
                    alert(data);
                    reset();
                });
               // console.log("berhasil ubah");
                
            }
            
        }
        
       $('#table_lihatruangan').DataTable().ajax.reload(); //reload ajax datatable 
      
    });  
}

//datatable ruang
function datatable_lihatsemuaruang() {
    //datatable list barang
    var table= "";
    table = $('#table_lihatruangan').DataTable( 
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
             "url":"../datatables/admin-datatable/ruangall_dt.php",
             "type":"POST"
         },
         "deferRender":true,
         "aLengthMenu":[[10,20,50],[10,20,50]], //combobox limit
         "columns":[
            
             {"data":"nama_ruang"},
             {"data":"status_ruang",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    if (row.status_ruang == 1) //dosen aktif
                    {
                        return "<label class='text-success font-weight-bold'>Aktif</label> ";
                    }
                    else if (row.status_ruang == 0) //dosen tdk aktif
                    {
                        return "<label class='text-danger font-weight-bold'>Tidak Aktif</label> ";
                    }
                   
                }
            },
            {"data":"status_ruang",
                "searchable": false,
                "orderable":false,
                "render": function (data, type, row) {  
                    var id_ruangkelas = row.id_ruangkelas;
                    var nama_ruangkelas = row.nama_ruang;
                    var status = row.status_kelas;
                    var btn = "";
                    if(row.status_ruang == "1"){
                        btn = "<button onclick=\"lihatdaftar_kelas(\'"+id_ruangkelas+"\',\'"+nama_ruangkelas+"\')\" type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#modal_lihatdaftarkelas' >Nonaktifkan</button>";
                    }
                    else if (row.status_ruang == "0") {
                        btn = "<button onclick=\"lihatdaftar_kelas(\'"+id_ruangkelas+"\',\'"+nama_ruangkelas+"\')\" type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#modal_lihatdaftarkelas' >Aktifkan</button>";
                    }
                   // "<button onclick=\"atur_ruang(\'"+id_ruangkelas+"\')\" type='button' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#exampleModal'>Ubah</button> " + 
                    return "<button onclick=\"lihatdaftar_kelas(\'"+id_ruangkelas+"\',\'"+nama_ruangkelas+"\')\" type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#modal_lihatdaftarkelas' >Lihat Daftar kelas</button> " + btn;
                    
                },
                "target":-1,
            },
            
         ],
    });     
}

var idruang="";
function atur_ruang(id_ruangkelas) {
    //melakukan show value ke modal
    $.post("../ajaxes/a_ruang.php",
    {
        id_ruangkelas:id_ruangkelas,
        jenis:"get_detail_ruang",
    },
    function(data){
       // $('#namaruang_modal').val(data["nama_ruang"]);
       var ruang = data["nama_ruang"];
       var slice_ged = ruang.slice(0,1); //get gedungny
       var slice_nomor = ruang.split("-");
       console.log(slice_ged);
       console.log(slice_nomor[1]);

       //tinggal masukkin ke input atas aja
       $("#namagedung").val(slice_ged);
       $("#nomorruang").val(slice_nomor[1]);
       statusbtnsimpan = "ubah";

        // if (data["status_ruang"] == 0)//tdk aktif
        // {
        //     $('#pilih_status').val("Non-aktif");
        // }
        // else if(data["status_ruang"] == 1)
        // {
        //     $('#pilih_status').val("Aktif");
        // }
        $('#table_lihatruangan').DataTable().ajax.reload(); //reload ajax datatable 
        idruang = data["id_ruangkelas"];
    });
}

function update_ruang() {
    
    var namaruang = $("#namaruang_modal").val();
    var statusruang = $("#pilih_status").val();

    //cek namaruang
    if (namaruang == "") {
        $("#help_namaruang_modal").html("Nama ruang tidak boleh kosong");
    }


    //jalankan perintah update
    else if (namaruang != "") {

        //cek status
        if (statusruang == "Aktif") {
            statusruang = 1;
        }
        else if (statusruang == "Non-aktif") {
            statusruang = 0;
        }

        $("#help_namaruang_modal").html("");
        $.post("../ajaxes/a_ruang.php",
        {
            id_ruangkelas:idruang,
            namaruang:namaruang,
            statusruang:statusruang,
            jenis:"update_ruang",
        },
        function(data){
            $('#table_lihatruangan').DataTable().ajax.reload(); //reload ajax datatable 
            $("#btn_updateruang").attr("data-dismiss", "modal");  
        });
        

    }

    
}

function lihatdaftar_kelas(id_ruangkelas, nama_ruangkelas) {
    datatable_kelasaktif(id_ruangkelas);
    $("#namaruangmodal").text(nama_ruangkelas);
    $("#idruang").text(id_ruangkelas);

    //melihat daftar kelas yang menggunakan ruangan tsb
}

function simpan_periode() {
    var periode = $("#periode").val();
    var id_ruangkelas = $("#idruang").text();
    
    datatable_kelasaktif(id_ruangkelas);
}


function datatable_kelasaktif(id_ruangkelas) {
    //var periode = $("#periode_lihatkelas").val();
   
    var periode = $("#periode").val();
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
                "url":"../datatables/admin-datatable/ruang-kelasaktif.php",
                "type":"POST",
                "data":{"id_ruangkelas":id_ruangkelas, "periode":periode},
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
                    var ruang = row.id_ruangkelas;
                    var kuota = row.kuota;

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
                    // return "Day : " + hari + "<br> Time : " + jam_awal + "-" + jam_akhir + "<br> Room : " + ruang + "<br> Quota : " + kuota;

                   
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
            {"data":"dosen",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    if (row.dosen == '-') //kelas aktif
                    {
                        return "<p class='text-danger'> Not Filled </p>";
                    }
                    else if (row.dosen != '-') //kelas tdk aktif
                    {
                        return row.nama;
                       
                    }
                    
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
                        '<tr class="group"><td colspan="6"> Level'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    }) 
    //end of datatble list barang
}




</script>