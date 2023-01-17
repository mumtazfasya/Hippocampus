<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('dashboard') ?>" class="brand-link">
    <span class="brand-text font-weight-light">HippoCampus</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <?php
        if ($this->session->userdata('foto_user') == "-") {
          $foto = 'default.png';
        } else {
          $foto = $this->session->userdata('foto_user');
        }
        ?>
        <img src="<?= base_url('assets/img/profil/') . $foto ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $this->session->userdata('firstname_user') . " " . $this->session->userdata('lastname_user') ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= base_url('dashboard') ?>" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <!-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-code-branch"></i>
            <p>
              Categories
            </p>
            <i class="fas fa-angle-left right"></i>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('category') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Categories</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('subcategory') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sub Categories</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('course') ?>" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Courses
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('transaksi') ?>" class="nav-link">
            <i class="nav-icon fas fa-shopping-basket"></i>
            <p>
              Orders
            </p>
          </a>
        </li>


        <!-- <li class="nav-header">Report</li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-file"></i>
            <p>
              Reports
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Revenue</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Students</p>
              </a>
            </li>
          </ul>
        </li> -->

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>