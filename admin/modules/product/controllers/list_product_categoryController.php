<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    $get_user = get_user_by_id($_SESSION['id_account']);
    $list_product_category = get_product_category($get_user['id_business']);
    $data['list_product_category'] = $list_product_category;
    $data['get_user'] = $get_user;
    load_view('list_product_category', $data);
}

function createAction()
{
    $error = array();

    if (isset($_REQUEST['id_business']) && !empty($_REQUEST['id_business'])) {
        $id_business = $_REQUEST['id_business'];
    } else {
        $error['id_business'] = "Nhập id_business";
    }

    if (isset($_REQUEST['category_title']) && !empty($_REQUEST['category_title'])) {
        $category_title = $_REQUEST['category_title'];
    } else {
        $error['category_title'] = "Nhập category_title";
    }

    if (isset($_FILES['category_icon']['name']) && !empty($_FILES['category_icon']['name'])) { // up product_img
        $category_img = 'category_icon';
        $dir_save_category_img = "images/product_product/";
    } else {
        $error['category_icon'] = "Hình ảnh không được để trống";
    }

    
    if (empty($error)) {

        $dir_save_thumb = handing_file_img($category_img, $dir_save_category_img);

        $category_data = array(
            'id_business' => $id_business,
            'category_title' => $category_title,
            'category_icon' => $dir_save_thumb
        );
        db_insert('tbl_product_category', $category_data);
        $data['success'] = "Tạo danh mục thành công";
        echo json_encode($data);
    }else {
        $data['error'] = $error;
        echo json_encode($data);
    }
}
