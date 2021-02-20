<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> DATA KEAKTIFAN </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DAFTAR KEAKTIFAN MAHASISWA
                                
                            </h2>
                            <ul class="header-dropdown m-r--5">
                               
                            </ul>
                        </div>
                        <div class="body">
						<form action="<?php echo base_url('admin/tambah_keaktifan'); ?>" method="post">
                            <select id="optgroup" class="ms" multiple="multiple" name="id_register[]">
                                <optgroup label="PILIH SEMUA MAHASISWA">
								<?php foreach($tampil_register as $v) { ?>
                                    <option value="<?php echo $v->id_register; ?>">(<?php echo $v->npm; ?>) - <?php echo $v->nama; ?></option>
								<?php } ?>
                                </optgroup>
                            </select><br/>
						<label>Kegiatan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="kegiatan" class="form-control" placeholder="Kegiatan">
                                    </div>
                                </div>
								<label>Tanggal</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="tanggal_kegiatan" class="form-control">
                                    </div>
                                </div>
								
                                <button type="submit" class="btn bg-purple waves-effect">
                                    <i class="material-icons">save</i> Simpan
                                </button>
								</form>
                        </div>
                    </div>
                </div>
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <!-- <a href="<?php echo base_url('admin/input_data'); ?>" type="button" class="btn bg-cyan waves-effect">Tambah Data</a> -->
                            <ul class="header-dropdown m-r--5">
                                <!-- <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li> -->
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>NPM</th>
                                        <th>Nama</th>
                                        <th>Kegiatan</th>
                                        <th>Tanggal</th>
                                        <!-- <th>Opsi</th> -->
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($tampil_keaktifan as $v) { ?>
                                     <tr>
                                        <td><?php echo $v->npm; ?></td>
                                        <td><?php echo $v->nama; ?></td>
                                        <td><?php echo $v->kegiatan; ?></td>
                                        <td><?php echo tgl_indo($v->tanggal_kegiatan); ?></td>
                                        <!-- <td>
										<div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url("admin/"); ?>" class=" waves-effect waves-block">Edit</a></li>
                                        <li><a href="<?php echo base_url("admin/"); ?>" class=" waves-effect waves-block">Hapus</a></li>
                                    </ul>
                                </div>
										</td> -->
                                    </tr>
								<?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LAPORAN KEGIATAN
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="<?php echo base_url('admin/laporan_keaktifan'); ?>" target="_blank" method="post">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Dari Tanggal</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" name="dari"  class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Sampai Tanggal</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" name="sampai" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">laporan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
				
            </div>
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <!-- #END# Exportable Table -->
        </div>
    </section>