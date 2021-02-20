<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> MASTER USER </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <button type="button" data-toggle="modal" data-target="#cari" class="btn bg-cyan waves-effect">Tambah User</button>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                   
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>NIP</th>
                                        <th>NAMA</th>
                                        <th>DIVISI</th>
                                        <th>POSISI</th>
                                        <th>JABATAN</th>
                                        <th>OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <tr>
                                        <td>12345</td>
                                        <td>WIXI</td>
                                        <td>IT</td>
                                        <td>VENDOR</td>
                                        <td>STAFF</td>
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
                                <form role="form" action="<?php echo base_url('admin/'); ?>" enctype="multipart/form-data" method="post">
								 <label>NIK</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="" class="form-control" placeholder="NIK">
                                        </div>
                                    </div>
									<label>Nama</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="" class="form-control" placeholder="Nama">
                                        </div>
                                    </div>
									<label>Posisi</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="" class="form-control" placeholder="Posisi">
                                        </div>
                                    </div>
									<label>Select</label> 
									<div class="form-group">
                                        <div class="form-line">
											<select class="form-control show-tick">
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
                                    <button type="button" class="btn bg-purple waves-effect">
                                    <i class="material-icons">add_circle_outline</i> Tambah
                                </button>
                                </div>
                                </form>
                            </div>

                          </div>
                        </div>
                        </div>