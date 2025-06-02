<?= $this->extend('Dashboard/layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="container-fluid px-4">
    <h3 class="mt-4"><?= esc($title) ?></h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><?= esc($subtitle) ?></li>
    </ol>

</div>

<?= $this->endSection() ?>