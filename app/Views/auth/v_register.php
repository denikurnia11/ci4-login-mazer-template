<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Web Antrean Motor</title>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="<?= base_url(); ?>/assets/images/logo/logo.svg" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Sign Up</h1>
                    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

                    <form action="<?= base_url(); ?>/Auth/save" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input required type="text" class="form-control form-control-xl <?= ($validasi->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="Email" name="email" value="<?= old('email'); ?>">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('email'); ?>
                            </div>
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input required type="text" class="form-control form-control-xl <?= ($validasi->hasError('username')) ? 'is-invalid' : ''; ?>" placeholder="Username" value="<?= old('username'); ?>" name="username">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('username'); ?>
                            </div>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input required type="password" class="form-control form-control-xl <?= ($validasi->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Password" name="password">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('password'); ?>
                            </div>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input required type="password" class="form-control form-control-xl <?= ($validasi->hasError('cpassword')) ? 'is-invalid' : ''; ?>" placeholder="Confirm Password" name="cpassword">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('cpassword'); ?>
                            </div>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="<?= base_url(); ?>/auth/login" class="font-bold">Log
                                in</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>

    </div>
</body>

</html>