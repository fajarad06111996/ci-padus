<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> UBAH SELEKSI PENEMPATAN </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Foto Mahasiswa
                                
                            </h2> 
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" >
                                       <!-- <i class="material-icons" data-toggle="modal" data-target="#foto" title="Ubah Foto">add_a_photo</i> -->
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body"><center>
                            <img src="<?php echo base_url(); ?>assets/images/19.jpg" height="300px" width="400px;">
                        </center></div>
                    </div>
                </div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DETAIL SELEKSI & PILIH PENEMPATAN
                                
                            </h2>
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
								<!--<a href="javascript:void(0);" >
                                        <i class="material-icons" data-toggle="modal" data-target="#data" title="Tambah Detail Data">add_circle</i>
                                    </a> -->
                            </ul>
                        </div>
                        <div class="body">
                            <div class="body table-responsive">
                            <table class="table table-bordered">
							<?php foreach($tampil_detail_mahasiswa as $v ) { ?>
                                <thead>
                                    <tr>
                                        <th>NPM</th>
                                        <th><?php echo $v->npm; ?></th>
                                    </tr>
									 <tr>
                                        <th>Nama</th>
                                        <th><?php echo $v->nama; ?></th>
                                    </tr>
									 <tr>
                                        <th>Email</th>
                                        <th><?php echo $v->email; ?></th>
                                    </tr>
									 <tr>
                                        <th>Fakultas</th>
                                        <th><?php echo $v->fakultas; ?></th>
                                    </tr>
									 <tr>
                                        <th>Jurusan</th>
                                        <th><?php echo $v->jurusan; ?></th>
                                    </tr>
									 <tr>
                                        <th>Hobby</th>
                                        <th><?php echo $v->hobby; ?></th>
                                    </tr>
									 <tr>
                                        <th>Prestasi</th>
                                        <th><?php echo $v->prestasi; ?></th>
                                    </tr>
									 <tr>
                                        <th>Minat</th>
                                        <th><?php echo $v->minat; ?></th>
                                    </tr>
                                </thead>
							<?php } ?>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
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
                                        <th>Nilai</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($lihat_hasil_seleksi as $vv) { ?>
                                     <tr>
                                        <td><?php echo $vv->judul_soal; ?></td>
                                        <td><?php echo $vv->nilai; ?></td>
                                        <td><?php echo $vv->tanggal_nilai; ?></td>
                                      
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
                                PENEMPATAN
                                
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                
                            </ul>
                        </div>
                        <div class="body">
						<form action="<?php echo base_url("admin/ubah_penempatan_mahasiswa/$id_register"); ?>" method="post">
                            <div class="row clearfix"><center>
							<?php foreach($tampil_penempatan_mahasiswa as $mm) { ?>
							<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-green">
                                        <div class="color-name"><?php echo $mm->penempatan; ?></div>
                                        <div class="color-code"></div>
                                        <div class="color-class-name"></div>
                                    </div>
                                </div></center>
							<?php } ?>
                                <div class="col-md-4">
                                    <p>
                                        <b>Ubah Penempatan</b>
                                    </p>
                                    <select class="form-control show-tick" name="id_penempatan">
									<?php foreach($tampil_penempatan as $p) { ?>
                                        <option value="<?php echo $p->id_penempatan; ?>"><?php echo $p->penempatan; ?></option>
									<?php } ?>
                                    </select>

                                </div>
								 <div class="col-md-4">
                                    <p>
                                        <b>Status</b>
                                    </p>
                                    <select class="form-control show-tick" name="hasil">
                                        <option value="Lulus">Lulus</option>
                                        <option value="Tidak Lulus">Tidak Lulus</option>
                                    </select>

                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success waves-effect">Simpan</button>

                                </div>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
				<!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                       
                        <div class="body">
                            <div class="body table-responsive">
                            <table class="table table-bordered">
							<?php foreach($tampil_detail_mahasiswa as $detail) { ?>
                                <thead>
                                    <tr>
                                        <th>Hobby</th>
                                        <th><?php echo $detail->hobby; ?></th>
                                    </tr>
									 <tr>
                                        <th>Prestasi</th>
                                        <th><?php echo $detail->prestasi; ?></th>
                                    </tr>
									 <tr>
                                        <th>Minat</th>
                                        <th><?php echo $detail->minat; ?></th>
                                    </tr>
                                </thead>
							<?php } ?>
                            </table>
                        </div>
                        </div>
                    </div>
                </div> -->
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <!-- #END# Exportable Table -->
        </div>
    </section>
	
	<div class="modal fade" id="foto">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- modal header -->
                                <div class="modal-header">
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    
                                </div>

                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
                                <form role="form" action="<?php echo base_url('admin/'); ?>" enctype="multipart/form-data" method="post">
								 <label>PILIH FOTO (MAX 2 MB)</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="foto" class="form-control" placeholder="JURUSAN" required>
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
						
						<div class="modal fade" id="data">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- modal header -->
                                <div class="modal-header">
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    
                                </div>

                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
                                <form role="form" action="<?php echo base_url("mahasiswa/tambah_detail_mahasiswa/$id_register"); ?>" enctype="multipart/form-data" method="post">
								 <label>Hobby</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="hobby" class="form-control" placeholder="Hobby" required>
                                        </div>
                                    </div>
									<label>Prestasi</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="prestasi" class="form-control" placeholder="Prestasi" required>
                                        </div>
                                    </div>
									<label>Minat</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="minat" class="form-control" placeholder="Minat" required>
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