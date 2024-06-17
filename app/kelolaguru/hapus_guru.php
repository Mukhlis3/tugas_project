<?php
  //* check direct access permission
  if (!defined('access')) { die('Direct access is not permitted!'); }
  //* check access page by level
  if (!defined('administrator')) { die('Access denied, not enough level!'); }

  //* check retrieved variable
  $nuptk = mysqli_real_escape_string($koneksi->db, $_GET['nuptk']);
  //* call delete function
  $guru->hapusGuru($nuptk);
?>