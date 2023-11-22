<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <?php
    include('../../material/icons.php');
    include('../../material/fonts.php');
    ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand fs-3" href="#">JOGJA<span class="fs-5">Travel</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="dropdown">
            <a style="margin-right:50px"class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Profile
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">My profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                    </li>
                </ul>
        </div>
    </nav>

    <div class="row g-0">
        <div class="offcanvas-lg offcanvas-start col-lg-2 text-bg-dark" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel" style="height: 100vh;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasResponsiveLabel">Menu Sidebar</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
            </div>
           <nav id="sidebarMenu" class="collapse d-md-block sidebar collapse .bg-secondary.bg-gradient">
   
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-4 mt-7">

        <!-- Collapsed content -->
        <ul id="collapseExample1" class="collapse show list-group list-group-flush">
          <li class="list-group-item py-1">
            <a href="user.php" class="text-reset">User</a>
          </li>
          <li class="list-group-item py-1">
            <a href="ticket_admin.php" class="text-reset">Detail Pemesan</a>
          </li>
          <li class="list-group-item py-1">
            <a href="jadwal.php" class="text-reset">Jadwal</a>
          </li>
          <li class="list-group-item py-1">
            <a href="tujuan.php" class="text-reset">Tujuan</a>
          </li>
          <li class="list-group-item py-1">
            <a href="kelas.php" class="text-reset">Kelas</a>
          </li>
          <li class="list-group-item py-1">
            <a href="bus.php" class="text-reset">Bus</a>
          </li>
          <li class="list-group-item py-1">
            <a href="tipe_bus.php" class="text-reset">Tipe Bus</a>
          </li>
         
        </ul>
        <!-- Collapse 1 -->

      </div>
    </div>
  </nav>
        </div>
        <div class="col-lg-10 col-12">
            
        <div class="container">
            <div>
            <div class="row">
                <div class="col-md-10">
                <h1>Kelas</h1>
                </div>
                <div class="col-md-2 px-5 py-2">
                <a href="form_tambah.php" class="btn btn-success ">Tambah</a>
                </div>
            </div>
            <?php include '../../koneksi/koneksi.php';
            $sql = "SELECT * FROM kelas";
            $result = mysqli_query($conn, $sql);
            ?>
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nama_kelas']; ?></td>
                            <td>
                                <a href="form_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a> 
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Hapus</a> 
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                </div>
        </div>
                
           
    <script src="../../JS/bootstrap.min.js"></script>
</body>

</html>