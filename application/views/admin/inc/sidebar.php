 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link" align="center">
     <!--  <img src="<?=admin();?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light" style="font-weight: bold;font-style: italic;">Velvet-Detailing</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=admin();?>dist/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="javascript:void(0)" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="<?=base_url('dashboard');?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               <!--  <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url('slider_list');?>" class="nav-link">
              <i class="nav-icon fas fa-align-justify"></i>
              <p>
                Slider
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="<?=base_url('about_list');?>" class="nav-link">
            <i class="nav-icon fas fa-angle-double-down"></i>
              <p>
                About
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
        </li>

        <li class="nav-item has-treeview">
            <a href="<?=base_url('recent_work');?>" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Recent Work
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="<?=base_url('services_list');?>" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>Services </p>
              <i class="right fas fa-angle-right"></i>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="<?=base_url('contact');?>" class="nav-link">
              <i class="nav-icon far fa-comment"></i>
              <p>
                Messages
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="<?=base_url('settings');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact Info</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('social-media');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Social Media</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('changepassword');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password </p>
                </a>
              </li>
              </li>
         
         </ul>
         </li>       
          

          

            
          <li class="nav-item">
            <a href="<?=base_url('logout');?>" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
               <!--  <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>