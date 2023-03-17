<?php
    function images_selectID_product($id_pd){
        $sql = 'SELECT * FROM images WHERE id_pd = ?';
        return pdo_query($sql, $id_pd);
    }
?>