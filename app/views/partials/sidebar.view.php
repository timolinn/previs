<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
          <div class="pull-left image">
              <img src="<?= assetload('vendor/dist/img/avatar.png') ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
              <p><?= $user->fullname(); ?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-fw fa-circle text-success"></i> Online</a>
          </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-fw fa-search"></i>
    </button>
  </span>
          </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
          <li class="header">DASHBOARD</li>
          <!-- Optionally, you can add icons to the links -->
          <!-- <li class="active"><a href="#"><i class="fa fa-fw fa-link"></i> <span>Dashboard</span></a></li> -->
          <li class="treeview active">
              <a href="#"><i class="fa fa-briefcase"></i> <span>Manage Previs</span>
              <span class="pull-right-container">
                  <i class="fa fa-fw fa-angle-left pull-right"></i>
                </span>
            </a>
              <ul class="treeview-menu">
                  <li><a href="/items"><i class="fa fa-fw fa-cutlery"></i>Manage Items</a></li>
                  <li><a href="/users"><i class="fa fa-fw fa-users"></i>Manage Customers</a></li>
                  <li><a href="/orders"><i class="fa fa-fw fa-shopping-cart"></i>Manage Orders</a></li>
                  <li><a href="/excel"><i class="fa fa-fw  fa-file-excel-o"></i>Export to Excel</a></li>
              </ul>
          </li>
          <li class="treeview active">
              <a href="#"><i class="fa fa-user"></i> <span>Your Profile</span>
              <span class="pull-right-container">
                  <i class="fa fa-fw fa-angle-left pull-right"></i>
                </span>
            </a>
              <ul class="treeview-menu">
                  <li><a href="/users/<?= $user->user_name; ?>"><i class="fa fa-fw fa-user"></i>My Profile</a></li>
                  <li><a href="/orders/<?= $user->id; ?>"><i class="fa fa-fw fa-opencart"></i>My Orders</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-gear"></i>Settings</a></li>
              </ul>
          </li>
      </ul>
      <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>