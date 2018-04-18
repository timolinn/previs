<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
          <div class="pull-left image">
              <img src="<?= assetload('vendor/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
              <p>Timothy Onyiuke</p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
    </button>
  </span>
          </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
          <li class="header">DASHBOARD</li>
          <!-- Optionally, you can add icons to the links -->
          <!-- <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Dashboard</span></a></li> -->
          <li class="treeview active">
              <a href="#"><i class="fa fa-briefcase"></i> <span>My Business</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
              <ul class="treeview-menu">
                  <li><a href="{{ route('admin.products')}}"><i class="fa fa-dot-circle-o"></i>Products</a></li>
                  <li><a href="#"><i class="fa fa-dot-circle-o"></i>Customers</a></li>
                  <li><a href="#"><i class="fa fa-dot-circle-o"></i>Transactions</a></li>
              </ul>
          </li>
          <!-- <li class="treeview active">
              <a href="#"><i class="fa fa-gears"></i> <span>Tools</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
              <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-dot-circle-o"></i>Tool 1</a></li>
                  <li><a href="#"><i class="fa fa-dot-circle-o"></i>Tool 2</a></li>
              </ul>
          </li> -->
          <li class="treeview active">
              <a href="#"><i class="fa fa-credit-card"></i> <span>Billing</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
              <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-dot-circle-o"></i>Recurring</a></li>
                  <li><a href="#"><i class="fa fa-dot-circle-o"></i>Plans</a></li>
                  <li><a href="#"><i class="fa fa-dot-circle-o"></i>Susbcriptions</a></li>
              </ul>
          </li>
      </ul>
      <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>