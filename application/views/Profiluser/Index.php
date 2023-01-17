<section class="mt-5">
    <div class="container p-5">
        <div class="row">
            <h1 class="text-center">Profil <?= $user['firstname_user'] . " " . $user['lastname_user'] ?></h1>
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-check-circle"></i></strong> <?= $this->session->flashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('failed')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-warning"></i></strong> <?= $this->session->flashdata('failed') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if ($this->session->userdata('foto_user') == "-") {
                            $foto = 'default.png';
                        } else {
                            $foto = $this->session->userdata('foto_user');
                        }
                        ?>
                        <img src="<?= base_url('assets/img/profil/') . $foto ?>" alt="" class="img-fluid rounded-circle mb-3">
                        <form action="<?= base_url('update-foto') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="foto" class="text-secondary"><i class="fas fa-image"></i> Ganti foto:</label>
                                <input type="file" name="foto" id="" class="form-control" accept=".jpg,.png,.jpeg">
                            </div>
                            <div class="form-group d-flex">
                                <button type="submit" class="btn btn-primary rounded-pill mx-auto">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-md-9">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('update-profil') ?>" method="post">
                            <div class="form-group mb-3">
                                <label for="" class="text-secondary"><i class="fas fa-user"></i> First Name:</label>
                                <input type="text" name="firstname" id="" class="form-control" value="<?= $user['firstname_user'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="text-secondary"><i class="fas fa-user"></i> Last Name:</label>
                                <input type="text" name="lastname" id="" class="form-control" value="<?= $user['lastname_user'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="text-secondary"><i class="fas fa-envelope"></i> Email:</label>
                                <input type="text" name="email" id="" class="form-control" value="<?= $user['email_user'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="text-secondary"><i class="fas fa-file"></i> Bio:</label>
                                <textarea name="bio" id="" rows="4" class="form-control"><?= $user['bio_user'] ?></textarea>
                            </div>
                            <div class="form-group d-flex">
                                <button type="submit" class="btn btn-primary mx-auto rounded-pill">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>