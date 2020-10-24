
<!DOCTYPE html>
<html>

<!-- head -->
<?php require_once("head.php"); 
$arr=unserialize($_SESSION["user"]); 
        
$level = $arr->get_level();

?>

<body>
  
<?php require_once("sidenav.php"); ?>

    <!-- ini content -->
    <!-- container-fluid -->
    <div class="container-fluid mt--6">
        <div class="row"> <!-- row -->
            
            <!-- standar nilai ecc -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                          <label for="">Nama Dosen</label>
                          <input type="text" name="" id="namadosen" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                          <label for="">Username</label>
                          <input type="text" name="" id="userdosen" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                          <label for="">Password</label>
                          <input type="password" name="" id="passdosen" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">Help text</small>
                        </div>
                        <button type="button" class="btn btn-outline-primary" onclick="simpandosen()">Save</button>
                    </div>
                </div>
            </div> <!-- end of standar nilai ecc -->
        </div> <!-- end of row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-12"> <!-- col-md-12 -->
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">List Mahasiswa</strong>
                    </div>

                    <div class="card-body">  
                        <button type="submit">Import</button>  
                        <button type="submit">Export</button>  
                        <br>                       
                        <div class="table-responsive">
                            <table id="table_lihatsemuadosen" class="table table-striped table-bordered" width="100%">
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
    <!-- end of Modal atur dosen/jam/kuota kelas ecc  -->

      
      <!-- Footer -->
      <?php include_once('footer.php') ?>
      
    </div><!-- container-fluid -->
  
  
</body>
<?php include_once('scripts.php')?>

<script>

    $(document).ready(function(){

      periode();
      datatable_lihatsemuadosen();
   });   

   function periode() {
        $.post("../ajaxes/a_periode.php",
        {
            jenis:"get_allperiode",
        },
        function(data){
            $("#periode").html(data);
        });
    }
   
   //simpan dosen -- menambah dosen baru
   function simpandosen(){
        var namadosen = $("#namadosen").val();
        var userdosen = $("#userdosen").val();
        var passdosen = $("#passdosen").val();

        $.post("../ajaxes/a_dosen.php",{
            jenis:"simpandosen_baru",
            getnamadosen : namadosen,
            getuserdosen : userdosen,
            getpassdosen : passdosen,
        },
            function(data){
                alert(data);
                $('#table_lihatsemuadosen').DataTable().ajax.reload(); //reload ajax datatable 
        }); 
    }

    function nonaktifkan(username, status) {
       // $('#statusdosen_modal').modal('show');
      //  $("#isi-modal").html(status);
        //$("#isi-modal").value = status;
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
            dom: 'Bfrtip', 
             "processing":true,
             "serverSide":true,
             "bInfo" : false,
             dom:"<'myfilter'f><'mylength'l>t",
             "pagingType": "numbers",
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
                            return "<label class='text-success font-weight-bold'>Tidak Aktif</label> ";
                        }
                       
                    }
                },
                {"data":"status",
                    "searchable": false,
                    "orderable":false,
                    "render": function (data, type, row) {  
                        var username = row.username;
                            var status = row.status;
                        if (row.status == '1') //dosen aktif
                        {
                            return "<a class='btn btn-warning text-dark' onclick=\"nonaktifkan(\'"+username+"\',\'"+status+"\')\" >Non-aktifkan</a>";  
                        }
                        else if (row.status == '0') //dosen tdk aktif
                        {
                            return "<a class='btn btn-primary text-dark' onclick=\"nonaktifkan(\'"+username+"\',\'"+status+"\')\">Aktifkan</a>";
                        }
                       
                    },
                    "target":-1,
                },
                
             ],
        });     
}

    
</script>


</html>