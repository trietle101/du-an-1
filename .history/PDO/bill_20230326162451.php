<?php
    function insert_bill($total, $address, $id_user){
        $sql = "INSERT INTO bill (total, address, id_user) VALUES (?,?,?)";
        pdo_execute($sql, $total, $address, $id_user);
    }

    function insert_bill_detail($total, $quatity, $id_bill, $id_pd){
        $sql = "INSERT INTO bill_detail (total, quantity, id_bill, id_pd) VALUES (?,?,?,?)";
        pdo_execute($sql,$total, $quatity, $id_bill, $id_pd); 
    }
?>