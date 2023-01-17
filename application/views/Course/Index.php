<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Course</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Course</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->

                <div class="col-12">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><i class="fas fa-check-circle"></i></strong> <?= $this->session->flashdata('success') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('failed')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><i class="fas fa-warning"></i></strong> <?= $this->session->flashdata('failed') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalTambah">Tambah</button>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($course as $data) : ?>
                                        <tr>
                                            <td><?= $data['nama_course'] ?></td>
                                            <td><?= "Rp. " . number_format($data['harga_course'], 0, ',', '.') ?></td>
                                            <td><?= $data['nama_category'] ?></td>
                                            <td>
                                                <a href="<?= base_url('edit-course/') . $data['id_course'] ?>" class="text-primary" title="Ubah"><i class="fas fa-pen"></i></a>
                                                <a href="<?= base_url('delete-course/') . $data['id_course'] ?>" class="text-danger ml-3" title="Hapus"><i class="fas fa-trash"></i></a>
                                                <a href="<?= base_url('section/') . $data['id_course'] ?>" class="text-success ml-3" title="Section"><i class="fas fa-puzzle-piece"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambah" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('add-course') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="nama" id="" class="form-control" placeholder="Nama Course">
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="desc" id="summernote" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="harga" id="" class="form-control" placeholder="Harga">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="id_category" id="id_category" class="form-control select2">
                            <?php foreach ($cat as $data) : ?>
                                <option value="<?= $data['id_category'] ?>"><?= $data['nama_category'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Thumbnail Course</label>
                        <input type="file" name="thumb" id="thumb" class="form-control" placeholder="Thumbnail" accept=".jpg,.jpeg,.png">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>