<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var maxField = 100; //Input fields increment limitation
	var addButton = $('.add_button'); //Add button selector
	var wrapper = $('.field_wrapper'); //Input field wrapper
	var fieldHTML = '<label>Pertanyaan</label><div class="form-group"><div class="form-line"><div class="form-line"><input type="text" name="pertanyaan[]" class="form-control" placeholder="Pertanyaan" required></div></div></br> <label>Pilihan A</label><div class="form-group"><div class="form-line"><div class="form-line"><input type="text" name="pilihan1[]" class="form-control" placeholder="Pilihan A" required></div></div></br> <label>Pilihan B</label><div class="form-group"><div class="form-line"><div class="form-line"><input type="text" name="pilihan2[]" class="form-control" placeholder="Pilihan B" required></div></div></br> <label>Pilihan C</label><div class="form-group"><div class="form-line"><div class="form-line"><input type="text" name="pilihan3[]" class="form-control" placeholder="Pilihan C" required></div></div></br> <label>Pilihan D</label><div class="form-group"><div class="form-line"><div class="form-line"><input type="text" name="pilihan4[]" class="form-control" placeholder="Pilihan D" required></div></div></br> <label>Jawaban</label><div class="form-group"><div class="form-line"><select class="form-control" name="jawaban[]"><option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option></select></div></div>' ; //New input field html 
	var x = 1; //Initial field counter is 1
	$(addButton).click(function(){ //Once add button is clicked
		if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
			$(wrapper).append(fieldHTML); // Add field html
		}
	});
	$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
		e.preventDefault();
		$(this).parent('div').remove(); //Remove field html
		x--; //Decrement field counter
	});
});
</script>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   <b> DATA SOAL </b>
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <!-- <button type="button" data-toggle="modal" data-target="#cari" class="btn bg-cyan waves-effect">Tambah Soal</button> -->
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                   
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>UKM</th>
                                        <th>Soal</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Akhir</th>
                                        <th>OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($tampil_soal as $v) { 
									$waktu = date('Y-m-d H:i:s');
									if($waktu >= $v->waktu_mulai and $waktu <= $v->waktu_akhir){
									$status = '1';}
									// }else if(){
										// $status = '1';
									// }
									else{
										$status = '0';
									}
								?>
                                     <tr>
                                        <td><?php echo $v->ukm; ?></td>
                                        <td><?php echo $v->judul_soal; ?></td>
                                        <td><?php echo $v->waktu_mulai; ?></td>
                                        <td><?php echo $v->waktu_akhir; ?></td>
                                        <td>
										<?php if($status == '1') {?>
										<a href="<?php echo base_url("mahasiswa/buka_soal/$v->id_soal/$v->kode/$v->waktu"); ?>" class="btn btn-info waves-effect">Lihat</a>
										<?php } ?>
										<?php if($status == '0') {?>
										<button type="" class="btn btn-danger waves-effect">Tunggu..</button>
										<?php } ?>
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
								<a href="javascript:void(0);" class="add_button" title="Tambah Soal"><img src="<?php echo base_url(); ?>assets/images/add.png"/></a>
                                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                                    
                                </div>

                                <!-- modal untuk isi konten -->
                                <div class="modal-body">
                                <form role="form" action="<?php echo base_url('admin/tambah_soal'); ?>" enctype="multipart/form-data" method="post">
								 <label>Pilih UKM</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control" name="id_ukm">
											<?php foreach($tampil_ukm as $ukm) { ?>
											<option value="<?php echo $ukm->id_ukm; ?>"><?php echo $ukm->ukm; ?></option>
											<?php } ?>
										</select>
                                        </div>
                                    </div>
								 <label>Judul Soal</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="judul_soal" class="form-control" placeholder="Judul Soal" required>
                                        </div>
                                    </div>
									<label>Maximal Waktu (Menit)</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="waktu" class="form-control" placeholder="Contoh : 60" required>
                                        </div>
                                    </div>
									<label>Pertanyaan</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="pertanyaan[]" class="form-control" placeholder="Pertanyaan" required>
                                        </div>
                                    </div>
									<label>Pilihan A</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="pilihan1[]" class="form-control" placeholder="Pilihan A" required>
                                        </div>
                                    </div>
									<label>Pilihan B</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="pilihan2[]" class="form-control" placeholder="Pilihan B" required>
                                        </div>
                                    </div>
									<label>Pilihan C</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="pilihan3[]" class="form-control" placeholder="Pilihan C" required>
                                        </div>
                                    </div>
									<label>Pilihan D</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="pilihan4[]" class="form-control" placeholder="Pilihan D" required>
                                        </div>
                                    </div>
									<label>Jawaban</label>  
								<div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control" name="jawaban[]">
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C">C</option>
											<option value="D">D</option>
										</select>
                                        </div>
                                    </div>
									<hr />
									
									<div class="field_wrapper"></div>
                                </div>
                                <!-- modal untuk footer -->
                                <div class="modal-footer">
								<a href="javascript:void(0);" class="add_button" title="Tambah Soal"><img src="<?php echo base_url(); ?>assets/images/add.png"/></a>
                                    <button type="submit" class="btn bg-purple waves-effect">
                                    <i class="material-icons">save</i> Simpan Soal
                                </button>
                                </div>
                                </form>
                            </div>

                          </div>
                        </div>
                        </div>