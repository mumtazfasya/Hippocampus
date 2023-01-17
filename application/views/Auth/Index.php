<section class="mt-5">
  <div class="container">
    <div class="row p-5">
      <div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
        <div class="card">
          <div class="card-header">
            <h5 class="text-center">Login</h5>
            <p class="text-center">Masukkan data anda dengan benar</p>
          </div>
          <div class="card-body">
            <form action="<?= base_url('login') ?>" method="post">
              <div class="form-group mb-3">
                <label for="email" class="text-secondary"><i class="fas fa-envelope"></i> Email:</label>
                <input type="email" name="email" id="" class="form-control" placeholder="Email">
              </div>
              <div class="form-group mb-3">
                <label for="password" class="text-secondary"><i class="fas fa-key"></i> Password:</label>
                <input type="password" name="password" id="" class="form-control" placeholder="Password">
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-2 col-lg-2 mx-auto mb-3">
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
              </div>
              <div class="row">
                <div class="col-12 text-center">
                  <a href="#" class="text-decoration-none">Lupa Password?</a>
                  <p>Belum punya akun? <a href="<?= base_url('register') ?>" class="text-decoration-none">Daftar sekarang</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>