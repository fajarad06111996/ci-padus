<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
             <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
						<a href="<?php echo base_url('admin/data_mahasiswa'); ?>">
                        <div class="icon">
                            <i class="material-icons">person_pin</i>
                        </div>
						</a>
                        <div class="content">
                            <div class="text">DATA MAHASISWA <?php echo $nama; ?></div>
                            <div class="number count-to"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
						<a href="<?php echo base_url('admin/data_penempatan'); ?>">
                        <div class="icon">
                            <i class="material-icons">assignment_ind</i>
                        </div>
						</a>
                        <div class="content">
                            <div class="text">SELEKSI & PENEMPATAN</div>
                            <div class="number count-to" ></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
						<a href="<?php echo base_url('admin/data_bagian'); ?>">
                        <div class="icon">
                            <i class="material-icons">chrome_reader_mode</i>
                        </div>
						</a>
                        <div class="content">
                            <div class="text">BAGIAN</div>
                            <div class="number count-to"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
						<a href="<?php echo base_url('admin/data_soal'); ?>">
                        <div class="icon">
                            <i class="material-icons">border_color</i>
                        </div>
						</a>
                        <div class="content">
                            <div class="text">SOAL</div>
                            <div class="number count-to"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CPU Usage -->
            

            
        </div>
    </section>