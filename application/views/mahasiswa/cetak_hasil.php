<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CETAK HASIL</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><img src="<?php echo base_url(); ?>/assets/images/logo_padus.jpeg" width="150" height="150" /></td>
    <td align="center"><strong>UKM PADUAN SUARA <br/>UNIVERSITAS TEKNOKRAT INDONESIA</strong></td>
    <td align="center"><img src="<?php echo base_url(); ?>/assets/images/logo.png" width="150" height="150" /></td>
  </tr>
</table>

<hr/>
<?php foreach($mahasiswa_cetak_hasil as $mahasiswa) { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="13%">NPM</td>
    <td width="33%">: <?php echo $mahasiswa->npm; ?></td>
    <td width="3%">&nbsp;</td>
    <td width="51%" rowspan="8" align="center"><img src="<?php echo base_url(); ?>/assets/images/19.jpg" width="250" height="100" /></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>: <?php echo $mahasiswa->nama; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Jurusan</td>
    <td>: <?php echo $mahasiswa->jurusan; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Fakultas</td>
    <td>: <?php echo $mahasiswa->fakultas; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Email</td>
    <td>: <?php echo $mahasiswa->email; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Prestasi</td>
    <td>: <?php echo $mahasiswa->prestasi; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Hoby</td>
    <td>: <?php echo $mahasiswa->hobby; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php } ?>
<br/>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%">Alasan Mengkuti UKM</td>
    <td width="80%"><?php echo $alasan; ?></td>
  </tr>
</table>

<br/>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%">MOTO</td>
    <td width="80%"><?php echo $moto; ?></td>
  </tr>
</table>
<br/>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td height="31" align="center" bgcolor="#CCCCCC">Soal</td>
    <td align="center" bgcolor="#CCCCCC">Tanggal</td>
    <td align="center" bgcolor="#CCCCCC">Nilai</td>
  </tr>
  <?php foreach($cetak_hasil as $hasil) { ?>
  <tr>
    <td height="45" align="center"><?php echo $hasil->judul_soal; ?></td>
    <td align="center"><?php echo $hasil->tanggal_nilai; ?></td>
    <td align="center" bgcolor="#CC9900"><?php echo $hasil->nilai; ?></td>
  </tr>
  <?php } ?>
</table>

</body>
</html>