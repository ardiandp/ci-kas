<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA KAS MASUK
        <small>tabel lengkap</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#">Tabel</a></li>
        <li class="active">Data KAS MASUK</li>
      </ol>
    </section>

      <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- Advanced Tables -->
                <div class="panel panel-success">
                    <div class="panel-heading" style="font-size: 20px;">
                    Data Kas Masuk
                        <span title="Tambah Data">
                            <button style="float: right;" class="btn-md btn btn-success"data-toggle="modal" data-target="#myModal">
                                <b>+ Tambah</b>
                            </button>
                        </span>
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
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        <?php $i = 1 ; foreach ($kasmasuk as $row ) { ?>
                                    
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
                                                <a id="edit_data" data-toggle="modal" data-target="#edit" data-id="<?php echo $row['kode']; ?>" data-ket="<?php echo $row['keterangan']; ?>" data-tgl="<?php echo $row['tgl']; ?>" data-jml="<?php echo $row['jumlah']; ?>" class="btn btn-warning btn-md" title="Ubah Data"><i class="fa fa-edit"> </i></a>
                                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data?')" href="<?php echo base_url().'admin/kasmasuk_hapus/'.$row['kode']; ?>" class="btn btn-danger btn-md" title="Hapus Data"><i class="fa fa-trash"> </i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                </tbody>

                                <tr>
                                    <td colspan="4" style="text-align: left; font-size: 17px; color: maroon;">Total Kas Masuk :</td>
                                    <td style="font-size: 17px; text-align: right; "><font style="color: green;"><?php echo "Rp. " . number_format($totaljumlah); ?>,-</font></td>
                                </tr>
                            </table>
                        </div>

                        <!--  Halaman Tambah-->
                        <div class="panel-body">
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Tambah Data</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="<?php echo base_url()?>admin/tambahkas" method="POST">
                                                <div class="form-group">
                                                    <label>Kode</label>
                                                    <input class="form-control" name="kode" placeholder="Input Kode" value="<?php echo date('Ymdis')?>" />
                                                </div>
                                                <div>
                                                    <label>Keterangan</label>
                                                    <textarea class="form-control" rows="3" name="ket"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input class="form-control" type="date" name="tgl" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Jumlah</label>
                                                    <input class="form-control" type="number" name="jml" />
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                            <!-- Akhir Halaman Tambah -->

                            <!-- Halaman Ubah -->
                            <div class="panel-body">
                                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Form Ubah Data</h4>
                                            </div>
                                            <div class="modal-body" id="modal_edit">
                                                <form role="form" action="<?php echo base_url()?>admin/kasmasuk_update" method="POST">
                                                    <div class="form-group">
                                                        <label>Kode</label>
                                                        <input class="form-control" name="kode" placeholder="Input Kode" id="kode" readonly />
                                                    </div>
                                                    <div>
                                                        <label>Keterangan</label>
                                                        <textarea class="form-control" rows="3" name="ket" id="ket"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal</label>
                                                        <input class="form-control" type="date" name="tgl" id="tgl" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jumlah</label>
                                                        <input class="form-control" type="number" name="jml" id="jml" />
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
                                                </form>

                                   

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Halaman Ubah -->
                    </div>
                </div>
            </div>
        </section>
      </div>