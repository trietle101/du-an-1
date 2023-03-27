<?php
    function cate_selectAll(){
        $sql = 'SELECT * FROM category';
        return pdo_query($sql);
    }
    function cate_select_id($id){
        $sql = 'SELECT * FROM category WHERE id_cate = ?';
        return pdo_query($sql, $id);
    }
    function delete_cate($id){
        $sql = 'DELETE FROM category WHERE id_cate = ?';
        pdo_execute($sql, $id);
    }
    function insert_cate($name){
        $sql = 'INSERT INTO category(name_cate) VALUES (?)';
        pdo_execute($sql, $name);
    }
    function update_cate($name, $id){
        $sql = 'UPDATE category SET name_cate = ? WHERE id_cate = ?';
        pdo_execute($sql, $name, $id);
    }
?>