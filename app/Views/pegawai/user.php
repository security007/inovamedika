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
    <h2>Data User/Pegawai</h2>
        <div class="col">
            <form action="/api/post/addUser" method="POST">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="nama" class="form-label ">Tambah User</label>
                    <input type="text" class="form-control mb-3" name="nama" placeholder="Nama">
                    <input type="email" class="form-control mb-3" name="email" placeholder="Email">
                    <input type="password" class="form-control mb-3" name="password" placeholder="Password">
                    <label for="wilayah" class="form-label">Wilayah</label>
                    <select class="form-select mb-3" name="wilayah" aria-label="Default select example">
                    <?php foreach($wilayah as $wil): ?>
                    <option value="<?= $wil['nama_wilayah'] ?>"><?= $wil['nama_wilayah'] ?></option>
                    <?php endforeach ?> 
                    </select>
                    <label for="level" class="form-label">Level</label>
                    <select class="form-select mb-3" name="level" aria-label="Default select example">
                    <option value="Pegawai">Pegawai</option>
                    <option value="User">User</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
        
        
    </div>
<hr>
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
                <td><a href="/dashboard/user/edit/<?= $row['id'] ?>" class="btn btn-success">Edit</a> <a href="/api/delete/deleteUser/<?= $row['id'] ?>" class="btn btn-danger">Delete</a></td>
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