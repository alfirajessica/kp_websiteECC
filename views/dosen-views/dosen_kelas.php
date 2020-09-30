
<div class="card-body">
    <div class="form-group">
        <label for="">Pilih Periode</label>
        <div class="input-group mb-3">
            <select name="select" id="periode" class="form-control"  aria-describedby="help_pilihperiode"></select>
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="button" id="button-addon2">Cari</button>
            </div>
        </div>
        <small id="helpId" class="form-text text-muted">Help text</small>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <th scope="col" class="sort" data-sort="name">Nama Kelas</th>
                <th scope="col" class="sort" data-sort="budget">Dosen/Jam/Hari</th>
                <th scope="col" class="sort" data-sort="budget">Mahasiswa Terdaftar</th>
                <th scope="col" class="sort" data-sort="budget">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td scope="col" class="sort" data-sort="name">Kelas A</td>
                <td scope="col" class="sort" data-sort="budget">
                    Dosen : A / Hari : Senin / Jam : 06.30
                </td>
                <td scope="col" class="sort" data-sort="name">0</td>
                <td scope="col" class="sort" data-sort="budget">
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#exampleModal">Lihat List Mahasiswa</button>
                </td>
                </tr>
                <tr>
                <td scope="col" class="sort" data-sort="name">Kelas B</td>
                <td scope="col" class="sort" data-sort="budget">
                    Dosen : A / Hari : Senin / Jam : 06.30
                </td>
                <td scope="col" class="sort" data-sort="name">18</td>
                <td scope="col" class="sort" data-sort="budget">
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#exampleModal">Lihat List Mahasiswa</button>
                </td>
                </tr>
            <tbody>
        </table>
    </div>
    <!-- end of tabel kelas yang tergenerate -->
</div>