<nav class="navbar navbar-expand-lg bg-light navbar-light p-3 fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('') ?>">Hippocampus</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Courses
                    </a>
                    <ul class="dropdown-menu">
                        <!-- <li><a class="dropdown-item" href="#">Soshum</a></li> -->
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?= base_url('all-course') ?>">Semua Course</a></li>
                    </ul>
                </li>

            </ul>
            <?php if ($this->session->userdata('id_user') != null) : ?>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item my-auto">
                        <a href="<?= base_url('cart') ?>" class="nav-link"><i class="fas fa-shopping-cart"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $this->session->userdata('firstname_user') . " " . $this->session->userdata('lastname_user') ?> &nbsp;
                            <?php
                            if ($this->session->userdata('foto_user') == "-") {
                                $foto = 'default.png';
                            } else {
                                $foto = $this->session->userdata('foto_user');
                            }
                            ?>
                            <img src="<?= base_url('assets/img/profil/') . $foto ?>" alt="" class="img-fluid rounded-circle" width="30">
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url('my-course') ?>">Course Saya</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('profil-user') ?>">Profil Saya</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
                        </ul>
                    </li>

                </ul>
            <?php endif; ?>
            <?php if ($this->session->userdata('id_user') == null) : ?>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary rounded-pill px-4" aria-current="page" href="<?= base_url('login') ?>">Log In</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="text-white nav-link btn btn-primary rounded-pill px-3" href="<?= base_url('register') ?>">Sign Up</a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>