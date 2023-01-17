<section class="mt-5">
    <div class="container p-5">
        <h1 class="text-center">Course Saya</h1>
        <div class="row">
            <?php foreach ($course as $data) : ?>
                <div class="col-sm-12 col-md-3 col-lg-3 mt-3">
                    <div class="card shadow">
                        <img src="<?= base_url('assets/img/course/') . $data['thumb_course'] ?>" alt="" class="img-fluid">
                        <div class="card-body">
                            <h5><?= $data['nama_course'] ?></h5>
                            <div class="col-12 d-flex">
                                <a href="<?= base_url('detail-course/') . $data['id_course'] ?>" class="btn btn-primary rounded-pill px-3 mt-3 mx-auto">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>