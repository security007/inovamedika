<?= $this->extend('templates/layout2') ?>
<?= $this->section('title') ?>
    <title>Dashboard | User</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid" style="width:60vw">
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
    <div class="row">
        <div class="col">
        <h2>Edit Data Pasien</h2>
            <form action="/api/post/editPasien" method="POST">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <?php foreach($pasien as $row): ?>
                    
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <label for="namaPasien" class="form-label ">Nama Pasien</label>
                    <input type="text" class="form-control mb-3" name="nama" value="<?= $row['nama_pasien'] ?>" placeholder="Nama Pasien">
                    <label for="umurPasien" class="form-label ">Umur</label>
                    <input type="text" class="form-control mb-3" name="umur" value="<?= $row['umur'] ?>" placeholder="Umur Pasien">
                    <label for="wilayah" class="form-label">Wilayah</label>
                    <select class="form-select mb-3" name="wilayah" aria-label="Default select example">
                    <?php foreach($wilayah as $wil): ?>
                    <option value="<?= $wil['nama_wilayah'] ?>"><?= $wil['nama_wilayah'] ?></option>
                    <?php endforeach ?>
                    </select>
                    <label for="diagnosa" class="form-label">Diagnosa</label>
                    <input type="text" name="diagnosa"  class="form-control mb-3" value="<?= $row['diagnosa'] ?>" placeholder="Diagnosa/Keluhan"/>
                    <label for="tanggal" class="form-label">Tanggal Daftar</label>
                    <input type="text" name="tanggal" value="<?= $row['tanggal_daftar'] ?>" class="form-control mb-3"  disabled/>
                    <?php endforeach ?>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a class="btn btn-primary" href="javascript:window.history.back()">Back</a>
            </form>
        </div>
        
        
    </div>
</div>
<?= $this->endSection() ?>