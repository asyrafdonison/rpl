<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jadwal</title>
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
  $id = $_SESSION['id'];
  $query = "select * from users where id=$id";
  $queryData = "select a.id,a.tanggal_keberangkatan,a.tanggal_sampai,a.status,a.harga,b.nama_daerah,c.nama_bus,d.nama_kelas from jadwal as a INNER JOIN tujuan as b on a.id_tujuan = b.id INNER JOIN bus as c ON a.id_bus = c.id inner join kelas as d on c.id_kelas = d.id";
  $res = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($res);
  $dataTujuan = mysqli_query($conn, "select * from tujuan");
  $dataBus = mysqli_query($conn, "select a.id,a.nama_bus,b.nama_kelas from bus as a inner join kelas as b on a.id_kelas = b.id");
  $dataJadwal = mysqli_query($conn, $queryData);
  ?>

</head>

<body>
  <?php include('../../components/sidebar.php'); ?>
  <div class="row px-2 my-2">
    <h2 class="fs-2 col-lg-8">Detail Jadwal</h2>
    <button type="button" class="btn btn-primary px-2 py-2 text-center ms-auto col-lg-2" data-bs-toggle="modal" data-bs-target="#formtambah">Tambah Jadwal</button>
  </div>
  <table class="table table-dark table-striped table-responsive">
    <tr scope="row">
      <th scope="col">No.</th>
      <th scope="col">Tujuan</th>
      <th scope="col">Nama Bus</th>
      <th scope="col">Harga</th>
      <th scope="col">Kelas</th>
      <th scope="col">Status</th>
      <th scope="col">Tanggal Keberangkatan</th>
      <th scope="col">Tanggal Sampai</th>
      <th scope="col">Aksi</th>
    </tr>
    <?php $i = 1;
    foreach ($dataJadwal as $d) : ?>
      <tr scope="row">
        <td scope="col"><?php echo $i++; ?></td>
        <td scope="col"><?php echo $d['nama_daerah'] ?></td>
        <td scope="col"><?php echo $d['nama_bus'] ?></td>
        <td scope="col"><?php echo $d['harga'] ?></td>
        <td scope="col"><?php echo $d['nama_kelas'] ?></td>
        <?php if ($d['status'] == 'ditutup') : ?>
          <td scope='col' class='fw-5 text-danger'><?php echo $d['status'] ?></td>
        <?php else : ?>
          <td scope='col' class='fw-5 text-success'><?php echo $d['status'] ?></td>
        <?php endif; ?>
        <td scope="col"><?php echo $d['tanggal_keberangkatan'] ?></td>
        <td scope="col"><?php echo $d['tanggal_sampai'] ?></td>
        <td scope="col"><button class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#formupdate<?php echo $d['id']; ?>"><span class="material-symbols-outlined">
              edit
            </span></button>
          <a href="./aksi/aksi_hapus_jadwal.php?id=<?php echo $d['id'] ?>" class="badge bg-danger"><span class="material-symbols-outlined">
              delete
            </span></a>
        </td>
      </tr>
    <?php endforeach; ?>
    <?php if (mysqli_num_rows($dataJadwal) == 0) : ?>
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
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Ticket</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="./aksi/aksi_tambah_jadwal.php">
            <div class="mb-3">
              <label for="tujuan" class="form-label">Tujuan</label>
              <select class="form-select" aria-label="Default select example" name="id_tujuan" id="tujuan" required>
                <option value="">Pilih Tujuan</option>
                <?php foreach ($dataTujuan as $d) : ?>
                  <option value="<?php echo $d['id']; ?>"><?php echo $d['nama_daerah']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="bus" class="form-label">Bus</label>
              <select class="form-select" aria-label="Default select example" name="id_bus" id="bus" required>
                <option value="">Pilih Bus</option>
                <?php foreach ($dataBus as $d) : ?>
                  <option value="<?php echo $d['id']; ?>"><?php echo $d['nama_bus']; ?> - <?php echo $d['nama_kelas']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="harga" class="form-label">Harga</label>
              <input type="text" class="form-control" id="harga" aria-describedby="emailHelp" name="harga" required>
            </div>
            <div class="mb-3">
              <label for="tanggal_keberangkatan" class="form-label">Tanggal Keberangkatan</label>
              <input type="datetime-local" class="form-control" id="tanggal_keberangkatan" aria-describedby="emailHelp" name="tanggal_keberangkatan" required>
            </div>
            <div class="mb-3">
              <label for="tanggal_sampai" class="form-label">Tanggal Sampai</label>
              <input type="datetime-local" class="form-control" id="tanggal_sampai" aria-describedby="emailHelp" name="tanggal_sampai" required>
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
  <?php foreach ($dataJadwal as $data) : ?>
    <div class="modal fade " id="formupdate<?php echo $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formtambah" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Ticket</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="./aksi/aksi_update_jadwal.php">
              <input type="text" name="id" class="d-none" value="<?php echo $data['id']; ?>">
              <div class="mb-3">
                <label for="tujuan" class="form-label">Tujuan</label>
                <select class="form-select" aria-label="Default select example" name="id_tujuan" id="tujuan" required>
                  <?php foreach ($dataTujuan as $d) : ?>
                    <option value="<?php echo $d['id']; ?>" <?php echo ($d['nama_daerah'] == $data['nama_daerah']  ? 'selected' : '') ?>><?php echo $d['nama_daerah']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="bus" class="form-label">Bus</label>
                <select class="form-select" aria-label="Default select example" name="id_bus" id="bus" required>
                  <?php foreach ($dataBus as $d) : ?>
                    <option value="<?php echo $d['id']; ?>" <?php echo ($d['nama_bus'] == $data['nama_bus']  ? 'selected' : '') ?>><?php echo $d['nama_bus']; ?> - <?php echo $d['nama_kelas']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" aria-describedby="emailHelp" name="harga" value="<?php echo $data['harga'] ?>" required>
              </div>
              <div class="mb-3">
                <label for="tanggal_keberangkatan" class="form-label">Tanggal Keberangkatan</label>
                <input type="datetime-local" class="form-control" id="tanggal_keberangkatan" aria-describedby="emailHelp" name="tanggal_keberangkatan" value="<?php echo $data['tanggal_keberangkatan'] ?>" required>
              </div>
              <div class="mb-3">
                <label for="tanggal_sampai" class="form-label">Tanggal Sampai</label>
                <input type="datetime-local" class="form-control" id="tanggal_sampai" aria-describedby="emailHelp" name="tanggal_sampai" value="<?php echo $data['tanggal_sampai'] ?>" required>
              </div>
              <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status" id="status" required>
                  <option value="dibuka" <?php echo ($data['status'] == 'dibuka' ? 'selected' : '')  ?>>Di Buka</option>
                  <option value="ditutup" <?php echo ($data['status'] == 'ditutup' ? 'selected' : '')  ?>>Di Tutup</option>
                </select>
              </div>
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