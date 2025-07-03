<form action="<?= base_url('login/process') ?>" method="post">
    <?= csrf_field() ?>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
