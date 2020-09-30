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
                <select class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
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