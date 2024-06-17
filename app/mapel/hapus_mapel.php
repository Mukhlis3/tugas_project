<?php
  //* check direct access permission
  if (!defined('access')) { die('Direct access is not permitted!'); }
  //* check access page by level
  if (!defined('administrator') && !defined('kader')) { die('Access denied, not enough level!'); }

  //* check retrieved variable
  $kode_mapel = mysqli_real_escape_string($koneksi->db, $_GET['kode_mapel']);
  //* call delete function
  $kelolaMapel->deleteMapel($kode_mapel);
?>
