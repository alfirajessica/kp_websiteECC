<div class="row"> <!-- row -->        
    <!-- standar nilai ecc -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <div class="form-group">
                <label for="">Nama Ruang</label>
                    <div class="input-group mb-3">
                        <input type="text" name="" id="namaruang" class="form-control" placeholder="" aria-describedby="help_namaruang" oninput="namaruang()">
                        
                    </div>
                    <small id="help_namaruang" class="form-text text-muted"></small> 
            </div>
            <br>
            <label for="">status ruang secara default adalah Aktif</label>
            
            <button class="btn btn-outline-primary" type="button" id="btn_generate" onclick="simpanruang()" >Simpan</button>
                       
            </div>
        </div>
    </div> <!-- end of standar nilai ecc -->
</div> <!-- end of row -->

<!-- row -->
<div class="row">
    <div class="col-md-12"> <!-- col-md-12 -->
        <div class="card">
            <div class="card-header">
                <strong class="card-title">List Ruangan</strong>
            </div>

            <div class="card-body">          
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
    
<script>

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


function simpanruang() {
    var namaruang = $("#namaruang").val();
    var statusruang = $("#statusruang").val();

    //cek ruangan ada apa tdk
    $.post("../ajaxes/a_ruang.php",
    {
        namaruang:namaruang,
        jenis:"cek_ruang",
    },
    function(data){
        
        if (data["nama_ruang"] == namaruang) {
            console.log("nama ruang : "+ data["nama_ruang"] +" telah ada");
            $("#help_namaruang").html("nama ruang : "+data["nama_ruang"] +" telah ada");
        }
        else if (data["nama_ruang"] != namaruang) {
            $("#help_namaruang").html("");
            $.post("../ajaxes/a_ruang.php",
            {
                namaruang:namaruang,
                jenis:"simpan_ruang",
            },
            function(data){
                console.log(data);
                $('#table_lihatruangan').DataTable().ajax.reload(); //reload ajax datatable 
                $("#namaruang").val("");
            });
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
        dom: 'Bfrtip', 
         "processing":true,
         "serverSide":true,
         "bInfo" : false,
         dom:"<'myfilter'f><'mylength'l>t",
         "pagingType": "numbers",
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
                        return "<label class='text-success font-weight-bold'>Tidak Aktif</label> ";
                    }
                   
                }
            },
            {"data":"status_ruang",
                "searchable": false,
                "orderable":false,
                "render": function (data, type, row) {  
                    var id_ruangkelas = row.id_ruangkelas;
                    var status = row.status_kelas;

                    return "<button onclick=\"atur_ruang(\'"+id_ruangkelas+"\')\" type='button' class='btn btn-default btn-sm' data-toggle='modal' data-target='#exampleModal'>Ubah</button>" + "<button onclick=\"lihatdaftar_kelas(\'"+id_ruangkelas+"\')\" type='button' class='btn btn-danger btn-sm' >Lihat Daftar kelas</button>";
                    
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
        $('#namaruang_modal').val(data["nama_ruang"]);
        if (data["status_ruang"] == 0)//tdk aktif
        {
            $('#pilih_status').val("Non-aktif");
        }
        else if(data["status_ruang"] == 1)
        {
            $('#pilih_status').val("Aktif");
        }
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

function lihatdaftar_kelas(id_ruangkelas) {
    //melihat daftar kelas yang menggunakan ruangan tsb
}




</script>