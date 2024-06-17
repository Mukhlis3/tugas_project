<?php
  //* check direct access permission
  if (!defined('access')) { die('Direct access is not permitted!'); }
  //* check access page by level
  if (!defined('administrator')) { die('Access denied, not enough level!'); }

  //* check retrieved variable
  $wali_kelas_id = mysqli_real_escape_string($koneksi->db, $_GET['wali_kelas_id']);
  //* call delete function
  $walikelas->hapusWalikelas($wali_kelas_id);
?>