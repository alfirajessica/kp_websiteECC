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
                        <label for="">Periode</label>
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
                            <hr>
                                
                            
                        </form>
                    </div>
                </div>

                </form>
                <!-- end of form atur mahasiswa -->

                <div class="form-group text-right">
                    <button class="btn btn-outline-primary" type="button" onclick="aktifkan_allkelas()">Simpan kelas mahasiswa</button>
                </div>
        
                <div class="table-responsive">
                    <table id="table_pwecc" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Nrp</th>
                                <th>Nama</th>
                                <th>Level</th>
                                <th>Jadwal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
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
                        <select name="select" id="periode_lihatkelas"  class="form-control" aria-describedby="help_pilihperiode">                                  
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" onclick="btn_cari()">Cari</button>
                        </div>
                    </div>
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>

                
                <div class="table-responsive">
                    <table id="table_kelasaktif" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Level</th>
                                <th>Kelas</th>
                                <th>Jadwal</th>
                                <th>Dosen</th>
                                <th>Aksi</th>
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
    }
    
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
                url: '../ajaxes/pwecc-upload.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.includes("success")) {
                        alert("Berhasil importfileada data !");
                        $("#lbl_file1").html("Pilih File ...");
                        $('#table_tempmhs').DataTable().ajax.reload(); //reload ajax datatable 
                        window.location.href="#table_pwecc";

                    } else {
                        console.log(response);
                        alert(response);
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
            url: '../ajaxes/pwecc-upload.php',
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
                    

                } else {
                    console.log(response);
                }
            },
        }); 
    } else { $("#help_file").text("Pilih file excel dahulu !"); }
    //updatelevel();
}


</script>