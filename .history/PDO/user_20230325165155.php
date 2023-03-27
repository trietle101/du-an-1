<?php
    function select_userAll(){
        $sql = "SELECT * FROM user";
        return pdo_query($sql);
    }

    function select_userID($id){
        $sql = "SELECT * FROM user WHERE id_user = ?";
        return pdo_query($sql,$id);
    }

    function update_user($id,$role){
        $sql = "UPDATE user SET role = ? Where id_user = ?";
        pdo_execute($sql, $role, $id);
    }

    function delete_user($id){
        $sql = "DELETE FROM user WHERE id_user = ?";
        pdo_execute($sql, $id);
    }

    function check_email($email){
        $sql = "SELECT * FROM user WHERE email = ?";
        return pdo_check($sql, $email);
    }
    function check_phone($phone){
        $sql = "SELECT * FROM user WHERE phone = ?";
        return pdo_check($sql, $phone);
    }
?>