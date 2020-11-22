<div class="card shadow"> <!-- card shadow -->
    <div class="card-header border-1">
        <div class="nav-wrapper">
            <!-- tabs -->
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Atur Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Lihat Mahasiswa</a>
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
    
                <!-- form atur mahasiswa -->
                <form role="form">

                    <div class="form-group">
                        <label for="">Periode Perwalian</label>
                        <div class="input-group mb-3">
                        <select name="select" id="periode" class="form-control"  aria-describedby="help_pilihperiode">                                  
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" id="btn_simpanperiode" onclick="simpan_periode()" >Simpan</button>
                        </div>
                        </div>
                        <small id="help_pilihperiode" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                        <label> Silakan gunakan template ini sebelum melakukan import </label>
                        <button type="button" class="btn btn-success text-light" onclick="window.location.href='../custom_export/Perwalian_ecc.xlsx'" target="_blank">Download Templete</button>
                    </div>
                    
                    <div class="card" id="cardform1" style="display:none">
                    <div class="card-header">
                        <form>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label text-right">Pilih file</label>
                                <div class="custom-file col-sm-10"> 
                                    <input type="file" class="custom-file-input form-control" name="uploadfile" id="file1">
                                    <label class="custom-file-label" id="lbl_file1">Pilih file ...</label>
                                </div>
                            </div>
                                
                            <div class="form-group">
                                <!-- <label for="">dengan menekan tombol import file excel anda memasukan data ke dalam data mahasiswa sementara dan data sebelumnya akan dihapus seluruhnya</label> -->
                                <input type="button" href="#table_tempmhs" onclick="importfileada()" id="btnimportada" value="*Import File Excel" class="btn btn-primary form-control">
                                <input aria-describedby="help_file" type="button" href="#table_tempmhs"  onclick="importfilenone()" id="btnimportnone" value="*Import File Excel" class="btn btn-primary form-control">
                                <small id="help_file" class="text-muted"></small>
                            </div>
                            
                        </form>
                    </div>
                </div>

                </form>
                <!-- end of form atur mahasiswa -->

                <div class="card" id="cardform2" style="display:none">
                    <br>
                    <div class="form-group text-right">
                        <button class="btn btn-outline-primary" type="button" onclick="simpan_importmhs()">Simpan kelas mahasiswa</button>
                    </div>
        
                    <div class="table-responsive">
                        <table id="table_pwecc" class="table table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th>Nrp</th>
                                    <th>Nama</th>
                                    <th>Level</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Ruang</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- end of tabel kelas yang tergenerate -->
                </div>

            </div>
            <!-- end of atur kelas -->

            <!-- lihat kelas -->
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                <div class="form-group">
                    <label for="">Pilih Periode Perwalian</label>
                    <div class="input-group mb-3">
                        <select name="select" id="periode_lihatkelas"  class="form-control" aria-describedby="help_pilihperiode">                                  
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" onclick="btn_cariperiode()">Cari</button>
                        </div>
                    </div>
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>

                
                <div class="table-responsive">
                    <table id="table_klsmhs" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                            <th></th>
                                <th>Id</th>
                                <th>Nrp</th>
                                <th>Nama</th>
                                <th>Level</th>
                                <th>Kelas</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
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
            <h5 class="modal-title" id="title_namakelas"></h5>
            <h6 id="title_idkelas"></h6>
            <h6 id="title_table"></h6>
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
                              <select class="form-control" name="" id="all_dosen" aria-describedby="help_alldosen">
                              
                              </select>
                              <small id="help_alldosen" class="form-text text-muted"></small>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Pilih Hari : </td>
                            <td class="text-left">
                            <select class="form-control" name="" id="pilihhari" aria-describedby="help_pilihhari" placeholder="">
                                <option value="-1">pilih hari</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                            </select>
                            <small id="help_pilihhari" class="form-text text-muted"></small>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Pilih Ruang : </td>
                            <td class="text-left">
                              <select class="form-control" name="" id="all_ruang" aria-describedby="help_allruang" onchange="ruang_onchange(this.value)">
                              
                              </select>
                              <small id="help_allruang" class="form-text text-muted"></small>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Jam Awal : </td>
                            <td class="text-left">
                            <input class="form-control" type="time" value="06:30" id="jamawal">
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Jam Akhir : </td>
                            <td class="text-left">
                            <input class="form-control" type="time" value="08:00" id="jamakhir">
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Kuota : </td>
                            <td class="text-left">
                                <input type="number" min="0" max="1000" class="form-control-sm" name="" id="kuota" aria-describedby="help_kuota" placeholder="" onchange="kuota_onchange(this.value)"> 
                                <small id="help_kuota" class="form-text text-muted"></small>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </form>
            
          </div>
          <div class="modal-footer">
            <button id="btn_updatekelas" type="button" class="btn btn-primary" onclick="updatekelasini()" >Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end of Modal atur dosen/jam/kuota kelas ecc  -->

