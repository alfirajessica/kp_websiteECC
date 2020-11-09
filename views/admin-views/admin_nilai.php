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
                <td scope="col" class="sort" data-sort="budget"> Alfira Jessica </td>
                <td scope="col" class="sort" data-sort="name">60</td>
                <td scope="col" class="sort" data-sort="name">60</td>
                <td scope="col" class="sort" data-sort="name">60</td>
                <td scope="col" class="sort" data-sort="name">C</td>
                </tr>
                
            <tbody>
        </table>
    </div>
    <!-- end of tabel kelas yang tergenerate -->
</div>