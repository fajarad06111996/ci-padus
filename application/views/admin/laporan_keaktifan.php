<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMIN || LAPORAN KEAKTIFAN</title>
</head>

<body>
<h3><p align="center">Data Keaktifan Kegiatan</p></h3><br/>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="3%" align="center">No </td>
    <td width="10%" align="center">NPM</td>
    <td width="13%" align="center">Jurusan</td>
    <td width="19%" align="center">Nama</td>
    <td width="24%" align="center">Keaktifan</td>
    <td width="31%" align="center">Tanggal</td>
  </tr>
  <?php $no=1; foreach($laporan_keaktifan as $v) { ?>
  <tr>
    <td align="center"><?php echo $no; ?></td>
    <td align="center"><?php echo $v->npm; ?></td>
    <td align="center"><?php echo $v->jurusan; ?></td>
    <td align="center"><?php echo $v->nama; ?></td>
    <td align="center"><?php echo $v->kegiatan; ?></td>
    <td align="center"><?php echo $v->tanggal_kegiatan; ?></td>
  </tr>
  <?php $no++; } ?>
</table>

</body>
</html>