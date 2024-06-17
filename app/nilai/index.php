

<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Data Nilai</h4>
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
        <a href="?p=nilai">Data Nilai</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Nilai</h4>
            <a href="?p=tambah-nilai" class="btn btn-primary btn-round btn-sm ml-auto"> <i class="fas fa-plus mr-2"></i> Tambah</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="DataTables" class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nilai ID</th>
                  <th>NISN</th>
                  <th>Mapel ID</th>
                  <th>Nilai K</th>
                  <th>Predikat K</th>
                  <th>Nilai P</th>
                  <th>Predikat P</th>
                  <th>Nilai KKM</th>
                  <th>Kelas ID</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $rows = $nilai->getListNilai();
                  if ($rows != false)
                  {
                    foreach ($rows as $data_mapel)
                    {
                ?>
                      <tr>
                        <td><?php echo $data_mapel['nilai_id']; ?></td>
                        <td><?php echo $data_mapel['nisn']; ?></td>
                        <td><?php echo $data_mapel['mapel_id']; ?></td>
                        <td><?php echo $data_mapel['nilai_k']; ?></td>
                        <td><?php echo $data_mapel['predikat_k']; ?></td>
                        <td><?php echo $data_mapel['nilai_p']; ?></td>
                        <td><?php echo $data_mapel['predikat_p']; ?></td>
                        <td><?php echo $data_mapel['nilai_kkm']; ?></td>
                        <td><?php echo $data_mapel['kelas_id']; ?></td>
                        <td>
                          <a href="?p=ubah-nilai&nilai_id=<?php echo $data_mapel['nilai_id']; ?>" class="btn btn-primary btn-round btn-sm"> <i class="fas fa-edit mr-2"></i> Ubah</a> 
                          <a href="?p=hapus-nilai&nilai_id=<?php echo $data_mapel['nilai_id']; ?>" onclick="validateRemove(event)" class="btn btn-danger btn-round btn-sm"> <i class="fas fa-trash-alt mr-2"></i> Hapus</a>
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

<script>
function validateRemove(event) {
  if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) {
    event.preventDefault();
  }
}
</script>
