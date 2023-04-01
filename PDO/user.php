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
    function insert_user($name, $email, $pass, $phone){
        $sql = "INSERT INTO user (name, email, password, phone) VALUES (?,?,?,?)";
        pdo_execute($sql, $name, $email, $pass, $phone);
    }

    function check_info($email, $pass){
        $sql = "SELECT * FROM user WHERE email = ? AND password = ?";
        return pdo_query($sql, $email, $pass);
    }
    function check_user($email, $pass){
        $sql = "SELECT * FROM user WHERE email = ? AND password = ?";
        return pdo_check($sql, $email, $pass);
    }

    function updatePassword($id, $pass){
        $sql =  "UPDATE user SET password = ? WHERE id_user = ?";
        pdo_execute($sql, $pass, $id);
    }
    function updatePassword_email($email, $pass){
        $sql =  "UPDATE user SET password = ? WHERE email = ?";
        pdo_execute($sql, $pass, $email);
    }
    function update_info($name, $phone, $id){
        $sql = "UPDATE user SET name = ?, phone = ? WHERE id_user = ?";
        pdo_execute($sql, $name, $phone, $id);
    }
?>