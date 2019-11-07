<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <?php 

              $a = $totaljumlah;
              $b = $totalkeluar;
              $c = $a-$b; 

            ?>
              <h4><?php echo "Rp. " . number_format($totaljumlah); ?>,-</h4>

              <p>TOTAL KAS MASUK</p>
            </div>
            <div class="icon">
              <i class="ion ion-social-usd"></i>
            </div>
            <a href="<?= base_url('admin/kasmasuk') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4><?php echo "Rp. " . number_format($totalkeluar); ?>,-</h4>

              <p>TOTAL KAS KELUAR</p>
            </div>
            <div class="icon">
              <i class="ion ion-social-usd"></i>
            </div>
            <a href="<?= base_url('admin/kaskeluar') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4><?php echo "Rp. " . number_format($c); ?>,-</h4>

              <p>SALDO AKHIR</p>
            </div>
            <div class="icon">
              <i class="ion ion-social-usd"></i>
            </div>
            <a href="<?= base_url('admin/rekapdata') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->

    </section>
    <!-- /.content -->
  </div>