<script>
//saat menekan tombol simpan periode
function  simpan_periode() {
    var periode = $("#periode").val();
    console.log(periode);
    if (periode == "-1") {
        $("#help_pilihperiode").text("Pilih periode terlebih dahulu");
        $("#help_pilihperiode").css("style","color:red");
    }
    else{
        $("#help_pilihperiode").text("");
        $('#cardform1, #cardform2, #formaturstandard').show();
        datatable_tempkelas_mhs();
    }
    
}

function cekfileimport() {
        $.post(
            "../ajaxes/a_placement.php", {
                jenis: "cekdata"
            },
            function(data) {
                // alert(data);
                if (data == "ada") {
                    $("#btnimportnone").css("display", "none");
                    $("#btnimpotada").css("display", "block");
                } else {
                    $("#btnimportnone").css("display", "block");
                    $("#btnimportada").css("display", "none");
                }
            }
        );
    }


function importfileada() {
    var periode = $("#periode").val();
    var fd = new FormData();
    var files = $('#file1')[0].files[0];
    fd.append('file', files);
    fd.append("idperiode",periode);
    if (files != undefined) {
        var arr =
            $.ajax({
                url: '../ajaxes/pwecc_upload.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.includes("success")) {
                        alert("Berhasil importfileada data !");
                        $("#lbl_file1").html("Pilih File ...");
                        $('#table_pwecc').DataTable().ajax.reload(); //reload ajax datatable 
                        window.location.href="#table_pwecc";
                        console.log(response);

                    } else {
                        console.log(response);
                        //alert(response);
                    }
                },
            });

    } else {
        $("#help_file").text("Pilih file excel dahulu !");
    }
    //updatelevel();
}

function importfilenone() {
    var periode = $("#periode").val();
    var fd = new FormData();
    var files = $('#file1')[0].files[0];
    fd.append('file', files);
    fd.append("idperiode",periode);
    if (files != undefined) {
    var arr =
        $.ajax({
            url: '../ajaxes/pwecc_upload.php',
            type: 'post',
            data:fd,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.includes("success")) {
                    $("#btnimport").css("display", "none");
                    $("#import").css("display", "block");

                    $("#btnimportnone").css("display", "none");
                    $("#btnimportada").css("display", "block");

                    alert("Berhasil Importfile none data ! "+ periode);
                    $("#lbl_file1").html("Pilih File ...");
                    $('#table_pwecc').DataTable().ajax.reload(); //reload ajax datatable 
                    window.location.href="#table_pwecc";
                    console.log(response);

                } else {
                    console.log(response);
                }
            },
        }); 
    } else { $("#help_file").text("Pilih file excel dahulu !"); }
    //updatelevel();
}

function datatable_tempkelas_mhs() {
    var periode = $("#periode").val();
    //datatable list barang
    var table= "";
    table = $('#table_pwecc').DataTable( 
    {
        destroy:true,
            "processing":true,
            "language": {
            "lengthMenu": "Tampilkan _MENU_ data per Halaman",
            "zeroRecords": "Maaf Data yang dicari tidak ada",
            "info": "Tampilkan data _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada data",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search":"Cari",
            "paginate": {
                "first":      "Pertama",
                "last":       "terakhir",
                "next":       "Selanjutnya",
                "previous":   "Sebelumnya"
                },
            },
            "serverSide":true,
            "ordering":true, //set true agar bisa di sorting
            "ajax":{
                "url":"../datatables/admin-datatable/temp_mhskls.php",
                "type":"POST",
                "data":{"periode":periode},
            },
            "deferRender":true,
            "aLengthMenu":[[10,20,50],[10,20,50]], //combobox limit
            "columns":[
            
            {"data":"nrp"},
            {"data":"nama_mhs"},
            {"data":"level_ecc",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    return "Level "+row.level_ecc;
                }
            },
            {"data":"hari"},
            {"data":"jam_mulai",
                "searchable": true,
                "orderable":true,
                "render": function (data, type, row) {  
                    if (row.jam_mulai == '06:30' || row.jam_mulai == '06.30') //kelas aktif
                    {
                        return "06:30 - 08:00";
                    }
                }
            },
            {"data":"ruang_kode"},
            ],
            
    }) 
    //end of datatble list barang
}

function simpan_importmhs() {
    var periode = $("#periode").val();
    $.post("../ajaxes/a_klsmhs.php",
    {
        idperiode:periode,
        jenis:"cek_dataditable_mahasiswa",

    },
    function(data){
        alert(data);
        $('#table_pwecc').DataTable().ajax.reload(); //reload ajax datatable 
    });
}

