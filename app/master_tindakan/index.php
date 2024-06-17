<?php
  //* check direct access permission
  if (!defined('access')) { die('Direct access is not permitted!'); }
  //* check access page by level
  if (!defined('administrator')) { die('Access denied, not enough level!'); }
?>

<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Master Tindakan</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="?p=dashboard">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="">Master Tindakan</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Master Tindakan</h4>
            <a href="?p=tambah-master-tindakan" class="btn btn-primary btn-round btn-sm ml-auto"> <i class="fas fa-plus mr-2"></i> Tambah</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="DataTables" class="display table table-striped table-hover">
              <thead>
                <th>ID Tindakan</th>
                <th>Nama</th>
                <th>Jenis Tindakan</th>
                <th>Keterangan</th>
                <th>TTL</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Status Dalam Keluarga</th>
                <th>Anak Ke</th>
                <th>Alamat Peserta Didik</th>
                <th>Nomor Telp Rumah</th>
                <th>Sekolah Asal</th>
                <th>Diterima di Sekolah Ini</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>Pekerjaan Ayah</th>
                <th>Pekerjaan Ibu</th>
                <th>Alamat Orang Tua</th>
                <th>Nama Wali</th>
                <th>Alamat Wali</th>
                <th>Pekerjaan Wali</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                <?php
                  $tindakan->getListMurid();
                  if ($rows != false)
                  {
                    foreach ($rows as $murid)
                    {
                ?>
                  <tr>
                    <td> <?php echo $murid['nisn'] ?> </td>
                    <td> <?php echo $murid['kelas_id'] ?> </td>
                    <td> <?php echo $murid['id_jurusan'] ?> </td>
                    <td> <?php echo $murid['nama_siswa'] ?> </td>
                    <td> <?php echo $murid['ttl'] ?> </td>
                    <td> <?php echo $murid['jenis_kelamin'] ?> </td>
                    <td> <?php echo $murid['agama'] ?> </td>
                    <td> <?php echo $murid['status_dalam_keluarga'] ?> </td>
                    <td> <?php echo $murid['anak_ke'] ?> </td>
                    <td> <?php echo $murid['alamat_peserta_didik'] ?> </td>
                    <td> <?php echo $murid['nomor_telp_rumah'] ?> </td>
                    <td> <?php echo $murid['sekolah_asal'] ?> </td>
                    <td> <?php echo $murid['diterima_disekolah_ini'] ?> </td>
                    <td> <?php echo $murid['nama_ayah'] ?> </td>
                    <td> <?php echo $murid['nama_ibu'] ?> </td>
                    <td> <?php echo $murid['pekerjaan_ayah'] ?> </td>
                    <td> <?php echo $murid['pekerjaan_ibu'] ?> </td>
                    <td> <?php echo $murid['alamat_orang_tua'] ?> </td>
                    <td> <?php echo $murid['nama_wali'] ?> </td>
                    <td> <?php echo $murid['alamat_wali'] ?> </td>
                    <td> <?php echo $murid['pekerjaan_wali'] ?> </td>
                    <td>
                      <a href="?p=ubah-siswa&nisn=<?php echo $murid['nisn'] ?>" class="btn btn-primary btn-round btn-sm"> <i class="fas fa-edit mr-2"></i> Ubah</a> 
                      <a href="?p=hapus-siswa&nisn=<?php echo $murid['nisn'] ?>" onclick="validateRemove(event)" class="btn btn-danger btn-round btn-sm"> <i class="fas fa-trash-alt mr-2"></i> Hapus</a>
                    </td>
                  </tr>
                <?php
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
