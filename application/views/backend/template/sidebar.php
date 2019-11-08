<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url('admin'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>KAS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> KAS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
              <img src="<?= base_url('assets/'); ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $user['nama']; ?></span>
              Date :
                <?php date_default_timezone_set('Asia/Jakarta');
                echo date('d-m-Y'); ?> &nbsp; &nbsp;
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url('assets/'); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                 <?= $user['nama']; ?>
                  <small>Bergabung Thn. 2019</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url('login/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets/'); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $user['nama']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
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
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="<?= base_url('admin'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <?php 
          if($this->session->userdata('level') == "admin"){
          ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-area-chart"></i>
            <span>Pengelolaan KAS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/kasmasuk'); ?>"><i class="fa fa-dollar"></i> KAS MASUK</a></li>
            <li><a href="<?= base_url('admin/kaskeluar'); ?>"><i class="fa fa-dollar"></i> KAS KELUAR</a></li>
          </ul>
        </li>
        <?php
          } 
          ?>
        <li><a href="<?= base_url('admin/rekapdata'); ?>"><i class="fa fa-file-pdf-o"></i> <span>Rekapitulasi KAS</span></a></li>
        <li><a href="<?= base_url('admin/tentangkas'); ?>"><i class="fa fa-gear"></i> <span>Tentang KAS</span></a></li>
         <li><a href="<?= base_url('keuangan'); ?>"><i class="fa fa-gear"></i> <span>Keuangan</span></a></li>

        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>