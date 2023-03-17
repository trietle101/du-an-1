<?php
    function products_selectAll(){
        $sql = 'SELECT * FROM products';
        return pdo_query($sql);
    }
    function products_selectID_product($id_pd){
        $sql = 'SELECT * FROM products WHERE id_pd = ?';
        return pdo_query($sql, $id_pd);
    }
?>