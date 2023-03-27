<?php
    function products_selectAll(){
        $sql = 'SELECT * FROM products';
        return pdo_query($sql);
    }
    function products_selectID_cate($id_cate){
        $sql = 'SELECT * FROM products WHERE id_cate = ? limit 4';
        return pdo_query($sql, $id_cate);
    }
    function products_selectID_cateAll($id_cate){
        $sql = 'SELECT * FROM products WHERE id_cate = ?';
        return pdo_query($sql, $id_cate);
    }
    function products_selectID_pd($id_pd){
        $sql = 'SELECT * FROM products WHERE id_pd = ?';
        return pdo_query($sql, $id_pd);
    }
    function products_select_limit_12($offset){
        $sql = 'SELECT * FROM products  limit 12 offset '. $offset;
        return pdo_query($sql, $offset);
    }
    function products_new(){
        $sql = 'SELECT * FROM products ORDER BY date_update limit 4';
        return pdo_query($sql);
    }
    function insert_products($name, $price, $price_sale, $images, $desc, $quantity, $id_cate){
        $sql = 'INSERT INTO products(name_pd, price, price_sale, images, description, Quantity, id_cate) VALUES (?,?,?,?,?,?,?)';
        pdo_execute($sql,$name, $price, $price_sale, $images, $desc, $quantity, $id_cate);
    }
    function update_not_img($id_pd, $name, $price, $price_sale, $date, $quantity, $id_cate){
        $sql = 'UPDATE products SET name_pd = ?, price = ?, price_sale = ?, date_update = ?, Quantity = ?, id_cate = ? WHERE id_pd = ?';
        pdo_execute($sql, $name, $price, $price_sale, $date, $quantity, $id_cate, $id_pd);
    }
?>