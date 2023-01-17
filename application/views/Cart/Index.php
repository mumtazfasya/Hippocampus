<section class="mt-5">
    <div class="container p-5">
        <div class="row">
            <h1 class="text-center">Keranjang Saya</h1>
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
            <div class="col-sm-12 col-md-9 col-lg-9">
                <?php foreach ($cart as $data) : ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <img src="<?= base_url('assets/img/course/') . $data['thumb_course'] ?>" alt="" class="img-fluid">
                                </div>
                                <div class="col-sm-6 col-md-7 col-lg-7">
                                    <h3><?= $data['nama_course'] ?></h3>
                                    <p><?= $data['desc_course'] ?></p>
                                </div>
                                <div class="col-sm-12 col-md-1 col-lg-1 my-auto">
                                    <a href="<?= base_url('delete-cart/') . $data['id_cart'] ?>" class="btn btn-danger rounded-circle text-center"><i class="fas fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-sm-12 col-md-3 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 d-flex">
                            <a href="<?= base_url('checkout') ?>" class="btn btn-primary rounded-pill px-5 mx-auto">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>