<?php
    function products_selectAll(){
        $sql = 'SELECT * FROM products';
        return pdo_query($sql);
    }
    function products_selectID_product($id_pd){
        $sql = 'SELECT * FROM products WHERE id_pd = ?';
        return pdo_query($sql, $id_pd);
    }
    function products_select_limit_12($offset){
        $sql = 'SELECT * FROM products  limit 12 offset ?';
        return pdo_query($sql, $offset);
    }
    function products_new(){
        $sql = 'SELECT * FROM products ORDER BY date_update limit 4';
        return pdo_query($sql);
    }
?>