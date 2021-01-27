<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function infoAction()
{
    global $display_name, $email, $tel, $address;
    if (isset($_POST['btn-submit'])) {
        $error = array();

        //handing display_name
        if (!empty($_POST['display-name'])) {
            $display_name = htmlentities($_POST['display-name']);
        }else {
            $display_name = display_name($_SESSION['user_login']);
        }
        //handing email
        if (!empty($_POST['email']) && is_email($_POST['email'])) {            
            $email = $_POST['email'];
        }else{
            $email = get_email($_SESSION['user_login']);
        }
        //handing tel
        if (!empty($_POST['tel'])) {    
            $parttern = "/^([0-9]){10,13}$/";
            if (preg_match($parttern, $_POST['tel'])){
                $tel = $_POST['tel'];
            }else{
                $error['tel'] = "Số điện thoại không đúng định dạng";
            }
        }else{
            $tel = get_tel($_SESSION['user_login']);
        }
        //handing address
        if (!empty($_POST['address'])) {            
            $address = htmlentities($_POST['address']);
        }else{
            $address = get_address($_SESSION['user_login']);
        }
        //handing login infomation 
        if (empty($error)) {
            $data['success'] = "Cập nhật thành công.";
            $user = array(
                'display_name' => $display_name,
                'email' => $email,
                'tel' => $tel,
                'address' => $address,
            );
            update_user($user,"`username` = '{$_SESSION['user_login']}'");
            $_SESSION['d-name'] = display_name($_SESSION['user_login']);
        }else{
            $error['update'] = "Vui lòng kiểm tra lại thông tin của bạn!";
        }
        $data['error'] = $error;
    }

    if (isset($data)) {
        load_view('account', $data);
    } else {
        load_view('account');
    }
}
function addAction()
{
    global $error, $username, $password, $email, $fullname, $re_password;
    if (isset($_POST['btn-submit'])) {
        $error = array();
        //handing fullname
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Trường này không được để trống";
        } else {
            $fullname = $_POST['fullname'];
        }
        //handing gender
        if (empty($_POST['gender'])) {
            $error['gender'] = "Bạn chưa chọn giới tính";
        } else {
            $gender = $_POST['gender'];
        }
        //handing username
        if (empty($_POST['username'])) {
            $error['username'] = "Trường này không được để trống";
        } elseif (!is_username($_POST['username'])) {
            $error['username'] = "Tên đăng nhập bao gồm kí tự, chữ số từ 6 đến 32 kí tự";
        } else {
            $username = $_POST['username'];
        }
        //handing email
        if (empty($_POST['email'])) {
            $error['email'] = "Trường này không được để trống";
        } elseif (!is_email($_POST['email'])) {
            $error['email'] = "Email không đúng định dạng";
        } else {
            $email = $_POST['email'];
        }
        //handing password
        if (empty($_POST['password'])) {
            $error['password'] = "Trường này không được để trống";
        } elseif (!is_password($_POST['password'])) {
            $error['password'] = "Mật khẩu bắt đầu bằng chữ cái in hoa, chữ số, kí tự đặc biệt từ 6 đến 32 kí tự";
        } else {
            $password = md5($_POST['password']);
        }
        //kiểm tra tài khoản có tồn tại hay chưa

        if (isseted_user($username, $email)) {
            $error['isseted'] = "Tài khoản đã tồn tại";
        } else if (empty($error)) {
            $success = "Thêm thành viên thành công";
            $user = array(
                'fullname' => $fullname,
                'display_name' => 'Admin',
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'gender' => $gender,
                'is_active' => '1',
                'created_date' => time(),
            );
            insert_user($user);
            $data['success'] = $success;
         }

        $data['error'] = $error;
    }
    if (isset($data)) {
        load_view('addUser', $data);
    } else {
        load_view('addUser');
    }
}
function changeAction()
{
    global $pass_old, $pass_new, $confirm_pass;
    if (isset($_POST['btn-submit'])) {
        $error = array();

        //handing old-pass
        if (empty($_POST['pass-old'])) {
            $error['pass-old'] = "Vui lòng không để trống trường này!";
        }else if(!is_password($_POST['pass-old'])){
            $error['pass-old'] = "Thông tin không đúng định dạng!";
        }else if(md5($_POST['pass-old']) != pass_old($_SESSION['user_login'])){
            $error['pass-old'] = "Mật khẩu cũ không trùng khớp!";
        }else{
            $pass_old = md5($_POST['pass-old']);
        }
        //handing pass-new
        if (empty($_POST['pass-new'])) {            
            $error['pass-new'] = "Vui lòng không để trống trường này!";
        }else if(!is_password($_POST['pass-new'])){
            $error['pass-new'] = "Thông tin không đúng định dạng!";
        }else if(md5($_POST['pass-new']) == pass_old($_SESSION['user_login'])){
            $error['pass-new'] = "Mật khẩu mới không nên trùng khớp với Mật khẩu cũ!";
        }else{
            $pass_new = md5($_POST['pass-new']);
        }
        //handing confirm-pass
        if (empty($_POST['confirm-pass'])) {    
            $error['confirm-pass'] = "Vui lòng không để trống trường này!";
        }else if(!is_password($_POST['confirm-pass'])){
            $error['confirm-pass'] = "Thông tin không đúng định dạng!";
        }else if($_POST['confirm-pass'] != $_POST['pass-new']){
            $error['confirm-pass'] = "Thông tin không trùng khớp!";
        }else{
            $confirm_pass = md5($_POST['confirm-pass']);
        }

        //handing login infomation 
        if (empty($error)) {
            $data['success'] = "Đổi mật khẩu thành công.";
            $change_pass = array(
                'password' => $confirm_pass 
            );
            update_user($change_pass,$_SESSION['user_login']);
        }
        $data['error'] = $error;
    }

    if (isset($data)) {
        load_view('change', $data);
    } else {
        load_view('change');
    }
}