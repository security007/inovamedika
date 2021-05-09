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
<h2>Data User/Pegawai</h2>
<table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Wilayah</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($user as $row): ?>
            <tr>
                <td><?= esc($row['nama']) ?></td>
                <td><?= esc($row['email']) ?></td>
                <td><?= esc($row['wilayah']) ?></td>
                <td><?= esc($row['level']) ?></td>
                <td><a class="btn btn-primary">Hanya role pegawai yang bisa melakukan aksi ini</a></td>
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