<?= $this->extend('Dashboard/layout/dashboard') ?>
<?= $this->section('content') ?>

<div class="container py-4">

    <!-- Rekomendasi Karir Utama -->
    <div class="card text-center shadow-sm border-0 mb-4 bg-light rounded-4 p-4 animate__animated animate__fadeInDown">
        <div class="card-body">
            <div class="mb-3">
                <i class="fas fa-bolt fa-3x text-primary"></i>
            </div>
            <h6 class="text-uppercase text-muted mb-1">Your Best Career Match</h6>
            <h2 class="fw-bold text-primary mb-2">UI/UX Designer</h2>
            <span class="badge rounded-pill bg-success px-3 py-2 mb-3 fs-6">
                Match Score: 85%
            </span>
            <p class="text-muted mb-4">
                Based on your answers and preferences, this career suits you best.
            </p>
        </div>

        <!-- Progress Criteria -->
        <div class="row mb-4 animate__animated animate__fadeInUp animate__delay-1s">
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <p class="fw-semibold mb-1">🎨 Creativity</p>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <p class="fw-semibold mb-1">🧠 Problem Solving</p>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-info" style="width: 78%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <p class="fw-semibold mb-1">📐 Design Knowledge</p>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-warning" style="width: 65%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Leaderboard -->
    <div class="card shadow-sm border-0 mb-4 animate__animated animate__fadeIn animate__delay-2s">
        <div class="card-header bg-light fw-semibold">📋 Career Match Ranking</div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 10%">Rank</th>
                        <th>Career</th>
                        <th>Match</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>🥇</td>
                        <td>UI/UX Designer</td>
                        <td><span class="badge bg-success">85%</span></td>
                        <td><a href="#" class="btn btn-sm btn-outline-secondary">Details</a></td>
                    </tr>
                    <tr>
                        <td>🥈</td>
                        <td>Data Analyst</td>
                        <td><span class="badge bg-secondary">78%</span></td>
                        <td><a href="#" class="btn btn-sm btn-outline-secondary">Details</a></td>
                    </tr>
                    <tr>
                        <td>🥉</td>
                        <td>Software Engineer</td>
                        <td><span class="badge bg-secondary">73%</span></td>
                        <td><a href="#" class="btn btn-sm btn-outline-secondary">Details</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center mt-3">
        <form action="<?= base_url('riwayat/simpan') ?>" method="post">
            <input type="hidden" name="karir" value="UI/UX Designer">
            <input type="hidden" name="skor" value="85">
            <button type="submit" class="btn btn-primary">
                💾 Simpan ke Riwayat
            </button>
        </form>
    </div>


</div>

<?= $this->endSection() ?>