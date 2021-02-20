<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> PENGUMUMAN </b>
                    
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
                                        <th>Hasil</th>
                                        <th>Status</th>
                                        <th>Penempatan</th>
                                        <th>Tanggal</th>
                                        <th>OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($tampil_pengumuman as $v) { 
								if($v->nilai >= 60 ){
									$status = 'Lulus';
									$label = 'success';
								}else{
									$status = 'Tidak';
									$label = 'danger';
								}
								?>
                                     <tr>
                                        <td><?php echo $v->judul_soal; ?></td>
                                        <td><?php echo $v->npm; ?></td>
                                        <td><?php echo $v->nama; ?></td>
                                        <td><span class="label label-<?php echo $label; ?>"><?php echo $status; ?></span></td>
                                        <td><?php echo $v->hasil; ?></td>
										<td><span class="label label-success"><?php echo $v->penempatan; ?></span></td>
                                        <td><?php echo $v->tanggal; ?></td>
                                        <td>
										<div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url("mahasiswa/tambahan_formulir/$v->id_nilai"); ?>" target="_blank" class=" waves-effect waves-block">Cetak</a></li>
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
	
	