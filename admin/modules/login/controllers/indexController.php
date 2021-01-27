<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    // load('lib', 'email');
    // load_model('index');
}
function indexAction()
{
    redirect_to('?mod=users&action=login');
}
function loginAction()
{
    // load_model('login');
    if (isset($_POST['btn_login'])) {
        $error = array();

        //handing store_code
        if (empty($_POST['store_code'])) {
            $error['store_code'] = "Trường này không được để trống";
        }else {
            $store_code = $_POST['store_code'];
        }
        //handing username
        if (empty($_POST['username'])) {
            $error['username'] = "Trường này không được để trống";
        } 
                // elseif (!is_username($_POST['username'])) {
                //     $error['username'] = "Tên đăng nhập bao gồm kí tự, chữ số từ 6 đến 32 kí tự";
                // }
        else {
            $username = $_POST['username'];
        }
        //handing password
        if (empty($_POST['password'])) {
            $error['password'] = "Trường này không được để trống";
        }
                // elseif (!is_password($_POST['password'])) {
                //     $error['password'] = "Mật khẩu bắt đầu bằng chữ cái in hoa, chữ số, kí tự đặc biệt từ 6 đến 32 kí tự";
                // } 
        else {
            $password = md5($_POST['password']);
        }

        
        //handing login infomation 
        if (empty($error)) {
            $login_success_arr = login_success($username, $password, $store_code);
            if (count($login_success_arr) > 0) {
                $_SESSION['is_login'] = 1;
                $_SESSION['id_account'] = $login_success_arr['id_account'];
                $_SESSION['user_login'] = $login_success_arr['account_username'];
                $_SESSION['name_login'] = $login_success_arr['account_fullname'];
                $_SESSION['store_code'] = $login_success_arr['store_code'];
                redirect_to('?mod=home');
            } else {
                $error['login'] = "Tên đăng nhập hoặc mật khẩu không chính xác";
            }
        }
        $data['error'] = $error;
    }

    if (isset($data)) {
        load_view('login', $data);
    } else {
        load_view('login');
    }
}

function registerAction()
{
    // load_model('register');
    deed_line_active_user();
    global $error, $username, $password, $email, $fullname, $re_password;
    if (isset($_POST['btn_reg'])) {
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
        //-------------
        if (empty($_POST['re-password'])) {
            $error['re-password'] = "Trường này không được để trống";
        } elseif (!is_password($_POST['re-password'])) {
            $error['re-password'] = "Mật khẩu bắt đầu bằng chữ cái in hoa, chữ số, kí tự đặc biệt từ 6 đến 32 kí tự";
        } elseif (md5($_POST['re-password']) != md5($_POST['password'])) {
            $error['re-password'] = "Mật khẩu không trùng khớp";
        } else {
            $re_password = md5($_POST['re-password']);
        }
        //kiểm tra tài khoản có tồn tại hay chưa

        if (isseted_user($username, $email)) {
            $error['isseted'] = "Tài khoản đã tồn tại";
        } else if (empty($error)) {
            // $success = "Đăng kí thành công";
            $active_token = md5($username . time());
            $user = array(
                'fullname' => $fullname,
                'display_name' => 'Admin',
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'gender' => $gender,
                'active_token' => $active_token,
                'created_date' => time(),
                'reg_date' => time(),
            );
            insert_user($user);
            $link = base_url("?mod=users&action=active&active_token={$active_token}");
            $link_active = "<a href='{$link}'>$link</a>";
            $content = "<p>Xin chào {$fullname} ! Nếu bạn đã đăng kí tài khoản vào hệ thống của chúng tôi thì vui lòng click vào link sau để kích hoạt : {$link_active}</p>. <br>Link sẽ hết hiệu lực trong vòng 24h.<br> Nếu không phải bạn là người đăng kí, vui lòng bỏ qua mail này.";
            if (send_mail($email, $fullname, 'Link kích hoạt tài khoản', $content)) {
                $success = "Hệ thống đã gửi thư kich hoạt vào email của bạn.";
                $data['success'] = $success;
            }
        }

        $data['error'] = $error;
    }
    if (isset($data)) {
        load_view('register', $data);
    } else {
        load_view('register');
    }
}

