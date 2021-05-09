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
<h2>Data Pembayaran</h2>
<table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>Umur</th>
                <th>Wilayah</th>
                <th>Diagnosa</th>
                <th>Tanggal Daftar</th>
                <th>Status Pembayaran</th>
                <th>Konfirmasi Pembayaran</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($pasien as $row): ?>
            <tr>
                <td><?= esc($row['nama_pasien'])?></td>
                <td><?= esc($row['umur']) ?></td>
                <td><?= esc($row['wilayah']) ?></td>
                <td><?= esc($row['diagnosa']) ?></td>
                <td><?= esc($row['tanggal_daftar']) ?></td>
                <td><?php if(esc($row['pembayaran']) == 'Pending'): ?>
                <button class="btn btn-primary">Pending</button>
                <?php endif ?>
                <?php if(esc($row['pembayaran']) == 'Sukses'): ?>
                <button class="btn btn-success">Sukses</button>
                <?php endif ?>
                </td>
                <form action="/api/post/pembayaran/<?= $row['id'] ?>" method="POST">
                <?= csrf_field() ?>
                <td>
                <select class="form-select" name="konfirmasi" aria-label="Default select example">
                <option selected>Pilih</option>
                <option value="Sukses">Dibayar</option>
                <option value="Pending">Belum Dibayar</option>
                </select>
                </td>
                <td><input type="submit" class="btn btn-success" value="Konfirmasi"></input></td>
            </tr>
            </form>
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