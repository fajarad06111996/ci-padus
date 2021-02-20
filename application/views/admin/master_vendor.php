<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> MASTER VENDOR </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <button type="button" data-toggle="modal" data-target="#cari" class="btn bg-cyan waves-effect">Tambah Vendor</button>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                   
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>KODE </th>
                                        <th>NAMA</th>
                                        <th>ALAMAT</th>
                                        <th>TELEPON</th>
                                        <th>NEGARA</th>
                                        <th>OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <tr>
                                        <td>DGR</td>
                                        <td>DIRGANTARA INDONESIA</td>
                                        <td>JAKARTA BARAT</td>
                                        <td>0868767</td>
                                        <td>INDONESIA</td>
                                        <td>
										<div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url("admin/"); ?>" class=" waves-effect waves-block">Edit</a></li>
                                        <li><a href="<?php echo base_url("admin/"); ?>" class=" waves-effect waves-block">Hapus</a></li>
                                        <li><a href="<?php echo base_url("admin/"); ?>" class=" waves-effect waves-block">Detail</a></li>
                                    </ul>
                                </div>
										</td>
                                    </tr>
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
                                <form role="form" action="<?php echo base_url('admin/tambah_tes'); ?>" enctype="multipart/form-data" method="post">
													<label>Pilih Negara</label>
													 <div class="row">
														<div class="col-md-10">
														<div class="form-group">
															<div class="form-line">
														<input type="hidden" class="form-control" name="id" id="id_negara" placeholder="Kode" readonly="" />
														<input type="text" class="form-control"  id="kode" placeholder="Kode" readonly="" REQUIRED>
														  <input type="text" class="form-control"  id="negara" placeholder="Negara" readonly="" REQUIRED>
													</div>
													</div>
													</div>
													<div class="col-md-2">
														<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">. . .</button>
													</div>
													</div>
									<label>Posisi</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tes1" class="form-control" placeholder="Posisi" REQUIRED>
                                        </div>
                                    </div>
									<label>Select</label> 
									<div class="form-group">
                                        <div class="form-line">
											<select class="form-control show-tick" name="tes2" REQUIRED>
												<option value="">-- Please select --</option>
												<option value="10">10</option>
												<option value="20">20</option>
												<option value="30">30</option>
												<option value="40">40</option>
												<option value="50">50</option>
											</select>
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
						
					<!-- untuk tambah data -->
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width:800px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Daftar NEGARA</h4>
                                        </div>
                                        <div class="body table-responsive">
                                            <table id="lookup" class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>KODE</th>
                                                        <th>NEGARA</th>
                                                    </tr>
                                                </thead>
                                                 <tbody>
                                                <?php //foreach($lihat_data_divisi as $lk) { ?>
                                                 <tr class="pilih" data-idnegara="1" data-kode="IDN" data-negara="INDONESIA" >
                                                            <td>IDN</td>
                                                            <td>INDONESIA</td>
                                                        </tr>
                                                        <?php //} ?>            
                                                        </tbody>
                                            </table>  
                                        </div>
                                    </div>
                                </div>
                            </div>