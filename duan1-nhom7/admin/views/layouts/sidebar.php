<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= BASE_URL ?>" class="brand-link">
    <img src="<?= BASE_URL ?>public/uploads/logo1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Xiao Haha</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= BASE_URL ?>public/uploads/minion.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Team 7</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item ">
          <!-- menu-open -->
          <a href="<?= ADMIN_URL ?>" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= ADMIN_URL . 'quan-ly-don-hang' ?>" class="nav-link">
            <i class="fas fa-luggage-cart" aria-hidden="true"></i>
            <p>
              Đơn hàng
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-list-ol" aria-hidden="true"></i>
            <p>
              Danh mục
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= ADMIN_URL . 'danh-muc' ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= ADMIN_URL . 'danh-muc/tao-moi' ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo mới</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-coffee" aria-hidden="true"></i>
            <p>
              Sản phẩm
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= ADMIN_URL . 'san-pham' ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= ADMIN_URL . 'san-pham/tao-moi' ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo mới</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-users" aria-hidden="true"></i>
            <p>
              Tài khoản
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= ADMIN_URL . 'tai-khoan/khach-hang' ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Khách hàng</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= ADMIN_URL . 'tai-khoan/nhan-vien' ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Nhân viên</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-newspaper"></i>
            <p>
              Bài viết
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= ADMIN_URL . 'bai-viet' ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= ADMIN_URL . 'bai-viet/tao-moi' ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo mới</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-newspaper"></i>
            <p>
              Danh mục bài viết
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= ADMIN_URL . 'danh-muc-bai-viet' ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách danh mục</p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="<?= ADMIN_URL . 'danh-muc-bai-viet/tao-moi' ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo mới</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= ADMIN_URL . 'lien-he' ?>" class="nav-link">
            <i class="fas fa-id-badge"></i>
            <p>Quản lý thông tin chung</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= ADMIN_URL . 'phan-hoi' ?>" class="nav-link">
            <i class="fas fa-comment-dots"></i>
            <p>Khách hàng phản hồi</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= ADMIN_URL . 'phan-hoi-don-hang' ?>" class="nav-link">
            <i class="fas fa-luggage-cart" aria-hidden="true"></i>
            <p>
              Phản hồi từ đơn hàng
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>