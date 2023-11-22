<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tujuan</title>
  <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
  <?php
  include('../../material/icons.php');
  ?>
  <?php
  include('../../material/icons.php');
  include('../../material/fonts.php');
  require('./middleware/auth.php');
  require('./middleware/admin.php');
  require('../../koneksi/koneksi.php');
  $query = "select * from tujuan";
  $res = mysqli_query($conn, $query);
  ?>

</head>

<body>
  <?php include('../../components/sidebar.php'); ?>
  <div class="row px-2 my-2">
    <h2 class="fs-2 col-lg-8">Detail Tujuan</h2>
    <button type="button" class="btn btn-primary px-2 py-2 text-center ms-auto col-lg-2" data-bs-toggle="modal" data-bs-target="#formtambah">Tambah Tujuan</button>
  </div>
  <table class="table table-dark table-striped table-responsive">
    <tr scope="row">
      <th scope="col">No.</th>
      <th scope="col">Nama Tujuan</th>
      <th scope="col">Jarak Tujuan</th>
      <th scope="col">Aksi</th>
    </tr>
    <?php $x = 1;
    foreach ($res as $d) : ?>
      <tr scope="row">
        <th scope="col"><?php echo $x++; ?></th>
        <th scope="col"><?php echo $d['nama_daerah']; ?></th>
        <th scope="col"><?php echo $d['jarak_tujuan']; ?></th>
        <th scope="col"><button class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#formupdate<?php echo $d['id']; ?>"><span class="material-symbols-outlined">
              edit
            </span></button><a href="./aksi/aksi_hapus_tujuan.php?id=<?php echo $d['id'] ?>" class="badge bg-danger"><span class="material-symbols-outlined">
              delete
            </span></a></th>
      </tr>
    <?php endforeach; ?>
    <?php if (mysqli_num_rows($res) == 0) : ?>
      <tr scope="row">
        <td colspan="9" class="text-center">
          Belum Ada Jadwal Yang DI Tambahkan
        </td>
      </tr>
    <?php endif; ?>
  </table>
  <!-- Modal -->
  <div class="modal fade " id="formtambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formtambah" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Tujuan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="./aksi/aksi_tambah_tujuan.php">
            <div class="mb-3">
              <label for="nama_daerah" class="form-label">Nama Tujuan</label>
              <input type="text" class="form-control" id="nama_daerah" aria-describedby="emailHelp" name="nama_daerah" required>
            </div>
            <div class="mb-3">
              <label for="jarak_tujuan" class="form-label">Jarak Tujuan</label>
              <input type="text" class="form-control" id="jarak_tujuan" aria-describedby="emailHelp" name="jarak_tujuan" required>
            </div>
            <input type="text" name="status" class="d-none" value="dibuka">
            <button type="submit" class="btn btn-primary">Tambahkan</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->
  <?php foreach ($res as $d) : ?>
    <div class="modal fade " id="formupdate<?php echo $d['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formtambah" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Tujuan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="./aksi/aksi_update_tujuan.php">
              <input type="text" value="<?php echo $d['id'] ?>" class="d-none" name="id">
              <div class="mb-3">
                <label for="nama_daerah" class="form-label">Nama Tujuan</label>
                <input type="text" class="form-control" id="nama_daerah" aria-describedby="emailHelp" name="nama_daerah" value="<?php echo $d['nama_daerah'] ?>" required>
              </div>
              <div class="mb-3">
                <label for="jarak_tujuan" class="form-label">Jarak Tujuan</label>
                <input type="text" class="form-control" id="jarak_tujuan" aria-describedby="emailHelp" name="jarak_tujuan" value="<?php echo $d['jarak_tujuan'] ?>" required>
              </div>
              <input type="text" name="status" class="d-none" value="dibuka">
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <!-- Update Modal Form -->
  <!-- End Update Modal Form -->
  <?php include('../../components/endSidebar.php'); ?>
  <script src="../../JS/bootstrap.min.js"></script>
</body>

</html>