<div class="card-body">
    <form action="">
        <div class="form-group">
            <label for="">Periode</label>
            <select name="select" id="periode" onchange="isikelas()" class="form-control" aria-describedby="help_pilihperiode">
            </select>
        </div>


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
            <label> Gunakan template ini untuk mengimport nilai </label>
            <button type="button" class="btn btn-success text-light" onclick="downloadtemp()" target="_blank">Download Templete</button>
        </div>

        <div class="form-group">
            <div class="alert alert-info" role="alert">
                Lakukan Import file excel pada tombol disamping               
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#importuts">Import Nilai</button>
            </div>
        </div>


    </form>

    <div class="modal fade" id="importuts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Nilai Ujian ECC</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    File
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="uts">
                        <label class="custom-file-label" for="uts" id='file_uts'>Pilih file ...</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="imuts()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="modal fade" id="importuas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    UAS
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="uas">
                        <label class="custom-file-label" for="uas" id='file_uas'>Pilih file uas ...</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="imuas()">IMPORT UAS</button>
                </div>
            </div>
        </div>
    </div> -->


    <!-- tabel kelas yang tergenerate per hari-->
    <div class="table-responsive">
        <table class="table" id="example">
            <thead>
                <tr>
                    <th>Nrp</th>
                    <th>Nama Mahasiswa</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>NA</th>
                    <th>GRADE</Th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                </tr>

            <tbody>
        </table>
    </div>
    <!-- end of tabel kelas yang tergenerate -->
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


    function isikelas() {
        $.post("../ajaxes/a_dos_nilai.php", {
                jenis: "get_kelasdos",
                periode: $("#periode").val(),
                level: $("#level").val(),
            },
            function(data) {
                console.log("kelas:" + data);
                $("#kelas").html(data);
                $("#add_kelas").html(data);
                datatable_lihatsemuamahasiswa();
            });
    }

    function lvlchange() {
        isikelas();
    }


    function isilevel() {
        $.post("../ajaxes/a_dos_nilai.php", {
                jenis: "get_leveldos",
                periode: $("#periode").val()
            },
            function(data) {
                console.log("level:" + data);
                $("#level").html(data);
                
                setTimeout(() => {
                    $("#level").val("all");
                    lvlchange();
                }, 300);
            });
            
    }

    function klschange() {
        datatable_lihatsemuamahasiswa();
    }

    
    function datatable_lihatsemuamahasiswa() {
        //datatable list barang
        var periode = $("#periode").val();
        var kelas = $("#kelas").val();
        var level = $("#level").val();
        var table = "";
        table = $('#example').DataTable({
            destroy: true,
            "processing": true,
            "language": {
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
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
                    "level":level
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
                {
                    "data": "grade"
                },
                {

                    "render": function(data, type, row) {

                        return "<button class='btn btn-warning rounded btn-sm' data-toggle='modal' data-target='#exampleModal' onclick=\"isiubah('" + row.id_nilai + "')\" >Ubah</button>";
                    }
                }
            ]





        });
    }

    $("#uts").change(function() {
        var uts = $("#uts")[0].files[0];
        $("#file_uts").html(uts.name);
    });

    $("#uas").change(function() {
        var uas = $("#uas")[0].files[0];
        $("#file_uas").html(uas.name);
    });

    function imuts() {
        var fd = new FormData();
        var files = $('#uts')[0].files[0];
        fd.append('file', files);
        fd.append("jenis", "uts");
        var periode = $("#periode").val();
        var kelas = $("#kelas").val();
        fd.append("periode", periode);
        fd.append("kelas", kelas);
        if (files != undefined) {
            var arr =
                $.ajax({
                    url: '../ajaxes/a_nilai.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if (response.includes("success")) {
                            alert("Berhasil importfileada data !");
                            $("#example").DataTable().ajax.reload();
                        } else {
                            console.log(response);
                            alert(response);
                        }
                    },
                });

        }
    }

    function imuas() {
        var fd = new FormData();
        var files = $('#uas')[0].files[0];
        fd.append('file', files);
        fd.append("jenis", "uas");
        var periode = $("#periode").val();
        var kelas = $("#kelas").val();
        fd.append("periode", periode);
        fd.append("kelas", kelas);
        if (files != undefined) {
            var arr =
                $.ajax({
                    url: '../ajaxes/a_nilai.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if (response.includes("success")) {
                            alert("Berhasil import file ada data !");
                            $("#example").DataTable().ajax.reload();
                        } else {
                            console.log(response);
                            alert(response);
                        }
                    },
                });

        }
    }


    function isiubah(params) {
        console.log(params);
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

    function downloadtemp() {
        var kelas = $("#kelas").val();
        window.location.href = '../custom_export/templeteutsuas.php?kelas=' + kelas;
        // $("#btnim").attr("style", "display:block");
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

   

    function getgrade() {
        var na = $("#t_na").val();
        $("#t_grade").html(na + "tt");
    }
</script>