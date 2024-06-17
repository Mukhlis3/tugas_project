<?php
  //* check direct access permission
  if (!defined('access')) { die('Direct access is not permitted!'); }
  //* check access page by level
  if (!defined('administrator')) { die('Access denied, not enough level!'); }

  //* check retrieved variable
  $nisn = mysqli_real_escape_string($koneksi->db, $_GET['nisn']);
  //* call delete function
  $murid->hapusMurid($nisn);
?>