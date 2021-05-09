<?= $this->extend('templates/layout2') ?>
<?= $this->section('title') ?>
    <title>Dashboard | User</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
<?php if (!empty(session()->getFlashdata('error'))) : ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo session()->getFlashdata('error'); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>
<?php if (!empty(session()->getFlashdata('oke'))) : ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo session()->getFlashdata('oke'); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>
    <div class="container">
    
    <div class="row">
    
    <h2>Pendaftaran Pasien</h2>
        <div class="col">
            <form action="/api/post/addPasien" method="POST">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="namaPasien" class="form-label ">Tambah Pasien</label>
                    <input type="text" class="form-control mb-3" name="nama" placeholder="Nama Pasien">
                    <label for="umurPasien" class="form-label ">Umur</label>
                    <input type="text" class="form-control mb-3" name="umur" placeholder="Umur Pasien">
                    <label for="wilayah" class="form-label">Wilayah</label>
                    <select class="form-select mb-3" name="wilayah" aria-label="Default select example">
                    <?php foreach($wilayah as $wil): ?>
                    <option value="<?= $wil['nama_wilayah'] ?>"><?= $wil['nama_wilayah'] ?></option>
                    <?php endforeach ?>
                    </select>
                    <label for="diagnosa" class="form-label">Diagnosa</label>
                    <input type="text" name="diagnosa"  class="form-control mb-3"  placeholder="Diagnosa/Keluhan"/>
                </div>
        </div>
        <div class="col">
                <label for="tanggal" class="form-label">Tanggal Daftar</label>
                
                <input type="date" name="tanggal"  class="form-control mb-3"  required/>
        
                <button type="submit" class="btn btn-primary">Tambah</button>
                
        </div>
        </form>
    </div>
    </div>
    <hr>
<table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Umur</th>
                <th>Wilayah</th>
                <th>Diagnosa</th>
                <th>Tanggal Daftar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($pasien as $row): ?>
            <tr>
                <td><?= esc($row['nama_pasien']) ?></td>
                <td><?= esc($row['umur']) ?></td>
                <td><?= esc($row['wilayah']) ?></td>
                <td><?= esc($row['diagnosa']) ?></td>
                <td><?= esc($row['tanggal_daftar']) ?></td>
                <td><a href="/dashboard/pasien/edit/<?= $row['id'] ?>" class="btn btn-success">Edit</a> <a href="/api/delete/deletePasien/<?= $row['id'] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php endforeach ?>
            
            </tbody>
            </table>
            </div>
<script>
    $(document).ready(function() {
    $('#example').DataTable()
} );
</script>
<?= $this->endSection() ?>