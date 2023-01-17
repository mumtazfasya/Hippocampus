<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Sub Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('subcategory') ?>">Sub Categories</a></li>
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
                            <h6 class="text-center">Ubah Sub Kategori</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('edit-subcategory/') . $cat['id_category'] ?>" method="post">
                                <div class="form-group">
                                    <label for="">Nama Kategori</label>
                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Kategori" value="<?= $cat['nama_category'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Parent Kategori</label>
                                    <select name="parent" id="parent" class="form-control select2">
                                        <?php foreach ($parent as $data) : ?>
                                            <option value="<?= $data['id_category'] ?>" <?= ($cat['parent_category'] == $data['id_category']) ? 'selected' : '' ?>><?= $data['nama_category'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
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