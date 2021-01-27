<?php

function get_product_category($id_business){
    $sql = "SELECT * FROM tbl_product_category WHERE id_business = '$id_business'";
    $result = db_fetch_array($sql);
    if(isset($result) && !empty($result)){
        return $result;
    }

    return false;
}