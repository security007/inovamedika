<?= $this->extend('templates/layout') ?>
<?= $this->section('title') ?>
    <title>Dashboard | Pegawai</title>
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
    <div class="row">
    <h2>Tambah Penanganan</h2>
        <div class="col">
            <form action="/api/post/addTindakan" method="POST">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <input type="text" class="form-control mb-3" name="diagnosa" placeholder="Diagnosa">
                    <input type="text" class="form-control mb-3" name="penanganan" placeholder="Penanganan yang sesuai">
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
        
        
    </div>
<hr>
<table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Diagnosa</th>
                <th>Tindakan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($tindakan as $row): ?>
            <tr>
                <td><?= esc($row['diagnosa']) ?></td>
                <td><?= esc($row['penanganan']) ?></td>
                <td><a href="/dashboard/tindakan/edit/<?= $row['id'] ?>" class="btn btn-success">Edit</a> <a href="/api/delete/deleteTindakan/<?= $row['id'] ?>" class="btn btn-danger">Delete</a></td>
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