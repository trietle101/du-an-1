<?php
    if(isset($_SESSION['role']) && $_SESSION['role'] == 0){
        include '../part/header_admin.php';
        include_once "../components/comedit.php";
        include "../part/footer_admin.php";
    }
?>