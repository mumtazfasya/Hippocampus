<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Section</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('course') ?>">Course</a></li>
                        <li class="breadcrumb-item active">Edit</li>
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

                <div class="col-5 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-center">Ubah Lesson</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('edit-section/') . $les['id_lesson'] ?>" method="post">
                                <div class="form-group">
                                    <label for=""></label>
                                    <input type="text" name="nama" id="" class="form-control" placeholder="Nama Lesson" value="<?= $les['nama_lesson'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="desc" class="form-control" cols="30" rows="4">
                                        <?= $les['nama_lesson'] ?>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Materi / File</label>
                                    <input type="file" name="attr" id="attr" class="form-control" placeholder="Attr" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.txt">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                </div>
                            </form>
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