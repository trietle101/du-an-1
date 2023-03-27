<?php
    function cate_selectAll(){
        $sql = 'SELECT * FROM category';
        return pdo_query($sql);
    }
?>