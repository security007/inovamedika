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
    <h2>Edit Penanganan</h2>
        <div class="col">
            <form action="/api/post/editTindakan" method="POST">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="diagnosa" class="form-label">Edit Penanganan</label>
                    <?php foreach($tindakan as $row): ?>
                    <input type="text" class="form-control mb-3" name="diagnosa" placeholder="Diagnosa" value="<?= esc($row['diagnosa']) ?>">
                    <input type="text" class="form-control mb-3" name="penanganan" placeholder="Penanganan yang sesuai" value="<?= esc($row['penanganan']) ?>">
                    <input type="hidden" class="form-control mb-3" name="id" value="<?= esc($row['id']) ?>">
                    <?php endforeach ?> 
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a class="btn btn-primary" href="javascript:window.history.back()">Back</a>
            </form>
        </div>
        
        
    </div>
</div>
<?= $this->endSection() ?>