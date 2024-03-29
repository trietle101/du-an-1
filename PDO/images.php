<?php
    function images_selectID_product($id_pd){
        $sql = 'SELECT * FROM images WHERE id_pd = ?';
        return pdo_query($sql, $id_pd);
    }
    function insert_images($id_pd, $name_image){
        $sql = 'INSERT INTO images (name_img, id_pd) VALUES(?, ?)';
        pdo_execute($sql, $name_image, $id_pd);
    }
    function check_img_edit($img){
        $sql = 'SELECT * from images WHERE name_img = ?';
        pdo_check($sql, $img);
    }
    function select_imgALL(){
        $sql = 'SELECT * FROM images';
        return pdo_query($sql);
    }
    function delete_img($id){
        $sql = 'DELETE FROM images WHERE id_img = ?';
        pdo_execute($sql, $id);
    }
?>