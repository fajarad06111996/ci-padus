<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Register</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/logo.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
	<!-- Multi Select Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/multi-select/css/multi-select.css" rel="stylesheet">
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Register Mahasiswa<b></b></a>
            <small>Unit Kegiatan Mahasiswa</small>
        </div>
        <div class="card">
            <div class="body">
                <form action="<?php echo base_url('app/register_mahasiswa'); ?>" enctype="multipart/form-data" method="POST">
                   <!-- <div class="msg">Register a new membership</div> -->
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="npm" placeholder="NPM" required autofocus>
                        </div>
                    </div>
					
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
					<div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" pattern="[a-zA-Z\s]{0,50}" class="form-control" name="nama" placeholder="Nama Lengkap" required="true">
                        </div>
                    </div>
					<div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">view_list</i>
                        </span>
                        <div class="form-line">
                            <select class="form-control show-tick" name="id_fakultas" data-live-search="true" required>
                                        <option value=""> -- Pilih Fakultas -- </option>
                                       <?php foreach($tampil_fakultas as $fv) { ?>
                                        <option value="<?php echo $fv->id_fakultas; ?>"><?php echo $fv->fakultas; ?></option>
										<?php } ?>
                                    </select>
                        </div>
                    </div>
					<div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">view_list</i>
                        </span>
                        <div class="form-line">
                            <select class="form-control show-tick" name="id_jurusan" data-live-search="true" required>
                                        <option value="">-- Pilih Jurusan -- </option>
										<?php foreach($tampil_jurusan as $v) { ?>
                                        <option value="<?php echo $v->id_jurusan; ?>"><?php echo $v->jurusan; ?></option>
										<?php } ?>
                                    </select>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div> -->

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Register</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="<?php echo base_url("app/index"); ?>">Login Mahasiswa</a> || <a href="<?php echo base_url("app/login_admin"); ?>">Login Admin</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/examples/sign-up.js"></script>
	 <!-- Multi Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/multi-select/js/jquery.multi-select.js"></script>
</body>

</html>