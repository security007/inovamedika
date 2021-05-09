<?= $this->extend('templates/layout') ?>
<?= $this->section('title') ?>
    <title>Dashboard | Pegawai</title>
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
    <h2>Edit Data Obat</h2>
        <div class="col">
            <form action="/api/post/editObat" method="POST">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="namaObat" class="form-label">Nama Obat</label>
                    <?php foreach($obat as $row): ?>
                    <input type="text" class="form-control mb-3" name="namaObat" value="<?= $row['nama_obat'] ?>">
                    <label for="jenisObat" class="form-label">Jenis Obat</label>
                    <input type="text" class="form-control mb-3" name="jenisObat" value="<?= $row['jenis_obat'] ?>">
                    <label for="kegunaanObat" class="form-label">Kegunaan Obat</label>
                    <input type="text" class="form-control mb-3" name="kegunaanObat" value="<?= $row['kegunaan'] ?>">
                    <input type="hidden" class="form-control mb-3" name="id" value="<?= $row['id'] ?>">
                    
                    <?php endforeach ?>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a class="btn btn-primary" href="javascript:window.history.back()">Back</a>
            </form>
        </div>
        
        
    </div>
</div>
<?= $this->endSection() ?>