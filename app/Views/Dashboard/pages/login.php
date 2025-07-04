<?= $this->extend('Dashboard/layout/auth') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-sm p-4 rounded-4" style="width: 100%; max-width: 400px;">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-primary">Login</h3>
            <p class="text-muted">Silakan masuk untuk melanjutkan</p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('login/process') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary fw-semibold">🔐 Masuk</button>
            </div>

            <div class="text-center mb-2">
                <a href="<?= base_url('/') ?>" class="btn btn-link text-decoration-none">
                    ← Kembali ke Beranda
                </a>
            </div>

            <div class="text-center">
                <span class="text-muted">Belum punya akun?</span>
                <a href="<?= base_url('register') ?>" class="fw-semibold text-decoration-none">Daftar sekarang</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>