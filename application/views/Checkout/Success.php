<section class="mt-5">
    <div class="container p-5">
        <h1 class="text-center">Terimakasih</h1>
        <div class="row mt-5">
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
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h3>Pembelian course berhasil, silahkan melakukan pembayaran ke rekening di bawah sebesar: </h3>
                        <h2 class="text-danger">Rp. <?= number_format($total['harga_total'], 0, ',', '.') ?></h2>
                        <div class="row mt-5">
                            <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                <h5>BCA</h5>
                                <p class="font-weight-bold">4456783789</p>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                <h5>BNI</h5>
                                <p class="font-weight-bold">1236758398</p>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4 text-center">
                                <h5>BRI</h5>
                                <p class="font-weight-bold">7892384799</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>