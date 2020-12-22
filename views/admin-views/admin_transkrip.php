

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
                            <div class="form-group">
                                <table class="table table-borderless table-md text-right">
                                    <tbody>
                                    <tr>
                                        <td>Nrp</td>
                                        <td>:</td>
                                        <td> <div class="input-group">
                                            <input type="text" name="" id="nrpmhs" class="form-control" placeholder="" aria-describedby="help_username"> 
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-primary" onclick="carimhs()">Cari</button>
                                                </div>
                                            </div></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td class="text-left"><label id="namamhs"></label></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td class="text-left"><label id="statusmhs"></label> </td>
                                    </tr>
                                    </tbody>
                                    
                                </table>
                                
                            </div>
                                
                        </form>
                    </div>
                    <br>
                
                
                <div class="table-responsive">
                    <table id="table_lihatsemuakelas" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Semester</th>
                                <th>Level</th>
                                <th>Grade</th>
                                <th>Status</th>
                                <th>Status</th>
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

<script>

function carimhs() {
    var nrp = $("#nrpmhs").val();
    //get detail mahasiswa dgn nrp diatas

    $.post("../ajaxes/a_transkrip.php",{
        jenis:"get_detail_mhs",
        nrp : nrp,
        
    },
        function(data){
            $("#namamhs").text(data["nama_mhs"]);
            $("#statusmhs").text(data["status_mhs"]);
            console.log(nrp);
            datatable_lihatkelasmhs(nrp);
    }); 
}


function datatable_lihatkelasmhs(nrp) {
        //datatable list barang
        var table= "";
        table = $('#table_lihatsemuakelas').DataTable( 
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
                 "url":"../datatables/admin-datatable/transkrip-list.php",
                 "type":"POST",
                 "data":{"nrp":nrp},
             },
             "deferRender":true,
             "aLengthMenu":[[10,20,50],[10,20,50]], //combobox limit
             "columns":[
            
                {"data":"id_klsmhs",
                    // "render": function (data, type, row) {
                    //     return "#" + row.id_klsmhs;
                    // }  
                },
                // {"data":"id_periode",
                //     // "searchable": true,
                //     // "orderable":true,
                //     // "render": function (data, type, row) {
                //     //     return row.semester + " " + row.thn_akademik_awal + "/" + row.thn_akademik_akhir;
                //     // }  
                // },
                // {"data":"nrp"},
                // {"data":"id_kelas"},
                // {"data":"id_nilai"},
                // {"data":"grade",
                    
                //},
                
             ],
        });     
}

</script>