<?php
    function insert_bill($total, $address, $id_user){
        $sql = "INSERT INTO bill (total, address, id_user) VALUES (?,?,?)";
        pdo_execute($sql, $total, $address, $id_user);
    }

    function insert_bill_detail($total, $quatity, $id_bill, $id_pd){
        $sql = "INSERT INTO bill_detail (total, quantity, id_bill, id_pd) VALUES (?,?,?,?)";
        pdo_execute($sql,$total, $quatity, $id_bill, $id_pd); 
    }

    function select_bill(){
        $sql = 'SELECT * FROM bill ORDER BY date DESC';
        return pdo_query($sql);
    }
    function select_bill_id($id){
        $sql = 'SELECT * FROM bill WHERE id_bill = ?';
        return pdo_query($sql, $id);
    }

    function select_bill_detail($id_bill){
        $sql = 'SELECT * FROM bill_detail  WHERE id_bill = ?';
        return pdo_query($sql, $id_bill);
    }

    function update_bill($starus, $id){
        $sql = 'UPDATE bill SET status = ? WHERE id_bill = ?';
        pdo_execute($sql, $starus, $id);
    }

    function bill_user($id_user){
        $sql = 'SELECT * FROM bill WHERE id_user = ?';
        return pdo_query($sql, $id_user);
    }
?>