<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    // load('lib', 'validation');
    // load('lib', 'email');
    load_model('index');
}

function list_product_categoryAction(){
    $get_user = get_user_by_id($_SESSION['id_account']);
    $list_product_category = get_product_category($get_user['id_business']);
    $data['list_product_category'] = $list_product_category;
    load_view('list_product_category', $data);
}
