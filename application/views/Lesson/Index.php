<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Lesson</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Lesson</li>
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
                                        <th>Materi / File</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($les as $data) : ?>
                                        <tr>
                                            <td><?= $data['nama_lesson'] ?></td>
                                            <td><a href="<?= base_url('assets/docs/lesson/') . $data['attr_lesson'] ?>" target="__blank"><?= $data['attr_lesson'] ?></a></td>
                                            <td>
                                                <a href="<?= base_url('edit-lesson/') . $data['id_lesson'] ?>" class="text-primary" title="Ubah"><i class="fas fa-pen"></i></a>
                                                <a href="<?= base_url('delete-lesson/') . $data['id_lesson'] ?>" class="text-danger ml-3" title="Hapus"><i class="fas fa-trash"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Lesson</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('add-lesson/') . $id_section ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="nama" id="" class="form-control" placeholder="Nama Lesson">
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="desc" class="form-control" cols="30" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Materi / File</label>
                        <input type="file" name="attr" id="attr" class="form-control" placeholder="Attr" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.txt">
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