<?= $this->extend('Dashboard/layout/dashboard') ?>
<?= $this->section('content') ?>

<div class="container py-4">
    <h3 class="mb-4 fw-bold">📁 Career Recommendation History</h3>

    <!-- Jika tidak ada riwayat -->
    <!-- <div class="alert alert-info">You don’t have any saved recommendations yet.</div> -->

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Career</th>
                    <th>Match Score</th>
                    <th>Date Saved</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Contoh data dummy -->
                <tr>
                    <td>1</td>
                    <td>
                        <strong>UI/UX Designer</strong><br>
                        <small class="text-muted">Creative digital interface work</small>
                    </td>
                    <td><span class="badge bg-success">85%</span></td>
                    <td>May 21, 2025</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-outline-primary">View</a>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <strong>Data Analyst</strong><br>
                        <small class="text-muted">Analytical role with data insights</small>
                    </td>
                    <td><span class="badge bg-secondary">78%</span></td>
                    <td>May 19, 2025</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-outline-primary">View</a>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </td>
                </tr>
                <!-- Tambahkan baris lainnya sesuai data dari backend -->
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>