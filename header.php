<?php
session_start();
//session_destroy();
include "config/core.php";
$database = new Database();
$db = $database->getConnection();
$user = new user($db);
@$Session_eMail = $_SESSION['email'];
$userControl = $user->checkUser($Session_eMail);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="Turkay ALTINTAŞ, https://TurkayAltintas.com/">

    <title>Turkay ALTINTAŞ REST API</title>

    <link rel="stylesheet" href="assets/css/maicons.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendor/animate/animate.css">
    <link rel="stylesheet" href="assets/css/theme.css">
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">

</head>
<body>

<!-- Back to top button -->
<div class="back-to-top"></div>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
        <div class="container">
            <a href="index.php" class="navbar-brand">Turk<span class="text-primary">ay</span></a>

            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <?php if($userControl == 1){ ?>
                        <li class="nav-item"><a class="nav-link" href="productlist.php"">Product List</a></li>
                        <li class="nav-item"><a class="nav-link" href="product.php"">Product</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php"">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="service.php"">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php"">Contact</a></li>
                        <li class="nav-item"><a class="btn btn-primary ml-lg-2" href="" onclick="userLogout();">Logout</a></li>
                    <?php }else{ ?>
                        <li class="nav-item"><a class="btn btn-primary ml-lg-2" href="" data-toggle="modal" data-target="#exampleModal">Login</a></li>
                        <li class="nav-item"><a class="btn btn-primary ml-lg-2" href="" data-toggle="modal" data-target="#exampleModal">Register</a></li>
                    <?php } ?>
                </ul>
            </div>

        </div>
    </nav>
</header>