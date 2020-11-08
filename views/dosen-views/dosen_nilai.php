<div class="card-body">
    <form action="">
        <div class="form-group">
            <label for="">Pilih Periode</label>
            <select name="select" id="periode" onchange="search()" class="form-control" aria-describedby="help_pilihperiode">
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
            <button type="button" class="btn btn-secondary">Import Excel</button>
        </div>

        <div class="form-group">
            *<a href="#"> Download ini</a> <span> untuk format excel yang harus digunakan</span>
        </div>


    </form>

    <!-- tabel kelas yang tergenerate per hari-->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="sort" data-sort="name">NRP</th>
                    <th scope="col" class="sort" data-sort="budget">Nama Mahasiswa</th>
                    <th scope="col" class="sort" data-sort="budget">UTS</th>
                    <th scope="col" class="sort" data-sort="budget">UAS</th>
                    <th scope="col" class="sort" data-sort="budget">NA</th>
                    <th scope="col" class="sort" data-sort="budget">Ket</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="col" class="sort" data-sort="name">217180382</td>
                    <td scope="col" class="sort" data-sort="budget">
                        Alfira Jessica
                    </td>
                    <td scope="col" class="sort" data-sort="budget">
                        <button class="btn btn-icon btn-primary btn-sm" type="button" data-toggle="modal" data-target="#exampleModal">
                            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                            <span class="btn-inner--text">Input nilai</span>
                        </button>
                    </td>
                    <td scope="col" class="sort" data-sort="budget">
                        <button class="btn btn-icon btn-primary btn-sm" type="button" data-toggle="modal" data-target="#exampleModal">
                            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                            <span class="btn-inner--text">Input nilai UAS + Nilai Akhir</span>
                        </button>
                    </td>
                </tr>

            <tbody>
        </table>
    </div>
    <!-- end of tabel kelas yang tergenerate -->
</div>


<script>
    isikelas();

    function isikelas() {
        $.post("../ajaxes/a_dos_nilai.php", {
                jenis: "get_allkelas",
            },
            function(data) {
                console.log(data);
                $("#kelas").html(data);
                datatable_lihatsemuamahasiswa();
            });
    }




    function datatable_lihatsemuamahasiswa() {
        //datatable list barang
        var table = "";
        table = $('#example').DataTable({
            dom: 'Bfrtip',
            "processing": true,
            "serverSide": true,
            "bInfo": false,
            dom: "<'myfilter'f><'mylength'l>t",
            "pagingType": "numbers",
            "ordering": true, //set true agar bisa di sorting
            "order": [
                [0, 'asc']
            ], //default sortingnya berdasarkan kolom, field ke 0 paling pertama
            "ajax": {
                "url": "../datatables/admin-datatable/temp-mahasiswa_dt.php",
                "type": "POST"
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
                    "data": "nama_mahasiswa"
                },
                {
                    "data": "nilai_placement",
                },
                {
                    "data": "level",
                }, {
                    "data": "status",
                    "render": function(data, type, row) {
                        if (parseInt(row.nilai_placement) == 0) //nilai masih 0
                        {
                            return "<button class='btn btn-primary rounded' data-toggle='modal' data-target='#isinilai' onclick=\"loadmhs('" + row.nrp + "')\"  >Input Nilai</button>";
                        } else if (parseInt(row.nilai_placement) > 0) //ubah nilai lebih dari 0
                        {
                            return "<button class='btn btn-warning rounded' data-toggle='modal' data-target='#isinilai' onclick=\"loadmhs('" + row.nrp + "')\"  >Ubah Nilai</button>";
                        }

                    }
                }

            ],
        });
    }
</script>