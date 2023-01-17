<section class="mt-5">
    <div class="container">
        <div class="row p-5">
            <div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Daftar</h5>
                        <p class="text-center">Masukkan data anda dengan benar</p>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('register') ?>" method="post">
                            <div class="form-group mb-3">
                                <label for="firstname" class="text-secondary"><i class="fas fa-user"></i> First Name:</label>
                                <input type="text" name="firstname" id="" class="form-control" placeholder="First Name">
                                <p class="text-danger"><?= form_error('firstname') ?></p>
                            </div>
                            <div class="form-group mb-3">
                                <label for="lastname" class="text-secondary"><i class="fas fa-user"></i> Last Name:</label>
                                <input type="text" name="lastname" id="" class="form-control" placeholder="Last Name">
                                <p class="text-danger"><?= form_error('lastname') ?></p>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="text-secondary"><i class="fas fa-envelope"></i> Email:</label>
                                <input type="email" name="email" id="" class="form-control" placeholder="Email">
                                <p class="text-danger"><?= form_error('email') ?></p>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="text-secondary"><i class="fas fa-key"></i> Password:</label>
                                <input type="password" name="password" id="" class="form-control" placeholder="Password">
                                <p class="text-danger"><?= form_error('password') ?></p>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-2 col-lg-2 mx-auto mb-3">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <p>Sudah punya akun? <a href="<?= base_url('login') ?>" class="text-decoration-none">Login sekarang</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>