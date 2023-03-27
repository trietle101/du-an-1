<?php
    function select_userAll(){
        $sql = "SELECT * FROM user";
        return pdo_query($sql);
    }

    function select_userID($id){
        $sql = "SELECT * FROM user WHERE id_user = ?";
        return pdo_query($sql,$id);
    }
?>