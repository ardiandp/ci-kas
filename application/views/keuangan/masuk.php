Test<!-- Content Wrapper. Contains page content -->
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
       <section class="content-header">
      <h1>
        DATA KAS MASUK
        <small>tabel lengkap</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('keuangan'); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#">Tabel</a></li>
        <li class="active">Data KAS MASUK</li>
      </ol>
    </section>

    <section class="content">
    	<div class="row">
    		<div class="col-xs-12">
          <div class="panel panel-success">
            <div class="panel-heading" style="font-size: 20px;">
              Data Kas Masuk
              <span title="Tambah Data">
                <button style="float: right;" class="btn-md btn btn-success" data-toggle="modal" data-target="#myModal"><b>+ Tambah </b></button>
              </span>
            </div>
            <div class="panel-body">
              <div class="tabel-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <head>
                    <tr>
                      <th>No. </th>
                      <th>Kode </th>
                      <th>Tanggal </th>
                      <th>Keterangan</th>
                      <th>Jumlah </th>
                      <th>Aksi </th>
                  </head>
                  <tbody>
                    <?php $no=1; foreach ($kasmasuk as $value) { ?>
                    <tr class="odd gradeX">
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $value['kode'] ?></td>
                      <td><?php echo date('d F Y',strtotime($value['tgl'])) ?></td>
                      <td><?php echo $value['keterangan'] ?></td>
                      <td><?php echo $value['jumlah'] ?></td>
                      <td> </td>
                    </tr>
                   <?php } ?>
                  </tbody>
                  
                </table>
              </div>
              
            </div>           
          </div>
    			
    		</div>
    	</div>

    </section>

      </div>