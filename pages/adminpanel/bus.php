<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bus</title>
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
  $query = "select a.*,b.tipe,c.nama_kelas from bus as a inner join tipe_bus as b on a.id_tipe = b.id inner join kelas as c on a.id_kelas = c.id";
  $res = mysqli_query($conn, $query);
  $dataKelas = mysqli_query($conn, "select * from kelas");
  $dataTipe = mysqli_query($conn, "select * from tipe_bus");
  ?>

</head>

<body>
  <?php include('../../components/sidebar.php'); ?>
  <div class="row px-2 my-2">
    <h2 class="fs-2 col-lg-8">Detail Bus</h2>
    <button type="button" class="btn btn-primary px-2 py-2 text-center ms-auto col-lg-2" data-bs-toggle="modal" data-bs-target="#formtambah">Tambah Bus</button>
  </div>
  <table class="table table-dark table-striped table-responsive">
    <tr scope="row">
      <th scope="col">No.</th>
      <th scope="col">Nama Bus</th>
      <th scope="col">Jumlah Kursi</th>
      <th scope="col">Harga Per KM</th>
      <th scope="col">Tipe Bus</th>
      <th scope="col">Kelas</th>
      <th scope="col">Aksi</th>
    </tr>
    <?php $x = 1;
    foreach ($res as $d) : ?>
      <tr scope="row">
        <th scope="col"><?php echo $x++; ?></th>
        <th scope="col"><?php echo $d['nama_bus']; ?></th>
        <th scope="col"><?php echo $d['jumlah_kursi']; ?></th>
        <th scope="col"><?php echo $d['harga_km']; ?></th>
        <th scope="col"><?php echo $d['tipe']; ?></th>
        <th scope="col"><?php echo $d['nama_kelas']; ?></th>
        <th scope="col"><button class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#formupdate<?php echo $d['id']; ?>"><span class="material-symbols-outlined">
              edit
            </span></button></button><a href="./aksi/aksi_hapus_bus.php?id=<?php echo $d['id'] ?>" class="badge bg-danger"><span class="material-symbols-outlined">
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
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Bus</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="./aksi/aksi_tambah_bus.php">
            <div class="mb-3">
              <label for="nama_bus" class="form-label">Nama Bus</label>
              <input type="text" class="form-control" id="nama_bus" aria-describedby="emailHelp" name="nama_bus" required>
            </div>
            <div class="mb-3">
              <label for="jumlah_kursi" class="form-label">Jumlah Kursi</label>
              <input type="text" class="form-control" id="jumlah_kursi" aria-describedby="emailHelp" name="jumlah_kursi" required>
            </div>
            <div class="mb-3">
              <label for="harga_km" class="form-label">Harga Per KM</label>
              <input type="text" class="form-control" id="harga_km" aria-describedby="emailHelp" name="harga_km" required>
            </div>
            <div class="mb-3">
              <label for="id_tipe" class="form-label">Tipe Bus</label>
              <select class="form-select" aria-label="Default select example" name="id_tipe" id="id_tipe" required>
                <option value="">Pilih Tipe Bus</option>
                <?php foreach ($dataTipe as $d) : ?>
                  <option value="<?php echo $d['id']; ?>"><?php echo $d['tipe']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="id_kelas" class="form-label">Tipe Bus</label>
              <select class="form-select" aria-label="Default select example" name="id_kelas" id="id_kelas" required>
                <option value="">Pilih Kelas</option>
                <?php foreach ($dataKelas as $d) : ?>
                  <option value="<?php echo $d['id']; ?>"><?php echo $d['nama_kelas']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
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
  <!-- Update Modal Form -->
  <?php foreach ($res as $d) : ?>
    <div class="modal fade " id="formupdate<?php echo $d['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formtambah" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Bus</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="./aksi/aksi_update_bus.php">
              <input type="text" name="id" class="d-none" value="<?php echo $d['id']; ?>">
              <div class="mb-3">
                <label for="nama_bus" class="form-label">Nama Bus</label>
                <input type="text" class="form-control" id="nama_bus" value="<?php echo $d['nama_bus'] ?>" aria-describedby="emailHelp" name="nama_bus" required>
              </div>
              <div class="mb-3">
                <label for="jumlah_kursi" class="form-label">Jumlah Kursi</label>
                <input type="text" class="form-control" id="jumlah_kursi" value="<?php echo $d['jumlah_kursi'] ?>" aria-describedby="emailHelp" name="jumlah_kursi" required>
              </div>
              <div class="mb-3">
                <label for="harga_km" class="form-label">Harga Per KM</label>
                <input type="text" class="form-control" id="harga_km" value="<?php echo $d['harga_km'] ?>" aria-describedby="emailHelp" name="harga_km" required>
              </div>
              <div class="mb-3">
                <label for="id_tipe" class="form-label">Tipe Bus</label>
                <select class="form-select" aria-label="Default select example" name="id_tipe" id="id_tipe" required>
                  <?php foreach ($dataTipe as $data) : ?>
                    <option value="<?php echo $data['id']; ?>" <?php echo ($d['tipe'] == $data['tipe']  ? 'selected' : '') ?>><?php echo $data['tipe']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="id_kelas" class="form-label">Tipe Bus</label>
                <select class="form-select" aria-label="Default select example" name="id_kelas" id="id_kelas" required>
                  <?php foreach ($dataKelas as $data) : ?>
                    <option value="<?php echo $data['id']; ?>" <?php echo ($d['nama_kelas'] == $data['nama_kelas']  ? 'selected' : '') ?>><?php echo $data['nama_kelas']; ?></option>
                  <?php endforeach; ?>
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
  <!-- End Update Modal Form -->
  <?php include('../../components/endSidebar.php'); ?>
  <script src="../../JS/bootstrap.min.js"></script>
</body>

</html>