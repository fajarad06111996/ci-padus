<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> DATA MAHASISWA </b>
                    
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
                                        <i class="material-icons" data-toggle="modal" data-target="#foto" title="Ubah Foto">add_a_photo</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body"><center>
						<?php foreach($tampil_gambar_mahasiswa as $gambar) { ?>
						<?php if($gambar->gambar == ''){ ?>
						<img src="<?php echo base_url(); ?>assets/images/user.png" height="300px" width="400px;">
						<?php }else{ ?>
                            <img src="<?php echo base_url(); ?>assets/images/<?php echo $gambar->gambar; ?>" height="300px" width="400px;">
						<?php } ?>
						<?php } ?>
                        </center></div>
                    </div>
                </div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Mahasiswa
                                
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <?php if($cek_data_mahasiswa  == 0) { ?>
								<a href="javascript:void(0);" >
                                        <i class="material-icons" data-toggle="modal" data-target="#data1" title="Tambah Detail Data">add_circle</i>
                                    </a>
								<?php } ?>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>NPM</th>
                                        <th><?php echo $npm; ?></th>
                                    </tr>
									 <tr>
                                        <th>Nama</th>
                                        <th><?php echo $nama; ?></th>
                                    </tr>
									 <tr>
                                        <th>Email</th>
                                        <th><?php echo $email; ?></th>
                                    </tr>
									 <tr>
                                        <th>Fakultas</th>
                                        <th><?php echo $fakultas; ?></th>
                                    </tr>
									 <tr>
                                        <th>Jurusan</th>
                                        <th><?php echo $jurusan; ?></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
				
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                       <div class="header">
                            <ul class="header-dropdown m-r--5">
							<?php if($cek_data_mahasiswa  != 1) { ?>
								<!-- <button type="button" data-toggle="modal" data-target="#data" class="btn bg-cyan waves-effect"> Ubah</button> -->
							<?php } ?>
							<?php if($cek_data_mahasiswa  == null) { ?>
							<button type="button" data-toggle="modal" data-target="#data1" class="btn bg-primary waves-effect"> Tambah</button>
                            <?php } ?>
							</ul>
                        </div>
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
									<tr>
                                        <th></th>
                                        <th><a href="<?php echo base_url("mahasiswa/ubah_hobi/$detail->id_detail_mahasiswa");?>" class="btn bg-cyan waves-effect"> Ubah</a></th>
                                    </tr>
                                </thead>
							<?php } ?><br/>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
				
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
                                <form role="form" action="<?php echo base_url("mahasiswa/simpan_gambar_mahasiswa"); ?>" enctype="multipart/form-data" method="post">
								 <label>PILIH FOTO </label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="foto" class="form-control" placeholder="JURUSAN" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal untuk footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn bg-purple waves-effect">
                                    <i class="material-icons">add_circle_outline</i> Simpan
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
                                <form role="form" action="<?php echo base_url("mahasiswa/ubah_detail_mahasiswa/$id_register"); ?>" enctype="multipart/form-data" method="post">
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
                                    <i class="material-icons">edit</i> Ubah
                                </button>
                                </div>
                                </form>
                            </div>

                          </div>
                        </div>
                        </div>
						
						<div class="modal fade" id="data1">
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