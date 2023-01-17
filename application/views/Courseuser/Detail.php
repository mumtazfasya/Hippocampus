<?php
$check = $this->db->get_where('tb_trans', ['id_course' => $course['id_course'], 'status_trans' => 'success'])->row_array();
if ($check) {
    $owned = true;
} else {
    $owned = false;
}
// echo json_encode($owned);
// die;
?>
<section class="mt-5">
    <div class="container p-5">
        <div class="row">
            <h1 class="text-center">Course <?= $course['nama_course']  ?></h1>
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
                        <img src="<?= base_url('assets/img/course/') . $course['thumb_course'] ?>" alt="" class="img-fluid rounded-circle mb-3">
                        <br>
                        <div class="col-12 d-flex">
                            <?php if ($this->session->userdata('id_user')) : ?>
                                <?php if ($owned == false) : ?>
                                    <a href="<?= base_url('add-cart/') . $course['id_course'] ?>" class="btn btn-primary rounded-pill px-5 mx-auto">Beli</a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if ($this->session->userdata('id_user') == null) : ?>
                                <a href="#" class="btn btn-primary rounded-pill px-5 disabled mx-auto" title="Login untuk membeli course ini">Beli</a>
                                <br>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 mt-3">
                            <?php if ($this->session->userdata('id_user') == null) : ?>
                                <p class="text-secondary">*Login terlebih dahulu untuk membeli course ini</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="accordion" id="accordionExample">
                            <?php foreach ($sec as $data) : ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $data['id_section'] ?>" aria-expanded="false" aria-controls="collapse<?= $data['id_section'] ?>">
                                            <?= $data['nama_section'] ?>
                                        </button>
                                    </h2>
                                    <div id="collapse<?= $data['id_section'] ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <?= $data['desc_section'] ?>
                                            <br>
                                            <strong>Lessons:</strong>
                                            <br>
                                            <ul>
                                                <?php
                                                $lesson = $this->db->get_where('tb_lesson', ['id_section' => $data['id_section']])->result_array();

                                                foreach ($lesson as $dataLes) :
                                                ?>
                                                    <li>
                                                        <?= $dataLes['nama_lesson'] ?>
                                                        &nbsp;
                                                        <?php if ($owned == true) : ?>
                                                            <a href="<?= base_url('assets/docs/lesson/') . $dataLes['attr_lesson'] ?>">Materi</a>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>