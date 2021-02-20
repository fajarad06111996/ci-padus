<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> AKUN MAHASISWA </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <!-- <button type="button" data-toggle="modal" data-target="#cari" class="btn bg-cyan waves-effect">Tambah UKM</button> -->
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                   
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>NPM</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>
                                        <th>FAKULTAS</th>
                                        <th>JURUSAN</th>
                                        <th>OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($akun_mahasiswa as $v) { ?>
                                     <tr>
                                        <td><?php echo $v->npm; ?></td>
                                        <td><?php echo $v->nama; ?></td>
                                        <td><?php echo $v->email; ?></td>
                                        <td><?php echo $v->fakultas; ?></td>
                                        <td><?php echo $v->jurusan; ?></td>
                                        <td>
										<a href="#" class="btn btn-primary waves-effect">Edit</a>
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
                                <form role="form" action="<?php echo base_url('admin/'); ?>" enctype="multipart/form-data" method="post">
								 <label>UKM</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="ukm" class="form-control" placeholder="UKM" required>
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