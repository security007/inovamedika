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
    <h2>Edit Data User</h2>
        <div class="col">
            <form action="/api/post/editUser" method="POST">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <?php foreach($user as $row): ?>
                    <input type="text" class="form-control mb-3" name="nama" value="<?= $row['nama'] ?>">
                    <input type="email" class="form-control mb-3" name="email" value="<?= $row['email'] ?>">
                    <input type="password" class="form-control mb-3" name="newpassword" placeholder="New Password">
                    <label for="wilayah" class="form-label">Wilayah</label>
                    <select class="form-select mb-3" name="wilayah" aria-label="Default select example">
                    <?php foreach($wilayah as $wil): ?>
                    <option value="<?= $wil['nama_wilayah'] ?>"><?= $wil['nama_wilayah'] ?></option>
                    <?php endforeach ?> 
                    </select>
                    <input type="hidden" class="form-control mb-3" name="id" value="<?= $id ?>">
                    <label for="level" class="form-label">Level</label>
                    <select class="form-select" name="level" aria-label="Default select example">
                    <option value="Pegawai">Pegawai</option>
                    <option value="User">User</option>
                    </select>
                    <?php endforeach ?>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a class="btn btn-primary" href="javascript:window.history.back()">Back</a>
            </form>
        </div>
        
        
    </div>
</div>
<?= $this->endSection() ?>