function activeAction()
{
    // load_model('active');
    // load_model('register');
    $active_token = $_GET['active_token'];
    if (check_deed_line_active_user($active_token)) {
        if (check_active_token($active_token)) {
            active_user($active_token);
            $link = base_url("?mod=users&action=login");
            echo "Kích hoạt thành công. Mời bạn <a href='{$link}'>Đăng nhập</a>";
        } else {
            echo "Mã kích hoạt không tồn tại";
        };
    } else {
        $link = base_url("?mod=users&action=register");
        echo "Đường dẫn đã hết hạn. Vui lòng trở về <a href='{$link}'>Đăng kí</a> tài khoản mới.";
    }
}
function resetAction()
{
    if(isset($_GET['reset_token'])){
        $reset_token = $_GET['reset_token'];
    }else{
        $reset_token = false;
    }
    if (!empty($reset_token)) {
        if (check_reset_token($reset_token)) {
            if (isset($_POST['btn_rs_pass'])) {
                $error = array();
                //handing password
                if (empty($_POST['password'])) {
                    $error['password'] = "Trường này không được để trống";
                } elseif (!is_password($_POST['password'])) {
                    $error['password'] = "Mật khẩu bắt đầu bằng chữ cái in hoa, chữ số, kí tự đặc biệt từ 6 đến 32 kí tự";
                } else {
                    $password = md5($_POST['password']);
                }
                //-------------
                if (empty($_POST['re-password'])) {
                    $error['re-password'] = "Trường này không được để trống";
                } elseif (!is_password($_POST['re-password'])) {
                    $error['re-password'] = "Mật khẩu bắt đầu bằng chữ cái in hoa, chữ số, kí tự đặc biệt từ 6 đến 32 kí tự";
                } elseif (md5($_POST['re-password']) != md5($_POST['password'])) {
                    $error['re-password'] = "Mật khẩu không trùng khớp";
                } else {
                    $re_password = md5($_POST['re-password']);
                }
                //handing login infomation 
                if (empty($error)) {
                    $rs_pass = array(
                        'password' => $re_password
                    );  
                    update_user($rs_pass,"`reset_token` = '{$reset_token}'");
                    redirect_to('?mod=users&action=rsOk');
                }
                $data['error'] = $error;
            }
            if (isset($data)) {
                load_view('rsPass', $data);
            } else {
                load_view('rsPass');
            }
        } else {
            echo "Mã reset không tồn tại trong hệ thống.";
        }
    } else {
        if (isset($_POST['btn_reset'])) {
            $error = array();
            //handing email
            if (empty($_POST['email'])) {
                $error['email'] = "Trường này không được để trống";
            } elseif (!is_email($_POST['email'])) {
                $error['email'] = "Email không đúng định dạng";
            } else {
                $email = $_POST['email'];
            }
            //handing login infomation 
            if (empty($error)) {
                if (check_email($email)) {
                    $reset_token = md5($email . time());
                    $reset = array(
                        'reset_token' => $reset_token
                    );
                    update_user($reset, "`email` = '{$email}'");
                    $link = base_url("?mod=users&action=reset&reset_token={$reset_token}");
                    $content = "<p>Nếu bạn là người yêu cầu thay đổi mật khẩu, vui lòng click vào link này: {$link}</p>";
                    if (send_mail($email, '', 'Lấy lại mật khẩu PHP MASTER', $content)) {
                        $success = "Hệ thống đã gửi thư kich hoạt vào email của bạn.";
                        $data['success'] = $success;
                    }
                } else {
                    $error['reset'] = "Email không tồn tại trên hệ thống.";
                }
            }
            $data['error'] = $error;
        }

        if (isset($data)) {
            load_view('reset', $data);
        } else {
            load_view('reset');
        }
    }
}
function rsOkAction(){
    load_view('rsOk');
}
function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    unset($_SESSION['name_login']);
    
    redirect_to("?mod=users&action=login");
}
