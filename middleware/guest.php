<?php

session_start();
if (!empty($_SESSION['id']) || !empty($_SESSION['username']) || !empty($_SESSION['role'])) {
    header("Location: ../pages/adminpanel/index.php");
}
