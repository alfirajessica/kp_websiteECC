<div class="card-body">
    <form action="">
        <div class="form-group">
            <label for="">Pilih Periode</label>
            <select name="select" id="periode" onchange="isikelas()" class="form-control" aria-describedby="help_pilihperiode">
            </select>
            <small id="helpId" class="form-text text-muted">Help text</small>
        </div>

        <div class="form-group">
            <label for="">Pilih Level - Kelas</label>
            <select class="form-control" name="" id="kelas" onchange="search()" aria-describedby="helpId" placeholder="">
                <option>ECC Level 1 - Kelas A</option>
                <option>ECC Level 1 - Kelas B</option>
            </select>
            <small id="helpId" class="form-text text-muted">Help text</small>
        </div>

        <div class="form-group">
            <!-- <button type="button" class="btn btn-secondary">Import Excel</button> -->
            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#importuts">Import UTS</button>
            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#importuas">Import UAS</button>
        </div>

        <div class="form-group">
            *<a onclick="downloadtemp()" target="_blank" class="text-primary"> Download ini</a> <span> untuk format excel yang harus digunakan</span>
        </div>


    </form>

    <div class="modal fade" id="importuts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    UTS
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="uts">
                        <label class="custom-file-label" for="uts" id='file_uts'>Pilih file uts ...</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="imuts()">IMPORT UTS</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="importuas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div>

    <!-- <div class="card">
        <div class="card-header">
            Tambah Mahasiswa
        </div>

        <div class="card-body">
            <table>
                <tr>
                    <td><strong>Nrp</strong></td>
                    <td><input type="text" class="form-control" id="a_nrp"></td>
                </tr>
                <tr>
                    <td><strong>Nama</strong></td>
                    <td><input type="text" class="form-control" id="a_nama"></td>
                </tr>
                <tr>
                    <td><strong>Kelas</strong></td>
                    <td>
                        <div class="form-group">
                            <select class="form-control" name="" id="add_kelas" onchange="search()" aria-describedby="helpId" placeholder="">
                                <option>ECC Level 1 - Kelas A</option>
                                <option>ECC Level 1 - Kelas B</option>
                            </select>

                        </div>
                    </td>
                </tr>

            </table>
            <a href="#" class="btn btn-primary">Tambahkan</a>
        </div>
    </div> -->

    <!-- tabel kelas yang tergenerate per hari-->
    <div class="table-responsive">
        <table class="table" id="example">
            <thead>
                <tr>
                    <th scope="col" class="sort" data-sort="name">NRP</th>
                    <th scope="col" class="sort" data-sort="budget">Nama Mahasiswa</th>
                    <th scope="col" class="sort" data-sort="budget">UTS</th>
                    <th scope="col" class="sort" data-sort="budget">UAS</th>
                    <th scope="col" class="sort" data-sort="budget">NA</th>
                    <th scope="col" class="sort" data-sort="budget">Aksi</th>
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
                </table>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
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
                isikelas();
            });
    }


    function isikelas() {
        $.post("../ajaxes/a_dos_nilai.php", {
                jenis: "get_kelasdos",
                periode:$("#periode").val()
            },
            function(data) {
                console.log("kelas:" + data);
                $("#kelas").html(data);
                $("#add_kelas").html(data);
                    datatable_lihatsemuamahasiswa();
            });
    }

    function datatable_lihatsemuamahasiswa() {
        //datatable list barang
        var periode = $("#periode").val();
        var kelas = $("#kelas").val();
        var table = "";
        table = $('#example').DataTable({
            destroy: true,
            "processing": true,
            "language": {
                "lengthMenu": "Tampilkan MENU data per Halaman",
                "zeroRecords": "Maaf Data yang dicari tidak ada",
                "info": "Tampilkan data PAGE dari _PAGES_",
                "infoEmpty": "Tidak ada data",
                "infoFiltered": "(filtered from MAX total records)",
                "search": "Cari",
                "paginate": {
                    "first": "Pertama",
                    "last": "terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
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
                    "kelas": kelas 
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
                }, {

                    "render": function(data, type, row) {
                        var nrp = row.nrp;
                        return "<button class='btn btn-warning' data-toggle='modal' data-target='#exampleModal' onclick=\"isiubah('" + row.nrp + "')\" >Edit</button>";
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
                        } else {
                            console.log(response);
                            alert(response);
                        }
                    },
                });

        }
    }


    function isiubah(params) {
        $.post("../ajaxes/a_dos_nilai.php", {
                jenis: "getinfo",
                nrp: params,
                kelas: $("#kelas").val()
            },
            function(data) {
                console.log(data);
                var arr = JSON.parse(data);
                $("#t_nrp").val(arr.nrp);
                $("#t_nama").val(arr.nama_mhs);
                $("#t_uts").val(arr.nilai_uts);
                $("#t_uas").val(arr.nilai_uas);

            });
    }

    function downloadtemp() {
        var kelas = $("#kelas").val();
        window.location.href = '../PHPexcel/templeteutsuas.php?kelas=' + kelas;
    }
</script>