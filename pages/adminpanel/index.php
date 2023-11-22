<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
  <?php
  include('../../material/icons.php');
  include('../../material/fonts.php');
  require('./middleware/auth.php');
  require('../../koneksi/koneksi.php');
  $id = $_SESSION['id'];
  $query = "select tujuan.nama_daerah,ticket.nama_penumpang,bus.nama_bus,kelas.nama_kelas,ticket.status,jadwal.tanggal_keberangkatan from jadwal inner join ticket on jadwal.id = ticket.id_jadwal inner join tujuan on jadwal.id_tujuan = tujuan.id inner join bus on jadwal.id_bus = bus.id INNER JOIN kelas on bus.id_kelas = kelas.id where ticket.id_user = $id";
  $res = mysqli_query($conn, $query);
  ?>
</head>

<body>
  <?php include('../../components/sidebar.php'); ?>
  <div class="row px-2 my-2">
    <h2 class="fs-2 col-lg-8">Detail Pemesanan</h2>
    <a href="../searchTicket.php" class="btn btn-primary px-2 py-2 text-center ms-auto col-lg-2">Pesan Ticket</a>
  </div>
  <table class="table table-dark table-striped table-responsive">
    <tr scope="row">
      <th scope="col">No.</th>
      <th scope="col">Tujuan</th>
      <th scope="col">Nama Penumpang</th>
      <th scope="col">Nama Bus</th>
      <th scope="col">Kelas</th>
      <th scope="col">Status</th>
      <th scope="col">Tanggal Keberangkatan</th>
    </tr>
    <?php $no = 1;
    while ($data = $res->fetch_assoc()) : ?>
      <tr scope="row">
        <td scope="col"><?php echo $no++ ?></td>
        <td scope="col"><?php echo $data['nama_daerah'] ?></td>
        <td scope="col"><?php echo $data['nama_penumpang'] ?></td>
        <td scope="col"><?php echo $data['nama_bus'] ?></td>
        <td scope="col"><?php echo $data['nama_kelas'] ?></td>
        <?php if ($data['status'] == 'batal') : ?>
          <td scope='col' class='fw-5 text-danger'><?php echo $data['status'] ?></td>
        <?php elseif ($data['status'] == 'pending') : ?>
          <td scope='col' class='fw-5 text-warning'><?php echo $data['status'] ?></td>
        <?php else : ?>
          <td scope='col' class='fw-5 text-success'><?php echo $data['status'] ?></td>
        <?php endif; ?>
        <td scope="col"><?php echo $data['tanggal_keberangkatan'] ?></td>
      </tr>
    <?php endwhile; ?>
    <?php if (mysqli_num_rows($res) == 0) : ?>
      <tr scope="row">
        <td colspan="7" class="text-center">
          Anda Belum Membeli Ticket!
        </td>
      </tr>
    <?php endif; ?>
  </table>
  <?php include('../../components/endSidebar.php'); ?>
  <script src="../../JS/bootstrap.min.js"></script>
</body>

</html>