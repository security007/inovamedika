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
    <h2>Data Wilayah</h2>
        <div class="col">
            <form action="/dashboard/addWilayah" method="POST">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="wilayah" class="form-label">Tambah Wilayah</label>
                    <input type="text" class="form-control" name="wilayah">
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
        
        
    </div>
<hr>
<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Wilayah</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($wilayah as $row): ?>
            <tr>
                <td><?= esc($row['id']) ?></td>
                <td><?= esc($row['nama_wilayah']) ?></td>
                <td><a href="/dashboard/wilayah/edit/<?= $row['id'] ?>" class="btn btn-success">Edit</a> <a href="/api/delete/deleteWilayah/<?= $row['id'] ?>" class="btn btn-danger">Delete</a></td>
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