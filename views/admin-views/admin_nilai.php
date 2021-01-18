<div class="card-body">
    <form action="">
        <div class="form-group">
            <label for="">Pilih Periode</label>
            <select name="select" id="periode" class="form-control" onchange="isikelas()" aria-describedby="help_pilihperiode">                                  
                </select>
            <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
        </div>

        <!-- <div class="form-group">
            <label for="">Pilih Level - Kelas</label>
                <select class="form-control" id="kelas" onchange="klschange()" aria-describedby="helpId" placeholder="">
                  
                </select>
            <small id="helpId" class="form-text text-muted">Help text</small>
        </div> -->

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">Pilih Level</label>
                    <select class="form-control" name="" onchange="lvlchange()" id="level" aria-describedby="helpId" placeholder="">
                        <!-- <option>ECC Level 1 - Kelas A</option>
                <option>ECC Level 1 - Kelas B</option> -->
                    </select>
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>
            </div>
            <div class="col">
            <div class="form-group">
                    <label for="">Pilih Kelas</label>
                    <select class="form-control" name="" onchange="klschange()" id="kelas" aria-describedby="helpId" placeholder="">
                        <!-- <option>ECC Level 1 - Kelas A</option>
                <option>ECC Level 1 - Kelas B</option> -->
                    </select>
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="alert alert-info" role="alert">
                <strong>Info!</strong><br>
                <label>* Pilih Tombol <b>Cetak Rekap Nilai Berdasarkan Periode</b> untuk mencetak berdasarkan pilihan periode Anda diatas  </label> <br>
                <label>** Pilih Tombol <b>Cetak Rekap Nilai Keseluruhan</b> untuk mencetak seluruh data nilai </label> <br>
            </div>
        </div>

        <div class="form-group">
            <button type="button" class="btn btn-success text-light" onclick="exportfile1()">Cetak Rekap Nilai Berdasarkan Periode</button>
            <button type="button" class="btn btn-success text-light" onclick="exportfile2()">Cetak Rekap Nilai Keseluruhan </button>
        </div>      
    </form>
    
    <!-- tabel kelas yang tergenerate per hari-->
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" width="100%">
            <thead>
            <tr>
                    <th>Nrp</th>
                    <th>Nama Mahasiswa</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>NA</th>
                    <th>Grade </th>
                </tr>
            </thead>
            <tbody>   
            </tbody>
        </table>
    </div>
    <!-- end of tabel kelas yang tergenerate -->
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table>
                    <input type="hidden" id="t_nilai">
                    <tr>
                        <td><strong>Nrp</strong></td>
                        <td><input class='form-control' type="text" id="t_nrp"></td>
                    </tr>
                    <tr>
                        <td><strong>Nama</strong></td>
                        <td><input class='form-control' type="text" id="t_nama"></td>
                    </tr>
                    <tr>
                        <td><strong>Uts</strong></td>
                        <td><input class='form-control' type="text" id="t_uts"></td>
                    </tr>
                    <tr>
                        <td><strong>Uas</strong></td>
                        <td><input class='form-control' type="text" id="t_uas"></td>
                    </tr>
                    <tr>
                        <td><strong>Nilai akhir</strong></td>
                        <td><input class='form-control' type="text" onkey="getgrade()" id="t_na"></td>
                    </tr>
                    <tr>
                        <td><strong>Grade</strong></td>
                        <td><input class='form-control' type="text" id="t_grade"></td>
                    </tr>
                </table>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" onclick="simpan()" data-dismiss="modal">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
 $(document).ready(function() {
        periode();
    });


 function periode() {
        $.post("../ajaxes/a_periode.php", {
                jenis: "get_allperiode",
            },
            function(data) {
                $("#periode").html(data);
                isilevel();
            });
    }


    function isilevel() {
        $.post("../ajaxes/a_kelas.php", {
                jenis: "get_level_placement",
                periode:$("#periode").val()
            },
            function(data) {
                console.log(data);
                $("#level").html(data);
                //isikelas();

                setTimeout(() => {
                    $("#level").val("all");
                    lvlchange();
                }, 300);
            });
    }

    function lvlchange(){
        isikelas(); 
    }

    function klschange() {
        datatable_lihatsemuamahasiswa();
    }


    function isikelas() {
        var periode=$("#periode").val();
        var level= $("#level").val();
        $.post("../ajaxes/a_kelas.php", {
                jenis: "getadminkelas",
                periode:periode,
                level:level
            },
            function(data) {
                console.log(data);
                $("#kelas").html(data);
                datatable_lihatsemuamahasiswa();
            });
    }

    function datatable_lihatsemuamahasiswa() {
        
        var periode = $("#periode").val();
        var kelas = $("#kelas").val();
        var level = $("#level").val();

        var table = "";
        table = $('#example').DataTable({
            destroy: true,
            "processing": true,
            "language": {
                "paginate": {
                "first":      "First",
                "last":       "Last",
                "next":       "Next",
                "previous":   "Previous"
                },
            },
            "serverSide": true,
            "ordering": true, //set true agar bisa di sorting
            "order": [
                [0, 'asc']
            ], //default sortingnya berdasarkan kolom, field ke 0 paling pertama
            "ajax": {
                "url": "../datatables/dosen-datatable/dt_nilaidosen.php",
                "type": "POST",
                "data": {
                    "periode": periode,
                    "kelas": kelas,
                    "level": level
                },
            },
            "deferRender": true,
            "aLengthMenu": [
                [10, 20, 50],
                [10, 20, 50]
            ], //combobox limit
            "columns": [

                {
                    "data": "nrp"
                },
                {
                    "data": "nama"
                },
                {
                    "data": "uts"
                },
                {
                    "data": "uas"
                },
                {
                    "data": "na"
                }, 
                {"data":"grade"}
            ]

        });
    }

    
    function isiubah(params) {
        $.post("../ajaxes/a_dos_nilai.php", {
                jenis: "getinfo",
                idnilai: params,
                kelas: $("#kelas").val()
            },
            function(data) {
                console.log(data);
                var arr = JSON.parse(data);
                $("#t_nilai").val(arr.id_nilai);
                $("#t_nrp").val(arr.nrp);
                $("#t_nama").val(arr.nama_mhs);
                $("#t_uts").val(arr.nilai_uts);
                $("#t_uas").val(arr.nilai_uas);
                $("#t_na").val(arr.nilai_akhir);
                $("#t_grade").val(arr.grade);

            });
    }

    function simpan() {
        $.post("../ajaxes/a_nilai.php", {
                jenis: "update",
                idnilai: $("#t_nilai").val(),
                uts: $("#t_uts").val(),
                uas: $("#t_uas").val(),
                na: $("#t_na").val(),
                grade: $("#t_grade").val()

            },
            function(data) {
                console.log(data);
                $("#example").DataTable().ajax.reload();
            });
    }

    function exportfile1() {
    var periode = $("#periode").val();
    window.location.href = "../custom_export/admin_export/lihat_nilai.php?periode="+periode+"";
    }

    function exportfile2() {
        window.location.href = "../custom_export/admin_export/cetak_nilaiseluruh.php";
    }

</script>