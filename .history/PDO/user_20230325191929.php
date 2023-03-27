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
        $sql = "SELECT * FROM user WHERE email = ? AND pass = ?";
        return pdo_role($sql, $email, $pass);
    }
    function check_user($email, $pass){
        $sql = "SELECT * FROM user WHERE email = ? AND pass = ?";
        return pdo_check($sql, $email, $pass);
    }

?>