<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Setting</title>
    <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
    <?php
    include('../../material/icons.php');
    include('../../material/fonts.php');
    require('./middleware/auth.php');
    require('./middleware/admin.php');
    require('../../koneksi/koneksi.php');
    $query = "select ticket.id,tujuan.nama_daerah,ticket.nama_penumpang,bus.nama_bus,kelas.nama_kelas,ticket.status,jadwal.tanggal_keberangkatan from jadwal inner join ticket on jadwal.id = ticket.id_jadwal inner join tujuan on jadwal.id_tujuan = tujuan.id inner join bus on jadwal.id_bus = bus.id INNER JOIN kelas on bus.id_kelas = kelas.id";
    $res = mysqli_query($conn, $query);
    ?>
</head>

<body>
    <?php include('../../components/sidebar.php'); ?>
    <div class="row px-2 my-2">
        <h2 class="fs-2 col-12">Detail Ticket</h2>
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
            <th scope="col">Aksi</th>
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
                <td scope="col"><button class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#formupdate<?php echo $data['id']; ?>"><span class="material-symbols-outlined">
                            edit
                        </span></button></td>
            </tr>
        <?php endwhile; ?>
        <?php if (mysqli_num_rows($res) == 0) : ?>
            <tr scope="row">
                <td colspan="8" class="text-center">
                    Belum Ada Ticket Yang Terjual
                </td>
            </tr>
        <?php endif; ?>
    </table>
    <?php foreach ($res as $data) : ?>
        <div class="modal fade " id="formupdate<?php echo $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formtambah" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Ticket</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="./aksi/aksi_update_status_ticket.php">
                            <input type="text" name="id" class="d-none" value="<?php echo $data['id']; ?>">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status Pembayaran</label>
                                <select class="form-select" aria-label="Default select example" name="status" id="status" required>
                                    <option value="batal" <?php echo ($data['status'] == 'batal' ? 'selected' : '')  ?>>Batal</option>
                                    <option value="pending" <?php echo ($data['status'] == 'pending' ? 'selected' : '')  ?>>Pending</option>
                                    <option value="lunas" <?php echo ($data['status'] == 'lunas' ? 'selected' : '')  ?>>Lunas</option>
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
    <?php include('../../components/endSidebar.php'); ?>
    <script src="../../JS/bootstrap.min.js"></script>
</body>

</html>