<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thiết lập mật khẩu</title>
    <link rel="stylesheet" href="public/css/login.css">
</head>

<body>

    <div id="wrapper">
        <h2>Thiết lập lại mật khẩu</h2>
        <form action="" method="post" id="form-login">

            <input type="password" name="password" id="password" placeholder=" Mật khẩu mới">
            <p style="text-align: left; color: red"><?php if (isset($error['password'])) echo $error['password'] ?></p>

            <input type="password" name="re-password" id="re-password" placeholder=" Xác nhận Mật khẩu">
            <p style="text-align: left; color: red"><?php if (isset($error['re-password'])) echo $error['re-password'] ?></p>

            <input type="submit" name="btn_rs_pass" id="btn_rs_pass" value="Xác nhận">
            <p style="text-align: left; color: red"><?php if (isset($error['rsPass'])) echo $error['rsPass'] ?></p>
            <p style="text-align: center; color: green"><?php if (isset($success)) echo $success ?></p>
        </form>
        <a href="?mod=users&controller=index&action=login" id="login">Đăng nhập</a>|
        <a href="?mod=users&controller=index&action=register" id="register">Đăng kí</a>
    </div>
</body>

</html>