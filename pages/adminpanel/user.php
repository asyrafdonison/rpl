<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Setting</title>
  <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
  <?php
  include('../../material/icons.php');
  include('../../material/fonts.php');
  require('./middleware/auth.php');
  require('../../koneksi/koneksi.php');
  $id = $_SESSION['id'];
  $query = "select * from users where id=$id";
  $res = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($res);
  ?>

</head>

<body>
  <?php include('../../components/sidebar.php'); ?>
  <div class="row my-2">
    <h2 class="text-center fs-2">User Profile Settings</h2>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-4 col-12 align-self-center">
      <form method="POST" action="./aksi/aksi_update_user.php">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp" value="<?php echo $data['nama'] ?>" required>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" value="<?php echo $data['username'] ?>" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" value="<?php echo $data['password'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
  <?php include('../../components/endSidebar.php'); ?>
  <script src="../../JS/bootstrap.min.js"></script>
</body>

</html>