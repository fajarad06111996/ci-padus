<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> SOAL TEST </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <div class="demo-button">
							<script language="JavaScript">
					var countDownInterval=<?php echo $waktu; ?>;
					var countDownTime=countDownInterval+1;
					function countDown(){
					countDownTime--;
					if (countDownTime <=0){
					countDownTime=countDownInterval;
					clearTimeout(counter)
					document.soal.submit();
					return
					}
					if (document.all) //if IE 4+
					document.all.countDownText.innerText = countDownTime+" ";
					else if (document.getElementById) //else if NS6+
					document.getElementById("countDownText").innerHTML=countDownTime+" "
					else if (document.layers){ //CHANGE TEXT BELOW TO YOUR OWN
					document.c_reload.document.c_reload2.document.write('Waktu Tersisa :<b id="countDownText">'+countDownTime+' </b> Detik Lagi.')
					document.c_reload.document.c_reload2.document.close()
					}
					counter=setTimeout("countDown()", 1000);
					}

					function startit(){
					if (document.all||document.getElementById) //CHANGE TEXT BELOW TO YOUR OWN
					document.write('Waktu Tersisa : <b id="countDownText">'+countDownTime+' </b> Detik Lagi.')
					countDown()
					}

					if (document.all||document.getElementById)
					startit()
					else
					window.onload=startit
					setTimeout(document.soal.submit(),t );
					</script>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php foreach($tampil_detail_soal as $v) { ?>
				<div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
				<form name="soal" action="<?php echo base_url("mahasiswa/simpan_jawaban/$id_register/$id_soal/$kode"); ?>" enctype="multipart/form-data" method="post">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <!-- <a href="<?php //echo base_url("admin/edit_soal/$v->id_soal"); ?>" class="btn btn-info waves-effect">Ubah Soal</a> -->
                                
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
                            </ul>
                        </div>
						<input type="hidden" name="jumlah[]">
                        <div class="body">
                            <div class="body table-responsive">
							 <P><?php echo $v->no; ?>. <?php echo $v->pertanyaan; ?> </P>
							 <br>
							 A. <input name="jawaban<?php echo $v->no; ?>" type="radio" id="radio_<?php echo $v->p1; ?>" class="radio-col-black" value="A" required>
							<label for="radio_<?php echo $v->p1; ?>"><?php echo $v->pilihan1; ?></label></br>
							B. <input name="jawaban<?php echo $v->no; ?>" type="radio" id="radio_<?php echo $v->p2; ?>" class="radio-col-black" value="B" required>
							<label for="radio_<?php echo $v->p2; ?>"><?php echo $v->pilihan2; ?></label></br>
							C. <input name="jawaban<?php echo $v->no; ?>" type="radio" id="radio_<?php echo $v->p3; ?>" class="radio-col-black" value="C" required>
							<label for="radio_<?php echo $v->p3; ?>"><?php echo $v->pilihan3; ?></label></br>
							D. <input name="jawaban<?php echo $v->no; ?>" type="radio" id="radio_<?php echo $v->p4; ?>" class="radio-col-black" value="D" required>
							<label for="radio_<?php echo $v->p4; ?>"><?php echo $v->pilihan4; ?></label>
                        </div>
                        </div>
                    </div>
                </div>
				<?php } ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <div class="demo-button">
                                <button onclick="javascript : return confirm('Apakah Anda Yakin Sudah Menyelesaikan Soal Diatas ?')" value="submit" type="submit" class="btn btn-block btn-lg btn-success waves-effect">Selesai</button>
                            </div>
                        </div>
                    </div>
                </div>
				</form>
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
                                <form role="form" action="<?php echo base_url("mahasiswa/"); ?>" enctype="multipart/form-data" method="post">
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