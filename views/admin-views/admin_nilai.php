<div class="card-body">
    <form action="">
        <div class="form-group">
            <label for="">Pilih Periode</label>
            <select name="select" id="periode" class="form-control"  aria-describedby="help_pilihperiode">                                  
                </select>
            <small id="helpId" class="form-text text-muted">Help text</small>
        </div>

        <div class="form-group">
            <label for="">Pilih Level - Kelas</label>
                <select class="form-control" id="kelas" aria-describedby="helpId" placeholder="">
                    <option>ECC Level 1 - Kelas A</option>
                    <option>ECC Level 1 - Kelas B</option>
                </select>
            <small id="helpId" class="form-text text-muted">Help text</small>
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
                <th scope="col" class="sort" data-sort="budget">Ket</th>
                </tr>
            </thead>
            <tbody>
             
                
            <tbody>
        </table>
    </div>
    <!-- end of tabel kelas yang tergenerate -->
</div>
<script>
 $(document).ready(function() {
        isikelas();
        periode();
        datatable_lihatsemuamahasiswa();
    });

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
        $.post("../ajaxes/a_kelas.php", {
                jenis: "get_kelas",
            },
            function(data) {
                console.log(data);
                $("#kelas").html(data);

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
                "url": "../datatables/admin-datatable/dt_nilaiadmin.php",
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
                }


            ],


        });
    }
</script>