//lihat mahasiswa dan kelasnya
function  btn_cariperiode() {
    console.log("button cari");
    var periode = $("#periode_lihatkelas").val();
    console.log(periode);
    if (periode == "-1") {
        $("#help_pilihperiode2").text("pilih periode terlebih dahulu");
    }
    else{
        $("#help_pilihperiode2").text("");
        datatable_table_klsmhs();
    }
}

function datatable_table_klsmhs() {
    var periode = $("#periode_lihatkelas").val();
    //datatable list barang
    var table= "";
    var groupColumn = 4;
    table = $('#table_klsmhs').DataTable( 
    {
        destroy:true,
            "processing":true,
            "language": {
            "lengthMenu": "Tampilkan _MENU_ data per Halaman",
            "zeroRecords": "Maaf Data yang dicari tidak ada",
            "info": "Tampilkan data _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada data",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search":"Cari",
            "paginate": {
                "first":      "Pertama",
                "last":       "terakhir",
                "next":       "Selanjutnya",
                "previous":   "Sebelumnya"
                },
            },
            "serverSide":true,
            "ordering":true, //set true agar bisa di sorting
            "deferRender":true,
            "aLengthMenu":[[10,20,50],[10,20,50]], //combobox limit
            "order": [[1, 'asc']],
            "ajax":{
                "url":"../datatables/admin-datatable/table_klsmhs.php",
                "type":"POST",
                "data":{"periode":periode},
            },
            "columnDefs": [
                { "visible": false, "targets": groupColumn }
            ],
            "columns":[
            // {"data": null, 
            //     "render": function (data, type, row) {
            //         var idklsmhs = row.id_kelas;
            //         var table = "#table_klsmhs";
            //             return "<button id=\"GetDetail\"> + </button>";
            //         }
            // },
            {
                "class":          "details-control",
                "orderable":      false,
                "data":           null,
                "defaultContent": ""
            },
            {"data":"id_klsmhs",
                "visible": false,
                "render": function (data, type, row) {  
                    return "#"+row.id_klsmhs;
                }
            },
            {"data":"nrp"},
            {"data":"nama_mhs"
            },
            {"data":"level_ecc"},
            {"data":"nama_kelas"},
            {"data":"status_klsmhs",
                "render": function (data, type, row) { 
                    var idklsmhs = row.id_klsmhs; 
                    var table = "#table_klsmhs";
                    
                    return "<button onclick=\"ubah_kelas(\'"+idklsmhs+"\',\'"+table+"\')\" type='button' class='btn btn-default btn-sm' data-toggle='modal' data-target='#exampleModal'>Ubah</button>" + " <button onclick=\"nonaktikfkan_kls(\'"+idklsmhs+"\',\'"+table+"\')\" type='button' class='btn btn-danger btn-sm' >Nonaktifkan</button>";
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
                        '<tr class="group"><td colspan="6">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
            
    });

    // Array to track the ids of the details displayed rows
    var detailRows = [];
    var dt = $('#table_klsmhs').DataTable();
    $('#table_klsmhs tbody').on( 'click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );
 
        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();
 
            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();
 
            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );

    // On each draw, loop over the `detailRows` array and show any child rows
    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );

    // $('#table_klsmhs tbody').on( 'click', 'button', function () {
    //     var action = this.id;
    //     var table = $('#table_klsmhs').DataTable();
    //     var data = table.row($(this).closest('tr')).data();
    //     //action button Detail
    //     if(action == 'GetDetail')
    //         {
    //             getId = data[Object.keys(data)[0]];
    //             console.log(getId); //alert(getId);  utk dapatkan id customer

    //             var tr = $(this).closest('tr');
    //             var row = table.row( tr );
                
    //             if ( row.child.isShown() ) 
    //             {   // This row is already open - close it
    //                 row.child.hide();
    //                 tr.removeClass('shown');
    //             }       
    //             else 
    //             {
    //                 // Open this row
    //                 row.child( format(row.data()) ).show();
    //                 tr.addClass('shown');
    //             }
    //         }

    // });

    //end of datatble list barang
}

function format ( d ) {
        // `d` is the original data object for the row
        var jenis_kelamin = "";
        var status = d.status_klsmhs;
        if (status == 1) {
            status = "Aktif";
        }
        else{
            status = "Tidak Aktif";
        }
        
            $tampil = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px; width:100%;">'+
            
            '<tr>'+
                '<td>Level/Kelas</td>'+
                '<td>'+d.level_ecc + '/' + d.nama_kelas +'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Hari/Jam/Ruang</td>'+
                '<td>'+d.hari + '/ ' + d.jam_awal + '-' + d.jam_akhir + '/ ' + d.nama_ruang +'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Status</td>'+
                '<td> <label>' + status+' </label> </td>' +
            '</tr>'+
        '</table>';
        
        return $tampil;
    }
    //end of function detail di list customer


</script>