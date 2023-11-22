<nav class="navbar navbar-expand-lg bg-secondary">
    <div class="container-fluid">
        <a class="navbar-brand fs-3" href="#">JOGJA<span class="fs-5">Travel</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="row g-0">
    <div class="offcanvas-lg offcanvas-start col-lg-2 text-bg-secondary" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel" style="height: 100vh;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasResponsiveLabel">Menu Sidebar</h5>
            <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="list-group mx-4 mt-7">
                <!-- Collapsed content -->
                <ul id="collapseExample1" class="collapse show list-group list-group-flush text-left">
                    <li class="list-group-item py-1" style="border: 0 none;background-color: transparent;">
                        <a href="./index.php" class="text-reset fs-5 fw-medium" style="text-decoration: none;">Dashboard</a>
                    </li>
                    <li class="list-group-item py-1" style="border: 0 none;background-color: transparent;">
                        <a href="user.php" class="text-reset fs-5 fw-medium" style="text-decoration: none;">Profil User</a>
                    </li>
                    <?php if ($_SESSION['role'] == 'admin') { ?>
                        <li class="list-group-item py-1" style="border: 0 none;background-color: transparent;">
                            <a href="jadwal.php" class="text-reset fs-5 fw-medium" style="text-decoration: none;">Jadwal</a>
                        </li>
                        <li class="list-group-item py-1" style="border: 0 none;background-color: transparent;">
                            <a href="ticket.php" class="text-reset fs-5 fw-medium" style="text-decoration: none;">Ticket</a>
                        </li>
                        <li class="list-group-item py-1" style="border: 0 none;background-color: transparent;">
                            <a href="tujuan.php" class="text-reset fs-5 fw-medium" style="text-decoration: none;">Tujuan</a>
                        </li>
                        <li class="list-group-item py-1" style="border: 0 none;background-color: transparent;">
                            <a href="./bus.php" class="text-reset fs-5 fw-medium" style="text-decoration: none;">Bus</a>
                        </li>
                    <?php } ?>
                    <li class="list-group-item py-1" style="border: 0 none;background-color: transparent;">
                        <a href="../../aksi/aksi_logout.php" class="text-reset fs-5 fw-bold" style="text-decoration: none;">Logout</a>
                    </li>
                </ul>
                <!-- Collapse End -->
            </div>
        </div>
    </div>
    <div class="col-lg-10 col-12" style="background-color: #F5F5F5;">
        <div class="container">