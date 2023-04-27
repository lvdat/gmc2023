<?php
$root = 'main';
$customTitle = 'Game Making Contest 2023';
if(isset($_GET['page'])) {
    if($_GET['page'] == 'dvut') {
        $root = 'dvut';
        $customTitle = 'Bình xét DVUT';
    } elseif ($_GET['page'] == 'unvoted') {
        $root = 'unvoted';
        $customTitle = 'Danh sách Đoàn viên chưa bình xét Đoàn viên ưu tú';
    } elseif ($_GET['page'] == 'dashboard') {
        $root = 'dashboard';
        $customTitle = 'Dashboard - GMC 2023';
    } elseif ($_GET['page'] == 'login') {
        $root = 'login';
        $customTitle = 'Đăng nhập - GMC 2023';
    } 
}

require 'includes/header.php';

require 'views/landing.php';

if ($root == 'login') {
    require 'views/login.php';
}
/*
if(!checkLogin()) {
   require 'views/pageNotLogin.php';
} else {
    if($root == 'main') {
        require 'views/homePageLogin.php';
    } else if($root == 'dvut') {
        require 'views/dvutPage.php';
    } else if($root = 'unvoted') {
        require 'views/unVotedPage.php';
    }
}
*/
require 'includes/footer.php';