<?php
    if($_SESSION['role'] == 0){
        include '../part/header_admin.php';
        include_once "../components/comlayout.php";
        include "../part/footer_admin.php";
    }
?>