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
        <table class="table" id="example">
            <thead>
                <tr>
                    <th scope="col" class="sort" data-sort="name">NRP</th>
                    <th scope="col" class="sort" data-sort="budget">Nama Mahasiswa</th>
                    <th scope="col" class="sort" data-sort="budget">UTS</th>
                    <th scope="col" class="sort" data-sort="budget">UAS</th>
                    <th scope="col" class="sort" data-sort="budget">NA</th>
                    
                </tr>
            </thead>
            <tbody>

                </tr>

            <tbody>
        </table>
    </div>
    <!-- end of tabel kelas yang tergenerate -->
</div>


<script>

    function periode() {
        $.post("../ajaxes/a_periode.php", {
                jenis: "get_allperiode",
            },
            function(data) {
                console.log(data);
                $("#periode").html(data);

            });
    }
    

    

    function isikelas() {
        $.post("../ajaxes/a_dos_nilai.php", {
                jenis: "get_kelasdos",
            },
            function(data) {
                console.log(data);
                $("#kelas").html(data);

            });
    }

    function datatable_lihatsemuamahasiswa() {
        //datatable list barang
    var periode = $("#periode").val();
    var table = "";
<<<<<<< Updated upstream
    table = $('#example').DataTable({
        destroy:true,
        "processing":true,
            "language": {
            "lengthMenu": "Tampilkan MENU data per Halaman",
            "zeroRecords": "Maaf Data yang dicari tidak ada",
            "info": "Tampilkan data PAGE dari _PAGES_",
            "infoEmpty": "Tidak ada data",
            "infoFiltered": "(filtered from MAX total records)",
=======
    table = $('#table_tempmhs').DataTable({
        destroy:true,
        "processing":true,
            "language": {
            "lengthMenu": "Tampilkan _MENU_ data per Halaman",
            "zeroRecords": "Maaf Data yang dicari tidak ada",
            "info": "Tampilkan data _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada data",
            "infoFiltered": "(filtered from _MAX_ total records)",
>>>>>>> Stashed changes
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
        "order": [[0, 'asc']], //default sortingnya berdasarkan kolom, field ke 0 paling pertama
        "ajax": {
<<<<<<< Updated upstream
            "url": "../datatables/dosen-datatable/dt_nilaidosen.php",
=======
            "url": "../datatables/dosen-datatable/dosen_nilaidt.php",
>>>>>>> Stashed changes
            "type": "POST",
            "data":{"periode":periode},
        },
        "deferRender": true,
        "aLengthMenu": [
            [10, 20, 50],
            [10, 20, 50]
        ], //combobox limit
        "columns": [

            { "data": "nrp" },
<<<<<<< Updated upstream
            { "data": "nama" },
            { "data": "uts" },
            { "data": "uas" },
            { "data": "na" }
            
=======
            { "data": "nilai_uts" },
            { "data": "nilai_uas" },
            { "data":"nilai_akhir",
                
            },
            {
                "data": "grade",
                
            },
>>>>>>> Stashed changes
            
        ],
        
        
    });
    }
</script>