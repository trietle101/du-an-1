<?php
    function cate_selectAll(){
        $sql = 'SELECT * FROM category';
        return pdo_query($sql);
    }
    function delete_cate($id){
        $sql = 'DELETE FROM category WHERE id_cate = ?';
        pdo_execute($sql, $id);
    }
?>