<?= $this->extend('Dashboard/layout/auth') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-sm p-4 rounded-4" style="width: 100%; max-width: 400px;">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-primary">Register</h3>
            <p class="text-muted">Buat akun baru Anda di sini</p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('register/process') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email aktif" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Buat password" required>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary fw-semibold">📝 Daftar</button>
            </div>

            <div class="text-center mb-2">
                <a href="<?= base_url('/') ?>" class="btn btn-link text-decoration-none">
                    ← Kembali ke Beranda
                </a>
            </div>

            <div class="text-center">
                <span class="text-muted">Sudah punya akun?</span>
                <a href="<?= base_url('login') ?>" class="fw-semibold text-decoration-none">Masuk di sini</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>