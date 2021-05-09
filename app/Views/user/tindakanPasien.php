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
<div class="container-fluid">
<h2>Tindakan Terhadap Pasien</h2>
<p>Notes:</p>
    <ul>
        <li>Tindakan terhadap pasien akan otomatis ditambahkan apabila tipe diagnosa ada pada data menu penanganan</li>
        <li>Jenis obat ada pada data menu obat</li>
    </ul>
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
                <th>Dokter</th>
                <th>Obat</th>
                <th>Tindakan</th>
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
                <form action="/api/post/updatePasien/<?= $row['id'] ?>" method="POST">
                <?= csrf_field() ?>
            
                
                <td><input style="width:100px;" type="text" value="<?= esc($row['nama_dokter']) ?>" name="dokter" placeholder="Nama Dokter"></td>
                <td><input style="width:100px;" type="text" value="<?= esc($row['obat']) ?>" name="obat" placeholder="Obat"></td>
                <td><input type="text" value="<?= esc($row['tindakan']) ?>" name="tindakan" placeholder="Tulis tindakan"></td>
                
                <td><input type="submit" class="btn btn-success" value="Update"></input></td>
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