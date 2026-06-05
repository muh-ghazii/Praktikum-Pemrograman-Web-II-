<div style="min-height:90vh; display:flex; align-items:center; background:var(--neutral);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                <?php if (session()->getFlashdata('warning')): ?>
                <div class="alert alert-warning-custom d-flex align-items-center gap-2 mb-3 p-3">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <?= session()->getFlashdata('warning') ?>
                </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-error-custom d-flex align-items-center gap-2 mb-3 p-3">
                    <i class="bi bi-x-circle-fill"></i>
                    <?= session()->getFlashdata('error') ?>
                </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success-custom d-flex align-items-center gap-2 mb-3 p-3">
                    <i class="bi bi-check-circle-fill"></i>
                    <?= session()->getFlashdata('success') ?>
                </div>
                <?php endif; ?>

                <div class="card-custom p-4 p-md-5">
                    <div class="text-center mb-4">
                        <div class="mx-auto mb-3 d-flex align-items-center justify-content-center"
                             style="width:56px; height:56px; background:#fff0f0; border-radius:14px;">
                            <i class="bi bi-book-fill fs-3" style="color:var(--primary)"></i>
                        </div>
                        <h5 class="fw-bold mb-1" style="font-family:'Hanken Grotesk',sans-serif;">Login</h5>
                        <p class="text-muted small mb-0">Silakan login untuk mengakses data buku</p>
                    </div>

                    <form action="/login" method="POST">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"
                                      style="border:1.5px solid var(--border); border-right:none; border-radius:8px 0 0 8px;">
                                    <i class="bi bi-person" style="color:var(--text-muted)"></i>
                                </span>
                                <input type="text" name="username"
                                       class="form-control form-control-custom"
                                       style="border-left:none; border-radius:0 8px 8px 0;"
                                       placeholder="Masukkan username"
                                       value="<?= old('username') ?>" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"
                                      style="border:1.5px solid var(--border); border-right:none; border-radius:8px 0 0 8px;">
                                    <i class="bi bi-lock" style="color:var(--text-muted)"></i>
                                </span>
                                <input type="password" name="password"
                                       class="form-control form-control-custom"
                                       style="border-left:none; border-radius:0 8px 8px 0;"
                                       placeholder="Masukkan password" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary-custom w-100 py-2">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Login
                        </button>
                    </form>
                </div>

                <p class="text-center text-muted small mt-3">
                    Default: <code style="color:var(--primary)">admin</code> /
                    <code style="color:var(--primary)">admin123</code>
                </p>

            </div>
        </div>
    </div>
</div>