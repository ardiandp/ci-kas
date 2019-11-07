<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        REKAPITULASI DATA
        <small>tabel lengkap</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#">Tabel</a></li>
        <li class="active">REKAPITULASI DATA</li>
      </ol>
    </section>

    <section class="content">

    <div class="row">
        <div class="col-xs-12">
            <!-- Advanced Tables -->
            <div class="panel panel-success">
                <div class="panel-heading" style="font-size: 20px;">
                    Data Rekapitulasi
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Masuk</th>
                                    <th>Jenis</th>
                                    <th>Keluar</th>
                                </tr>
                            </thead>
                            <tbody>

                                    <?php $i = 1 ; foreach ($rekap as $row ) { ?>

                                    <tr class="odd gradeX">
                                        <td>
                                            <?php echo $i++; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['kode']; ?>
                                        </td>
                                        <td>
                                            <?php echo date('d F Y', strtotime($row['tgl'])); ?>
                                        </td>
                                        <td>
                                            <?php echo $row['keterangan']; ?>
                                        </td>
                                        <td align="right">
                                            <?php echo number_format($row['jumlah']).",-"; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['jenis']; ?>
                                        </td>
                                        <td align="right">
                                            <?php echo number_format($row['keluar']).",-"; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <?php 

                                $a = $totaljumlah;
                                $b = $totalkeluar;
                                $c = $a-$b; 

                            ?>
                            <tr>
                                <td colspan="4" style="text-align: left; font-size: 16px; color: maroon;">Total Kas Masuk :</td>
                                <td style="font-size: 17px; text-align: right; "><font style="color: green;"><?php echo "Rp. " . number_format($totaljumlah); ?></font></td>
                            </tr>

                            <tr>
                                <td colspan="6" style="text-align: left; font-size: 16px; color: maroon;">Total Kas Keluar :</td>
                                <td style="font-size: 17px; text-align: right; "><font style="color: red;"><?php echo "Rp. " . number_format($totalkeluar); ?></font></td>
                            </tr>

                            <tr>
                                <td colspan="5" style="text-align: left; font-size: 16px; color: red;">Saldo Akhir : <?php echo "Rp. " . number_format($totaljumlah); ?> - <?php echo "Rp. " . number_format($totalkeluar); ?></td>
                                <th style="font-size: 17px; text-align: right;"><font style="color: purple;">= <?php echo "Rp. " . number_format($c); ?></font></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>