<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> EDIT SOAL </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <?php foreach($edit_soal as $v) { ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                
                            </h2>
							<a href="<?php echo base_url("admin/buka_soal/$v->kode"); ?>" class="btn btn-primary m-t-15 waves-effect">Kembali</a>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form action="<?php echo base_url("admin/simpan_soal/$v->id_soal/$v->kode"); ?>" method="post">
                                <label>Pertanyaan</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="pertanyaan" class="form-control" value="<?php echo $v->pertanyaan; ?>" required>
                                        </div>
                                    </div>
									<label>Pilihan A</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="pilihan1" class="form-control" value="<?php echo $v->pilihan1; ?>" required>
                                        </div>
                                    </div>
									<label>Pilihan B</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="pilihan2" class="form-control" value="<?php echo $v->pilihan2; ?>" required>
                                        </div>
                                    </div>
									<label>Pilihan C</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="pilihan3" class="form-control" value="<?php echo $v->pilihan3; ?>" required>
                                        </div>
                                    </div>
									<label>Pilihan D</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="pilihan4" class="form-control" value="<?php echo $v->pilihan4; ?>" required>
                                        </div>
                                    </div>
									<label>Jawaban</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control" name="jawaban">
											<option value="<?php echo $v->jawaban; ?>"><?php echo $v->jawaban; ?></option>
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C">C</option>
											<option value="D">D</option>
										</select>
                                        </div>
                                    </div>
                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
				<?php } ?>
				
				
            </div>
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
                                            <input type="file" name="foto" class="form-control" value="JURUSAN" required>
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
                                <form role="form" action="<?php echo base_url("mahasiswa/"); ?>" enctype="multipart/form-data" method="post">
								 <label>Hobby</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="hobby" class="form-control" value="Hobby" required>
                                        </div>
                                    </div>
									<label>Prestasi</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="prestasi" class="form-control" value="Prestasi" required>
                                        </div>
                                    </div>
									<label>Minat</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="minat" class="form-control" value="Minat" required>
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