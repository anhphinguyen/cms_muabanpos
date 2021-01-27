<?php

// -----------------------------------------------------------------------------
// Lấy mật khẩu cũ
// ------------------------------------ ----------------------------------------
function pass_old($account_username)
{
    $num_row = db_fetch_row("SELECT `tbl_account_account`.`password` FROM `tbl_account_account` WHERE `account_username` = '{$account_username}'");
    $pass_old = implode('', $num_row);
    return $pass_old;
}
// -----------------------------------------------------------------------------
// Cập nhật thông tin user
// ------------------------------------ ----------------------------------------
function update_user($data = array(), $where)
{
    db_update('tbl_account_account', $data, $where);
}
// -----------------------------------------------------------------------------
// Kiểm tra thông tin đăng nhập có chính xác chưa 
// ------------------------------------ ----------------------------------------
function login_success($account_username, $password, $store_code)
{
    $sql = "SELECT 
            `tbl_business_store`.`id` as `id_business`,
          
            `tbl_account_account`.`id` as `id_account`,
            `tbl_account_account`.`account_username` as `username`,
            `tbl_account_account`.`account_password` as `password`,
            `tbl_account_account`.`account_fullname` as `fullname`
          
            FROM `tbl_account_account`
            LEFT JOIN `tbl_business_store` ON `tbl_business_store`.`id` = `tbl_account_account`.`id_business`
            WHERE `tbl_account_account`.`account_username` = '{$account_username}' 
            AND `tbl_account_account`.`account_password` = '{$password}'
            AND `tbl_business_store`.`store_code` = '{$store_code}'";
    $row_arr = db_fetch_array($sql);
    if (count($row_arr) > 0) {
        $result = array();
        foreach ($row_arr as $row) {
            $result = array(
                'id_account' => $row['id_account'],
                'id_business' => $row['id_business'],
                'account_username' => $row['username'],
                'account_password' => $row['password'],
                'account_fullname' => $row['fullname'],
            
            );
        }
        return $result;
    }
}
function get_user_by_id($id_user)
{
    $sql = "SELECT 
            `tbl_business_model`.`id` as `id_model`,
            `tbl_business_model`.`business_model` as `business_model`,

            `tbl_business_store`.`id` as `id_business`,
            `tbl_business_store`.`store_code` as `store_code`,
            `tbl_business_store`.`store_name` as `store_name`,
            `tbl_business_store`.`store_phone` as `store_phone`,
            `tbl_business_store`.`store_address` as `store_address`,
            `tbl_business_store`.`store_prefix` as `store_prefix`,

            `tbl_account_account`.`id` as `id_account`,
            `tbl_account_account`.`id_type` as `id_type`,
            `tbl_account_account`.`account_username` as `username`,
            `tbl_account_account`.`account_password` as `password`,
            `tbl_account_account`.`account_fullname` as `fullname`,
            `tbl_account_account`.`account_phone` as `account_phone`,
            `tbl_account_account`.`account_email` as `email`,
            `tbl_account_account`.`account_status` as `account_status`,
            `tbl_account_account`.`force_sign_out` as `force_sign_out`,

            `tbl_account_type`.`type_account` as `type_account`,
            `tbl_account_type`.`description` as `type_description`
            FROM `tbl_account_account`
            LEFT JOIN `tbl_business_store` ON `tbl_business_store`.`id` = `tbl_account_account`.`id_business`
            LEFT JOIN `tbl_account_type` ON `tbl_account_type`.`id` = `tbl_account_account`.`id_type`
            LEFT JOIN `tbl_business_model` ON `tbl_business_model`.`id` = `tbl_business_store`.`id_business_model`
            WHERE `tbl_account_account`.`id` = '{$id_user}' 
            ";
    $row_arr = db_fetch_array($sql);
    if (count($row_arr) > 0) {
        $result = array();
        foreach ($row_arr as $row) {
            $result = array(
                'id_account' => $row['id_account'],
                'id_business' => $row['id_business'],
                'id_type' => $row['id_type'],
                'id_model' => $row['id_model'],
                'business_model' => $row['business_model'],
                'store_name' => $row['store_name'],
                'store_prefix' => $row['store_prefix'],
                'store_phone' => $row['store_phone'],
                'store_address' => $row['store_address'],
                'account_username' => $row['username'],
                'account_password' => $row['password'],
                'account_fullname' => $row['fullname'],
                'account_phone' => $row['account_phone'],
                'account_email' => $row['email'],
                'account_status' => $row['account_status'],
                'type_account' => $row['type_account'],
                'type_description' => $row['type_description'],
                'force_sign_out' => $row['force_sign_out'],
            );

            if ($row['id_type'] == '1') {
                $result['role_permission'] = getRolePermission($row['id_account']);
            }
        }
        return $result;
    }
}

