<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> DATA PENILAIAN </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <!-- <button type="button" data-toggle="modal" data-target="#cari" class="btn bg-cyan waves-effect">Tambah Jurusan</button> -->
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                   
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Soal</th>
                                        <th>NPM</th>
                                        <th>Nama</th>
                                        <th>Nilai</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($view_mahasiswa_seleksi as $v) { ?>
                                     <tr>
                                        <td><?php echo $v->judul_soal; ?></td>
                                        <td><?php echo $v->npm; ?></td>
                                        <td><?php echo $v->nama; ?></td>
                                        <td><?php echo $v->nilai; ?></td>
                                        <td><?php echo $v->hasil; ?></td>
                                        <td><?php echo $v->tanggal_nilai; ?></td>
                                        <td>
										<div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <!-- 
                                        <li><a href="<?php echo base_url("admin/"); ?>" class=" waves-effect waves-block" onclick="javascript : return confirm('Apakah Yakin Ingin Menghapus Data ini')">Hapus</a></li>-->
                                        <li><a href="<?php echo base_url("admin/lihat_detail_seleksi/$v->id_register/$v->kode"); ?>" class=" waves-effect waves-block">Penempatan</a></li>
										<li><a href="<?php echo base_url("admin/ubah_seleksi_penempatan/$v->id_register/$v->kode"); ?>" class=" waves-effect waves-block">Edit</a></li>
                                    </ul>
                                </div>
										</td>
                                    </tr>
								<?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <!-- #END# Exportable Table -->
        </div>
    </section>
	
	
	<div class="modal fade" id="cari">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- modal header -->
                                <div class="modal-header">
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    
                                </div>

                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
                                <form role="form" action="<?php echo base_url('admin/tambah_jurusan'); ?>" enctype="multipart/form-data" method="post">
								 <label>JURUSAN</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="jurusan" class="form-control" placeholder="JURUSAN" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal untuk footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn bg-purple waves-effect">
                                    <i class="material-icons">add_circle_outline</i> Tambah
                                </button>
                                </div>
                                </form>
                            </div>

                          </div>
                        </div>
                        </div>