<?php
    function select_userAll(){
        $sql = "SELECT * FROM user";
        return pdo_query($sql);
    }
?>