function getRolePermission($idUser = '')
{
    global $conn;
    $sql = "SELECT * FROM tbl_account_permission";

    if (!empty($idUser)) {
        $sql = " SELECT 
            tbl_account_permission.id,
            tbl_account_permission.permission,
            tbl_account_permission.description

            FROM tbl_account_permission
            LEFT JOIN tbl_account_authorize
            ON tbl_account_permission.id = tbl_account_authorize.grant_permission

            WHERE tbl_account_authorize.id_admin = '" . $idUser . "'
			
			ORDER BY tbl_account_authorize.grant_permission ASC
        ";
    }

    $result = mysqli_query($conn, $sql);
    // mysqli_close($conn);
    // Get row count
    $num = mysqli_num_rows($result);
    $arr_result = array();
    // Check if any item
    if ($num > 0) {

        while ($row = $result->fetch_assoc()) {

            $role_item = array(
                'id' => $row['id'],
                'permission' => $row['permission'],
                'description' => $row['description']
            );
            // Push to "data"
            array_push($arr_result, $role_item);
        }
    }

    return $arr_result;
}
// -----------------------------------------------------------------------------
// Kiểm tra email có tồn tại trên hệ thống hay không 
// ------------------------------------ ----------------------------------------
function check_email($email)
{
    $check = db_num_rows("SELECT * FROM `tbl_account_account` WHERE `email` = '{$email}'");
    if ($check > 0) {
        return true;
    } else {
        return false;
    }
}

// ----------------------------------------------------------------------
// Hàm hiển thị Họ và tên khi đăng nhập thành công
// ----------------------------------------------------------------------
// function name_login($account_username, $password, $store_code)
// {
//     $sql = "SELECT
//             tbl_business_store.store_code,

//             tbl_account_account.account_username,  
//             tbl_account_account.account_password,  
//             tbl_account_account.account_fullname,  
//             FROM `tbl_account_account` 
//             LEFT JOIN tbl_business_store ON tbl_business_store.id = tbl_account_account.id_business
//             WHERE account_username = '{$account_username}' 
//             AND account_password = '{$password}'
//             AND store_code = '{$store_code}'";;
//     $num_row = db_fetch_row($sql);
//     $fullname = implode('', $num_row);
//     return $fullname;
// }

// ----------------------------------------------------------------------
// Hàm kiểm tra kích hoạt tài khoản
// ----------------------------------------------------------------------
// function is_active($account_username)
// {
//     $num_row = db_fetch_row("SELECT * FROM `tbl_account_account` WHERE `account_username` = '{$account_username}'");
//     if ($num_row > 0) {
//         $is_active = implode('', $num_row);
//         if ($is_active == '1')
//             return true;
//     }
//     return false;
// }


use function Aws\flatmap;

function insert_user($data = array())
{
    db_insert('tbl_account_account', $data);
}

function isseted_user($account_username, $email)
{
    if (isset($account_username) && isset($email)) {
        $num_row = db_num_rows("SELECT * FROM `tbl_account_account` WHERE `account_username` = '{$account_username}' OR `email` = '{$email}'");
        if ($num_row > 0) {
            return true;
        }
    }
    return false;
}
//=======================================================
// Hàm tính thời gian hết hạn của user khi chưa active
//=======================================================

function deed_line_active_user()
{
    $result = db_fetch_array("SELECT `tbl_account_account`.`reg_date` FROM `tbl_account_account`");
    foreach ($result as $old_time) {
        $strOldTime = implode('', $old_time);
        $deedLine = (int)time() - (int)$strOldTime;
        if ($deedLine >= 24 * 60 * 60) {
            db_delete('tbl_account_account', "`is_active` = '0' AND `reg_date` = '{$strOldTime}'");
        }
    }
}
function check_deed_line_active_user($active_token)
{
    $result = db_fetch_array("SELECT `tbl_account_account`.`reg_date` FROM `tbl_account_account` WHERE `active_token` = '{$active_token}'");
    foreach ($result as $old_time) {
        $strOldTime = implode('', $old_time);
        $deedLine = (int)time() - (int)$strOldTime;
        if ($deedLine >= 24 * 60 * 60) {
            return false;
        }
        return true;
    }
}
//=======================================================
// Hàm kiểm tra mã kich hoạt đã kích hoạt chưa
//=======================================================

function check_active_token($active_token)
{
    $num_rows = db_num_rows("SELECT * FROM `tbl_account_account` WHERE `active_token` = '{$active_token}' AND `is_active` = '0'");
    if ($num_rows > 0)
        return true;
    return false;
}
//=======================================================
// Hàm kiểm tra mã lấy lại mật khẩu có trong CSDL hay không
//=======================================================

function check_reset_token($reset_token)
{
    $check = db_num_rows("SELECT * FROM `tbl_account_account` WHERE `reset_token` = '{$reset_token}'");
    if ($check > 0)
        return true;
    return false;
}
//=======================================================
// Hàm kich hoạt tài khoản 
//=======================================================
function active_user($active_token)
{
    return db_update('tbl_account_account', array('is_active' => '1'), "`active_token` = '{$active_token}'");
}
