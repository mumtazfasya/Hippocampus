<section class="mt-5">
    <img src="<?= base_url('assets/') ?>img/banner.jpeg" alt="" class="img-fluid" width="100%">
</section>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-4 bg-primary bg-gradient text-white p-3">
                <div class="row">
                    <div class="col-2 my-auto">
                        <i class="fas fa-book" style="font-size: 30pt;"></i>
                    </div>
                    <div class="col-6">
                        <h4>2 Online Courses</h4>
                        <span>Explore</span>
                    </div>
                </div>
            </div>
            <div class="col-4 bg-info bg-gradient text-white p-3">
                <div class="row">
                    <div class="col-2 my-auto">
                        <i class="fas fa-pen" style="font-size: 30pt;"></i>
                    </div>
                    <div class="col-6">
                        <h4>Expert Instruction</h4>
                        <span>Explore</span>
                    </div>
                </div>
            </div>
            <div class="col-4 bg-primary bg-gradient text-white p-3">
                <div class="row">
                    <div class="col-2 my-auto">
                        <i class="fas fa-clock" style="font-size: 30pt;"></i>
                    </div>
                    <div class="col-6">
                        <h4>Lifetime Access</h4>
                        <span>Explore</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="row p-3 mb-5">
            <div class="col-12 mt-5">
                <h2>All Courses</h2>
            </div>
            <div class="col-12 mt-5">
                <div class="row">
                    <?php foreach ($course as $data) : ?>
                        <div class="col-sm-12 col-md-3 col-lg-3 mt-3">
                            <div class="card shadow">
                                <img src="<?= base_url('assets/img/course/') . $data['thumb_course'] ?>" alt="" class="img-fluid">
                                <div class="card-body">
                                    <h5><?= $data['nama_course'] ?></h5>
                                    <p>Rp. <?= number_format($data['harga_course'], 0, ',', '.') ?></p>
                                    <a href="<?= base_url('detail-course/') . $data['id_course'] ?>" class="btn btn-primary rounded-pill px-3">Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>