<?php
    function pdo_get_connection(){
        $servername = "localhost:3306";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=robot_pet", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            return $conn;
        } catch (PDOException $e) {
            // echo "Connection failed: " . $e->getMessage();
        }
    }

    //insert, update, delete
    function pdo_execute($sql){
        $sql_args = array_slice(func_get_args(),1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_args);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        finally{
            unset($conn);
        }
    }

    //Truy vấn dữ liệu
    function pdo_query($sql){
        $sql_args = array_slice(func_get_args(),1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_args);
            $rows = $stmt->fetchAll(PDO::FETCH_NUM);
            return $rows;
        }catch (PDOException $e) {
            // echo "Connection failed: " . $e->getMessage();
        }
        finally{
            unset($conn);
        }
    }
    function pdo_query_one($sql){
        $sql_args = array_slice(func_get_args(),1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_args);
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rows;
        }catch (PDOException $e) {
            // echo "Connection failed: " . $e->getMessage();
        }
        finally{
            unset($conn);
        }
    }
    function pdo_check($sql){
        $sql_args = array_slice(func_get_args(),1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_args);
            $rows = $stmt->fetchAll(PDO::FETCH_NUM);
            if(count($rows)>0) return 0;
            else return 1;
        }catch (PDOException $e) {
            // echo "Connection failed: " . $e->getMessage();
        }
        finally{
            unset($conn);
        }
    }
    function pdo_role($sql){
        $sql_args = array_slice(func_get_args(),1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_args);
            $rows = $stmt->fetchAll(PDO::FETCH_NUM);
            if(count($rows)>0) return $rows;
        }catch (PDOException $e) {
            // echo "Connection failed: " . $e->getMessage();
        }
        finally{
            unset($conn);
        }
    }
?>