<section class="mt-5">
    <div class="container p-5">
        <h1 class="text-center">Semua Course</h1>
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
</section>