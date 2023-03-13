
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link text-center">
      <span class="brand-text font-weight-light">REABOOK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('')}}dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->is('admin/dashboard') ? "active" : "" }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('book-request.index') }}" class="nav-link {{ request()->is('admin/book-request') ? "active" : "" }}">
              <i class="nav-icon fas fa-share"></i>
              <p>
                Book Request 
              </p>
            </a>
          </li>
          <li class="nav-header">Data</li>
          <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link {{ request()->is('admin/user*') ? "active" : "" }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('book.index') }}" class="nav-link {{ (request()->is('admin/book') || request()->is('admin/book/*')) ? "active" : "" }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Books
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('category.index') }}" class="nav-link {{ request()->is('admin/category*') ? "active" : "" }}">
              <i class="nav-icon fas fa-toolbox"></i>
              <p>
                Categories
              </p>
            </a>
          </li>

          <li class="nav-header">Order</li>
          <li class="nav-item">
            <a href="{{ route('order.index') }}" class="nav-link {{ request()->is('admin/order*') ? "active" : "" }}">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                List Order
              </p>
            </a>
          </li>

          <li class="nav-header">Setting</li>
          <li class="nav-item">
            <a href="{{ route('store.setting') }}" class="nav-link {{ request()->is('admin/setting*') ? "active" : "" }}">
              <i class="nav-icon fas fa-map-marked-alt"></i>
              <p>
                Store Setting
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
