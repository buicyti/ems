<?php
include_once 'includes/header.php';
if (!$user) {
    new Redirect($_DOMAIN . 'pages/authentication/login.php'); // Trở về trang đăng nhập
    die();
}
include_once 'includes/top.php';
include_once 'includes/sidebar.php';
include_once 'includes/contents.php';
include_once 'includes/footer.php';
